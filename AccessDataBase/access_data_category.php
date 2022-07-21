<?php
require_once "../Entity/Site.php";

class AccessForDataBase_toGetMultipleData {

static public function selectSiteBySiteID($id_site){
        $mysqli = new mysqli('localhost', "OkinawaGo", "OkinawaGo", "OkinawaGo");

        if (mysqli_connect_error()){
            die("データベースの接続に失敗しました");
            return;
        }
        // Site検索用のSQL分
        $query = "SELECT * FROM site INNER JOIN area ON site.id_area = area.id_area WHERE id_site = ?";

        // preparedStatement生成
        $stmt = $mysqli->prepare($query);
        
        // SQL文中の ? の部分に$nameを格納 
        $stmt->bind_param('d',$id_site);

        $stmt->execute();
        
        $stmt->bind_result($id_site, $name_site, $id_area, $address, $id_area, $name_area);
       
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
