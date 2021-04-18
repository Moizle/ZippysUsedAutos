<?php
    switch($action)
    {
        case 'show_makes':
            include('view/make_list.php');
            break;
        case 'add_make':
            $make = filter_input(INPUT_POST, 'new_make', FILTER_SANITIZE_STRING);
            MakeDB::add_make($make);
            $makes = MakeDB::get_all_makes();
            include('view/make_list.php');
            break;
        case 'delete_make':
            MakeDB::delete_make($make_id);
            $makes = MakeDB::get_all_makes();
            include('view/make_list.php');
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