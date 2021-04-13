<?php include('view/header.php') ?>

<p>You are logged out, <?php echo $_SESSION['userid']?>. Thank you for visiting Zippy's Used Autos!</p>
<br>


<?php
            $_SESSION = array();
            session_destroy();
            $name = session_name(); // Get name of session cookie
            $expire = strtotime('-1 year'); // Create expire date in the past
            $params = session_get_cookie_params(); // Get session params
            $path = $params['path'];
            $domain = $params['domain'];
            $secure = $params['secure'];
            $httponly = $params['httponly'];
            setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
?>
<?php include('view/footer.php'); ?>