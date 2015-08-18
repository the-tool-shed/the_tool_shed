<?php

require_once 'BaseModel.php';

class Ad extends BaseModel
{
    public static function all()
    {
        self::dbConnect();
        $query = 'SELECT * FROM posts';
        $stmt = self::$dbc->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function findById($id)
    {
        self::dbConnect();
        $query = 'SELECT * FROM posts WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getHighlights($id)
    {
        self::dbconnect();
        $query = 'SELECT highlights FROM posts WHERE id = :id';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function categorySearch($category)
    {
        self::dbConnect();
        $query = "SELECT * FROM posts 
            WHERE category LIKE '%:category%'"; 
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':category', $category, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function usernameSearch($username)
    {
        self::dbConnect();
        $query = 'SELECT * FROM posts
            WHERE username LIKE :username'; 
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function citiesSearch($city)
    {
        self::dbConnect();
        $query = "SELECT * FROM posts
            WHERE city LIKE '%:city%'"; 
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
        $query = 'UPDATE posts
                    SET username = :username,
                    city = :city,
                    category = :category,
                    post_date = :post_date,
                    expire_date = :expire_date,
                    highlights = :highlights,
                    description = :description,
                    img_url = :img_url
                    WHERE id = :id';

        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':username',       $this->attributes['username'],     PDO::PARAM_STR);
        $stmt->bindValue(':city',           $this->attributes['city'],         PDO::PARAM_STR);
        $stmt->bindValue(':category',       $this->attributes['category'],     PDO::PARAM_STR);
        $stmt->bindValue(':post_date',      $this->attributes['post_date'],    PDO::PARAM_STR);
        $stmt->bindValue(':expire_date',    $this->attributes['expire_date'],  PDO::PARAM_STR);
        $stmt->bindValue(':highlights',     $this->attributes['highlights '],  PDO::PARAM_STR);
        $stmt->bindValue(':description',    $this->attributes['description'],  PDO::PARAM_STR);
        $stmt->bindValue(':img_url',        $this->attributes['img_url'],      PDO::PARAM_STR);
        
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert()
    {
        $query = 'INSERT INTO posts (username, city, category, post_date, expire_date, highlights, description, img_url) 
            VALUES (:username, :city, :category, :post_date, :expire_date, :highlights, :description, :img_url)';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':username',     $this->attributes['username'],    PDO::PARAM_STR);
        $stmt->bindValue(':city',         $this->attributes['city'],        PDO::PARAM_STR);
        $stmt->bindValue(':category',     $this->attributes['category'],    PDO::PARAM_STR);
        $stmt->bindValue(':post_date',    $this->attributes['post_date'],   PDO::PARAM_STR);
        $stmt->bindValue(':expire_date',  $this->attributes['expire_date'], PDO::PARAM_STR);
        $stmt->bindValue(':highlights',   $this->attributes['highlights'],  PDO::PARAM_STR);
        $stmt->bindValue(':description',  $this->attributes['description'], PDO::PARAM_STR);
        $stmt->bindValue(':img_url',      $this->attributes['img_url'],     PDO::PARAM_STR);

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