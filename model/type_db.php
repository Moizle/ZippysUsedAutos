<?php
    function get_all_types()
    {
        global $db;
        $query = 'SELECT * FROM types';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }

    function get_car_by_type($type_id, $sort)
    {
        global $db;
        if($sort == 'year')
        {
            $query = 'SELECT V.carID, V.year, V.model, V.price, T.type, M.make, C.class FROM vehicles V 
                        LEFT JOIN types T ON V.type_id = T.type_id
                        LEFT JOIN makes M ON V.make_id = M.make_id
                        LEFT JOIN classes C ON V.class_id = C.class_id
                        WHERE V.type_id = :type_id
                        ORDER BY V.year DESC';
            $statement = $db->prepare($query);
            $statement->bindValue(':type_id', $type_id);
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
                        WHERE V.type_id = :type_id
                        ORDER BY V.price DESC';
            $statement = $db->prepare($query);
            $statement->bindValue(':type_id', $type_id);
            $statement->execute();
            $cars = $statement->fetchAll();
            $statement->closeCursor();
            return $cars;   
        }
    }

    function delete_type($type_id) 
    {
        global $db;
        $query = 'DELETE FROM types
                WHERE type_id = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_type($type) 
    {
        global $db;
        $query = 'INSERT INTO types (type)
                VALUES (:type)';
        $statement = $db->prepare($query);
        $statement->bindValue(':type', $type);
        $statement->execute();
        $statement->closeCursor();
    }


