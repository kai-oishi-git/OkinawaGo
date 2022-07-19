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
        // 検索用のSQL分
        $query = "SELECT * FROM site INNER JOIN area ON site.id_area = area.id_area INNER JOIN comment ON site.id_site = comment.id_site INNER JOIN img ON site.id_site = img.id_site INNER JOIN category ON site.id_site = category.id_site WHERE name_area like = ?";

        // preparedStatement生成
        $stmt = $mysqli->prepare($query);
        
        // SQL文中の ? の部分に$nameを格納 
        $stmt->bind_param('s',"%".$name."%");

        $stmt->execute();
        
        $stmt->bind_result($user_id, $name);
        while ($stmt->fetch()) {
            echo "ID=$user_id, NAME=$name<br>"; 
        }

        $stmt->close();
        $mysqli->close();
    }
}
?>