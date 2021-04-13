<?php

    function get_all_cars($sort)
    {
        global $db;
        if($sort == 'year')
        {
            $query = 'SELECT V.carID, V.year, V.model, V.price, T.type, M.make, C.class FROM vehicles V 
                            LEFT JOIN types T ON V.type_id = T.type_id
                            LEFT JOIN makes M ON V.make_id = M.make_id
                            LEFT JOIN classes C ON V.class_id = C.class_id
                            ORDER BY V.year DESC';
            $statement = $db->prepare($query);
            $statement->execute();
            $cars = $statement->fetchAll();
            $statement->closeCursor();
            return $cars;
        } else
        {
            $query = 'SELECT V.carID, V.year, V.model, V.price, T.type, M.make, C.class FROM vehicles V 
                            LEFT JOIN types T ON V.type_id = T.type_id
                            LEFT JOIN makes M ON V.make_id = M.make_id
                            LEFT JOIN classes C ON V.class_id = C.class_id
                            ORDER BY V.price DESC';
            $statement = $db->prepare($query);
            $statement->execute();
            $cars = $statement->fetchAll();
            $statement->closeCursor();
            return $cars;
        }
    }

    function add_car($class_id,$type_id,$make_id,$year,$model,$price)
    {
        global $db;
        $query = 'INSERT INTO vehicles (class_id, type_id, make_id, year, model, price)
                    VALUES (:class_id, :type_id, :make_id, :year, :model, :price)';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':make_id', $make_id);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_car($carID) 
    {
        global $db;
        $query = 'DELETE FROM vehicles
                    WHERE carID = :carID';
        $statement = $db->prepare($query);
        $statement->bindValue(':carID', $carID);
        $statement->execute();
        $statement->closeCursor();
    }