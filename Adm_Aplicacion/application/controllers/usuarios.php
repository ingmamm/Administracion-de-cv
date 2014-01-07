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
   
    
    public function login()
    {
        if ( $this->input->post() )
        {

            $pass=$this->input->post("pass");
            $rut=$this->input->post("login");
            $pass = strtoupper($pass);
            $pass=(hash('sha256',$pass));
            $respuesta=$this->ws_dirdoc->autenticar($rut,$pass);
            $permiso=$this->usuarios_model->permiso($this->input->post("login"));
            
            if($respuesta)  
            {
                
                //$pass ="16623877";
                //$login="9ff6998d255669510c70989ec9e0dd5b70d9acc44d6e7aaef4974abcab4d6663";

                //die(sha1($this->input->post("pass",true)));
                $datos=$this->usuarios_model->logueo( $this->input->post("login"));
                //echo $datos;exit;
               
                   if($datos==1 )
                   {    
                       
                        
                        $this->session->set_userdata('login', $this->input->post('login',true));
                        $this->session->set_userdata('permiso',$permiso);
                        redirect(base_url().'docentes');
                        
                  
                    }
             }else
                   {
                    $this->session->set_flashdata('ControllerMessage', 'Usuario y/o clave inválida.');
                                       redirect(base_url().'busquedas',  301);
                   }
        }
        redirect(base_url().'busquedas',  301);
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