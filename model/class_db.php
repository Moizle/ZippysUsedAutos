<?php
class ClassDB{

        public static function get_all_classes() 
        {
            $db = Database::getDB();

            $query = 'SELECT * FROM classes';
            $statement = $db->prepare($query);
            $statement->execute();
            $classes = $statement->fetchAll();
            $statement->closeCursor();
            return $classes;
        }

        public static function get_car_by_class($class_id, $sort)
        {
            $db = Database::getDB();

            if($sort == 'year')
            {
                $query = 'SELECT V.carID, V.year, V.model, V.price, T.type, M.make, C.class FROM vehicles V 
                            LEFT JOIN types T ON V.type_id = T.type_id
                            LEFT JOIN makes M ON V.make_id = M.make_id
                            LEFT JOIN classes C ON V.class_id = C.class_id
                            WHERE V.class_id = :class_id
                            ORDER BY V.year DESC';
                $statement = $db->prepare($query);
                $statement->bindValue(':class_id', $class_id);
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
                            WHERE V.class_id = :class_id
                            ORDER BY V.price DESC';
                $statement = $db->prepare($query);
                $statement->bindValue(':class_id', $class_id);
                $statement->execute();
                $cars = $statement->fetchAll();
                $statement->closeCursor();
                return $cars;   
            }
    }

        public static function delete_class($class_id) 
        {
            $db = Database::getDB();

            $query = 'DELETE FROM classes
                        WHERE class_id = :class_id';
            $statement = $db->prepare($query);
            $statement->bindValue(':class_id', $class_id);
            $statement->execute();
            $statement->closeCursor();
        }

        public static function add_class($class) 
        {
            $db = Database::getDB();

            $query = 'INSERT INTO classes (class)
                        VALUES (:class)';
            $statement = $db->prepare($query);
            $statement->bindValue(':class', $class);
            $statement->execute();
            $statement->closeCursor();
        }
    }