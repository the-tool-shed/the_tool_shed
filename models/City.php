<?php

require_once 'BaseModel.php';

class City extends BaseModel
{
    public static function all()
    {
        // get all rows
        self::dbConnect();
        $stmt = self::$dbc->query('SELECT city FROM cities');

        // assign results to variable
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function save()
    {
        self::dbConnect();

        // ensure attributes array is not empty before saving
        if(isset($this->attributes)) {
            if(isset($this->attributes['id'])) {
                $this->update();
            } else {
                $this->insert();
            }
        }
    }

    public static function findById($id)
    {
        self::dbConnect();
        $query = 'SELECT * FROM cities WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result) {
            $instance = new static;
            $instance->attributes = $result;
        }

        return $instance;
    }

    public static function findByName($city)
    {
        self::dbConnect();
        $query = 'SELECT id FROM cities WHERE city = :city';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':city', $city, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result) {
            $instance = new static;
            $instance->attributes = $result;
        }

        return $instance;
    }    

    public function update()
    {   
        $query = 'UPDATE cities
                    SET city = :city
                    WHERE id = :id';

        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':city', $this->attributes['city'], PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert()
    {
        $query = 'INSERT INTO cities (city) VALUES (:city)';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':city', $this->attributes['city'], PDO::PARAM_INT);

        $stmt->execute();
    }

    public static function delete($id)
    {
        self::dbConnect();
        
        $query = 'DELETE FROM cities WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}