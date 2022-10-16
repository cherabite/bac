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


		$headerData = $this->getHeaderData();
		$this->SetFont('mohammadbart1', '', 12);
		$this->writeHTML($headerData['string']);
	}
	// Page footer
	public function Footer()
	{
		// Position at 15 mm from bottom
		$this->SetY(-60);
		// Set font
		$this->SetFont('mohammadbart1', 'I', 10);
		
		$this->Cell(100, 8, '', 0, 0, 'C', 0);
		$this->Cell(85, 8, 'سطيف في :  ' . date("Y-m-d"), 0, 0, 'L', 0);
		$this->Cell(5, 8, '', 0, 0, 'C', 0);
        $this->ln();$this->ln();
		$this->Cell(70, 8, '', 0, 0, 'C', 0);
		$this->Cell(115, 8, ' مديرة المركز الولائي', 0, 0, 'C', 0);
		$this->Cell(5, 8, '', 0, 0, 'C', 0);
        $this->ln();
		
		$this->Cell(70, 8, '', 0, 0, 'C', 0);
		$this->Cell(115, 8, '   و / تواتي', 0, 0, 'C', 0);
		$this->Cell(5, 8, '', 0, 0, 'C', 0);
        $this->ln();
		$this->ln();$this->ln();

		$this->Cell(60, 8, '', 0, 0, 'C', 0);
		$this->Cell(70, 8, 'صفحة   ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, 0, 'C', 0);
		$this->Cell(60, 8, '', 0, 0, 'C', 0);
	}

	public function ColoredTable($header, $data, $n)
	{
		$this->SetFont('mohammadbart1', 'I', 12);
		// Colors, line width and bold font
		$this->SetFillColor(103, 152, 152);
		$this->SetTextColor(255);
		$this->SetDrawColor(128, 0, 0);
		$this->SetLineWidth(0.3);
		$this->SetFont('', '');
		// Header
		$w = array(
			20,20,20,20,20,20,20,20,20,20
		);
		$num_headers = count($header);
		for ($i = 0; $i < $num_headers; ++$i) {
			$this->Cell($w[$i], 10, $header[$i], 1, 0, 'C', 1);
		}
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224, 235, 255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = 0;

		//Column titles


		foreach ($data['home'] as $row) {
			$this->Cell($w[0], 7, $row->FILIERE, 'LR', 0, 'C', $fill);
			$this->Cell($w[1], 7, $row->FILIERE , 'LR', 0, 'C', $fill);
			$this->Cell($w[2],7, $row->FILIERE, 'LR', 0, 'C', $fill);
			$this->Cell($w[3], 7, $row->FILIERE, 'LR', 0, 'C', $fill);
			$this->Cell($w[4], 7, $row->FILIERE, 'LR', 0, 'C', $fill);
            $this->Cell($w[5], 7, $row->FILIERE, 'LR', 0, 'C', $fill);
            $this->Cell($w[6], 7, $row->FILIERE, 'LR', 0, 'C', $fill);
            $this->Cell($w[7], 7, $row->FILIERE, 'LR', 0, 'C', $fill);
            $this->Cell($w[8], 7, $row->FILIERE, 'LR', 0, 'C', $fill);
            $this->Cell($w[9], 7, $row->FILIERE, 'LR', 0, 'C', $fill);
			


			$this->Ln();
			$fill = !$fill;
			
		}
		$this->Cell(array_sum($w), 0, '', 'T');
	}
}
class Bac_stat extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_bac_stat');
	}
function show_form_stat(){
    $data = array(

        "page_content" => "pages/bac/v_stat_condidat",
        "grand_title" => "دورة 2022  ",
        "page_title" => " قائمة المترشحين",
    );
    $this->load->view("layout/main_layout", $data);
}
	function stat_total()
	{
        $nom_secteur = $_POST['nom_secteur'];
      $data=  $this->m_bac_stat->stat_total($nom_secteur);
   // print_r($data);

    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
    $pdf->SetAuthor('CHERABITE KAMEL');
    $pdf->SetTitle('بطاقة التزام');
    $pdf->SetMargins(2, 5, 2, 1);
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->SetAutoPageBreak(true, 2);
    $pdf->setFontSubsetting(false);
    $lg = array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'ar';
    $lg['w_page'] = 'page';
    $pdf->setLanguageArray($lg);
    $pdf->SetFont('mohammadbart1', '', 14);

    $pdf->AddPage();

    $fourmulaire = '
    <table>
    <tr>
    <td>a</td>
    <td>a</td>
    <td>a</td>
    <td>a</td>
    <td>a</td>
    <td>a</td>
    <td>a</td>
    <td>a</td>
    <td>a</td>
    <td>a</td>
    </tr>';
    foreach($data as $info){
      //  print_r($info[0]->ICODE);
    $fourmulaire = $fourmulaire. '
    <tr>
    <td>'.$info[1]->FILIERE.'</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>';
}
$fourmulaire = $fourmulaire.'</table>
    ';
    $pdf->writeHTML($fourmulaire, true, false, false, false, '');

   
   // ob_end_clean();
    $pdf->Output('Fiche d engagement.pdf', 'I');




    }
}