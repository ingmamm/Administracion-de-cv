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
   
    public function getPais($id)
    {
        $query=$this->db
        ->select("pk,cod_num,nombre,alfa_dos,alfa_tres")
        ->from("paises")
        ->where('pk',$id)
        ->get();
        return $query->result();
    }
    
    public function Delete($id)
    {
        $this->db->where('pk',$id);
        return $this->db->delete('paises');
    }
    
    public function Crear ($data)
    {
        $this->db->insert(
                'paises',
                array(
                    'cod_num' => $data['codigo'],
                    'alfa_tres' => $data['alfa3'],
                    'alfa_dos' => $data['alfa2'],
                    'nombre' => $data['nombre']
                ));
    }
    
    public function Update($data) {
        $this->db->where('pk',$data['id']);
        $this->db->update(
                'paises',
                array(
                    'cod_num' => $data['codigo'],
                    'alfa_tres' => $data['alfa3'],
                    'alfa_dos' => $data['alfa2'],
                    'nombre' => $data['nombre']
                ));
    }
}