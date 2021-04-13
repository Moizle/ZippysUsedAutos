<?php
    switch($action)
    {
        case 'add_car':
            include('view/add_vehicle_form.php');
            break;
        case 'car_added':
            $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
            $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
            add_car($class_id,$type_id,$make_id,$year,$model,$price);
            include('view/add_vehicle_form.php');
            header('Location: .?=default');
            break;
        case 'delete_car':
            $cars = get_all_cars($sort);
            $carID = filter_input(INPUT_POST, 'carID', FILTER_VALIDATE_INT);
            delete_car($carID);
            header('Location: .');
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