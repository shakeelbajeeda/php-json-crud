<?php
$id = $_GET['id'];
if (!isset($id) || $id=='') {
    die('invalid id');
}
$json = file_get_contents('register_data.json');
$users = json_decode($json, 1);
function find_user_by_id($id, $users)
{
    foreach ($users as $user) {
        if ($id == $user['id']) {
            return $user;
        }
    }
    return false;
}
$user = find_user_by_id($id, $users);
if (!$user) {
    die("There is no record found against this id");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit</title>
</head>

<body>
    <h2>Edit User <?= $id ?></h2>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?= $id ?>">
        Username: <input type="text" value="<?= $user['username'] ?>" name="username" required><br><br>
        Password: <input type="text" value="<?= $user['password'] ?>" name="password" required><br><br>
        <button type="submit">update</button>
    </form>

</body>

</html>