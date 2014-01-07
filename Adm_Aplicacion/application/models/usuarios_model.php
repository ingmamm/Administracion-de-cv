<?php

class usuarios_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }
   public function logueo($login,$pass)
   {

   	if($this->ws_dirdoc->autenticar($rut, $password)){
         $query=$this->db
        ->select("pk,rut,pass")
        ->from("usuarios")
        ->where(array("rut"=>$login,"pass"=>$pass))
        ->count_all_results();
        //echo $this->db->last_query();
        return $query;
    }

   }
}