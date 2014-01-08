<?php
class formacion_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    public function Crear($data)
    {
        $this->db->insert(
                'formacion',
                array(
                    'institucion_fk'            => $data['institucion_fk'],
                    'grado_fk'                  => $data['grado_fk'],
                    'titulo'                    => $data['titulo'],
                    'inicio'                    => $data['inicio'],
                    'termino'                   => $data['termino'],
                    'docente_fk'                => $data['docente_fk']
                ));
    }

    public function getFormaciones($id)
    {
        $query=$this->db
        ->select("*")
        ->from("formacion")
        ->order_by("pk","desc")
        ->where('docente_fk',$id)
        ->get();
        return $query->result();
    }

    public function getFormacion($id)
    {
        $query=$this->db
        ->select("*")
        ->from("formacion")
        ->where('pk',$id)
        ->get();
        return $query->result();
    }

    public function Update($data)
    {
        $this->db->where('pk',$data['id']);
        $query = $this->db->update(
                'formacion',
                array(
                    'institucion_fk'            => $data['institucion_fk'],
                    'grado_fk'                  => $data['grado_fk'],
                    'titulo'                    => $data['titulo'],
                    'inicio'                    => $data['inicio'],
                    'termino'                   => $data['termino'],
                    'docente_fk'                => $data['docente_fk']
                ));
        return $query;
    }

    public function Delete($id)
    {
        $this->db->where('pk',$id);
        return $this->db->delete('formacion');
    }
}