<?php

    $mysql = new mysqli('localhost', "OkinawaGo", "OkinawaGo", "OkinawaGo");
    
    if (mysqli_connect_error()){
        die("データベースの接続に失敗しました");
        return;
    }
    
    $query = "CREATE TABLE site (
        id_site int PRIMARY KEY,
        id_plase int,
        name varchar(100),
        address varchar(100)
    );";

    $stmt = $mysql->prepare($query);
    $stmt->execute();
    
    $mysql->close();
    print("テーブル作成成功");
?>