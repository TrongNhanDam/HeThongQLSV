<?php
include_once __DIR__ . '/../lib/session.php';
Session::checkLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div class="sign-in">
        <h1 class="signup-heading">Sign in</h1>
        <button class="signup-social">
            <div class="signup-social-icon">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <span class="signup-social-text">Hệ thống quản lí sinh viên UTC</span>
        </button>
        <div class="signup-or"><span>Login</span></div>
        <form action="" method='POST' class="signup-form" autocomplete="off">
            <label for="user" class="signup-label"> User name or email:</label>
            <input id="singin-input-username" name='user' type="text" id="user" class="signup-input" placeholder="Eg: TrongNhan" />
            <label for="password" class="signup-label"> Password:</label>
            <input id="signin-input-password" name='pass' type="password" id="password" class="signup-input" />
            <button id="btn-submit-login" name="btn-submit" class="signup-submit">Sign in</button>
        </form>
        <p class="signup-already">
            <span>Sign in for student</span>
            <a href="#" class="signup-login-link"> Sign in</a>
        </p>
    </div>
</body>
<script src="../js/handleLogin.js"></script>

</html>