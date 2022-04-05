<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="/app/views/css/style.css" rel="stylesheet">
    <title>PHP Crud using OOPS and MySQLi</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a href="index.php" class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Home</a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <?php
            if (isset($_SESSION['user_id'])) {
                $header = '<a type="submit" href="index.php?action=user-logout"  class="btn btn-outline-success my-2 my-sm-0">Logout</a>';
            } else {
                $header = '<a href="index.php?action=user-login" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</a>' .
                    '<a href="index.php?action=user-register" class="btn btn-outline-success my-2 my-sm-0" type="submit">Register</a>';
            }
            echo $header;
            ?>
        </div>
    </div>
</nav>

<?php
if (isset($response)) {
    switch ($response['type']) {
        case 'error':
            echo '<div class="alert alert-danger" role="alert">' . $response['message'] . '</div>';
            break;
        case 'success':
            echo '<div class="alert alert-success" role="alert">' . $response['message'] . '</div>';
            break;
    }
}
?>

