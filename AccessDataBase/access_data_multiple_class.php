<?php
/*
データベースと直接やり取りするクラス
検索時はこのクラスのメソッドを使って情報を取得する
*/
$mysql = new mysqli('localhost', "OkinawaGo", "OkinawaGo", "OkinawaGo");

class AccessForDataBase_toGetMultipleData {

    //サイトIDからコメントを検索
    static public function selectCommentBySiteID($id_site){
        $mysqli = new mysqli('localhost', "OkinawaGo", "OkinawaGo", "OkinawaGo");

        if (mysqli_connect_error()){
            die("データベースの接続に失敗しました");
            return;
        }
        // 検索用のSQL分
        $query = "SELECT * FROM comment WHERE id_site = ?";

        // preparedStatement生成
        $stmt = $mysqli->prepare($query);
        
        // SQL文中の ? の部分に$nameを格納 
        $stmt->bind_param('d',$id_site);

        $stmt->execute();
        
        $stmt->bind_result($user_id, $id_site);
        while ($stmt->fetch()) {
            echo "ID_USER=$user_id, ID_SITE=$id_site<br>"; 
        }

        $stmt->close();
        $mysqli->close();
    }

　　//サイトIDから写真を検索
    static public function selectImageBySiteID($id_site){
        $mysqli = new mysqli('localhost', "OkinawaGo", "OkinawaGo", "OkinawaGo");

        if (mysqli_connect_error()){
            die("データベースの接続に失敗しました");
            return;
        }
        // 検索用のSQL分
        $query = "SELECT * FROM img WHERE id_site = ?";

        // preparedStatement生成
        $stmt = $mysqli->prepare($query);
        
        // SQL文中の ? の部分に$nameを格納 
        $stmt->bind_param('d',$id_site);

        $stmt->execute();
        
        $stmt->bind_result($user_id, $id_site);
        while ($stmt->fetch()) {
            echo "ID_USER=$user_id, ID_SITE=$id_site<br>"; 
        }

        $stmt->close();
        $mysqli->close();
    }

    //サイトIDからカテゴリーを検索
    static public function selectCategoryBySiteID($id_site){
        $mysqli = new mysqli('localhost', "OkinawaGo", "OkinawaGo", "OkinawaGo");

        if (mysqli_connect_error()){
            die("データベースの接続に失敗しました");
            return;
        }
        // 検索用のSQL分
        $query = "SELECT * FROM category WHERE id_site = ?";

        // preparedStatement生成
        $stmt = $mysqli->prepare($query);
        
        // SQL文中の ? の部分に$nameを格納 
        $stmt->bind_param('d',$id_site);

        $stmt->execute();
        
        $stmt->bind_result($user_id, $id_site);
        while ($stmt->fetch()) {
            echo "ID_USER=$user_id, ID_SITE=$id_site<br>"; 
        }

        $stmt->close();
        $mysqli->close();
    }
}
?>