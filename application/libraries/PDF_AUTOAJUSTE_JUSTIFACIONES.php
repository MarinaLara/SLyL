<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require(APPPATH.'/third_party/fpdf/fpdf.php');
 
    //Extendemos la clase PDF_AUTOAJUSTE de la clase fpdf para que herede todas sus variables y funciones
    class PDF_AUTOAJUSTE_JUSTIFACIONES extends FPDF {
        public function __construct() {
            parent::__construct();
        }

        var $trim,$clave,$nombre_dependencia,$base_url;
        public function setTrimestre($num,$clave,$nombre_dependencia,$base_url){
            $this->trim = $num;
            $this->clave = $clave;
            $this->nombre_dependencia = $nombre_dependencia;
            $this->base_url = $base_url;
        }

        public function Header(){
            /*Encabezado*/
            
            $this->SetFont('Arial','B',10);
            $this->SetFillColor(200,200,200);
            $this->Cell(110);
            $this->Cell(0,6,'H. AYUNTAMIENTO DE HERMOSILLO',0,1,'L');
            $this->SetFont('Arial','B',10);
            $this->Cell(102);
            $this->Cell(100,6,utf8_decode('ANÁLISIS  PROGRAMÁTICO PRESUPUESTAL'),0,1,'L');
            $this->SetFont('Arial','B',10);
            $this->Cell(90);
            $this->Cell(100,4,'JUSTIFICACIONES',0,1,'C');
            $this->Cell(20);
            $this->Cell(115,4,'',0,0,'L');
            $this->Cell(120,4,date('Y').' ---',0,0,'L');
            $this->ln(10);
            /*PRIMERA FILA*/

            $this->SetFont('Arial','B',8);
            $this->Cell(30,6,'CLAVE','T',0,'C','1');
            $this->Cell(15,6,'META','T',0,'C','1');
            $this->Cell(15,6,utf8_decode('SUBMETA'),'T',0,'C','1');
            $this->Cell(15,6,utf8_decode('POND.'),'T',0,'R','1');
            $this->Cell(25,6,utf8_decode('UNID. MED'),'T',0,'C','1');
            $this->Cell(35,6,utf8_decode('DESCRIPCIÓN'),'T',0,'C','1');
            $this->Cell(145,6,utf8_decode('JUSTIFICACIÓN'),'TR',0,'C','1');
            $this->ln();
            $this->Cell(135,6,'','T',0,'C','0');
            $this->Cell(145,6,'','T',0,'C','0');
            $this->ln(10);
            // MARGEN SUPERIOR
            $this->Line($this->GetX(),$this->GetY(),290,$this->GetY());
            // MARGENES LATERALES
            $this->Line(10,36,10,190);
            $this->Line(290,36,290,190);
            // DIVISION EN CADA COLUMNA
            $this->Line(142,36,142,190);
        } 

        var $widths; var $aligns;
        public function SetWidths($w){
            //Set the array of column widths
            $this->widths=$w;
        }

        public function SetAligns($a){
            //Set the array of column alignments
            $this->aligns=$a;
        }

        public function Row($data,$borde,$tipo = null,$fondo = 0){
            //Calculate the height of the row
            $nb=0;
            for($i=0;$i<count($data);$i++)
                $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
            $h=5*$nb;
            //Issue a page break first if needed
            $this->CheckPageBreak($h);
            //Draw the cells of the row
            for($i=0;$i<count($data);$i++) {
                $w=$this->widths[$i];
                $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
                //Save the current position
                //CAMBIAR EL TAMAÑO DE LA CELDA PARA CADA CAMPO
                //$w=$this->widths[$i];

                $x=$this->GetX();
                $y=$this->GetY();
                //Draw the border
                if ($borde == true) {
                    //$this->Rect($x,$y,$w,$h);
                    $this->MultiCell($w,5,$data[$i],$tipo[$i],$a,$fondo);
                }else{
                    //Print the text
                    $this->MultiCell($w,5,$data[$i],0,$a,$fondo);
                }
                
                //Put the position to the right of the cell
                $this->SetXY($x+$w,$y);
            }
            //Go to the next line
            $this->Ln($h);
        }

        public function CheckPageBreak($h){
            //If the height h would cause an overflow, add a new page immediately
            if($this->GetY()+$h>$this->PageBreakTrigger)
                $this->AddPage($this->CurOrientation);
        }

        public function NbLines($w,$txt){
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
            while($i<$nb){
                $c=$s[$i];
                if($c=="\n"){
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
                if($l>$wmax){
                    if($sep==-1){
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

        public function Footer(){
            $trimestre =  $this->trim;
            $this->SetY(10);
            $this->Image($this->base_url.'images/inicio/escudo_hillo.gif',10,8,20);
            $this->Line($this->GetX(),190,290,190);
            $this->SetFont('Arial','I',8);
            $this->SetY(200);
            //$this->Cell(20);
            $this->Cell(260,0, utf8_decode('SISTEMA PBR, MODULO DE SEGUIMIENTO Y EVALUACIÓN DE METAS / COORDINACIÓN DE PLANEACIÓN, PROGRAMACIÓN Y PRESUPUESTO'),0,0,'L');
            $this->Cell(20,0, utf8_decode('PÁGINA ').$this->PageNo(),0,0,'C');

            $this->SetFont('Arial','B',10);
            $this->SetY(25);
            $this->Cell(20);
            switch ($trimestre) {
                case '1':
                    $titulo = 'Trimestre I Del Primero de Enero al 31 de Marzo';
                break;
                case '2':
                    $titulo = 'Trimestre II Del Primero de Abril al 30 de Junio';
                break;
                case '3':
                    $titulo = 'Trimestre III Del Primero de Julio al 30 de Septiembre';
                break;
                case '4':
                    $titulo = 'Trimestre IV Del Primero de Octubre al 31 de Diciembre';
                break;
                case '5':
                    $titulo = 'Anual Del Primero de Enero al 31 de Diciembre';
                break;
            }
            $this->Cell(115,4,$titulo,0,0,'L');
            $this->SetFont('Arial','B',9);
            $this->SetY(45);
            $this->Cell(5,4,$this->clave,0,0,'L');
            $this->MultiCell(130,4,$this->nombre_dependencia,0,'L',0);
            $this->Ln();
        } 

    }
?>