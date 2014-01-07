<?php

class usuarios_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }
   public function logueo($rut)
   {
   	     $query=$this->db
        ->select("pk,rut,permiso")
        ->from("usuarios")
        ->where(array("rut"=>$rut))
        ->count_all_results();
         return $query;
   }
    public function permiso($rut)
   {
    
         $query=$this->db
        ->select("permiso")
        ->from("usuarios")
        ->where(array("rut"=>$rut))
        ->get();
         return $query->result();
   }

}