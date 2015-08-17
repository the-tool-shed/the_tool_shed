<?php
    require_once 'toolshed_config.php'; //configs for db
    require_once 'db_connect.php'; //db connection
    echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . PHP_EOL;
    
    $truncate = 'TRUNCATE users';
    $dbc->exec($truncate);

    $truncate = 'TRUNCATE posts';
    $dbc->exec($truncate);

// ///////////////////////////////////////////////////////////////////////////////////////////////////////
    $users = [
        ['username' => 'dgcollier'  ,'email' => 'dgcollier89@gmail.com' ,'password' => '$2y$10$RhAdFKNg8pTfjTipVJGc7Ob2mzWUJn9BvegyYY6F.2YzT5xZSplTq'  ,'join_date' => date('Y-m-d')],
        ['username' => 'cwtobias'   ,'email' => 'cwtobias@gmail.com'    ,'password' => '$2y$10$mGht.gq1MEgIvIFwpisu0.zXlGxtqVqVxG22C6TqIblyyhjvSwtFe'  ,'join_date' => date('Y-m-d')],
        ['username' => 'jwomack'    ,'email' => 'jwomack@gmail.com'     ,'password' => '$2y$10$RhAdFKNg8pTfjTipVJGc7Ob2mzWUJn9BvegyYY6F.2YzT5xZSplTq'  ,'join_date' => date('Y-m-d')],
        ['username' => 'icecastman' ,'email' => 'icecastman@gmail.com'  ,'password' => '$2y$10$mGht.gq1MEgIvIFwpisu0.zXlGxtqVqVxG22C6TqIblyyhjvSwtFe'  ,'join_date' => date('Y-m-d')],
        ['username' => 'ccnickens'  ,'email' => 'cclay@gmail.com'       ,'password' => '$2y$10$RhAdFKNg8pTfjTipVJGc7Ob2mzWUJn9BvegyYY6F.2YzT5xZSplTq'  ,'join_date' => date('Y-m-d')],
        ['username' => 'cayers'     ,'email' => 'clayton@gmail.com'     ,'password' => '$2y$10$mGht.gq1MEgIvIFwpisu0.zXlGxtqVqVxG22C6TqIblyyhjvSwtFe'  ,'join_date' => date('Y-m-d')],
        ['username' => 'auzi'       ,'email' => 'auzi@gmail.com'        ,'password' => '$2y$10$RhAdFKNg8pTfjTipVJGc7Ob2mzWUJn9BvegyYY6F.2YzT5xZSplTq'  ,'join_date' => date('Y-m-d')],
        ['username' => 'abassett'   ,'email' => 'alanb@gmail.com'       ,'password' => '$2y$10$mGht.gq1MEgIvIFwpisu0.zXlGxtqVqVxG22C6TqIblyyhjvSwtFe'  ,'join_date' => date('Y-m-d')],
        ['username' => 'emayberry'  ,'email' => 'elaine@gmail.com'      ,'password' => '$2y$10$RhAdFKNg8pTfjTipVJGc7Ob2mzWUJn9BvegyYY6F.2YzT5xZSplTq'  ,'join_date' => date('Y-m-d')]
    ];


    $stmt = $dbc->prepare(
        'INSERT INTO users (username, email, password, join_date) 
        VALUES (:username, :email, :password, :join_date)'
    );

    foreach ($users as $user) {
        $stmt->bindValue(':username', $user['username'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $user['password'], PDO::PARAM_STR);
        $stmt->bindValue(':join_date', $user['join_date'], PDO::PARAM_STR);

        $stmt->execute();
        echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
        
    }

// ///////////////////////////////////////////////////////////////////////////////////////////////////////    
    $date = new DateTime(date('Y-m-d'));
    $date->add(new DateInterval('P21D'));

    $posts = [
        ['username' =>   'dgcollier',
        'city' =>        'San Antonio',
        'category' =>    'Twerking',
        'post_date' =>      date('Y-m-d'), 'expire_date' => $date->format('Y-m-d'), 
        'highlights' =>     'works well with n00bs, no judgment, free booze', 
        'description' =>    'I love twerking! If you love twerking, but your twerk could use some werk, I can help you! Shoot me an email and we will set something up!', 
        'img_url' =>        '/img/uploads/twerk.jpg'],
        ['username' =>   'ccnickens',
        'city' =>        'Houston',
        'category' =>    'Swimming',
        'post_date' =>      date('Y-m-d'), 'expire_date' => $date->format('Y-m-d'), 
        'highlights' =>     'Cousin to Michael Phelps, Been swimming for 15 years, Look great in a speedo', 
        'description' =>    'Like it says above, I have been swimming for a long time, it\'s in my blood. I\'ve never taught it before, but how hard can it be?', 
        'img_url' =>        '/img/uploads/gold.png'],
        ['username' =>   'jwomack',
        'city' =>        'Austin',
        'category' =>    'Carpentry',
        'post_date' =>      date('Y-m-d'), 'expire_date' => $date->format('Y-m-d'), 
        'highlights' =>     'Still have all my fingers, Really like wood, Built house by hand, Have awesome beard', 
        'description' =>    'Having all my fingers is really an accomplishment when you\'ve been a carpenter as long as I have. Let\'s build stuff together.', 
        'img_url' =>        '/img/uploads/shop.jpg'],
        ['username' =>   'abasset',
        'city' =>        'Dallas',
        'category' =>    'Welding',
        'post_date' =>      date('Y-m-d'), 'expire_date' => $date->format('Y-m-d'), 
        'highlights' =>     'A&M Maritime grad, engineer, from Texas', 
        'description' =>    'I could practically build a ship blindfolded. I\'ve spent too much time below deck recently and really need to get out.', 
        'img_url' =>        '/img/uploads/tamugma.jpg']
    ]; 
        $stmt = $dbc->prepare(
            'INSERT INTO posts (username, city, category, post_date, expire_date, highlights, description, img_url) 
            VALUES (:username, :city, :category, :post_date, :expire_date, :highlights, :description, :img_url)');
        foreach ($posts as $post) {
            $stmt->bindValue(':username', $post['username'], PDO::PARAM_INT);
            $stmt->bindValue(':city', $post['city'], PDO::PARAM_INT);
            $stmt->bindValue(':category', $post['category'], PDO::PARAM_INT);
            $stmt->bindValue(':post_date', $post['post_date'], PDO::PARAM_STR);
            $stmt->bindValue(':expire_date', $post['expire_date'], PDO::PARAM_STR);
            $stmt->bindValue(':highlights', $post['highlights'], PDO::PARAM_STR);
            $stmt->bindValue(':description', $post['description'], PDO::PARAM_STR);
            $stmt->bindValue(':img_url', $post['img_url'], PDO::PARAM_STR);
            $stmt->execute();
            echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
        
    }