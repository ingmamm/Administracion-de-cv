<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
Class Paises extends CI_CONTROLLER
{
    public function __construct()
    {
        parent::__construct();
 
        //cargamos la base de datos por defecto
        $this->load->database('default');
        //cargamos el helper url y el helper form
        $this->load->helper(array('url','form'));
        //cargamos la librería form_validation
        $this->load->library(array('form_validation'));
        //cargamos el modelo crud_model
        $this->load->model('paises_model');
 
    }
 
        
    public function index()
    {
        
        $datos=$this->paises_model->getPaises();
        $this->load->view('paises',compact("datos"));
    }
    
    public function Confirmar() {
        $data['segmento'] = $this->uri->segment(3);
        if($data['segmento'] == 'retorno')
        {
            redirect(paises);
        }
        else
        {
            if($data['segmento'] == 'aceptar')
            {
                $data['id'] = $this->uri->segment(4);
                redirect('paises/Eliminar/'.$data['id']);
            }
            else
            {
                $datos = $this->paises_model->getPais($data['segmento']);
                $this->load->view('Confirm_Srp_Pais',compact("datos"));
            }
        }   
    }
    
    public function Eliminar() {
        $data['segmento'] = $this->uri->segment(3);
        $delete = $this->paises_model->Delete($data['segmento']);
        redirect('paises'); 
    }
    
    public function Agregar(){
        $data = array(
            'nombre'    => $this->input->post('nombre'),
            'codigo'    => $this->input->post('codigo'),
            'alfa2'     => $this->input->post('alfa2'),
            'alfa3'     => $this->input->post('alfa3')
        );
        $datos = array(
            'nombre'    => strtoupper($data['nombre']),
            'codigo'    => strtoupper($data['codigo']),
            'alfa2'     => strtoupper($data['alfa2']),
            'alfa3'     => strtoupper($data['alfa3'])
        );
        $this->paises_model->Crear($datos);
        redirect('paises');
    }

    public function Insertar() {
        $this->load->view('AgregarPais');
        
    }
    
    public function Editar() {
        $data['id'] = $this->uri->segment(3);
        $datos = $this->paises_model->getPais($data['id']);
        $this->load->view('EditarPais',compact("datos"),$data['id']);
    }
    
    public function Update() {
        $data = array(
            'id'        => $this->uri->segment(3),
            'nombre'    => $this->input->post('nombre'),
            'codigo'    => $this->input->post('codigo'),
            'alfa2'     => $this->input->post('alfa2'),
            'alfa3'     => $this->input->post('alfa3')
        );
        $data = array(
            'nombre'    => $this->input->post('nombre'),
            'codigo'    => $this->input->post('codigo'),
            'alfa2'     => $this->input->post('alfa2'),
            'alfa3'     => $this->input->post('alfa3')
        );
        $datos = array(
            'id'        => $data['id'],
            'nombre'    => strtoupper($data['nombre']),
            'codigo'    => strtoupper($data['codigo']),
            'alfa2'     => strtoupper($data['alfa2']),
            'alfa3'     => strtoupper($data['alfa3'])
        );
        $this->paises_model->Update($datos);
        redirect('paises');
    }

    /*public function usando_result_array()
    {
        //$this->load->model('personas_model'); acá sería un llamado de tipo local sólo para el método
        $datos=$this->personas_model->getPersonas2();
        $this->load->view('usando_result_array',compact("datos"));
    }
    public function usando_where($id=null)
    {
        //$this->load->model('personas_model'); acá sería un llamado de tipo local sólo para el método
        $datos=$this->personas_model->getPersonasPorId($id);
        $this->load->view('usando_where',compact("datos"));
    }
    */
 
}
 
/*
*Location: application/controllers/crud.php
*/