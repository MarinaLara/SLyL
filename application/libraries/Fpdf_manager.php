<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
//include_once APPPATH.'/third_party/fpdf/fpdf.php';
require(APPPATH.'/third_party/fpdf/fpdf.php');


class fpdf_manager extends FPDF
{
	
}
/*class f_pdf {
 
    //public $param;
    //public $pdf;
 
    public function __construct($param = "'P','mm','A4'")
    {
        $this->param =$param;
        //$this->pdf = new FPDF($this->param);
        $this->pdf = new FPDF();
    }
}
?>*/