
<?php 
session_start();
require_once "../../OkinawaGo/AccessDataBase/access_data.php";
require_once "../../OkinawaGo/Entity/CombinedSite.php";
require_once "../../OkinawaGo/Entity/Comment.php";
require_once "../../OkinawaGo/Entity/Category.php";
require_once "../../OkinawaGo/Entity/Image.php";
require_once "../../OkinawaGo/Entity/Site.php";
require_once "../../OkinawaGo/Entity/Area.php";
require_once "../../OkinawaGo/Entity/CombinedSite.php";

//<!-- トップ画面からフリーワード検索 -->
$text = trim($_GET["toptext"]); 
if(isset($text)){
//フリーワード検索
    echo $text;
    
    $infolist= AccessData::selectByFreeword($text);
    if(empty($infolist)){
        $_SESSION['err'] = "入力された条件で情報が見つかりませんでした"; //エラー文を記載
        header('Location: http://localhost/OkinawaGo/WebFront/index.php');
        exit();
    }
    $_SESSION['freeword'] = $infolist; //セッションで渡す場合
    $_SESSION['test'] = array("沖縄","島人");
header('Location: http://localhost/OkinawaGo/WebFront/searchSite.php');
exit();
}
 

?>