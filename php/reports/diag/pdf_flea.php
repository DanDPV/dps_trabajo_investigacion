<?php
  require('diag.php');
  /**
   *
   */
  class pdf_flea extends PDF_Diag {
    function Header() {
        // Logo
        $this->Image('../../img/logo.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(50,35,'Reporte de ventas',0,0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    function Footer() {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        $this->SetFont('Arial','I',9);
        $this->Cell(-194,20,'FleaMarket Team',0,0,'C');
    }
  }

 ?>
