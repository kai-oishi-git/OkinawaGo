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
        // エリア検索用のSQL分
        $query = "SELECT * FROM site INNER JOIN area ON site.id_area = area.id_area WHERE name_site LIKE ?";

        // preparedStatement生成
        $stmt = $mysqli->prepare($query);
        
        // SQL文中の ? の部分に$nameを格納 
        $stmt->bind_param('s',"%".$name."%");

        $stmt->execute();
        
        $stmt->bind_result($user_id, $name);
       
        $sites = array();
        $areas = array();

        while ($stmt->fetch()) {
            $site = new Site($id_site, $name_site, $id_area, $address);
            $area = new Area($id_area, $name_area);
            array_push($sites, $site);
            array_push($areas, $area);
    
            //echo "ID=$user_id, NAME=$name<br>"; 
        }

        $stmt->close();
        $mysqli->close();

        return array($sites, $areas);
    }
}
?>