<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
    

    function __construct()
    {
        parent::__construct();
    }

    public function get_usuarios()
    {
        $this->db->select('id_usuario, usuario_email, nombre, apellido_p, apellido_m, usuarios.id_nivel, departamento, contrasena');
        $this->db->from('usuarios');
        $this->db->join('cat_niveles ctn', 'ctn.id_nivel = usuarios.id_nivel');
        $this->db->where('usuarios.activo',1);
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

    public function get_niveles()
    {
        $query = $this->db->get('cat_niveles');

        if($query->num_rows() > 0)
        {
            return $query;
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

        $this->db->select('usuarios.id_usuario, usuarios.usuario_email, usuarios.nombre, usuarios.apellido_p, usuarios.apellido_m, usuarios.id_nivel, usuarios.contrasena');
        $this->db->from('usuarios');
        $this->db->join('cat_niveles','usuarios.id_nivel = cat_niveles.id_nivel');
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
