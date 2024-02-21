<?php
  require('diag/pdf_flea.php');
  require('../conexion.php');
  require('diag/pdf.php');
  $bdd = new conexion();
  $pdf = new pdf_flea();
  $pdf->AliasNbPages();
  $pdf->AddPage();  

  $conn=$bdd->conectar();
  if(isset($_GET['username'])){
    $query=$conn->query("select sub.Nombres, sum(sub.Monto) 'Compra total' from (select DISTINCT concat(cl.Nombres,' ',cl.Apellidos) 'Nombres' , c.Monto, c.idCliente from compra_fin cf inner join compra c on c.id=cf.idCompra inner join cliente cl on cl.id=c.idCliente inner join detalle_compra dc on dc.id=cf.idDetalle inner join productotalla pt on pt.id=dc.idProd inner join rieles r on r.id=pt.idProd inner join cliente s on s.id=r.idSeller where s.username='".$_GET['username']."') as sub GROUP BY (sub.idCliente) order by sum(sub.Monto) desc limit 3");
  }else {
    $query=$conn->query("select sub.Nombres, sum(sub.Monto) 'Compra total' from (select DISTINCT concat(cl.Nombres,' ',cl.Apellidos) 'Nombres' , c.Monto, c.idCliente from compra_fin cf inner join compra c on c.id=cf.idCompra inner join cliente cl on cl.id=c.idCliente) as sub GROUP BY (sub.idCliente) order by sum(sub.Monto) desc limit 3");
  }

  $arrows=array();
  $nombres=array();
  while($valores=mysqli_fetch_array($query)){
    $arrows[]=$valores;
    $nombres[]=$valores['Nombres'];
  }

  $data=array();
  for($i=0; $i<count($arrows); $i++){
    $data[$nombres[$i]]=$arrows[$i]['Compra total'];
  }


  //Pie chart
  $pdf->SetFont('Arial', 'BIU', 12);
  $pdf->Cell(30, 50, '1 - Top compradores', 0, 1);

  $pdf->SetY(65);
  $pdf->SetFont('Arial', 'I', 11);
  $pdf->Cell(0, 0, 'a) Grafico de pastel', 0, 1);
  $pdf->Ln(1);

  PastelTop($pdf, $data, $nombres, 3);
  barrasTop($pdf, $data, $pdf->GetX(), $pdf->GetY());

  $pdf->AddPage();
  $pdf->SetFont('Arial', 'BIU', 12);
  $pdf->Cell(30, 50, '2 - Top productos comprados', 0, 1);

  if(isset($_GET['username'])){
    $query=$conn->query("select sum(dc.cantidad) 'Cantidad', r.Nombre from detalle_compra dc inner join productotalla pt on pt.id=dc.idProd inner join rieles r on r.id=pt.idProd inner join cliente s on s.id=r.idSeller where s.username='".$_GET['username']."' GROUP BY r.id order by sum(dc.cantidad) desc limit 5");
  }else {
    $query=$conn->query("select sum(dc.cantidad) 'Cantidad', r.Nombre from detalle_compra dc inner join productotalla pt on pt.id=dc.idProd inner join rieles r on r.id=pt.idProd GROUP BY r.id order by sum(dc.cantidad) desc limit 5");
  }

  $arrows=array();
  $nombres=array();
  while($valores=mysqli_fetch_array($query)){
    $arrows[]=$valores;
    $nombres[]=$valores['Nombre'];
  }

  $data=array();
  for($i=0; $i<count($arrows); $i++){
    $data[$nombres[$i]]=$arrows[$i]['Cantidad'];
  }

  PastelTop($pdf, $data, $nombres, 5);
  barrasTop($pdf, $data, $pdf->GetX(), $pdf->GetY());
  $pdf->Output();
 ?>
