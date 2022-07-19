<?php
class Site {
    public $id_site;
    public $name_site;
    public $id_area;
    public $address;

    function __construct($id_site, $name, $id_area, $address) {
        $this->id_site = $id_site;
        $this->name_site = $name;
        $this->id_area = $id_area;
        $this->address = $address;
    }
}
?>