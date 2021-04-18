<?php
    switch($action)
    {
        case 'show_classes':
            include('view/class_list.php');
            break;
        case 'add_class':
            $class = filter_input(INPUT_POST, 'new_class', FILTER_SANITIZE_STRING);
            ClassDB::add_class($class);
            $classes = ClassDB::get_all_classes();
            include('view/class_list.php');
            break;
        case 'delete_class':
            ClassDB::delete_class($class_id);
            $classes = ClassDB::get_all_classes();
            include('view/class_list.php');
            break;
        default:
            if($make_id)
            {
                $cars = MakeDB::get_car_by_make($make_id,$sort);
                include('../admin/view/vehicle_list.php');
            } else if ($type_id)
            {
                $cars = TypeDB::get_car_by_type($type_id,$sort);
                include('../admin/view/vehicle_list.php');
            } else if ($class_id)
            {
                $cars = ClassDB::get_car_by_class($class_id,$sort);
                include('../admin/view/vehicle_list.php');
            } else 
            {
                $cars = VehicleDB::get_all_cars($sort); 
                include('../admin/view/vehicle_list.php');
            }
            break;
    }