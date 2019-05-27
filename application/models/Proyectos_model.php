<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos_model extends CI_Model {
    

    function __construct()
    {
        parent::__construct();
    }

    public function get_proyectos()
    {

        $this->db->from('proyectos');
        $this->db->where('proyectos.activo',1);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return FALSE;
        }
    }
    public function get_proyectos_by_id($id_proyecto)
    {
        
        $this->db->from('proyectos');
        $this->db->where('id_proyecto',$id_proyecto);
        
        
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

    public function update_proyecto($data,$id_proyecto)
    {
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->update('proyectos',$data);
    }

    public function insert_proyecto($data)
    {
        $this->db->insert('proyectos',$data);
    }

    public function delete_proyecto($id_proyecto,$data)
    {
        $this->db->where('id_proyecto', $id_proyecto);
        $this->db->update('proyectos',$data);
    }
 }