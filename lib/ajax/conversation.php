<?php

    include_once("../settings/config.php");
    $c = new Conversation;
    $user = new User;
    
    $feedback = [];

    try
    {
        if(!empty($_POST)) {
                $c->setPostId($_POST['id']);
                $c->setMessage($_POST['conversation']);
                $c->save();

                $feedback['status'] = "success";
                $feedback['action'] = "message";

                $user->setUserId($_SESSION['id']);
                $fields = ["username", "avatar"];
                $u = $user->getUserInfo($fields);

                $feedback['message'] = $c->getMessage();
                $feedback['username'] = $u->username;
                $feedback['avatar'] = $u->avatar;
            }
    }
    catch(Exception $e)
    {
        $feedback['status'] = "error";
    }

    header('Content-Type: application/json');
    echo json_encode($feedback);

?>