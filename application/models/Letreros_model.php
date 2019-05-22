<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Letreros_model extends CI_Model {
    

    function __construct()
    {
        parent::__construct();
    }

    public function get_letreros()
    {

        $this->db->from('letreros');
        $this->db->where('activo',1);

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
}