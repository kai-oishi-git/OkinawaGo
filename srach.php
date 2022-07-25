<?php

class a {
    public static function searchFreeword($inputword){
        
    }
}


$category = array(); // これはcategoryのインスタンスの配列
//todo: category->id_siteが重複しない状態にしたい

for ($i=0; $i < count($category); $i++) {
    $id_site = $category[$i]->id_site;

    // 重複するidがあるか判定
    $existSameId = false;

    for ($j=$i+1; $j < count($category); $j++){
        $id_site_compare = $category[$j]->id_site;

        if ($id_site == $id_site_compare) {
            $existSameId = true;
        }
    }

    if ($existSameId){
        // 配列から除く処理
    }
}

?>