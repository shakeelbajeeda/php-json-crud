<?php
require_once 'header.php';
$json = file_get_contents('register_data.json');
$tempArray = json_decode($json, 1);
?>
<div class="container">
    <h1 class="text-center">All Users</h1>
    <div class="text-center">
        <a href="sign_up.php" class="btn btn-primary">Register User</a>
        <a href="login_form.php" class="btn btn-primary">Login User</a>


    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">UserName</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tempArray as $table) { ?>
                <tr>
                    <th scope="row"><?php echo $table['id'] ?></th>
                    <td><?php echo $table['username'] ?></td>
                    <td><?php echo $table['email'] ?></td>
                    <td><?php echo $table['password'] ?></td>
                    <td><a href="edit.php?id=<?= $table['id'] ?>"><button class="btn btn-info">edit</button></a><a href="delete.php?id=<?= $table['id'] ?>"><button class="ms-2 btn btn-info">delete</button></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php require_once 'footer.php'; ?>