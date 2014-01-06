<?php
class comunas_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function getComunas()
    {
        $query=$this->db
        ->select("pk,comuna")
        ->from("comunas")
        ->order_by("pk","desc")
        ->get();
        return $query->result();
    }

    public function getComuna($id)
    {
        $query=$this->db
        ->select("*")
        ->from("comunas")
        ->order_by("pk",$id)
        ->get();
        return $query->result();
    }
}