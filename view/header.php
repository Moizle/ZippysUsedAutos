<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy's Used Autos</title>
    <link rel='stylesheet' href='css/main.css' />
</head>
<body>
<main class="main">
<div class="heading">
<h1>Zippy's Used Autos</h1>
<?php if ($action != 'register' && $action !='logout' && (!isset($_SESSION['userid']))) { ?>
    <p><a href='.?action=register'>Register</a></p>
<?php } else if ($action != 'register' && $action != 'logout' && (isset($_SESSION['userid']))) { ?>
    <p>Welcome, <?php echo $_SESSION['userid'] ?> </p>
    <p>(<a href =".?action=logout">Sign out</a>)</p>
<?php } ?>
<br>
<br>
</div>