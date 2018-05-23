<?php
include_once("../settings/config.php");

$feedback = [];

try
{
    if(!empty($_POST)) {
        $markers = Melding::getCloseMeldingen($_POST['long'], $_POST['lat']);
        array_walk_recursive($markers, function(&$item) {
            $item = htmlspecialchars($item);
        });
        $feedback['markers'] = $markers;
        $feedback['status'] = "success";       
    }
}
catch(Exception $e)
{
    $feedback['status'] = "error";
}

header('Content-Type: application/json');
echo json_encode($feedback);
?>