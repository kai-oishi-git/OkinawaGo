<?php
require_once "OkinawaGo/AccessDataBase/access_data_class.php";
require_once "OkinawaGo/AccessDataBase/access_data_multiple_class.php";

class Search {
    static public function searchByName($inputSiteName) {
        //AccessForDataBase->selectByNameで $inputSiteNameを引数として検索し、
        $sites = array();
        $areas = array();
        list($sites, $areas) = AccessForDataBase::selectByName($inputSiteName);
        //結果をsiteインスタンス配列とareaインスタンス配列を取得
        
        // CombinedSiteのインスタンス配列を作る
        $combinedSites = array();
        //siteインスタンス配列の要素文ループするfor文を書く
        for($i = 0; $i>count($sites); $i++){
        // for文内 : siteインスタンスのid_siteでimage,comment,categoryを検索し、インスタンス配列を受け取る
            $comment = AccessForDataBase_toGetMultipleData::selectCommentBySiteID($sites[$i]->id_site);
            $image = AccessForDataBase_toGetMultipleData::selectImageBySiteID($sites[$i]->id_site);
            $category = AccessForDataBase_toGetMultipleData::selectCategoryBySiteID($sites[$i]->id_site);
        // for文内 : site,area,image,comment,cartegoryでCombinedSiteインスタンスを作り、配列に格納
            $combinedSite = new CombinedSite($sites[$i], $areas[$i], $comment, $image, $category);
            array_push($combinedSites, $combinedSite);
        }
        // return CombinedSiteのインスタンス配列
        return $combinedSites;
    }
}
?>