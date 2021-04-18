<?php

// Start session management with a persistent cookie
$lifetime = 60 * 60 * 24 * 14; // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();
    
    require('model/database.php');
    require('model/vehicle_db.php');
    require('model/make_db.php');
    require('model/type_db.php');
    require('model/class_db.php');

    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);

    $sort = filter_input(INPUT_POST, 'sort', FILTER_SANITIZE_STRING);
    

    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!$action)
    {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if(!$action)
        {
            $action = 'show_cars';
        }

    }

    $firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
    if (isset($firstname))
    {
        $_SESSION['userid'] = $firstname;
    }

    switch($action)
    {
        case 'show_cars':
            if($make_id)
            {
                $cars = MakeDB::get_car_by_make($make_id,$sort);
                $types = TypeDB::get_all_types(); 
                $makes = MakeDB::get_all_makes(); 
                $classes = ClasDB::get_all_classes(); 
                include('view/vehicle_list.php');
            } else if ($type_id)
            {
                $cars = TypeDB::get_car_by_type($type_id,$sort);
                $types = TypeDB::get_all_types(); 
                $makes = MakeDB::get_all_makes(); 
                $classes = ClassDB::get_all_classes(); 
                include('view/vehicle_list.php');
            } else if ($class_id)
            {
                $cars = ClassDB::get_car_by_class($class_id,$sort);
                $types = TypeDB::get_all_types(); 
                $makes = MakeDB::get_all_makes(); 
                $classes = ClassDB::get_all_classes(); 
                include('view/vehicle_list.php');
            } else 
            {
                $cars = VehicleDB::get_all_cars($sort);
                $types = TypeDB::get_all_types(); 
                $makes = MakeDB::get_all_makes(); 
                $classes = ClassDB::get_all_classes(); 
                include('view/vehicle_list.php');
            }
            break;
        case 'register':
            include('view/register.php');
            break;
        case 'logout':
            include('view/logout.php');
            break;

        default:
            break;
        }