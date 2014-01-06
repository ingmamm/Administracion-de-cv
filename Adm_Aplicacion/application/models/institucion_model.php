<?php
class institucion_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function Crear ($data)
    {
        $this->db->insert(
                'instituciones',
                array(
                    'nombre' => $data['nombre'],
                    'pais_fk' => $data['Id_pais'],
                    'tipo_fk' => $data['Id_tipo']
                ));
    }

    public function getInstitucion ($id)
    {
    	$query=$this->db
        ->select("*")
        ->from("instituciones")
        ->where('pk',$id)
        ->get();
        return $query->result();
    }

    public function Update($data)
    {
    	$this->db->where('pk',$data['pk']);
    	$this->db->update(
                'instituciones',
                array(
                    'nombre' => $data['nombre'],
                    'pais_fk' => $data['Id_pais'],
                    'tipo_fk' => $data['Id_tipo']
                ));	
    }
}