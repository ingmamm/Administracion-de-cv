<?php
class departamentos_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function getDepartamentos()
    {
        $query=$this->db
        ->select("*")
        ->from("departamentos")
        ->order_by("pk","desc")
        ->get();
        return $query->result();
    }

    public function getDepartamento($id)
    {
        $query=$this->db
        ->select("*")
        ->from("departamentos")
        ->order_by("pk",$id)
        ->get();
        return $query->result();
    }
}