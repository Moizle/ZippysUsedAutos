<?php

function get_all_makes()
{
    global $db;
    $query = 'SELECT * FROM makes';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function get_car_by_make($make_id, $sort)
{
    global $db;
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

function delete_make($make_id) 
{
    global $db;
    $query = 'DELETE FROM makes
              WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_make($make) 
{
    global $db;
    $query = 'INSERT INTO makes (make)
              VALUES (:make)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make);
    $statement->execute();
    $statement->closeCursor();
}