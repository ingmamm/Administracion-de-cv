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
                    'grado' => $data['grado'],
                    'descripcion' => $data['descripcion'],
                    'titulo' => $data['titulo']
                ));
    }
}