<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class grado extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //cargamos el helper form y url a la vez
        $this->load->helper(array('form', 'url'));
    }
     
    public function index()
    {
        
    }
}