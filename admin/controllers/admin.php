<?php 

require('model/admin_db.php');

switch($action)
    {
        case 'logout':
            $_SESSION = array(); 
            session_destroy(); 
            $login_message = 'You have been logged out.';
            echo '<h3 style=\'text-align:center;\'>'.$login_message.'</h3>';
            include('view/login.php');
            break;
        case 'show_register':
            include('view/register.php');
            break;
        case 'show_login':
            include('view/login.php');
            break;
        case 'login':
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            is_valid_login($username,$password);
            if(is_valid_login($username,$password))
            {
                $_SESSION['is_valid_admin'] = true;
                include('../admin/controllers/vehicles.php');
            } else {
                $login_message = 'Invalid Login / Login Required to view this page.';
                echo '<h3 style=\'text-align:center;\'>'.$login_message.'</h3>';
                include('view/login.php');
            }
            break;
        case 'register':
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING); 
            include('util/valid_register.php');
            valid_registration($username, $password, $confirm_password);
            if(valid_registration($username, $password, $confirm_password))
            {
                $errors = valid_registration($username,$password,$confirm_password);
                foreach ($errors as $error)
                {
                echo '<ul>'.$error.'</ul><br/><br/>';
                }
                include('view/register.php');
            } else{
                add_admin($username,$password);
                $_SESSION['is_valid_admin'] = true;
                include('../admin/controllers/vehicles.php');
            }
            break;
        default:
            break;
        }
