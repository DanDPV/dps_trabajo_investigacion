<?php 
    function getHeader($clientName, $clientLocation, $soId, $date) {
        $image=file_get_contents("./../img/logo.png");
        $imagedata=base64_encode($image);
        $imgpath='<img src="data:image/png;base64, '.$imagedata.'">';

        return '
        <head>
        <meta charset="utf-8">
        <title>Example 2</title>
        <!-- <link rel="stylesheet" href="style.css" media="all" /> -->
        <style>
          @font-face {
            font-family: "Montserrat", sans-serif;
            src: url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap");
          }
    
          .clearfix:after {
            content: "";
            display: table;
            clear: both;
          }
    
          a {
            color: #F5784C;
            text-decoration: none;
          }
    
          body {
            position: relative;
            width: 18cm;  
            height: 29.7cm; 
            margin: 0 auto; 
            color: #555555;
            background: #FFFFFF; 
            font-family: Arial, sans-serif; 
            font-size: 14px; 
            font-family: "Montserrat", sans-serif;
          }
    
          header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
          }
    
          #logo {
            float: left;
            margin-top: 8px;
          }
    
          #logo img {
            height: 70px;
          }
    
          #company {
            float: right;
            text-align: right;
          }
    
    
          #details {
            margin-bottom: 50px;
          }
    
          #client {
            padding-left: 6px;
            border-left: 6px solid #F5784C;
            float: left;
          }
    
          #client .to {
            color: #777777;
          }
    
          h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
          }
    
          #invoice {
            float: right;
            text-align: right;
          }
    
          #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0  0 10px 0;
          }
    
          #invoice .date {
            font-size: 1.1em;
            color: #777777;
          }
    
          table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
          }
    
          table th,
          table td {
            padding: 20px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
          }
    
          table th {
            white-space: nowrap;        
            font-weight: normal;
          }
    
          table td {
            text-align: right;
          }
    
          table td h3{
            color: #F5784C;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
          }
    
          table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #F5784C;
          }
    
          table .desc {
            text-align: left;
          }
    
          table .unit {
            background: #DDDDDD;
          }
    
          table .qty {
          }
    
          table .total {
            background: #F5784C;
            color: #FFFFFF;
          }
    
          table td.unit,
          table td.qty,
          table td.total {
            font-size: 1.2em;
          }
    
          table tbody tr:last-child td {
            border: none;
          }
    
          table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap; 
            border-top: 1px solid #AAAAAA; 
          }
    
          table tfoot tr:first-child td {
            border-top: none; 
          }
    
          table tfoot tr:last-child td {
            color: #F5784C;
            font-size: 1.4em;
            border-top: 1px solid #F5784C; 
    
          }
    
          table tfoot tr td:first-child {
            border: none;
          }
    
          #thanks{
            font-size: 2em;
            margin-bottom: 50px;
          }
    
          #notices{
            padding-left: 6px;
            border-left: 6px solid #F5784C;  
          }
    
          #notices .notice {
            font-size: 1.2em;
          }
    
          footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
          }
    
    
        </style>
      </head>
      <body>
        <header class="clearfix">
          <div id="logo">
            '.$imgpath.'
          </div>
          <div id="company">
            <h2 class="name">FleaMarket</h2>
            <div>Km. 1/2 Carretera Plan del Pino, Soyapango</div>
            <div><a href="mailto:info@fleamarket.com">info@fleamarket.com</a></div>
          </div>
          </div>
        </header>
        <main>
            <div id="details" class="clearfix">
                <div id="client">
                <div class="to">FACTURA PARA:</div>
        '.
        '<h2 class="name">'.$clientName.'</h2>'.
        '<div class="address">'.$clientLocation.'</div>'.
        '</div>'.
        '<div id="invoice">'.
        '<h1>'.$soId.'</h1>'.
        '<div class="date">Fecha de compra: '.$date.'</div>'.
        '</div>'.
        '</div>';
    }

    function getFooter() {
        return '
                <div id="thanks">Gracias por tu compra!</div>
            </main>
            <footer>
                FleaMarket SV.
            </footer>
        </body>
        ';
    }

    function getTable($soDetails, $compraDetails) {
        $tableRows = '';
        for($i = 0; $i < count($soDetails); $i++) {
            $count = $i + 1;
            $tableRows = $tableRows.'<tr>'.
                            '<td class="no">'.$count.'</td>'.
                            '<td class="desc"><h3>'.$soDetails[$i]['nombre'].'</h3></td>'.
                            '<td class="unit">$'.number_format($soDetails[$i]['precio'], 2).'</td>'.
                            '<td class="qty">'.$soDetails[$i]['cantidad'].'</td>'.
                            '<td class="total">$'.number_format($soDetails[$i]['subtotal'], 2).'</td>'.
                            '</tr>';
        }

        $tfoot = '<tfoot>'.
                    '<tr>
                        <td colspan="2"></td>
                        <td colspan="2">SUBTOTAL</td>
                        <td>$'.number_format($compraDetails['Monto']-10, 2).'</td>
                    </tr>'.
                    '<tr>
                        <td colspan="2"></td>
                        <td colspan="2">Envio</td>
                        <td>$'.number_format(10, 2).'</td>
                    </tr>'.
                    '<tr>
                        <td colspan="2"></td>
                        <td colspan="2">TOTAL</td>
                        <td>$'.number_format($compraDetails['Monto'], 2).'</td>
                    </tr>'.
                '</tfoot>';

        return '
            <table border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="no">#</th>
                        <th class="desc">PRODUCTO</th>
                        <th class="unit">PRECIO</th>
                        <th class="qty">CANTIDAD</th>
                        <th class="total">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
        '.$tableRows.
        '</tbody>'.
        $tfoot.
        '</table>';
    }
?>
