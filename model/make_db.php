<?php

class MakeDB{

    public static function get_all_makes()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM makes';
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }

    public static function get_car_by_make($make_id, $sort)
    {
        $db = Database::getDB();
        if($sort == 'year')
        {
            $query = 'SELECT V.carID, V.year, V.model, V.price, T.type, M.make, C.class FROM vehicles V 
                        LEFT JOIN types T ON V.type_id = T.type_id
                        LEFT JOIN makes M ON V.make_id = M.make_id
                        LEFT JOIN classes C ON V.class_id = C.class_id
                        WHERE V.make_id = :make_id
                        ORDER BY V.year DESC';
            $statement = $db->prepare($query);
            $statement -> bindValue(':make_id', $make_id);
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
                        WHERE V.make_id = :make_id
                        ORDER BY V.price DESC';
            $statement = $db->prepare($query);
            $statement -> bindValue(':make_id', $make_id);
            $statement->execute();
            $cars = $statement->fetchAll();
            $statement->closeCursor();
            return $cars;   
        }
    }

    public static function delete_make($make_id) 
    {
        $db = Database::getDB();
        $query = 'DELETE FROM makes
                WHERE make_id = :make_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function add_make($make) 
    {
        $db = Database::getDB();
        $query = 'INSERT INTO makes (make)
                VALUES (:make)';
        $statement = $db->prepare($query);
        $statement->bindValue(':make', $make);
        $statement->execute();
        $statement->closeCursor();
    }
}