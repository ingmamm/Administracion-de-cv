<?php
class regiones_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    public function getRegiones()
    {
        $query=$this->db
        ->select("pk,region,numero")
        ->from("regiones")
        ->order_by("pk","desc")
        ->get();
        return $query->result();
    }
    public function getregion($pk) {
        $where = array ("pk" => $pk);
        $query = $this->db
        ->select("*")
        ->from ("regiones")
        ->where($where)
        ->get();
        return $query->row();
    }

    public function create_region($datos = array()) {
        $this->db->insert( 'regiones', $datos );
        return true;
    }

    public function update_region($datos = array(), $pk) {
        $this->db->where ( 'pk', $pk );
        $this->db->update ( 'regiones', $datos );
        return true;
    }

    public function delete_region($pk) {
        $this->db
        ->delete( "regiones", array( "pk" => $pk));
        return true;
    }
   
}