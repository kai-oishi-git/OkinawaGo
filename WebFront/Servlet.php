
<?php
//フリーワード検索入力後とマップ検索語の検索結果画面からの遷移
 require_once "../AccessDataBase/access_data.php";
// //require_once "../AccessDataBase/access_data_multiple_class.php";

// //id_siteとnameの情報を取得
// $id_site = array();
// $name = array();
// $id_site = $_GET['id_site'];
// $name = $_GET['name'];
// echo 'good1';


// //id_siteとnameから詳細情報を取得
// $site = array();
// $area = array();
// //array($site, $area) = AccessForDataBase->selectByName($name);
// $comment = AccessForDataBase_toGetMultipleData::selectCommentBySiteID($id_site);
// $image = AccessForDataBase_toGetMultipleData::selectImageBySiteID($id_site);
// $category = AccessForDataBase_toGetMultipleData::selectCategoryBySiteID($id_site);
// //$combined = new CombinedSite($site, $area, $comment, $image, $category);
// echo 'good2';


// //詳細情報をSET
// //this->set('combined', $combined);
// $_SESSION('site', $site);
// $_SESSION('area', $area);
// $_SESSION('comment', $comment);
// $_SESSION('image', $image);
// $_SESSION('site', $catgeory);
// echo 'good3';

$selectedSpot = $_POST["spotmap"];
$combined = AccessData::selectByAreaName($selectedSpot);
print_r($combined);
header( "Location: ./searchSite.php?sites={$combined}") ;
exit();
?>