<?php
    require_once 'toolshed_config.php';
    require_once 'db_connect.php';
    echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . PHP_EOL;
    $stmt = 'DROP TABLE IF EXISTS posts';
    $dbc->exec($stmt);
    $stmt = 'DROP TABLE IF EXISTS categories';
    $dbc->exec($stmt);
    $stmt = 'DROP TABLE IF EXISTS users';
    $dbc->exec($stmt);
    $stmt = 'DROP TABLE IF EXISTS cities';
    $dbc->exec($stmt);
// ////////////////////////////////////////////////////////////
    $addTable = 'CREATE TABLE cities (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        city VARCHAR(11) NOT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY city_unq (city)
    )';
    $dbc->exec($addTable);
// ////////////////////////////////////////////////////////////
    $addTable = 'CREATE TABLE users (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        username VARCHAR(15) NOT NULL,
        email VARCHAR(30) NOT NULL,
        password VARCHAR(255) NOT NULL,
        city_id INT UNSIGNED NOT NULL,
        join_date DATE NOT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY user_unq (username),
        UNIQUE KEY email_unq (email)
    )';
    $dbc->exec($addTable);
    
// ////////////////////////////////////////////////////////////
    $addTable = 'CREATE TABLE categories (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        category VARCHAR(20) NOT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY category_unq (category)
        )';
    $dbc->exec($addTable);  
// ////////////////////////////////////////////////////////////
    $addTable = 'CREATE TABLE posts (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        user_id INT UNSIGNED NOT NULL,
        city_id INT(11) UNSIGNED NOT NULL,
        category_id INT(11) UNSIGNED NOT NULL,
        post_date DATE NOT NULL,
        expire_date DATE NOT NULL,
        highlights VARCHAR(200) NOT NULL,
        description TEXT NOT NULL,
        img_url VARCHAR(25),
        PRIMARY KEY (id)
    )';
    $dbc->exec($addTable);
    // $alterTable = 'ALTER TABLE posts
    // ADD FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE,
    // ADD FOREIGN KEY (city_id) REFERENCES cities (id) ON DELETE CASCADE ON UPDATE CASCADE,
    // ADD FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE ON UPDATE CASCADE';
    // $dbc->exec($alterTable);