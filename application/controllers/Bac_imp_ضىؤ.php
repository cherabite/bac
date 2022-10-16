<?php

//use MYPDF as GlobalMYPDF;

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
require_once 'application/libraries/TCPDF-6.4.0/tcpdf.php';

class MYPDF extends TCPDF
{

	//Page header
	public function Header()
	{
		$html = 'Some Header';

		$this->SetFontSize(8);
		$this->WriteHTML($html, true, 0, true, 0);
	}

	// Page footer
	public function Footer()
	{
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}
class Bac_imp extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_bac');
	}

	function imp_liste_condidat()
	{
		$icode = $this->input->post('icode');
		$users = $this->m_bac->get_liste_by_filter($icode);
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 003');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
			require_once(dirname(__FILE__) . '/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('times', 'BI', 12);

		// add a page
		$pdf->AddPage();

		// set some text to print
		$txt = <<<EOD
		TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
TCPDF Example 003
variable and print on footer. you need to use css here for in order to print customer name to footer.
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
EOD;

		// print a block of text using Write()
		$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

		// ---------------------------------------------------------

		//Close and output PDF document
		$pdf->Output('example_003.pdf', 'I');
	}
}