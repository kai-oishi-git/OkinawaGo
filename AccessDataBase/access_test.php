<?php
require_once "access_data.php";


//インスタンスメソッドのテスト
// $a = array();
// $b = new AccessForDataBase_toGetMultipleData();
// $a = $b->selectCommentBySiteID(0);
// print_r($a[1]);

// //クラスメソッドのテスト
// $c = array();
// $c = AccessForDataBase_toGetMultipleData::selectCommentBySiteID(0);
// print_r($c[0]);

$comment = AccessData::selectByFreeword("テスト");
var_dump($comment);

?>