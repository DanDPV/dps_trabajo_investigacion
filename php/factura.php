<?php 
    require_once './../pluggins/dompdf/autoload.inc.php';
    include('./template/template.php');
    include('../php/conexion.php');
    
    use Dompdf\Dompdf; 
    use Dompdf\Options;
    
    $conn = new conexion();
    if(isset($_GET["name"])) {
        $name = $_GET["name"] == '' ? 'test' : $_GET["name"];
        $retornable = $conn->buscarUsuario($name);
        $clientName = $retornable['Nombres'].' '.$retornable['Apellidos'];
        $clientLocation = $retornable['Direccion']; 
        $lastCompra = $conn->getLastCompra($retornable['id']);
        $soDetails = $conn->getSODetails($lastCompra['id']);
        
        $html = getHeader($clientName, $clientLocation, $lastCompra['id'], $lastCompra['Fecha']).
                    getTable($soDetails, $lastCompra).
                    getFooter();
        
        // echo $html;
        $options = new Options();
        $options -> set('enable_html5_parser', true);
        $dompdf = new Dompdf($options);
        
        $dompdf->setPaper('letter', 'portrait');
        $dompdf->loadHtml($html);
        $dompdf->render();
        
        $fileName = $name.'.pdf';
        $dompdf->stream($fileName);
    }
?>