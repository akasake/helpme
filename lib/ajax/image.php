<?php
include_once("../settings/config.php");
$c = new Conversation;
$user = new User;

$feedback = [];

try
{
    if(!empty($_POST)) {
           
        }
}
catch(Exception $e)
{
    $feedback['status'] = "error";
}

header('Content-Type: application/json');
echo json_encode($feedback);


?>