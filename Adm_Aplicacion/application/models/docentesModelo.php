
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DocentesModelo extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------

      /** 
       * function SaveForm()
       *
       * insert form data
       * @param $form_data - array
       * @return Bool - TRUE or FALSE
       */

	public function Crear($form_data)
	{
		$this->db->insert('docentes', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}

	public function getDocentes()
	{
		$query=$this->db
        ->select("*")
        ->from("docentes")
        ->order_by("pk","desc")
        ->get();
        return $query->result();
	}

	public function getDocente($id)
	{
		$query=$this->db
        ->select("*")
        ->from("docentes")
        ->where('pk',$id)
        ->get();
        return $query->result();
	}

	public function Update($data)
	{
		$this->db->where('pk',$data['id']);
        $this->db->update(
                'docentes',
                array(
	            'nombres'    			=> $data['nombres'],
	            'apellidos'    			=> $data['apellidos'],
	            'rut'					=> $data['rut'],
	            'fecha_nacimiento' 		=> $data['fecha_nacimiento'],
	            'genero'				=> $data['genero'],
	            'direccion'    			=> $data['direccion'],
	            'comuna_fk'				=> $data['comuna_fk'],
	            'telefono'				=> $data['telefono'],
	            'celular'				=> $data['celular'],
	            'email'					=> $data['email'],
	            'departamento_fk'		=> $data['departamento_fk'],
	            'jerarquia'				=> $data['jerarquia'],
	            'contrato'				=> $data['contrato'],
	            'jornada'				=> $data['jornada'],
	            'grado'					=> $data['grado'],		
	            'funcion'				=> $data['funcion'],
	            'eliminado'				=> $data['eliminado']
                ));
	}

	public function Delete($id)
    {
        $this->db->where('pk',$id);
        return $this->db->delete('docentes');
    }

}
?>