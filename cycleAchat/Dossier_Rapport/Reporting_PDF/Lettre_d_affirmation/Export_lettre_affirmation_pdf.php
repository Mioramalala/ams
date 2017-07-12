<?php

/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
	/*================================================
	|  			FORMAT DES EXPORT PDF
	================================================ */
    include('PDF_lettre_affirmation.php');    
	
	/*================================================*/
    $content = ob_get_clean();

    // convert to PDF
    //require_once(dirname(__FILE__).'/../html2pdf.class.php');
    require_once('../Class_pdf_export/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
       // $html2pdf->pdf->IncludeJS("print(true);");//fenêtre imprimer
        $html2pdf->pdf->SetDisplayMode('fullpage');
        //$html2pdf->pdf->SetProtection(array('print'), 'eufonie');//mot de passe
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('TEST.pdf');
        
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
