<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Proyectos_model extends CI_Model {
    

    function __construct()
    {
        parent::__construct();
    }

    public function get_proyectos()
    {

        $this->db->select('*');
        $this->db->from('proyectos');

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

    public function update_proyecto($data,$nombre_proyecto)
    {
        $this->db->where('nombre_proyecto', $nombre_proyecto);
        $this->db->update('proyectos',$data);
    }

    public function insert_proyecto($data)
    {
        $this->db->insert('proyectos',$data);
    }

    public function delete_proyecto($nombre_proyecto,$data)
    {
        $this->db->where('nombre_proyecto', $nombre_proyecto);
        $this->db->update('proyectos',$data);
    }
 }