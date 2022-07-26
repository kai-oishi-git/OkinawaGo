<?php
require_once "access_data.php";

$text = "沖縄";
$comment = AccessData::selectByFreeword($text);
print_r($comment);

?>