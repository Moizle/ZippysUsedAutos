<?php
    session_start();

    require('../model/database.php');
    require('../model/vehicle_db.php');
    require('../model/make_db.php');
    require('../model/type_db.php');
    require('../model/class_db.php');



    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    $types = get_all_types(); 
    $makes = get_all_makes(); 
    $classes = get_all_classes(); 


    $sort = filter_input(INPUT_POST, 'sort', FILTER_SANITIZE_STRING);
    
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!$action)
    {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    }


    if($action == 'add_car' || $action == 'delete_car')
    {
        include('../admin/controllers/vehicles.php');
    } else if ($action == 'show_makes' || $action == 'add_make' || $action =='delete_make')
    {
        include('../admin/controllers/makes.php');
    }  else if ($action == 'show_types' || $action == 'add_type' || $action =='delete_type')
    {
        include('../admin/controllers/types.php');
    }  else if ($action == 'show_classes' || $action == 'add_class' || $action =='delete_class')
    {
        include('../admin/controllers/classes.php');
    }  else if ($action == 'login' || $action == 'show_login' || $action =='register' || $action == 'show_register' || $action == 'logout')
    {
        include('../admin/controllers/admin.php');
    } else
    {
        include('../admin/controllers/vehicles.php');
    }


