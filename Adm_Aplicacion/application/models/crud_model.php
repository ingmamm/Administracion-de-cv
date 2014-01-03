<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
Class Crud_model extends CI_MODEL
{
    public function __construct()
    {
 
        parent::__construct();
 
    }
 
    //obtenemos los usuarios
    public function get_users()
    {
 
        $query = $this->db->get('docentes');
        if($query->num_rows() > 0)
        {
 
            return $query->result();
 
        }
 
    }
 
    //eliminamos usuarios
    public function delete_user($id)
    {
 
       // $this->db->where('pk',$id);
       // return $this->db->delete('docentes');
         $fecha = date('Y-m-d');
 
        $data = array(
 
            
            'eliminado'    =>        $eliminado


 
        );
 
        $this->db->where('pk',$id);
        $this->db->update('docentes',$data);
 
    }
 
    //editamos usuarios
    public function edit_user($id,$nombre,$email)
    {
 
        $fecha = date('Y-m-d');
 
        $data = array(
 
            'nombres'    =>        $nombres,
            'napellidos'    =>        $apellidos,
            'rut'        =>        $rut,
            'fecha_nacimeinto'    =>        $fecha_nacimeinto,
            'genero'    =>        $genero,
            'direccion'    =>        $direccion,
            'comuna_fk'    =>        $comuna_fk,
            'telefono'    =>        $telefono,
            'celular'    =>        $celular,
            'email'    =>        $email,
            'departamento_fk'    =>        $departamento_fk,
            'jerarquia'    =>        $jerarquia,
            'grado'    =>        $grado,
            'funcion'    =>        $funcion


 
        );
 
        $this->db->where('pk',$id);
        $this->db->update('docentes',$data);
 
    }
 
    //añadimos usuarios
    public function new_user($nombre,$email)
    {
 
        $fecha = date('Y-m-d');
 
        $data = array(
 
            'nombres'    =>        $nombres,
            'napellidos'    =>        $apellidos,
            'rut'        =>        $rut,
            'fecha_nacimeinto'    =>        $fecha_nacimeinto,
            'genero'    =>        $genero,
            'direccion'    =>        $direccion,
            'comuna_fk'    =>        $comuna_fk,
            'telefono'    =>        $telefono,
            'celular'    =>        $celular,
            'email'    =>        $email,
            'departamento_fk'    =>        $departamento_fk,
            'jerarquia'    =>        $jerarquia,
            'grado'    =>        $grado,
            'funcion'    =>        $funcion
 
        );
 
        $this->db->insert('docentes',$data);
 
    }
 
}
/*
*Location: application/models/crud_model.php
*/