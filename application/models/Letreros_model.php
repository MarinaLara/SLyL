<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Letreros_model extends CI_Model {
    

    function __construct()
    {
        parent::__construct();
    }

    public function get_letreros($proyecto)
    {
        $this->db->select('id_letrero, proyectos.nombre_proyecto, nombre_letrero, fecha_ini, fecha_fi, descripcion, proyectos. creador_proyecto,letreros.id_proyecto');
        $this->db->from('letreros');
        $this->db->where('letreros.id_proyecto',$proyecto);
        $this->db->join('proyectos','letreros.id_proyecto=proyectos.id_proyecto', 'inner');
        $this->db->where('letreros.activo', 1);
        
        $query=$this->db->get();

        if($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return FALSE;
        }
    }
     public function get_letreros_by_id($id_letrero)
    {
        
        $this->db->select('*');
        $this->db->from('letreros');
        $this->db->where('id_letrero',$id_letrero);
        
        
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }

    public function update_letreros($data,$id_letrero)
    {
        $this->db->where('id_letrero', $id_letrero);
        $this->db->update('letreros',$data);
    }

    public function insert_letreros($data)
    {
        $this->db->insert('letreros',$data);
    }

    public function delete_letreros($id_letrero,$data)
    {
        $this->db->where('id_letrero', $id_letrero);
        $this->db->update('letreros',$data);
    }
}