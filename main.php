<?php
require('app/snippets/base.php');

$posts = getAllPosts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V6</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!--===============================================================================================-->
    <style>img {
            max-width: 100%;
        }

        a {
            color: #ed5151;
        }

        .wrap-login100, .post {
            width: 640px;
        }

        .btn_wrap {
            display: flex;
            margin-left: -20px;
            padding-bottom: 50px;
        }

        .btn_wrap a {
            margin-left: 20px;
        }

        .btn_wrap a:hover {
            color: #FFF;
        }

        .log_out {
            background: #ed5151;
            box-shadow-color: #ed5151;
            box-shadow: 0 10px 30px 0px rgb(237 81 81 / 50%);
        }
    </style>
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-85 p-b-20">
            <form class="login100-form validate-form">
					<span class="login100-form-title p-b-50">
						Posts 
					</span>

                <div class="btn_wrap">
                    <a href="add_post.php" class="login100-form-btn">
                        Add post
                    </a>
                    <a href="/app/actions/exit.php" class="login100-form-btn log_out">
                        Log out
                    </a>
                </div>

                <?php foreach ($posts as $post): ?>
                    <div class="post m-b-35">
                        <img src="assets/images/<?= $post['image'] ?>">
                        <h2><?= $post['title'] ?></h2>
                        <p><?= $post['subtitle'] ?><p>

                            <?php if ($_SESSION['user']['role_id'] == 1): ?>
                                <a href="/app/actions/delete-post.php?id=<?= $post['id'] ?>">Delete post</a>
                            <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="assets/js/main.js"></script>

</body>
</html>