<?php
class Comunas_model extends CI_Model {
    function __construct() {
        parent::__construct ();
    }

    
    public function getComunas() {
        $query=$this->db
        ->select("comunas.pk, comunas.comuna, provincias.provincia")
        ->from("comunas")
        ->join('provincias','comunas.provincia_fk = provincias.pk','inner')
        ->group_by(array("provincias.pk","comunas.pk"))
        ->order_by("comunas.pk","asc")
        ->get();
        return $query->result();
    }

       /* 
        $this->db->select('*');
        $this->db->from('blogs');
        $this->db->join('comments', 'comments.id = blogs.id');
        */

    public function getComuna($pk) {
        $where = array ("pk" => $pk);
        $query = $this->db
        ->select("*")
        ->from ("comunas")
        ->where($where)
        ->get();
        return $query->row();
    }

    public function create_Comuna($datos = array()) {
        $this->db->insert( 'comunas', $datos );
        return true;
    }

    public function update_Comuna($datos = array(), $pk) {
        $this->db->where ( 'pk', $pk );
        $this->db->update ( 'comunas', $datos );
        return true;
    }

    public function delete_Comuna($pk) {
        $this->db
        ->delete( "comuna", array( "pk" => $pk));
        return true;
    }
}