<?php
$id = $_GET['id'];
$json = file_get_contents('register_data.json');
$users = json_decode($json, 1);


function delete_record_array($users, $id)
{
    $new_users = [];
    foreach ($users as $user) {
        if ($user['id'] != $id) {
            array_push($new_users, $user);
        }
    }
    return $new_users;
}

$users = delete_record_array($users, $id);
file_put_contents('register_data.json', json_encode($users));
header("Location:view_all_users.php");
