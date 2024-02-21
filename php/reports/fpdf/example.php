<?php
  require('contro.php');

  $pdf = new pdf();
  $pdf->AliasNbPages();
  $pdf->Output();
 ?>
