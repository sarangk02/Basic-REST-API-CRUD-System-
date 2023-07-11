<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"),true);
$stud_id = $data['stud_id'];
$name = $data['name'];
$age = $data['age'];
$city = $data['city'];

include 'config.php';

$sql = "UPDATE `students` SET `name` = '{$name}', `age` = '{$age}', `city` = '{$city}' WHERE `stud_id` = '$stud_id'";

if (mysqli_query($conn,$sql)){
    echo json_encode(array('Message' => 'Student record updated', 'status' => true));
} else {
    echo json_encode(array('Message' => 'Record updation error', 'status' => false));
}
