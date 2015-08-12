<?php

require_once 'BaseModel.php';

class Ad extends BaseModel
{
    protected static $table = 'posts';

    public static function catergorySearch($category)
    {
        self::dbConnect();
        $query = "SELECT * FROM posts AS p 
            JOIN categories AS c ON c.id = p.category_id
            WHERE c.category LIKE '%:category%'"; 
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':category', $category, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result) {
            $instance = new static;
            $instance->attributes = $result;
        }

        return $instance;
    }
    public static function usernameSearch($username)
    {
        self::dbConnect();
        $query = "SELECT * FROM posts AS p 
            JOIN users AS u ON u.id = p.user_id
            WHERE u.username LIKE '%:username%'"; 
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result) {
            $instance = new static;
            $instance->attributes = $result;
        }

        return $instance;
    }
    public static function citiesSearch($city)
    {
        self::dbConnect();
        $query = "SELECT * FROM posts AS p 
            JOIN cities AS c ON c.id = p.city_id
            WHERE c.city LIKE '%:city%'"; 
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

    public function update()
    {   
        $query = 'UPDATE users
                    SET user_name = :username
                    email = :email
                    city_id = :city_id
                    join_date = :join_date
                    WHERE id = :id';

        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':username',   $this->attributes['username'],     PDO::PARAM_STR);
        $stmt->bindValue(':email',      $this->attributes['email'],        PDO::PARAM_STR);
        $stmt->bindValue(':city_id',    $this->attributes['city_id'],      PDO::PARAM_INT);
        $stmt->bindValue(':join_date',  $this->attributes['join_date '],   PDO::PARAM_STR);
        
        $stmt->bindValue(':id',     $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert()
    {
        $query = 'INSERT INTO users (username, email, city_id, join_date) 
            VALUES (:username, :email, :city_id, :join_date)';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':username',   $this->attributes['username'],     PDO::PARAM_STR);
        $stmt->bindValue(':email',      $this->attributes['email'],        PDO::PARAM_STR);
        $stmt->bindValue(':city_id',    $this->attributes['city_id'],      PDO::PARAM_INT);
        $stmt->bindValue(':join_date',  $this->attributes['join_date '],   PDO::PARAM_STR);

        $stmt->execute();
    }

    public function delete()
    {
        self::dbConnect();
        
        $query = 'DELETE * FROM users WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}