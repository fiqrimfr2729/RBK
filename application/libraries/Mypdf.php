<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('assets/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class Mypdf {
	protected $ci;
	public function __construct() {
		$this->ci =& get_instance();
	}

	public function generate($view, $data = array(), $filename = 'File', $paper = 'A4', $orientation = 'portrait') {
		$dompdf = new Dompdf();
		$html = $this->ci->load->view($view, $data, TRUE);
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);

		//Render the Html PDF
		$dompdf->render();
		$dompdf->set_option('isRemoteEnabled', TRUE);
		$dompdf->stream($filename . ".pdf", array("Attachment" => FALSE));
	}
}
?>