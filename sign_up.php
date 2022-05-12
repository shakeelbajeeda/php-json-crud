<?php
require_once 'header.php';
?>
<div class="wrapper">
    <div class="logo">
        <img src="https://media.istockphoto.com/vectors/user-icon-flat-isolated-on-white-background-user-symbol-vector-vector-id1300845620?k=20&m=1300845620&s=612x612&w=0&h=f4XTZDAv7NPuZbG0habSpU0sNgECM0X7nbKzTUta3n8=" alt="">
    </div>
    <div class="text-center mt-4 fs-3">
        Sign Up
    </div>
    <form class="p-3 mt-3" action="signUp_data.php" method="POST">
        <div class="form-field d-flex align-items-center">
            <span class="fa fa-user"></span>
            <input type="text" name="username" placeholder="Username">
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fa fa-envelope"></span>
            <input type="email" name="email" placeholder="Email">
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fa fa-lock"></span>
            <input type="password" name="password" placeholder="Password">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5 rounded-pill mt-3">Sign Up</button>
        </div>
    </form>
    <div class="text-center">
        If you already have an account?<a href="login_form.php" class="fs-6">Login</a>
    </div>
</div>
<?php require_once 'footer.php'; ?>