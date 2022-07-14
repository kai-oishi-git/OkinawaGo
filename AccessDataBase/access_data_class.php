<?php
/*
データベースと直接やり取りするクラス
検索時はこのクラスのメソッドを使って情報を取得する
*/

class AccessForDataBase {
    public $mysql = new mysqli('localhost', "OkinawaGo", "OkinawaGo", "OkinawaGo");

}
?>