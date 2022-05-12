<?php
require_once 'header.php';
$id = $_GET['id'];
if (!isset($id) || $id == '') {
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
<div class="wrapper">
    <div class="logo">
        <img src="https://media.istockphoto.com/vectors/user-icon-flat-isolated-on-white-background-user-symbol-vector-vector-id1300845620?k=20&m=1300845620&s=612x612&w=0&h=f4XTZDAv7NPuZbG0habSpU0sNgECM0X7nbKzTUta3n8=" alt="">
    </div>
    <div class="text-center mt-4 fs-3">
        Edit User <?= $id ?>
    </div>
    <form class="p-3 mt-3" action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-field d-flex align-items-center">
            <span class="fa fa-user"></span>
            <input type="text" name="username" value="<?= $user['username'] ?>" placeholder="Username">
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fa fa-envelope"></span>
            <input type="email" name="email" value="<?= $user['email'] ?>" placeholder="Email">
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fa fa-lock"></span>
            <input type="password" value="<?= $user['password'] ?>" name="password" placeholder="Password">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-info px-5 rounded-pill mt-3">Update</button>
        </div>
    </form>
</div>
<?php require_once 'footer.php'; ?>