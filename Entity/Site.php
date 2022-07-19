<?php
class Site {
    public $name_site;
    public $address;
    public $name_area;
    public $comment;
    public $img_site;
    public $name_category;

    function __construct($name, $address, $name_area, $comment, $img_site, $name_category) {
        $this->name_site = $name;
        $this->address = $address;
        $this->name_area = $name_area;
        $this->comment = $comment;
        $this->img_site = $img_site;
        $this->name_category = $name_category;
    }
}
?>