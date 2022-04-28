<?php
$data['username'] = $_POST['username'];
$data['password'] = $_POST['password'];
$json = file_get_contents('register_data.json');
$tempArray = json_decode($json, 1);
$data['id'] = get_id($tempArray);
array_push($tempArray, $data);
$jsonData = json_encode($tempArray);
file_put_contents('register_data.json', $jsonData);
function get_id($tempArray)
{
    $max = 0;
    foreach ($tempArray as $user) {
        if ($max < $user['id']) {
            $max = $user['id'];
        }
    }
    $max++;
    return $max;
}
header("Location:view_all_users.php");
die();
