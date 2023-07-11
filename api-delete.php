<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"),true);
$stud_id = $data['stud_id'];

include 'config.php';

$sql = "DELETE FROM `students` WHERE `stud_id` = '$stud_id'";

if (mysqli_query($conn,$sql)){
    echo json_encode(array('Message' => 'Student record Deleted', 'status' => true));
} else {
    echo json_encode(array('Message' => 'Record Deletion error', 'status' => false));
}
