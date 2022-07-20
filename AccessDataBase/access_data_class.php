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
        
        $stmt->bind_result($id_area, $name_area);
        $area = array();

        while ($stmt->fetch()) {
            $Area = new Area($id_area,$id_area);
            array_push($area,$Area);
        }

        }

        $stmt->close();
        $mysqli->close();

        return $area;
    }
}
?>