<?php
class tipoInstitucion_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    
    public function getId ($tipo)
    {
    	$query=$this->db
        ->select("pk")
        ->from("tipos_instituciones")
        ->where('tipo',$tipo)
        ->get();
        return $query->result();
    }

    public function getNombreTipo ()
    {
    	$query=$this->db
        ->select("pk,tipo")
        ->from("tipos_instituciones")
        ->get();
        return $query->result();
    }

    public function getTipo ($id)
    {
        $query=$this->db
        ->select("pk,tipo")
        ->from("tipos_instituciones")
        ->where('pk',$id)
        ->get();
        return $query->result();
    }
}