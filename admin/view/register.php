<?php include('view/header.php') ?>

<form method="POST" action=".">
    <label>Username:</label>
    <input type="hidden" name="action" value="register">
    <input type="text" name="username" placeholder="Please enter a username">
    <br>
    <label>Password:</label>
    <input type="password" name="password" placeholder="Please enter a password">
    <br>
    <label>Confirm password:</label>
    <input type="password" name="confirm_password" placeholder="Please confirm your password"><br><br>
    <button type="submit">Register</button>
</form>
<?php include('view/footer.php'); ?>