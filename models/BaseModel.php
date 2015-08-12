<?php 

class BaseModel
{
    protected static $dbc;
    protected static $table;

    public function __construct()
    {
        self::dbConnect();
    }

    protected static function dbConnect()
    {
        if (!self::$dbc)
        {
            define("DB_HOST", '127.0.0.1');
            define("DB_NAME", 'toolshed_db');
            define("DB_USER", 'tool_user');
            define("DB_PASS", '');
            
            self::$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public function __get ($name)
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }
        return null;
    }
    
    public function __set ($name, $value)
    {
        $this->attributes[$name] = $value;
    }


}