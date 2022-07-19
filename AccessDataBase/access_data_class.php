<?php
/*
データベースと直接やり取りするクラス
検索時はこのクラスのメソッドを使って情報を取得する
*/
$mysql = new mysqli('localhost', "OkinawaGo", "OkinawaGo", "OkinawaGo");

class AccessForDataBase {

    static public function selectByName($name){
        $mysqli = new mysqli('localhost', "OkinawaGo", "OkinawaGo", "OkinawaGo");

        if (mysqli_connect_error()){
            die("データベースの接続に失敗しました");
            return;
        }

        $query = "";

        $stmt = $mysqli->prepare($query);
        $stmt->execute();
    
        $mysqli->close();
    }
}
?>