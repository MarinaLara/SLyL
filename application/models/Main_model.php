<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function auntenticar($data)
    {
        $this->db->select('usuarios.id_usuario, usuarios.usuario_email, usuarios.nombre, usuarios.apellido_p, usuarios.apellido_m, usuarios.id_nivel, usuarios.contrasena');
        $this->db->from('usuarios');
        $this->db->where('usuarios.activo',1);
        $this->db->where('usuarios.usuario_email',$data['usuario']);
        $this->db->where('usuarios.contrasena',$data['password']);

        $query = $this->db->get();
        //echo $this->db->last_query();
        // exit();
        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }        
    }

    public function update_usuarios_main($data,$id_usuario)
    {
        $this->db->where('id_usuario',$id_usuario);
        $this->db->update('usuarios', $data);
    }

    public function get_password($email)
    {
        $this->db->select('contrasena');
        $this->db->from('usuarios');
        $this->db->where('usuario_email',$email);
        $this->db->where('activo',1);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        } 

    }

}
?>