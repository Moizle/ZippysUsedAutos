<?php
    switch($action)
    {
        case 'show_classes':
            include('view/class_list.php');
            break;
        case 'add_class':
            $class = filter_input(INPUT_POST, 'new_class', FILTER_SANITIZE_STRING);
            add_class($class);
            $classes = get_all_classes();
            include('view/class_list.php');
            break;
        case 'delete_class':
            delete_class($class_id);
            $classes = get_all_classes();
            include('view/class_list.php');
            break;
        default:
            if($make_id)
            {
                $cars = get_car_by_make($make_id,$sort);
                include('../admin/view/vehicle_list.php');
            } else if ($type_id)
            {
                $cars = get_car_by_type($type_id,$sort);
                include('../admin/view/vehicle_list.php');
            } else if ($class_id)
            {
                $cars = get_car_by_class($class_id,$sort);
                include('../admin/view/vehicle_list.php');
            } else 
            {
                $cars = get_all_cars($sort); 
                include('../admin/view/vehicle_list.php');
            }
            break;
    }