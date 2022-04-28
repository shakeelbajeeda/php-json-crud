<?php
$json = file_get_contents('register_data.json');
$tempArray = json_decode($json, 1);
foreach ($tempArray as $key => $value) {
    if ($value['id'] == '2') {
        $tempArray[$key]['akhlaq'] = "Foot Ball";
    }
}

file_put_contents('results_new.json', json_encode($json_arr));

?>
<html>

<head>
    <title>All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body class="m-5">
    <a href="register.php" class="btn btn-primary">Add User</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">UserName</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tempArray as $table) { ?>
                <tr>
                    <th scope="row"><?php echo $table['id'] ?></th>
                    <td><?php echo $table['username'] ?></td>
                    <td><?php echo $table['password'] ?></td>
                    <td><a href="edit.php?id=<?= $table['id'] ?>"><button class="btn btn-info">edit</button></a><a href="delete.php?id=<?= $table['id'] ?>"><button class="ms-2 btn btn-info">delete</button></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>