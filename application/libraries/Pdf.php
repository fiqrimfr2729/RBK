<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once dirname(__FILE__) . '/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
class Pdf extends Dompdf
{
  //   *
	 // * Get an instance of CodeIgniter
	 // *
	 // * @access  protected
	 // * @return  void
	 
	protected function ci()
	{
	    return get_instance();
	}

	//  *
	//  * Load a CodeIgniter view into domPDF
	//  *
	//  * @access  public
	//  * @param   string  $view The view to load
	//  * @param   array   $data The view data
	//  * @return  void

	public function load_view($view, $data = array())
	{
	    $dompdf = new Dompdf();
	    $html = $this->ci()->load->view($view, $data, TRUE);

	    $dompdf->loadHtml($html);

	    // (Optional) Setup the paper size and orientation
	    $dompdf->setPaper('A4', 'landscape');

	    // Render the HTML as PDF
	    $dompdf->render();
	    $time = time();

	    // Output the generated PDF to Browser
	    $dompdf->stream("welcome-". $time);
	}

	//  *
	//  * Process html string into domPDF
	//  *
	//  * @access  public
	//  * @param   string  $htmlTxt HTML Source code
	//  * @param   string  $filename File name for pdf 
	//  * @param   string  $paperSize Paper size 
	//  * @param   string  $paperOrientation Paper Orientation
	
	public function base_html($htmlTxt, $filename, $paperSize='A4', $paperOrientation)
	{
		$options = new Options();
		$options->set('isRemoteEnabled', 'true');
		$dompdf = new Dompdf($options);

		// default
		// $dompdf = new Dompdf();



	    // $html = $this->ci()->load->view($view, $data, TRUE);




	    $dompdf->loadHtml($htmlTxt);

	    // (Optional) Setup the paper size and orientation
		$dompdf->setPaper($paperSize, $paperOrientation);

	    // Render the HTML as PDF
	    $dompdf->render();
	    
	    $canvas = $dompdf->get_canvas();
		$font = $dompdf->getFontMetrics()->get_font("Helevatica", "bold");
		$canvas->page_text(15, 10, "Page: {PAGE_NUM} to {PAGE_COUNT}", $font, 10, array(0,0,0));

	    // Output the generated PDF to Browser
	    // $dompdf->stream($filename);

	    // view output in browser, if browser set to disable offer user to view in browser 
	    $dompdf->stream($filename,array('Attachment'=>0));
	    
	}
	 
	
}