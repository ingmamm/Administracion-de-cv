<?php
class grado_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function Crear($data)
    {
        $this->db->insert(
                'grados_academicos',
                array(
                    'grado'         => $data['grado'],
                    'descripcion'   => $data['descripcion']
        ));
    }   

    public function getGrados()
    {
        $query=$this->db
        ->select("*")
        ->from("grados_academicos")
        ->order_by("pk","desc")
        ->get();
        return $query->result();
    }

    public function getGrado($id)
    {
        $query=$this->db
        ->select("*")
        ->from("grados_academicos")
        ->where('pk',$id)
        ->get();
        return $query->result();
    }

    public function Update($data)
    {
        $this->db->where('pk',$data['id']);
        $query = $this->db->update(
                'grados_academicos',
                array( 
                    'grado'         => $data['grado'],
                    'descripcion'   => $data['descripcion']
                ));
        return $query;
    }

    public function Delete($id)
    {
        $this->db->where('pk',$id);
        return $this->db->delete('grados_academicos');
    }

    public function getId($data)
    {
        $this->db->where('grado',$data['grado']);
        $this->db->where('descripcion',$data['descripcion']);
        $query=$this->db->select("pk")->from('grados_academicos')->get();
        return $query->result();
    }
}