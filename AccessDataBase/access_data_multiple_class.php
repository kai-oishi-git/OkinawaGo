<?php
require_once "../Entity/Comment.php";
require_once "../Entity/Category.php";
require_once "../Entity/Image.php";
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
        
        $stmt->bind_result($content_comment, $id_site);
        $comments = array();

        while ($stmt->fetch()) {
            $comment = new Comment($id_site, $content_comment);
            array_push($comments, $comment);
        }

        $stmt->close();
        $mysqli->close();

        return $comments;
    }


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
        $stmt->bind_result($img_file, $id_site);
        $files = array();

        while ($stmt->fetch()) {
            $image = new Image($img_file, $id_site);
            array_push($files, $image);
        }

        $stmt->close();
        $mysqli->close();

        return $files;
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

        $stmt->bind_result($name_category, $id_site);
        $catgories = array();

        while ($stmt->fetch()) {
            $catgeory = new Catgeory($name_categeory, $id_site);
            array_push($categories, $category);
        }

        $stmt->close();
        $mysqli->close();

        return $categories;
    }
}
?>