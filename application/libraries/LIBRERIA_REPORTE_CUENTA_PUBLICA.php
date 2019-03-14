<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require(APPPATH.'/third_party/fpdf/fpdf.php');
    //Extendemos la clase PDF_AUTOAJUSTE de la clase fpdf para que herede todas sus variables y funciones
    class LIBRERIA_REPORTE_CUENTA_PUBLICA extends FPDF {
        public function __construct() {
            parent::__construct();
        }   


        var $widths;
        var $aligns;
       
        var $base_url;
        var $tipo_reporte;
        var $descripcion_reporte;

        public function SetParametros($tipo_reporte,$base_url,$descripcion_reporte)
        {
            $this->base_url = $base_url;
            $this->tipo_reporte = $tipo_reporte;
            $this->descripcion_reporte = $descripcion_reporte;
        }

        function SetWidths($w)
        {
            //Set the array of column widths
            $this->widths=$w;
        }

        function SetAligns($a)
        {
            //Set the array of column alignments
            $this->aligns=$a;
        }

        function Row($data)
        {
            //Calculate the height of the row
            $nb=0;
            for($i=0;$i<count($data);$i++)
                $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
            $h=5*$nb;
            //Issue a page break first if needed
            $this->CheckPageBreak($h);
            //Draw the cells of the row
            for($i=0;$i<count($data);$i++)
            {
                $w=$this->widths[$i];
                $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
                //Save the current position
                $x=$this->GetX();
                $y=$this->GetY();
                //Draw the border
                $this->Rect($x,$y,$w,$h);
                //Print the text
                $this->MultiCell($w,5,$data[$i],0,$a);
                //Put the position to the right of the cell
                $this->SetXY($x+$w,$y);
            }
            //Go to the next line
            $this->Ln($h);
        }

        function Row_2($data)
        {
            //Calculate the height of the row
            $nb=0;
            for($i=0;$i<count($data);$i++)
                $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
            $h=5*$nb;
            //Issue a page break first if needed
            $this->CheckPageBreak($h);
            //Draw the cells of the row
            for($i=0;$i<count($data);$i++)
            {
                $w=$this->widths[$i];
                $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
                //Save the current position
                $x=$this->GetX();
                $y=$this->GetY();
                //Draw the border
                $this->Rect($x,$y,$w,$h);
                //Print the text
                $this->MultiCell($w,5,$data[$i],1,$a,true);
                //Put the position to the right of the cell
                $this->SetXY($x+$w,$y);
            }
            //Go to the next line
            $this->Ln($h);
        }

        function CheckPageBreak($h)
        {
            //If the height h would cause an overflow, add a new page immediately
            if($this->GetY()+$h>$this->PageBreakTrigger)
                $this->AddPage($this->CurOrientation);
        }

        function NbLines($w,$txt)
        {
            //Computes the number of lines a MultiCell of width w will take
            $cw=&$this->CurrentFont['cw'];
            if($w==0)
                $w=$this->w-$this->rMargin-$this->x;
            $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
            $s=str_replace("\r",'',$txt);
            $nb=strlen($s);
            if($nb>0 and $s[$nb-1]=="\n")
                $nb--;
            $sep=-1;
            $i=0;
            $j=0;
            $l=0;
            $nl=1;
            while($i<$nb)
            {
                $c=$s[$i];
                if($c=="\n")
                {
                    $i++;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                    continue;
                }
                if($c==' ')
                    $sep=$i;
                $l+=$cw[$c];
                if($l>$wmax)
                {
                    if($sep==-1)
                    {
                        if($i==$j)
                            $i++;
                    }
                    else
                        $i=$sep+1;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                }
                else
                    $i++;
            }
            return $nl;
        }

        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        }  

        function Header()
        {
            $this->Image($this->base_url.'/images/inicio/logo.png',10,8,50);
            $this->SetFont('Arial','B',12);
            //$this->Cell(25);
            $this->Cell(0,6,utf8_decode('TESORERÍA MUNICIPAL'),0,1,'C');
            $this->Cell(0,6,utf8_decode('COORDINACIÓN DE PLANEACION, PROGRAMACIÓN Y PRESUPUESTO'),0,1,'C');
            $this->Cell(0,6,utf8_decode('Presupuesto Calendarizado '.$this->descripcion_reporte),0,1,'C');
            $this->SetFont('Arial','B',10);
            $this->ln();
            $this->ln();
            
            $this->Cell(0,6,utf8_decode('GOBIENRNO MUNICIPAL DE : HERMOSILLO.'),0,1,'L');
            $this->Cell(260,6,utf8_decode('Presupuesto Autorizado Enero - Diciembre del ').date('Y'),0,0,'L');
            $this->ln();
            /*Tabla de datos*/
            
            $this->SetFont('Arial','B',8);
            $this->SetFillColor(218,211,211);
            $this->SetTextColor(0);

            switch ($this->tipo_reporte) 
            {
                
                case 1:
                    $this->encabezado_clave();
                    break;
                
                case 2:
                    $this->encabezado_dependencia();
                    break;
                 
                case 3:
                    $this->encabezado_dependencia_partida();
                    break;               

                case 4:
                    $this->encabezado_partida();
                    break;

                case 5:
                    $this->encabezado_capitulo();
                    break;

                case 6:
                    $this->encabezado_programa();
                    break;

                default:
                    # code...
                    break;
            }
            
           
        }

        public function encabezado_clave()
        {
            $this->SetFont('Arial','B',6);
            $this->Cell(60,4,'CLAVE',1,0,'C',true);
            $this->Cell(24,4,'TOTAL',1,0,'C',true);
            $this->Cell(16,4,'ENERO',1,0,'C',true);
            $this->Cell(16,4,'FEBRERO',1,0,'C',true);
            $this->Cell(16,4,'MARZO',1,0,'C',true);
            $this->Cell(16,4,'ABRIL',1,0,'C',true);
            $this->Cell(16,4,'MAYO',1,0,'C',true);
            $this->Cell(16,4,'JUNIO',1,0,'C',true);
            $this->Cell(16,4,'JULIO',1,0,'C',true);
            $this->Cell(16,4,'AGOSTO',1,0,'C',true);
            $this->Cell(16,4,'SEPTIEMBRE',1,0,'C',true);
            $this->Cell(16,4,'OCTUBRE',1,0,'C',true);
            $this->Cell(16,4,'NOVIEMBRE',1,0,'C',true);
            $this->Cell(16,4,'DICIEMBRE',1,0,'C',true);
            $this->ln();
        }

        public function encabezado_dependencia()
        {
            $this->SetFont('Arial','B',6);
            $this->Cell(5,4,'#',1,0,'C',true);
            $this->Cell(55,4,'DESCRIPCION',1,0,'C',true);
            $this->Cell(24,4,'TOTAL',1,0,'C',true);
            $this->Cell(16,4,'ENERO',1,0,'C',true);
            $this->Cell(16,4,'FEBRERO',1,0,'C',true);
            $this->Cell(16,4,'MARZO',1,0,'C',true);
            $this->Cell(16,4,'ABRIL',1,0,'C',true);
            $this->Cell(16,4,'MAYO',1,0,'C',true);
            $this->Cell(16,4,'JUNIO',1,0,'C',true);
            $this->Cell(16,4,'JULIO',1,0,'C',true);
            $this->Cell(16,4,'AGOSTO',1,0,'C',true);
            $this->Cell(16,4,'SEPTIEMBRE',1,0,'C',true);
            $this->Cell(16,4,'OCTUBRE',1,0,'C',true);
            $this->Cell(16,4,'NOVIEMBRE',1,0,'C',true);
            $this->Cell(16,4,'DICIEMBRE',1,0,'C',true);
            $this->ln();
        }

        public function encabezado_dependencia_partida()
        {
            $this->SetFont('Arial','B',6);
            $this->Cell(6,4,'Dep',1,0,'C',true);
            $this->Cell(8,4,'Partida',1,0,'C',true);
            $this->Cell(46,4,'Descripcion',1,0,'C',true);
            $this->Cell(24,4,'TOTAL',1,0,'C',true);            
            $this->Cell(16,4,'ENERO',1,0,'C',true);
            $this->Cell(16,4,'FEBRERO',1,0,'C',true);
            $this->Cell(16,4,'MARZO',1,0,'C',true);
            $this->Cell(16,4,'ABRIL',1,0,'C',true);
            $this->Cell(16,4,'MAYO',1,0,'C',true);
            $this->Cell(16,4,'JUNIO',1,0,'C',true);
            $this->Cell(16,4,'JULIO',1,0,'C',true);
            $this->Cell(16,4,'AGOSTO',1,0,'C',true);
            $this->Cell(16,4,'SEPTIEMBRE',1,0,'C',true);
            $this->Cell(16,4,'OCTUBRE',1,0,'C',true);
            $this->Cell(16,4,'NOVIEMBRE',1,0,'C',true);
            $this->Cell(16,4,'DICIEMBRE',1,0,'C',true);
            $this->ln();
        }    

        public function encabezado_partida()
        {
            $this->SetFont('Arial','B',6);
            $this->Cell(8,4,'Partida',1,0,'C',true);
            $this->Cell(52,4,'Descripcion',1,0,'C',true);
            $this->Cell(24,4,'TOTAL',1,0,'C',true);            
            $this->Cell(16,4,'ENERO',1,0,'C',true);
            $this->Cell(16,4,'FEBRERO',1,0,'C',true);
            $this->Cell(16,4,'MARZO',1,0,'C',true);
            $this->Cell(16,4,'ABRIL',1,0,'C',true);
            $this->Cell(16,4,'MAYO',1,0,'C',true);
            $this->Cell(16,4,'JUNIO',1,0,'C',true);
            $this->Cell(16,4,'JULIO',1,0,'C',true);
            $this->Cell(16,4,'AGOSTO',1,0,'C',true);
            $this->Cell(16,4,'SEPTIEMBRE',1,0,'C',true);
            $this->Cell(16,4,'OCTUBRE',1,0,'C',true);
            $this->Cell(16,4,'NOVIEMBRE',1,0,'C',true);
            $this->Cell(16,4,'DICIEMBRE',1,0,'C',true);
            $this->ln();
        } 

        public function encabezado_capitulo()
        {
            $this->SetFont('Arial','B',6);
            $this->Cell(10,4,'Capitulo',1,0,'C',true);
            $this->Cell(42,4,'Descripcion',1,0,'C',true);
            $this->Cell(20,4,'TOTAL',1,0,'C',true);            
            $this->Cell(17,4,'ENERO',1,0,'C',true);
            $this->Cell(17,4,'FEBRERO',1,0,'C',true);
            $this->Cell(17,4,'MARZO',1,0,'C',true);
            $this->Cell(17,4,'ABRIL',1,0,'C',true);
            $this->Cell(17,4,'MAYO',1,0,'C',true);
            $this->Cell(17,4,'JUNIO',1,0,'C',true);
            $this->Cell(17,4,'JULIO',1,0,'C',true);
            $this->Cell(17,4,'AGOSTO',1,0,'C',true);
            $this->Cell(17,4,'SEPTIEMBRE',1,0,'C',true);
            $this->Cell(17,4,'OCTUBRE',1,0,'C',true);
            $this->Cell(17,4,'NOVIEMBRE',1,0,'C',true);
            $this->Cell(17,4,'DICIEMBRE',1,0,'C',true);
            $this->ln();
        }

        public function encabezado_programa()
        {
            $this->SetFont('Arial','B',6);
            $this->Cell(10,4,'PROG.',1,0,'C',true);
            $this->Cell(50,4,'DESCRIPCION',1,0,'C',true);
            $this->Cell(24,4,'TOTAL',1,0,'C',true);
            $this->Cell(16,4,'ENERO',1,0,'C',true);
            $this->Cell(16,4,'FEBRERO',1,0,'C',true);
            $this->Cell(16,4,'MARZO',1,0,'C',true);
            $this->Cell(16,4,'ABRIL',1,0,'C',true);
            $this->Cell(16,4,'MAYO',1,0,'C',true);
            $this->Cell(16,4,'JUNIO',1,0,'C',true);
            $this->Cell(16,4,'JULIO',1,0,'C',true);
            $this->Cell(16,4,'AGOSTO',1,0,'C',true);
            $this->Cell(16,4,'SEPTIEMBRE',1,0,'C',true);
            $this->Cell(16,4,'OCTUBRE',1,0,'C',true);
            $this->Cell(16,4,'NOVIEMBRE',1,0,'C',true);
            $this->Cell(16,4,'DICIEMBRE',1,0,'C',true);
            $this->ln();
        }


    }
?>