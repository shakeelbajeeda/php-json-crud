<?php
function login($email, $password)
{
    $json = file_get_contents('register_data.json');
    $users = json_decode($json, 1);
    foreach ($users as $user) {
        if ($user['email'] == $email && $user['password'] == $password) {
            return $user;
        }
    }
    return null;
}

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $user = login($_POST['email'], $_POST['password']);
    if ($user) {
        echo "<b>" . $user['username'] . "</b> Login Successfully with this email <b>" . $user['email'] . "</b>";
    } else {
        die("invalid User");
    }
} else {
    die("Please Enter email or Password");
}
