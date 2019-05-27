<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos_model extends CI_Model {
    

    function __construct()
    {
        parent::__construct();
    }

    public function get_archivos($letrero)
    {
        $this->db->select('id_archivo, nombre_archivo, archivos.id_letrero');   
        //$this->db->select('*');
        $this->db->from('archivos');
        $this->db->join('letreros','archivos.id_letrero=letreros.id_letrero', 'inner');
        $this->db->where('archivos.id_letrero', $letrero);
        $this->db->where('archivos.activo',1);
        
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
        $this->db->select('*');
        $this->db->from('archivos');
        $this->db->where('id_archivo');

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
