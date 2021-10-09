<?php
    include(".php");
    ob_start();
    include 'invoice.php';
    $content = ob_get_clean();
    $mpdf = new mPDF('win-1252','A4','','',20,15,48,25,10,10);
    $mpdf->useOnlyCoreFonts = true;
    $mpdf->SetProtection(array('print'));
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($content);
    $mpdf->Output();
    exit;
?>
