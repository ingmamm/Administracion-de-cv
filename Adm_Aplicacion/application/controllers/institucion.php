<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
Class institucion extends CI_CONTROLLER
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
        //cargamos el modelos a utilizar
        $this->load->model('tipoInstitucion_model');
        $this->load->model('paises_model');
        $this->load->model('tipoInstitucion_model');
        $this->load->model('institucion_model');
 
    }

    public function Agregar() { //llama las vistas formulario para ingresar institucion
        $datos = $this->paises_model->getNombrePais();
        $tipos = $this->tipoInstitucion_model->getNombreTipo();
        $this->load->view('institucion/admin/Head');
        $this->load->view('institucion/admin/AgregarInstitucion',compact("datos","tipos"));
        
    }

    public function Crear() //Alamacena la institucion creada
    {
        $nom        = $this->input->post('nombre');
        $nombre     = strtoupper($nom);
        $pais       = $this->input->post('Pais');
        $tipo       = $this->input->post('Tipo');

        $data = array(
            'nombre'    => $nombre,
            'Id_tipo'   => $tipo,
            'Id_pais'   => $pais
        );
        $this->institucion_model->Crear($data);
    }

    public function Editar()
    {
        $data['id'] = $this->uri->segment(3);
        $datos = $this->institucion_model->getInstitucion($data['id']);
        foreach ($datos as $dato){
            $tipo_inst = $this->tipoInstitucion_model->getTipo($dato->tipo_fk);
            $pais_inst = $this->paises_model->getPais($dato->pais_fk);
        }
        $paises = $this->paises_model->getNombrePais();
        $tipos = $this->tipoInstitucion_model->getNombreTipo();
        $this->load->view('institucion/admin/Head');
        $this->load->view('institucion/admin/EditarInstitucion',compact("datos","paises","tipos","tipo_inst","pais_inst"));
    }

    public function Update()
    {
        $data['id'] = $this->uri->segment(3);
        $nom        = $this->input->post('nombre');
        $nombre     = strtoupper($nom);
        $pais       = $this->input->post('Pais');
        $tipo       = $this->input->post('Tipo');

        $data = array(
            'pk'        => $data['id'],
            'nombre'    => $nombre,
            'Id_tipo'   => $tipo,
            'Id_pais'   => $pais
        );
        $this->institucion_model->Update($data);
        redirect('paises');
    }

}