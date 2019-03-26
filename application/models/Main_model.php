<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function auntenticar($usuario,$password)
    {
        $this->db->select('usuarios.id_usuario, usuarios.usuario_email, usuarios.nombre, usuarios.apellido_p, usuarios.apellido_m, usuarios.id_nivel, usuarios.contrasena');
        $this->db->from('usuarios');
        //$this->db->join('empresas','empresas.id_empresa = usuarios.id_empresa','left');
        $this->db->where('usuarios.activo',1);
        $this->db->where('usuarios.usuario_email',$usuario);
        $this->db->where('usuarios.contrasena',$password);
        $query = $this->db->get();
        // echo $this->db->last_query();
        // exit();
        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }        
    }

}
?>