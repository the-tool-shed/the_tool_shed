<?php
require_once 'BaseModel.php';
class User extends BaseModel
{
    public static function all()
    {
        // get all rows
        self::dbConnect();
        $stmt = self::$dbc->query(
            'SELECT *
            FROM users'
        );
        // assign results to variable
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function find($username)
    {
        self::dbConnect();
        $query = 'SELECT username, email, join_date FROM users WHERE username = :username';
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
    public static function findLogin($username)
    {
        self::dbConnect();
        $query = 'SELECT id, username, password, email FROM users WHERE username = :username';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
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
                $this->updateUserInfo();
            } else {
                $this->insert();
            }
        }
    }
    public function update()
    {   
        $query = 'UPDATE users
                    SET username = :username,
                    email = :email,
                    password = :password,
                    join_date = :join_date,
                    WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':username',   $this->attributes['username'],     PDO::PARAM_STR);
        $stmt->bindValue(':email',      $this->attributes['email'],        PDO::PARAM_STR);
        $stmt->bindValue(':password',   $this->attributes['password '],   PDO::PARAM_STR);
        $stmt->bindValue(':join_date',  $this->attributes['join_date '],   PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function updateUserInfo()
    {   
        $query = 'UPDATE users
                    SET username = :username,
                    email = :email
                    WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':username',   $this->attributes['username'],     PDO::PARAM_STR);
        $stmt->bindValue(':email',      $this->attributes['email'],        PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_INT);
        $stmt->execute();
    }
    public function insert()
    {
        $query = 'INSERT INTO users (username, email, password,join_date) 
            VALUES (:username,:email,:password,:join_date)';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':username',   $this->attributes['username'],     PDO::PARAM_STR);
        $stmt->bindValue(':email',      $this->attributes['email'],        PDO::PARAM_STR);
        $stmt->bindValue(':password',   $this->attributes['password'],   PDO::PARAM_STR);
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