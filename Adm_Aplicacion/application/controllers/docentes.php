<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docentes extends CI_Controller {
   
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
      	$this->load->database('default');
		$this->load->helper('url');
		$this->load->model('DocentesModelo');
		$this->load->model('departamentos_model');
		$this->load->model('comunas_model');
    }

    public function index()
    {
    	$datos = $this->DocentesModelo->getDocentes();
    	$this->load->view('Docente/index',compact("datos"));
    }

    public function option()
    {
    	$opcion = $this->input->post('boton');
    	$id = $this->uri->segment(3);
    	if ($opcion == "Agregar") {
    		redirect('Docentes/formulario');
    	}
    	else{
    		if ($opcion == "Editar"){
    			redirect('Docentes/form_Editar/'.$id);
    		}
    		else{
    			if ($opcion == "Eliminar") {
    				redirect('Docentes/Eliminar/'.$id);
    			}
    		}
    	}
    }

    public function formulario()
    {
    	$comunas = $this->comunas_model->getComunas();
    	$departamentos = $this->departamentos_model->getDepartamentos();
    	$this->load->view('Docente/head');
    	$this->load->view('Docente/formulario',compact("comunas","departamentos"));
    }

    public function nuevo()
    {
    	$this->form_validation->set_rules('nombres', 'nombres', 'required|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('apellidos', 'apellidos', 'required|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('rut', 'rut', 'required|xss_clean|is_numeric|max_length[8]');	
		$this->form_validation->set_rules('email', 'email', 'required|max_length[255]');
		$this->form_validation->set_rules('direccion', 'direccion', 'required|max_length[255]');
		$this->form_validation->set_rules('jerarquia', 'jerarquia', 'required|max_length[255]');
		$this->form_validation->set_rules('contrato', 'contrato', 'required|max_length[255]');
		$this->form_validation->set_rules('jornada', 'jornada', 'required|max_length[255]');
		$this->form_validation->set_rules('funcion', 'funcion', 'required|max_length[255]');
		
		if($this->form_validation->run() === true)
        {
        	$dia = $this->input->post('dia');
        	$mes = $this->input->post('mes');
        	$anio = $this->input->post('anio');
        	$fecha = $dia."/".$mes."/".$anio;
        	
        	$datos = array(
	            'nombres'    			=> $this->input->post('nombres'),
	            'apellidos'    			=> $this->input->post('apellidos'),
	            'rut'					=> $this->input->post('rut'),
	            'fecha_nacimiento' 		=> $fecha,
	            'genero'				=> $this->input->post('genero'),
	            'direccion'    			=> $this->input->post('direccion'),
	            'comuna_fk'				=> $this->input->post('comuna'),
	            'telefono'				=> $this->input->post('telefono'),
	            'celular'				=> $this->input->post('celular'),
	            'email'					=> $this->input->post('email'),
	            'departamento_fk'		=> $this->input->post('dpto'),
	            'jerarquia'				=> $this->input->post('jerarquia'),
	            'contrato'				=> $this->input->post('contrato'),
	            'jornada'				=> $this->input->post('jornada'),
	            'grado'					=> $this->input->post('grado'),		
	            'funcion'				=> $this->input->post('funcion'),
	            'eliminado'				=> $this->input->post('eliminado')
            );

			$this->DocentesModelo->Crear($datos);

			redirect('Docentes/index');
        }
        else
        {
            $comunas = $this->comunas_model->getComunas();
	    	$departamentos = $this->departamentos_model->getDepartamentos();
	    	$this->load->view('Docente/head');
	    	$this->load->view('Docente/formulario',compact("comunas","departamentos"));
        }
    }

    public function form_Editar()
    {
    	$id = $this->uri->segment(3);
    	$datos = $this->DocentesModelo->getDocente($id);
    	$comunas = $this->comunas_model->getComunas();
    	$departamentos = $this->departamentos_model->getDepartamentos();
    	foreach ($datos as $dato){
            $comuna_fk = $this->comunas_model->getComuna($dato->comuna_fk);
            $departamento_fk = $this->departamentos_model->getDepartamento($dato->departamento_fk);
        }
    	$this->load->view('Docente/head');
    	$this->load->view('Docente/form_Editar',compact("datos","comunas","departamentos","comuna_fk","departamento_fk"));
    }

    public function Update()
    {
    	$id = $this->uri->segment(3);
    	$this->form_validation->set_rules('nombres', 'nombres', 'required|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('apellidos', 'apellidos', 'required|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('rut', 'rut', 'required|xss_clean|is_numeric|max_length[8]');	
		$this->form_validation->set_rules('email', 'email', 'required|max_length[255]');
		$this->form_validation->set_rules('direccion', 'direccion', 'required|max_length[255]');
		$this->form_validation->set_rules('jerarquia', 'jerarquia', 'required|max_length[255]');
		$this->form_validation->set_rules('contrato', 'contrato', 'required|max_length[255]');
		$this->form_validation->set_rules('jornada', 'jornada', 'required|max_length[255]');
		$this->form_validation->set_rules('funcion', 'funcion', 'required|max_length[255]');
		
		if($this->form_validation->run() === true)
        {
        	$dia = $this->input->post('dia');
        	$mes = $this->input->post('mes');
        	$anio = $this->input->post('anio');
        	$fecha = $dia."/".$mes."/".$anio;
        	
        	$datos = array(
        		'id'					=> $id,
	            'nombres'    			=> $this->input->post('nombres'),
	            'apellidos'    			=> $this->input->post('apellidos'),
	            'rut'					=> $this->input->post('rut'),
	            'fecha_nacimiento' 		=> $fecha,
	            'genero'				=> $this->input->post('genero'),
	            'direccion'    			=> $this->input->post('direccion'),
	            'comuna_fk'				=> $this->input->post('comuna'),
	            'telefono'				=> $this->input->post('telefono'),
	            'celular'				=> $this->input->post('celular'),
	            'email'					=> $this->input->post('email'),
	            'departamento_fk'		=> $this->input->post('dpto'),
	            'jerarquia'				=> $this->input->post('jerarquia'),
	            'contrato'				=> $this->input->post('contrato'),
	            'jornada'				=> $this->input->post('jornada'),
	            'grado'					=> $this->input->post('grado'),		
	            'funcion'				=> $this->input->post('funcion'),
	            'eliminado'				=> $this->input->post('eliminado')
            );

			$query = $this->DocentesModelo->Update($datos);

			redirect('Docentes/index');
        }
        else
        {
            $datos = $this->DocentesModelo->getDocente($id);
	    	$comunas = $this->comunas_model->getComunas();
	    	$departamentos = $this->departamentos_model->getDepartamentos();
	    	foreach ($datos as $dato){
	            $comuna_fk = $this->comunas_model->getComuna($dato->comuna_fk);
	            $departamento_fk = $this->departamentos_model->getDepartamento($dato->departamento_fk);
	        }
	        $id = $this->uri->segment(3);
	    	$this->load->view('Docente/head');
	    	$this->load->view('Docente/form_Editar',compact("datos","comunas","departamentos","comuna_fk","departamento_fk"));
        }
    }

    public function Confirmar()
    {

    	$id = $this->uri->segment(3);
    	$opcion = $this->input->post('boton');
    	if ($opcion == "Aceptar") {
    		$query = $this->DocentesModelo->Delete($id);
    		redirect('Docentes/index');
    	}
    	else{
    		redirect('Docentes/index');
    	}
    }

    public function Eliminar()
    {
    	$id = $this->uri->segment(3);
    	$datos = $this->DocentesModelo->getDocente($id);
    	$this->load->view('Docente/Eliminar',compact("datos"));
    }
} 
