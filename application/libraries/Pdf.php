<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter DomPDF Library
 *
 * Generate PDF's from HTML in CodeIgniter
 *
 * @packge        CodeIgniter
 * @subpackage        Libraries
 * @category        Libraries
 * @author        Ardianta Pargo
 * @license        MIT License
 * @link        https://github.com/ardianta/codeigniter-dompdf
 */
use Dompdf\Dompdf;
use Dompdf\Options;
class Pdf extends Dompdf{
    /**
     * PDF filename
     * @var String
     */
    public $filename;
    public function __construct(){
        parent::__construct();
        $this->filename = "laporan.pdf";
    }
    /**
     * Get an instance of CodeIgniter
     *
     * @access    protected
     * @return    void
     */
    protected function ci()
    {
        return get_instance();
    }
    /**
     * Load a CodeIgniter view into domPDF
     *
     * @access    public
     * @param    string    $view The view to load
     * @param    array    $data The view data
     * @return    void
     */
    public function load_view($view, $data = array()){
        // $options = new Options();
        // $options->set('isRemoteEnabled', TRUE);
        // $dompdf = new Dompdf($options);

        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $options->set('isRemoteEnabled', TRUE);
        $options->set('debugKeepTemp', TRUE);
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $html = $this->ci()->load->view($view, $data, TRUE);
        $this->load_html($html);
        // Render the PDF
        $this->render();
            // Output the generated PDF to Browser
        $this->stream($this->filename, array("Attachment" => false));

        $options = new Dompdf\Options();
        $options->set(array('isPhpEnabled'          => true, 
                    'isRemoteEnabled'       => true, 
                    'isJavascriptEnabled'   => false, 
                    'isHtml5ParserEnabled'  => true, 
                    'tempDir'               => sys_get_temp_dir())
        );
        // $options->set('isRemoteEnabled', TRUE);

        //Default paper size
        $dompdf->set_paper('DEFAULT_PDF_PAPER_SIZE', 'portrait');

        //Output the result
        $output = $dompdf->output();


        // $file_location = $_SERVER['DOCUMENT_ROOT']."app_folder_name/pdfReports/".$pdf_name.".pdf";
        // file_put_contents($file_location,$pdf); 
    }
}
