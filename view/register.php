<?php include('view/header.php') ?>
<?php if ($firstname)
{
    echo "Thank you for registering, $firstname"; 
    ?><br><br>
<?php }else { ?>
<form method="GET" action=".">
    <label>Name:</label>
    <input type="hidden" name="action" value="register">
    <input type="text" name="firstname" placeholder="Please enter your first name"><br><br>
    <button type="submit">Register</button>
</form>
<?php } ?>
<?php include('view/footer.php'); ?>