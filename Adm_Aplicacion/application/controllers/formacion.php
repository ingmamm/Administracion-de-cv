<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class formacion extends CI_Controller {
   
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
      	$this->load->database('default');
		$this->load->helper('url');
        $this->load->model('formacion_model');
		$this->load->model('docentesModelo');
		$this->load->model('departamentos_model');
		$this->load->model('comunas_model');
        $this->load->model('grado_model');
        $this->load->model('institucion_model');
        $this->load->model('tipoInstitucion_model');
        $this->load->model('paises_model');
    }

    public function index()
    {
        $id = $this->uri->segment(3);
        $docentes = $this->docentesModelo->getDocente($id);
    	$datos = $this->formacion_model->getFormaciones($id);
        foreach ($datos as $dato) {
            $grados = $dato->grado_fk;
        }
    	$this->load->view('Formacion/index',compact("datos","docentes"));
    }

    public function option()
    {
        $opcion = $this->input->post('boton');
        $id = $this->uri->segment(3);
        $id_docente= $this->uri->segment(4);
        if ($opcion == "Agregar") {
            redirect('Formacion/formulario/'.$id_docente);
        }
        else{
            if ($opcion == "Editar"){
                redirect('Formacion/form_Editar/'.$id);
            }
            else{
                if ($opcion == "Eliminar") {
                    redirect('Formacion/Eliminar/'.$id);
                }
            }
        }
    }

    public function formulario()
    {
        $id_docente = $this->uri->segment(3);
        $docentes = $this->docentesModelo->getDocente($id_docente);
        $tipos = $this->tipoInstitucion_model->getNombreTipo();
        $paises = $this->paises_model->getPaises();
        $this->load->view('Formacion/head');
        $this->load->view('Formacion/formulario',compact("tipos","paises","docentes"));
    }

    public function nuevo()
    {
        $id_docente = $this->uri->segment(3);

        $this->form_validation->set_rules('nombre', 'nombre', 'required|xss_clean|max_length[255]');
        $this->form_validation->set_rules('grado', 'grado', 'required|xss_clean|max_length[255]'); 

        if ($this->form_validation->run() === true) 
        {
            $dia = $this->input->post('diaI');
            $mes = $this->input->post('mesI');
            $anio = $this->input->post('anioI');
            $fechaI = $dia."/".$mes."/".$anio;

            $dia = $this->input->post('diaT');
            $mes = $this->input->post('mesT');
            $anio = $this->input->post('anioT');
            $fechaT = $dia."/".$mes."/".$anio;

            $institucion = array(
                'Id_tipo' => $this->input->post('Tipo'),
                'nombre'  => $this->input->post('nombre'),
                'Id_pais' => $this->input->post('Pais')
            );

            $grado = array(
                'grado' => $this->input->post('grado'),
                'descripcion' =>$this->input->post('descripcion')
            );

            $this->institucion_model->Crear($institucion);
            $this->grado_model->Crear($grado);

            $id_institucion = $this->institucion_model->getId($institucion);
            foreach ($id_institucion as $id_int) {
            $id_inst = $id_int->pk;
            } 
            $id_grado = $this->grado_model->getId($grado);
            foreach ($id_grado as $id_gra) {
            $id_grado_acad = $id_gra->pk;
            }



            $formacion = array(
                'institucion_fk'    => $id_inst, 
                'grado_fk'          => $id_grado_acad,
                'titulo'            => $this->input->post('titulo'),
                'inicio'            => $fechaI,
                'termino'           => $fechaT,
                'docente_fk'        => $id_docente
            );

            $this->formacion_model->Crear($formacion);

            redirect('formacion/index/'.$id_docente);
        }
        else
        {   
            $docentes = $this->docentesModelo->getDocente($id_docente);
            $tipos = $this->tipoInstitucion_model->getNombreTipo();
            $paises = $this->paises_model->getPaises();
            $this->load->view('Formacion/head');
            $this->load->view('Formacion/formulario',compact("tipos","paises","docentes"));
        }   
    }
    
    public function form_Editar()
    {
        $id_Formacion = $this->uri->segment(3);

        $formaciones = $this->formacion_model->getFormacion($id_Formacion);
        foreach ($formaciones as $formacion) {
            $id_institucion = $formacion->institucion_fk;
            $id_grado = $formacion->grado_fk;
            $docentes = $this->docentesModelo->getDocente($formacion->docente_fk);
        }
        $instituciones = $this->institucion_model->getInstitucion($id_institucion);
        $grados = $this->grado_model->getGrado($id_grado);
        foreach ($instituciones as $institucion) {
        $tipo_int = $this->tipoInstitucion_model->getTipo($institucion->tipo_fk);
        }
        $paises = $this->paises_model->getPaises();
        $Tipos = $this->tipoInstitucion_model->getNombreTipo();

        $this->load->view('Formacion/form_Editar',compact("formaciones","instituciones","grados","paises","Tipos","docentes","tipo_int"));
    }

    public function Update()
    {
        $id_Formacion = $this->uri->segment(3);
        $id_institucion = $this->uri->segment(4);
        $id_grado = $this->uri->segment(5);
        $id_docente = $this->uri->segment(6);

        $this->form_validation->set_rules('nombre', 'nombre', 'required|xss_clean|max_length[255]');
        $this->form_validation->set_rules('grado', 'grado', 'required|xss_clean|max_length[255]'); 

        if ($this->form_validation->run() === true) 
        {
            $dia = $this->input->post('diaI');
            $mes = $this->input->post('mesI');
            $anio = $this->input->post('anioI');
            $fechaI = $dia."/".$mes."/".$anio;

            $dia = $this->input->post('diaT');
            $mes = $this->input->post('mesT');
            $anio = $this->input->post('anioT');
            $fechaT = $dia."/".$mes."/".$anio;

            $institucion = array(
                'id'      => $id_institucion,
                'Id_tipo' => $this->input->post('Tipo'),
                'nombre'  => $this->input->post('nombre'),
                'Id_pais' => $this->input->post('Pais')
            );

            $grado = array(
                'id'   => $id_grado,
                'grado' => $this->input->post('grado'),
                'descripcion' =>$this->input->post('descripcion')
            );

            $query = $this->institucion_model->Update($institucion);
            $query = $this->grado_model->Update($grado);

            $formacion = array(
                'id'                => $id_Formacion,
                'institucion_fk'    => $id_institucion, 
                'grado_fk'          => $id_grado,
                'titulo'            => $this->input->post('titulo'),
                'inicio'            => $fechaI,
                'termino'           => $fechaT,
                'docente_fk'        => $id_docente
            );

            $query = $this->formacion_model->Update($formacion);

            redirect('formacion/index/'.$id_docente);
        }
        else
        {   
            $formaciones = $this->formacion_model->getFormacion($id_Formacion);
            foreach ($formaciones as $formacion) {
                $id_institucion = $formacion->institucion_fk;
                $id_grado = $formacion->grado_fk;
                $docentes = $this->docentesModelo->getDocente($formacion->docente_fk);
            }
            $instituciones = $this->institucion_model->getInstitucion($id_institucion);
            $grados = $this->grado_model->getGrado($id_grado);
            foreach ($instituciones as $institucion) {
            $tipo_int = $this->tipoInstitucion_model->getTipo($institucion->tipo_fk);
            }
            $paises = $this->paises_model->getPaises();
            $Tipos = $this->tipoInstitucion_model->getNombreTipo();

            $this->load->view('Formacion/form_Editar',compact("formaciones","instituciones","grados","paises","Tipos","docentes","tipo_int"));
        }
    }

    public function Eliminar()
    {
        $id = $this->uri->segment(3);
        $datos = $this->formacion_model->getFormacion($id);

        $this->load->view('Formacion/Eliminar',compact("datos"));
    }

    public function Confirmar()
    {
        $id = $this->uri->segment(3);
        $formaciones = $this->formacion_model->getFormacion($id);

        foreach ($formaciones as $formacion) {
            $id_grado = $formacion->grado_fk;
            $id_institucion = $formacion->institucion_fk;
            $id_docente = $formacion->docente_fk;
        }

        $query = $this->formacion_model->Delete($id);
        $query = $this->grado_model->Delete($id_grado);
        $query = $this->institucion_model->Delete($id_institucion);

        redirect('formacion/index/'.$id_docente);
    }
}