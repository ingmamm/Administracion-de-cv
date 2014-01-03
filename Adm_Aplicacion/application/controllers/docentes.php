<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Docentes extends CI_Controller {
   
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
      	$this->load->database();
		$this->load->helper('url');
		$this->load->model('DocentesModelo');
    }
    public function index(){
        // Cargar vista de formulario
        
        $this->form_validation->set_rules('nombres', 'Nombres', 'required|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'required|xss_clean|max_length[255]');			
		$this->form_validation->set_rules('rut', 'RUT', 'required|xss_clean|is_numeric');			
		$this->form_validation->set_rules('fecha_de_nacimiento', 'Fecha de nacimiento', 'required');			
		$this->form_validation->set_rules('genero', 'Genero', 'required|max_length[1]');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|max_length[7]');
		$this->form_validation->set_rules('celular', 'Celular', 'required|max_length[8]');
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[255]');
		$this->form_validation->set_rules('jerarquia', 'Jerarquia', 'required|max_length[255]');
		$this->form_validation->set_rules('contrato', 'Contrato', 'required|max_length[255]');
		$this->form_validation->set_rules('jorndafa', 'Jorndafa', 'required|max_length[255]');
		$this->form_validation->set_rules('grado', 'Grado', 'required|max_length[255]');
		$this->form_validation->set_rules('funcion', 'funcion', 'required|max_length[255]');
		
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{	
			$titulo="Agregar Docente";
			$this->load->view('formulario',compact("titulo"));
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'nombres' => set_value('nombres'),
					       	'apellidos' => set_value('apellidos'),
					       	'rut' => set_value('rut'),
					       	'fecha_de_nacimiento' => set_value('fecha_de_nacimiento'),
					       	'rut' => set_value('rut'),
					       	'direccion' => set_value('direccion'),
					       	'comuna_fk' => set_value('comuna_fk'),
					       	'email' => set_value('email'),
					       	'departamento_fk' => set_value('departamento_fk'),
					       	'jerarquia' => set_value('jerarquia'),
					       	'contrato' => set_value('contrato'),
					       	'jornada' => set_value('jornada'),
					       	'grado' => set_value('grado'),
					       	'funcion' => set_value('funcion')
						);
					
			// run insert model to write data to db
		
			if ($this->academicos->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('academicos/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
} 

    
