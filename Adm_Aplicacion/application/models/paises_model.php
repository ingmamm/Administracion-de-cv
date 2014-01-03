<?php
class paises_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    public function getPaises()
    {
        $query=$this->db
        ->select("pk,cod_num,nombre,alfa_dos,alfa_tres")
        ->from("paises")
        ->order_by("pk","desc")
        ->get();
        return $query->result();
    }
   
}