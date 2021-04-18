<?php
    switch($action)
    {
        case 'show_types':
            include('view/type_list.php');
            break;
        case 'add_type':
            $type = filter_input(INPUT_POST, 'new_type', FILTER_SANITIZE_STRING);
            TypeDB::add_type($type);
            $types = TypeDB::get_all_types();
            include('view/type_list.php');
            break;
        case 'delete_type':
            TypeDB::delete_type($type_id);
            $types = TypeDB::get_all_types();
            include('view/type_list.php');
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