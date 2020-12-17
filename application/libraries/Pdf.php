<?php 
date_default_timezone_set('ASIA/Jakarta');
if(!defined('BASEPATH')) exit('No direct script access allowed');
require('fpdf.php');
class Pdf extends FPDF{
    function __construct($orientation='P', $unit='cm', $size='A4'){
        parent::__construct($orientation,$unit,$size);
    }

	function Footer() {
    $this->setY(-2);
    $this->SetFont('Times', 'I', 8);
    $this->Cell(9.5, 0.5, 'Dicetak tanggal : ' . date('d/m/Y H:i'), 0, 'LR', 'L');
    $this->Cell(9.5, 0.5, 'Page ' . $this->PageNo().'/{nb}', 0, 0, 'R');
	}
}
?>