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
			15, 50, 30, 40, 15, 20, 20
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


		foreach ($data as $row) {
			$this->Cell($w[0], 7, $n, 'LR', 0, 'C', $fill);
			$this->Cell($w[1], 7, $row['NOM'] . '  ' . $row['PRENOM'], 'LR', 0, 'C', $fill);
			$this->Cell($w[2],7, $row['DNS'], 'LR', 0, 'C', $fill);
			$this->Cell($w[3], 7, $row['LNS'], 'LR', 0, 'C', $fill);
			$this->Cell($w[4], 7, $row['SEXE'], 'LR', 0, 'C', $fill);
			if ($row['sport'] == 1) {
				$sport = 'كفء';
			} else {
				$sport = 'غ/كفء';
			}
			$this->Cell($w[5], 7, $sport, 'LR', 0, 'C', $fill);
			$this->Cell($w[6], 7, $row['id_dossier'], 'LR', 0, 'C', $fill);


			$this->Ln();
			$fill = !$fill;
			$n = $n + 1;
		}
		$this->Cell(array_sum($w), 0, '', 'T');
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


		/////////////////////////////////
		$icode = $this->input->post('icode');
		$id_vag = $this->input->post('id_vag');
		$nom_secteur = $this->input->post('nom_secteur');
		$users = $this->m_bac->get_liste_by_filter($icode, $id_vag,$nom_secteur);
		$info = $this->m_bac->get_liste_by_filter_one($icode, $id_vag,$nom_secteur);
		if($info->ICODE == '404'){
			$fil='  المستوى  الرابعة متوسط ' ;
		}else{
$fil= 'شعبة  : ' .$info->FILIERE;
		}
	//	print_r($info);exit;
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('ch k');
		$pdf->SetTitle('cwefd 19 ');
		$pdf->SetSubject('bac 2022');
		$pdf->SetKeywords('bac, 2022, onefd, cwefd, setif');

		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderData(
			$ln = '',
			$lw = 0,
			$ht = '',
			$hs = '<table cellspacing="0" cellpadding="0" border="0">
		 <tr>
		 <td align="center">
		 <h4>المؤسسة : الديوان الوطني للتعليم و التكوين عن بعد</h4>
		 <h4>الرمز : ' . $info->expr2 . '    المقاطعة : ' . $info->code_secteur .  '     (' . $info->nom_secteur . ')   الولاية : سطيف </h4>
		 <h4> '.$fil  . '   '.  '  دورة :   2022   '.'    </h4>
		
		</td>
		 </tr></table>',
			$tc = array(0, 0, 0),
			$lc = array(0, 0, 0)
		);
		// set header and footer fonts
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(5, 45, 10, 5);
		//	$pdf->SetHeaderMargin(0, 0, 0, 0);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		$pdf->setFontSubsetting(false);
		// $pdf->SetAutoPageBreak(true, 2);
		$lg = array();
		$lg['a_meta_charset'] = 'UTF-8';
		$lg['a_meta_dir'] = 'rtl';
		$lg['a_meta_language'] = 'ar';
		$lg['w_page'] = 'page';
		$pdf->setLanguageArray($lg);

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('mohammadbart1', '', 12);

		// add a page
		//	$pdf->AddPage();
		$header = array('ر/ت', 'اللقب و الإسم ', 'تاريخ الميلاد', 'مكان الميلاد', 'الجنس', 'ت البدنية', 'رقم الملف');
		// set some text to print
		$tbl =
			'<table>
<thead>
    <tr><th>Heading</th></tr>
</thead>
<tbody>
    <tr><td>Many rows...</td></tr>
    <tr><td>of data</td></tr>
</tbody>
</table>';
		//print_r($users);
		//exit;
		//$pdf->ColoredTable($header, $users);


		$datacount = count($users);
		$i = 0;
		while ($i < $datacount) {
			$dataout = array_slice($users, $i, 25, false);
			$pdf->AddPage();
			// print colored table      
			$pdf->ColoredTable($header, $dataout, $i + 1);
			$i = $i + 25;
		}
		ob_flush();
		// print a block of text using Write()
		//$pdf->writeHTML($tbl, true, false, false, false, '');
		//ob_end_clean();
		// ---------------------------------------------------------

		//Close and output PDF document
		$pdf->Output('Liste_'.$info->code_etab .'_' . $info->ICODE . '_' . $info->id_vag , 'I');
	}
}