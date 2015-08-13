<?php

require_once 'BaseModel.php';

class Ad extends BaseModel
{
    public static function all()
    {
        self::dbConnect();
        $query = 'SELECT u.username, c.city, ca.category,
                p.id, p.post_date, p.expire_date, p.highlights, p.description, p.img_url FROM posts AS p 
                LEFT JOIN cities AS c ON p.city_id = c.id
                LEFT JOIN users AS u ON p.user_id = u.id
                LEFT JOIN categories AS ca ON p.category_id = ca.id';
        $stmt = self::$dbc->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function findById($id)
    {
        self::dbConnect();
        $query = 'SELECT u.username, c.city, ca.category,
                p.id, p.post_date, p.expire_date, p.highlights, p.description, p.img_url FROM posts AS p 
                LEFT JOIN cities AS c ON p.city_id = c.id
                LEFT JOIN users AS u ON p.user_id = u.id
                LEFT JOIN categories AS ca ON p.category_id = ca.id WHERE p.id = :id';
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
        $query = 'UPDATE posts
                    SET user_id = :user_id
                    city_id = :city_id
                    category_id = :category_id
                    post_date = :post_date
                    expire_date = :expire_date
                    highlights = :highlights
                    description = :description
                    img_url = :img_url
                    WHERE id = :id';

        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':user_id',        $this->attributes['user_id'],      PDO::PARAM_INT);
        $stmt->bindValue(':city_id',        $this->attributes['city_id'],      PDO::PARAM_INT);
        $stmt->bindValue(':category_id',    $this->attributes['category_id'],  PDO::PARAM_INT);
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
        $query = 'INSERT INTO posts (user_id, city_id, category_id, post_date, expire_date, highlights, description, img_url) 
            VALUES (:user_id, :category_id, :city_id, :post_date, :expire_date, :highlights, :description, :img_url)';
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':user_id',      $this->attributes['user_id'],     PDO::PARAM_INT);
        $stmt->bindValue(':city_id',      $this->attributes['city_id'],     PDO::PARAM_INT);
        $stmt->bindValue(':category_id',  $this->attributes['category_id'], PDO::PARAM_INT);
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