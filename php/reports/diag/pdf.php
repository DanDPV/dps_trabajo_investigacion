<?php
  function PastelTop($pdf, $data, $nombres, $top){
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY($pdf->GetX()+10,70);
    $valX = $pdf->GetX();
    $valY = $pdf->GetY();

    $limit=count($data) >= $top ? $top : count($data);

    for ($i=0; $i<$limit; $i++) {
      $pdf->SetXY($valX,$valY+$i*5);
      $pdf->Cell(30, 5, ($i+1).'. '.$nombres[$i].': ');
      $pdf->Cell(30, 5, $data[$nombres[$i]], 0, 0, 'R');
      $pdf->Ln();
    }

    $pdf->Ln(8);

    $pdf->SetXY(90, $valY-10);

    $colores=array();
    for($i=0; $i<$limit; $i++){
      $colores[]=array(rand(0,255), rand(0,255), rand(0,255));
    }
    $base=100;
    $hb=35;
    $size=$limit>3 ? $base+100 : $base;
    $h=$limit>3 ? $hb-5 : $hb;
    $pdf->PieChart($size, $h, $data, '%l (%p)', $colores);
    $pdf->SetXY($valX, $valY + 40);
  }

  function barrasTop($pdf, $data, $valX, $valY){
    $pdf->SetFont('Arial', 'I', 11);
    $pdf->SetX($valX-10);
    $pdf->Cell(0, 5, 'b) Grafico de barras', 0, 1);
    $pdf->Ln(8);
    $valX = $pdf->GetX();
    $valY = $pdf->GetY();
    $pdf->BarDiagram(190, 70, $data, '%l : %v (%p)', array(255,175,100));
    $pdf->SetXY($valX, $valY + 80);
  }

  function PastelTop5($pdf, $data, $nombres){
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY($pdf->GetX()+10,70);
    $valX = $pdf->GetX();
    $valY = $pdf->GetY();
    $pdf->Cell(30, 5, '1. '.$nombres[0].': ');
    $pdf->Cell(30, 5, $data[$nombres[0]], 0, 0, 'R');
    $pdf->Ln();
    $pdf->SetXY(20,75);
    $pdf->Cell(30, 5, '2. '.$nombres[1].': ');
    $pdf->Cell(30, 5, $data[$nombres[1]], 0, 0, 'R');
    $pdf->Ln();
    $pdf->SetXY(20,80);
    $pdf->Cell(30, 5, '3. '.$nombres[2].': ');
    $pdf->Cell(30, 5, $data[$nombres[2]], 0, 0, 'R');
    $pdf->Ln();
    $pdf->SetXY(20,85);
    $pdf->Cell(30, 5, '4. '.$nombres[3].': ');
    $pdf->Cell(30, 5, $data[$nombres[3]], 0, 0, 'R');
    $pdf->Ln();
    $pdf->SetXY(20,90);
    $pdf->Cell(30, 5, '5. '.$nombres[4].': ');
    $pdf->Cell(30, 5, $data[$nombres[4]], 0, 0, 'R');
    $pdf->Ln();
    $pdf->Ln(8);

    $pdf->SetXY(80, $valY);
    $col1=array(100,100,255);
    $col2=array(255,100,100);
    $col3=array(255,255,100);
    $col4=array(120,80,100);
    $col5=array(26,204,219);
    $pdf->PieChart(200, 30, $data, '%l (%p)', array($col1,$col2,$col3,$col4,$col5));
    $pdf->SetXY($valX, $valY + 40);
  }

 ?>
