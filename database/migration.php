<?php

    require_once 'toolshed_config.php';
    require_once 'db_connect.php';

    echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . PHP_EOL;

    $stmt = 'DROP TABLE IF EXISTS user_posts';
    $dbc->exec($stmt);

    $stmt = 'DROP TABLE IF EXISTS posts';
    $dbc->exec($stmt);

    $stmt = 'DROP TABLE IF EXISTS categories';
    $dbc->exec($stmt);

    $stmt = 'DROP TABLE IF EXISTS users';
    $dbc->exec($stmt);

// ////////////////////////////////////////////////////////////
    $addTable = 'CREATE TABLE users (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        username VARCHAR(15) NOT NULL,
        email VARCHAR(30) NOT NULL,
        city VARCHAR(11) NOT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY "user_unq" (username),
        UNIQUE KEY "email_unq" (email)
    )';

    $dbc->exec($addTable);

// ////////////////////////////////////////////////////////////
    $addTable = 'CREATE TABLE categories (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        category VARCHAR(20) NOT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY "category_unq" (category)
        )';

    $dbc->exec($addTable);  

// ////////////////////////////////////////////////////////////
    $addTable = 'CREATE TABLE posts (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        category_id INT(11) UNSIGNED NOT NULL,
        city VARCHAR(11) NOT NULL,
        post_date DATE NOT NULL,
        expire_date DATE NOT NULL,
        highlights VARCHAR(200) NOT NULL,
        description TEXT NOT NULL,
        PRIMARY KEY (id)
    )';

    $dbc->exec($addTable);

// ////////////////////////////////////////////////////////////
    $addTable = 'CREATE TABLE user_posts (
        id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
        user_id INT(11) UNSIGNED NOT NULL,
        category_id INT(11) UNSIGNED NOT NULL,
        post_id INT(11) UNSIGNED NOT NULL,
        PRIMARY KEY(id),
        UNIQUE KEY user_category_unq (user_id,category_id),
            KEY user_unq_category (category_id),
            KEY unq_post (post_id),
            CONSTRAINT unq_post FOREIGN KEY (post_id) REFERENCES posts (id),
            CONSTRAINT user_unq_category FOREIGN KEY (category_id) REFERENCES categories (id),
            CONSTRAINT user_unq_post FOREIGN KEY (user_id) REFERENCES users (id)
    )';

    $dbc->exec($addTable);