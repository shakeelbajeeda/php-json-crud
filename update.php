<?php
$data['id'] = $_POST['id'];
$data['username'] = $_POST['username'];
$data['password'] = $_POST['password'];
$json = file_get_contents('register_data.json');
$users = json_decode($json, 1);

function find_index($users, $data)
{
    foreach ($users as $key => $array) {
        if ($array['id'] == $data['id']) {
            return $key;
        }
    }
}
$index = find_index($users, $data);
$users[$index]['username'] = $data['username'];
$users[$index]['password'] = $data['password'];

file_put_contents('register_data.json', json_encode($users));
header("Location:view_all_users.php");
