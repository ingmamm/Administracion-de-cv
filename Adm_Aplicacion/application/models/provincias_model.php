<?php
class Provincias_model extends CI_Model {
    function __construct() {
        parent::__construct ();
    }

    
    public function getProvincias() {
        $query=$this->db
        ->select("provincias.pk, provincias.provincia, regiones.region")
        ->from("provincias")
        ->join('regiones', 'regiones.pk = provincias.region_fk','inner')
        ->group_by(array("provincias.pk","regiones.pk"))
        ->order_by("provincias.pk","asc")
        ->get();
        return $query->result();
    }

    public function getProvincia($pk) {
        $where = array ("pk" => $pk);
        $query = $this->db
        ->select("*")
        ->from ("provincias")
        ->where($where)
        ->get();
        return $query->row();
    }

    public function create_Provincias($datos = array()) {
        $this->db->insert( 'provincias', $datos );
        return true;
    }

    public function update_Provincias($datos = array(), $pk) {
        $this->db->where ( 'pk', $pk );
        $this->db->update ( 'provincias', $datos );
        return true;
    }

    public function delete_Provincias($pk) {
        $this->db
        ->delete( "provincias", array( "pk" => $pk));
        return true;
    }
}