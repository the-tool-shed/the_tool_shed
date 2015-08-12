<?php

require_once 'BaseModel.php';

class User extends BaseModel
{
    protected static $table = 'users';

    public static function all()
    {
        // get all rows
        self::dbConnect();
        $stmt = self::$dbc->query(
            'SELECT u.username, u.email, c.city, u.join_date 
            FROM users AS u
            LEFT JOIN cities AS c ON u.city_id = c.id'
        );

        // assign results to variable
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function find($username)
    {
        self::dbConnect();
        $query = 'SELECT * FROM users WHERE username = :username';
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
        
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
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
        $stmt->bindValue(':join_date',  $this->attributes['join_date'],   PDO::PARAM_STR);

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