<?php
include_once("../settings/config.php");


try
{
    if(!empty($_POST)) {
        
        if(Melding::checkCloseMeldingen($_POST['long'], $_POST['lat'])){
            $feedback['status'] = "success";
        }else{
            $feedback['status'] = "error";
        }

    }
}
catch(Exception $e)
{
    $feedback['status'] = "error";
}

header('Content-Type: application/json');
echo json_encode($feedback);
?>