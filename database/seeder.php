<?php
    require_once 'toolshed_config.php'; //configs for db
    require_once 'db_connect.php'; //db connection
    echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . PHP_EOL;
    $truncate = 'TRUNCATE users';
    $dbc->exec($truncate);
    $truncate = 'TRUNCATE cities';
    $dbc->exec($truncate);
    $truncate = 'TRUNCATE categories';
    $dbc->exec($truncate);
    $truncate = 'TRUNCATE posts';
    $dbc->exec($truncate);
// ///////////////////////////////////////////////////////////////////////////////////////////////////////
    $cities = [
        ['city' => 'Austin'],
        ['city' => 'Dallas'],
        ['city' => 'Houston'],
        ['city' => 'San Antonio']
    ];
    $stmt = $dbc->prepare('INSERT INTO cities (city) VALUES (:city)');
    foreach ($cities as $city) {
        $stmt->bindValue(':city', $city['city'], PDO::PARAM_STR);
        $stmt->execute();
        echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
        
    }
// ///////////////////////////////////////////////////////////////////////////////////////////////////////
    $users = [
        ['username' => 'dgcollier'   ,'email' => 'dgcollier89@gmail.com'     ,'city_id' => '4'  ,'join_date' => date('Y-m-d'), 'password' => '$2y$10$eM6/DpcgrcysxlW52q6OMO8o74I1wjAIdWIXHEAhw4OoqdE2IIEtm'],
        ['username' => 'cwtobias'    ,'email' => 'cwtobias@gmail.com'        ,'city_id' => '4'  ,'join_date' => date('Y-m-d'), 'password' => '$2y$10$eM6/DpcgrcysxlW52q6OMO8o74I1wjAIdWIXHEAhw4OoqdE2IIEtm'],
        ['username' => 'jwomack'     ,'email' => 'jwomack@gmail.com'         ,'city_id' => '1'  ,'join_date' => date('Y-m-d'), 'password' => '$2y$10$eM6/DpcgrcysxlW52q6OMO8o74I1wjAIdWIXHEAhw4OoqdE2IIEtm'],
        ['username' => 'icecastman'  ,'email' => 'icecastman@gmail.com'      ,'city_id' => '4'  ,'join_date' => date('Y-m-d'), 'password' => '$2y$10$eM6/DpcgrcysxlW52q6OMO8o74I1wjAIdWIXHEAhw4OoqdE2IIEtm'],
        ['username' => 'ccnickens'   ,'email' => 'cclay@gmail.com'           ,'city_id' => '3'  ,'join_date' => date('Y-m-d'), 'password' => '$2y$10$eM6/DpcgrcysxlW52q6OMO8o74I1wjAIdWIXHEAhw4OoqdE2IIEtm'],
        ['username' => 'cayers'      ,'email' => 'clayton@gmail.com'         ,'city_id' => '3'  ,'join_date' => date('Y-m-d'), 'password' => '$2y$10$eM6/DpcgrcysxlW52q6OMO8o74I1wjAIdWIXHEAhw4OoqdE2IIEtm'],
        ['username' => 'auzi'        ,'email' => 'auzi@gmail.com'            ,'city_id' => '1'  ,'join_date' => date('Y-m-d'), 'password' => '$2y$10$eM6/DpcgrcysxlW52q6OMO8o74I1wjAIdWIXHEAhw4OoqdE2IIEtm'],
        ['username' => 'abassett'    ,'email' => 'alanb@gmail.com'           ,'city_id' => '2'  ,'join_date' => date('Y-m-d'), 'password' => '$2y$10$eM6/DpcgrcysxlW52q6OMO8o74I1wjAIdWIXHEAhw4OoqdE2IIEtm'],
        ['username' => 'emayberry'   ,'email' => 'elaine@gmail.com'          ,'city_id' => '2'  ,'join_date' => date('Y-m-d'), 'password' => '$2y$10$eM6/DpcgrcysxlW52q6OMO8o74I1wjAIdWIXHEAhw4OoqdE2IIEtm']
    ];
    $stmt = $dbc->prepare('INSERT INTO users (username, email, city_id, join_date,password) VALUES (:username, :email, :city_id, :join_date,:password)');
    foreach ($users as $user) {
        $stmt->bindValue(':username', $user['username'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
        $stmt->bindValue(':city_id', $user['city_id'], PDO::PARAM_INT);
        $stmt->bindValue(':join_date', $user['join_date'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $user['password'], PDO::PARAM_STR);
        $stmt->execute();
        echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
        
    }
// ///////////////////////////////////////////////////////////////////////////////////////////////////////
    // $passwords = [
    //     ['user_id' => 1],
    //     ['user_id' => 2],
    //     ['user_id' => 3],
    //     ['user_id' => 4],
    //     ['user_id' => 5],
    //     ['user_id' => 6],
    //     ['user_id' => 7],
    //     ['user_id' => 8],
    //     ['user_id' => 9]
    // ];
    // $stmt = $dbc->prepare('INSERT INTO passwords (user_id, password) VALUES (:user_id, :password)');
    // foreach ($passwords as $password) {
    //     $stmt->bindValue(':user_id', $password['user_id'], PDO::PARAM_INT);
    //     $stmt->bindValue(':password', $password['password'], PDO::PARAM_STR);
    //     $stmt->execute();
    //     echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
        
    // }
// ///////////////////////////////////////////////////////////////////////////////////////////////////////
    $categories = [
        ['category' => 'Carpentry'],
        ['category' => 'Welding'],
        ['category' => 'Ruby on Rails'],
        ['category' => 'Pastry Making'],
        ['category' => 'Swimming'],
        ['category' => 'Twerking']
    ];
    $stmt = $dbc->prepare('INSERT INTO categories (category) VALUES (:category)');
    foreach ($categories as $category) {
        $stmt->bindValue(':category', $category['category'], PDO::PARAM_STR);
        $stmt->execute();
        echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
        
    }
// ///////////////////////////////////////////////////////////////////////////////////////////////////////    
    $date = new DateTime(date('Y-m-d'));
    $date->add(new DateInterval('P21D'));
    $posts = [
        ['user_id' =>       1,
        'city_id' =>        4,
        'category_id' =>    6,
        'post_date' =>      date('Y-m-d'), 'expire_date' => $date->format('Y-m-d'), 
        'highlights' =>     'works well with n00bs, no judgment, free booze', 
        'description' =>    'I love twerking! If you love twerking, but your twerk could use some werk, I can help you! Shoot me an email and we will set something up!', 
        'img_url' =>        '/img/uploads/twerk.jpg'],
        ['user_id' =>       5,
        'city_id' =>        3,
        'category_id' =>    5,
        'post_date' =>      date('Y-m-d'), 'expire_date' => $date->format('Y-m-d'), 
        'highlights' =>     'Cousin to Michael Phelps, Been swimming for 15 years, Look great in a speedo', 
        'description' =>    'Like it says above, I have been swimming for a long time, it\'s in my blood. I\'ve never taught it before, but how hard can it be?', 
        'img_url' =>        '/img/uploads/gold.png'],
        ['user_id' =>       3,
        'city_id' =>        1,
        'category_id' =>    1,
        'post_date' =>      date('Y-m-d'), 'expire_date' => $date->format('Y-m-d'), 
        'highlights' =>     'Still have all my fingers, Really like wood, Built house by hand, Have awesome beard', 
        'description' =>    'Having all my fingers is really an accomplishment when you\'ve been a carpenter as long as I have. Let\'s build stuff together.', 
        'img_url' =>        '/img/uploads/shop.jpg'],
        ['user_id' =>       8,
        'city_id' =>        2,
        'category_id' =>    2,
        'post_date' =>      date('Y-m-d'), 'expire_date' => $date->format('Y-m-d'), 
        'highlights' =>     'A&M Maritime grad, engineer, from Texas', 
        'description' =>    'I could practically build a ship blindfolded. I\'ve spent too much time below deck recently and really need to get out.', 
        'img_url' =>        '/img/uploads/tamugma.jpg']
    ]; 
        $stmt = $dbc->prepare('INSERT INTO posts (user_id, city_id, category_id, post_date, expire_date, highlights, description, img_url) 
                               VALUES (:user_id, :city_id, :category_id, :post_date, :expire_date, :highlights, :description, :img_url)');
        foreach ($posts as $post) {
            $stmt->bindValue(':user_id', $post['user_id'], PDO::PARAM_INT);
            $stmt->bindValue(':city_id', $post['city_id'], PDO::PARAM_INT);
            $stmt->bindValue(':category_id', $post['category_id'], PDO::PARAM_INT);
            $stmt->bindValue(':post_date', $post['post_date'], PDO::PARAM_STR);
            $stmt->bindValue(':expire_date', $post['expire_date'], PDO::PARAM_STR);
            $stmt->bindValue(':highlights', $post['highlights'], PDO::PARAM_STR);
            $stmt->bindValue(':description', $post['description'], PDO::PARAM_STR);
            $stmt->bindValue(':img_url', $post['img_url'], PDO::PARAM_STR);
            $stmt->execute();
            echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
        
    }