<?php
class Site {
    public $name_site;
    public $address;
    public $name_area;
    public $comment;
    public $img_site;
    public $name_category;

    function __construct($name)
    {
        $this->name_site = $name;
    }
}
?>