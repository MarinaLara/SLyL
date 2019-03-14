<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
    

    function __construct()
    {
        parent::__construct();
    }

    public function get_usuarios($cliente)
    {
        $this->db->select('usuarios.id_usuario, usuarios.usuario_email, usuarios.nombre, usuarios.apellido_p, usuarios.apellido_m, usuarios.id_nivel, usuarios.contrasena, nivel_usuario.descripcion as nivel, empresas.razonSocial, empresas.rfc');
        $this->db->from('usuarios');
        $this->db->join('nivel_usuario','usuarios.id_nivel = nivel_usuario.id_nivel_usuario');
        $this->db->join('empresas','usuarios.id_empresa = empresas.id_empresa');
        $this->db->where('usuarios.activo',1);
        if($cliente == true)
        {
            $this->db->where('nivel_usuario.id_nivel_usuario',4);
        }
        else
        {
            $this->db->where('nivel_usuario.id_nivel_usuario <',4);
        }
        $this->db->order_by('id_usuario','asc');


        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    public function insert_usuarios($data)
    {
        $this->db->insert('usuarios',$data);
    }

    public function get_usuarios_by_id($id_usuario)
    {

        $this->db->select('usuarios.id_usuario, usuarios.usuario_email, usuarios.nombre, usuarios.apellido_p, usuarios.apellido_m, usuarios.id_nivel, usuarios.contrasena, nivel_usuario.descripcion as nivel , empresas.id_empresa');
        $this->db->from('usuarios');
        $this->db->join('nivel_usuario','usuarios.id_nivel = nivel_usuario.id_nivel_usuario');
        $this->db->join('empresas','usuarios.id_empresa = empresas.id_empresa');
        $this->db->where('usuarios.activo',1);
        $this->db->where('usuarios.id_usuario',$id_usuario); 
        
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }else
        {
            return FALSE;
        }
    }

    public function update_usuarios($data,$id_usuario)
    {
        $this->db->where('id_usuario',$id_usuario);
        $this->db->update('usuarios',$data);
    }

    public function delete_usuarios($id_usuarios)
    {
        $this->db->set('activo', 0);
        $this->db->where('id_usuario',$id_usuarios);
        $this->db->update('usuarios');
    }


}
