<?php

class Search {
    static public function searchByName($inputSiteName) {
        //AccessForDataBase->selectByNameで $inputSiteNameを引数として検索し、
        //結果をsiteインスタンス配列とareaインスタンス配列を取得

        // CombinedSiteのインスタンス配列を作る

        //siteインスタンス配列の要素文ループするfor文を書く
        // for文内 : siteインスタンスのid_siteでimage,comment,categoryを検索し、インスタンス配列を受け取る
        // for文内 : site,area,image,comment,cartegoryでCombinedSiteインスタンスを作り、配列に格納


        // return CombinedSiteのインスタンス配列
    }
}
?>