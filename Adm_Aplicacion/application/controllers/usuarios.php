<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    private $session_id;
    public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('template1');
        $this->session_id = $this->session->userdata('usuarios/login');
    }
    
    public function index()
    {
        if(!empty($this->session_id))
        {
             $this->layout->view('index');           
        }else
        {
            redirect(base_url().'usuarios/login',  301);
        }
        
    }
    public function saludo()
    {
        if(!empty($this->session_id))
        {
             $mama=$this->session_id;
             $this->layout->view('saludo',compact("mama"));           
        }else
        {
            redirect(base_url().'usuarios/login',  301);
        }
        
    }
    public function login()
    {
        if ( $this->input->post() )
        {

            $pass=$this->input->post("pass");
            $rut=$this->input->post("login");
            $pass = strtoupper($pass);
            $pass=(hash('sha256',$pass));
            $respuesta=$this->ws_dirdoc->autenticar($rut,$pass);
            
            if($respuesta)  
            {
                $variable="logiado";
                        die($variable);
                         
                //$pass ="16623877";
                //$login="9ff6998d255669510c70989ec9e0dd5b70d9acc44d6e7aaef4974abcab4d6663";

                //die(sha1($this->input->post("pass",true)));
                $datos=$this->usuarios_model->logueo( $this->input->post("login",true),$this->input->post("pass"));
                //echo $datos;exit;
                   if($datos==1)
                   {    
                        $variable="logiado";
                        die($variable);
                        $this->session->set_userdata("taller_ci");
                        $this->session->set_userdata('login', $this->input->post('login',true));
                        //$this->session->set_userdata('saludo','hola te saludo desde la sessión');
                        //$session_id = $this->session->userdata('login');
                        //echo $this->session->userdata('saludo');
                        redirect(base_url().'usuarios',  301);
                   }else
                   {
                    $this->session->set_flashdata('ControllerMessage', 'Usuario y/o clave inválida.');
                                       redirect(base_url().'usuarios/login',  301);
                   }
            }
        }
        $this->layout->view("login");
    }
    public function logout()
        {
            $this->session->unset_userdata(array('login' => ''));
            $this->session->sess_destroy("taller_ci");
            redirect(base_url().'usuarios/login',  301);
        }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */