<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos_model extends CI_Model {
    

    function __construct()
    {
        parent::__construct();
    }

    public function get_archivos()
    {
        
        $this->db->select('*');
        $this->db->from('archivos');
        $this->db->where('activo',1);
        //$this->db->where('');
        
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

    public function insert_archivos($data)
    {
        $this->db->insert('archivos',$data);
    }

    public function get_last_id()
    {
        $this->db->select_max('id_archivo');
        $this->db->from('archivos');

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

    public function update_path($id_archivo,$data)
    {
        $this->db->where('id_archivo',$id_archivo);
        $this->db->update('archivos',$data);
        echo $this->db->last_query();
    }

    public function delete_archivos($id_archivo,$data)
    {
        $this->db->where('id_archivo', $id_archivo);
        $this->db->update('archivos',$data);
    }

    

}
