<?php
    require_once 'toolshed_config.php';
    require_once 'db_connect.php';
    echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . PHP_EOL;

    $stmt = 'DROP TABLE IF EXISTS posts';
    $dbc->exec($stmt);

    $stmt = 'DROP TABLE IF EXISTS users';
    $dbc->exec($stmt);

    $stmt = 'DROP TABLE IF EXISTS categories';
    $dbc->exec($stmt);

    $stmt = 'DROP TABLE IF EXISTS cities';
    $dbc->exec($stmt);

    $stmt = 'DROP TABLE IF EXISTS passwords';
    $dbc->exec($stmt);

// /////////////////////////////////////////////////
    $addTable = 'CREATE TABLE users (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        username VARCHAR(15) NOT NULL,
        email VARCHAR(30) NOT NULL,
        password VARCHAR(255) NOT NULL,
        join_date DATE NOT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY user_unq (username),
        UNIQUE KEY email_unq (email)
    )';

    $dbc->exec($addTable);
    
// /////////////////////////////////////////////////

    $addTable = 'CREATE TABLE posts (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        username VARCHAR(15) NOT NULL,
        city VARCHAR(11) NOT NULL,
        category VARCHAR(20) NOT NULL,
        post_date DATE NOT NULL,
        expire_date DATE NOT NULL,
        highlights VARCHAR(200) NOT NULL,
        description TEXT NOT NULL,
        img_url VARCHAR(50),
        PRIMARY KEY (id),
        UNIQUE KEY user_category ("username", "category")
    )';

    $dbc->exec($addTable);