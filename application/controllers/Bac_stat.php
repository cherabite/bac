<?php

//use MYPDF as GlobalMYPDF;

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

require_once 'application/libraries/TCPDF-6.4.0/tcpdf.php';
//require_once 'application/libraries/tcpdi/tcpdi.php';

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
		$this->SetY(-70);
		// Set font
		$this->SetFont('mohammadbart1', 'I', 10);

		$this->Cell(100, 8, '', 0, 0, 'C', 0);
		$this->Cell(85, 8, 'سطيف في :  ' . date("Y-m-d"), 0, 0, 'L', 0);
		$this->Cell(5, 8, '', 0, 0, 'C', 0);
		$this->ln();
		$this->ln();
		$this->Cell(70, 8, '', 0, 0, 'C', 0);
		$this->Cell(115, 8, ' مديرة المركز الولائي', 0, 0, 'C', 0);
		$this->Cell(5, 8, '', 0, 0, 'C', 0);
		$this->ln();

		$this->Cell(70, 8, '', 0, 0, 'C', 0);
		$this->Cell(115, 8, '   و / تواتي', 0, 0, 'C', 0);
		$this->Cell(5, 8, '', 0, 0, 'C', 0);
		$this->ln();
		$this->ln();
		$this->ln();

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
			20, 20, 20, 20, 20, 20, 20, 20, 20, 20
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
			$this->Cell($w[1], 7, $row->FILIERE, 'LR', 0, 'C', $fill);
			$this->Cell($w[2], 7, $row->FILIERE, 'LR', 0, 'C', $fill);
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

	function show_form_stat()
	{
		$data = array(

			"page_content" => "pages/bac/v_stat_condidat",
			"grand_title" => "دورة 2022  ",
			"page_title" => " احصائيات المترشحين",
		);
		$this->load->view("layout/main_layout", $data);
	}
	function show_stat_sport()
	{
		$data = array(

			"page_content" => "pages/bac/v_stat_condidat_sport",
			"grand_title" => "دورة 2022  ",
			"page_title" => " احصائيات المترشحين حسب الرياضة",
		);
		$this->load->view("layout/main_layout", $data);
	}
	function stat_total_test()
	{
		$pdf = new TCPDI(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

          // Add the pages from the source file.
       $pagecount = $pdf->setSourceFile('/assets/pdf/test.pdf');
			for ($i = 1; $i <= $pagecount; $i++) {
				$tplidx = $pdf->importPage($i);
				$pdf->AddPage();
				$pdf->useTemplate($tplidx);
				// Add agreement text in document footer
				$pdf->SetXY(15,282);
				$pdf->Cell(180, 5, "Documento approvato da  il ", 0, 0, 'C');
			}

			$pdf->Output('Table_stat_by_secteur.pdf', 'I');

	}

	function stat_total()
	{
		$nom_secteur = $_POST['nom_secteur'];
		$id_vag = $_POST['id_vag'];
		$data =  $this->m_bac_stat->stat_total($nom_secteur, $id_vag);
		$data_t =  $this->m_bac_stat->stat_total_t($nom_secteur, $id_vag);
	//	$row =  $this->m_bac_stat->stat_total_m($nom_secteur, $id_vag);
		//print_r($data);
		if($nom_secteur == 111){$s='';}else{$s= '(دائرة : ' . $data_t->nom_secteur .')';  }
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		//	$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
		$pdf->SetAuthor('CHERABITE KAMEL');
		$pdf->SetTitle('جداول إحصائية');
		$pdf->setHeaderData(
			$ln = '',
			$lw = 0,
			$ht = '',
			$hs = '<table cellspacing="0" cellpadding="0" border="0">
		 <tr>
		 <td align="center">
		 <h4>الجمهورية الجزائرية الديمقراطية الشعبية</h4>
		 <h4>وزارة التربية الوطنية </h4>
		 <h4>الديوان الوطني للامتحانات و المسابقات</h4>
		 <h4>فـــرع : بــاتنة </h4>
		 <h4>  الديوان الوطني للتعليم و التكوين عن بعد   سطيف  ' .$s.'</h4>
		 <h4>الإحصائيات الأولية</h4>
		
		
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
		$pdf->SetMargins(5, 60, 10, 5);
		//	$pdf->SetHeaderMargin(0, 0, 0, 0);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		$pdf->setFontSubsetting(false);
		$lg = array();
		$lg['a_meta_charset'] = 'UTF-8';
		$lg['a_meta_dir'] = 'rtl';
		$lg['a_meta_language'] = 'ar';
		$lg['w_page'] = 'page';
		$pdf->setLanguageArray($lg);
		$pdf->SetFont('mohammadbart1', '', 14);

		$pdf->AddPage();
		$fourmulaire = '<h4 align="center">للمترشحين لامتحان شهادة البكالوريا دورة : 2022</h4> <p></p>';
		$fourmulaire = $fourmulaire . '
    <table border="1" cellpadding="2" cellspacing="2" align="center"  width="100%">

    <tr style="background-color:#909090 ;color:white;">
    <td vertical-align="middle" width="23%">الشعبة</td>
    <td width="7%">ذكور</td>
    <td width="7%">إناث</td>
    <td width="8%">مجموع</td>
    <td width="7%">بصريا</td>
    <td width="9%">حركيا</td>
    <td width="10%">ع/م أبناء الصحراء الغربية</td>
    <td width="10%">ع/م  الأجانب</td>
    <td width="10%">ع/م اللغة الأمازيغية</td>
    <td width="8%">ع/م التربية البدنية</td>
    </tr>';
		$nbr = count($data);
		foreach ($data as $row) {
			//		$this->Cell($w[$i], 10, $header[$i], 1, 0, 'C', 1);
			//	}
			//  foreach($data as $info){
			//  print_r($info[0]->ICODE);
			$fourmulaire = $fourmulaire . '
    <tr>
    <td>' . $row->FILIERE . '</td>
    <td>' . $row->H . '</td>
    <td>' . $row->F . '</td>
    <td>' . $row->SUM . '</td>
    <td>' . $row->ayes . '</td>
    <td>' . $row->endicap . '</td>
    <td> / </td>
    <td> / </td>
    <td>/ </td>
    <td>' . $row->apte . '</td>
    </tr>';
		}
		$fourmulaire = $fourmulaire . '
    <tr style="background-color:#909090 ;color:white;">
    <td>المجموع </td>
    <td>' . $data_t->H . '</td>
    <td>' . $data_t->F . '</td>
    <td>' . $data_t->SUM . '</td>
    <td>' . $data_t->ayes . '</td>
    <td>' . $data_t->endicap . '</td>
    <td> / </td>
    <td> / </td>
    <td>/ </td>
    <td>' . $data_t->apte . '</td>
    </tr>';

		$fourmulaire = $fourmulaire . '</table>
    ';
		$pdf->writeHTML($fourmulaire, true, false, false, false, '');
		
	


		// ob_end_clean();
		$pdf->Output('Table_stat_by_secteur.pdf', 'I');
	}
function show_stat_total_4(){
	$data = array(

		"page_content" => "pages/bac/show_stat_total_4",
		"grand_title" => "دورة 2022  ",
		"page_title" => "4 احصائيات المترشحين حسب ",
	);
	$this->load->view("layout/main_layout", $data);
}
	function stat_total_4()
	{
		$nom_secteur = $_POST['nom_secteur'];
		$id_vag = $_POST['id_vag'];
		//$data =  $this->m_bac_stat->stat_total($nom_secteur, $id_vag);
		//$data_t =  $this->m_bac_stat->stat_total_t($nom_secteur, $id_vag);
		$row =  $this->m_bac_stat->stat_total_m($nom_secteur, $id_vag);
		if($nom_secteur == 111){$s='';}else{$s= '(دائرة : ' . $row->nom_secteur .')';  }
	//	$row =  $this->m_bac_stat->stat_total_4();
		//print_r($data);

		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		//	$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
		$pdf->SetAuthor('CHERABITE KAMEL');
		$pdf->SetTitle('جداول إحصائية');
		$pdf->setHeaderData(
			$ln = '',
			$lw = 0,
			$ht = '',
			$hs = '<table cellspacing="0" cellpadding="0" border="0">
		 <tr>
		 <td align="center">
		 <h4>الجمهورية الجزائرية الديمقراطية الشعبية</h4>
		 <h4>وزارة التربية الوطنية </h4>
		 <h4>الديوان الوطني للامتحانات و المسابقات</h4>
		 <h4>فـــرع : بــاتنة </h4>
		 <h4>  الديوان الوطني للتعليم و التكوين عن بعد   سطيف  ' .$s.'</h4>
		 <h4>الإحصائيات الأولية</h4>
		
		
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
		$pdf->SetMargins(5, 60, 10, 5);
		//	$pdf->SetHeaderMargin(0, 0, 0, 0);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		$pdf->setFontSubsetting(false);
		$lg = array();
		$lg['a_meta_charset'] = 'UTF-8';
		$lg['a_meta_dir'] = 'rtl';
		$lg['a_meta_language'] = 'ar';
		$lg['w_page'] = 'page';
		$pdf->setLanguageArray($lg);
		$pdf->SetFont('mohammadbart1', '', 14);

		
		$pdf->AddPage();
		$fourmulaire = '<h4 align="center">للمترشحين لامتحان شهادة التعليم المتوسط دورة : 2022</h4>
		<p></p>
		';
		$fourmulaire = $fourmulaire . '
    <table border="1" cellpadding="2" cellspacing="2" align="center" width="100%">
    <tr>
	<td></td>

<td colspan="2">المجموع حسب الجنس</td>
<td rowspan="2">المجموع العام </td>


</tr>
<tr>

<td>  الجنس</td>
<td> ذكور</td>
<td>إناث</td>
</tr>
<tr>

<td>عدد المترشحين;</td>
<td>'.$row->H.'</td>
<td>'.$row->F.'</td>
  <td>'.$row->SUM.'</td>
</tr>';

		$fourmulaire = $fourmulaire . '</table>
		<p></p>
		<table border="1" cellpadding="2" cellspacing="2" align="right" width="100%">
		<tr>
		<td  width="55%"  height="30">عدد حالات الإعاقة : </td>
		<td width="20%"> بصريا : '.$row->ayes.'</td>
		<td>حركيا : '.$row->endicap.'</td>
		
		</tr>
		<tr>
		<td  height="35">عدد المترشحين الأجانب :</td>
		<td>/</td>
		<td></td>
		
		</tr>
		<tr>
		<td  height="35"> ع المترشحين أبناء الصحراء الغربية : </td>
		<td> / </td>
		<td></td>
		
		</tr>
		<tr>
		<td  height="35">عدد مترشحي اللغة الأمازيغية :</td>
		<td> / </td>
		<td></td>
		
		</tr>
		<tr>
		<td  height="35">ع المترشحين المعنيين بالتربية البدنية و الرياضية :</td>
		<td>'.$row->apte.'</td>
		<td></td>
		
		</tr>
	
	
		';

		$pdf->writeHTML($fourmulaire, true, false, false, false, '');


		// ob_end_clean();
		$pdf->Output('Table_stat_by_secteur.pdf', 'I');
	}



	function stat_sport()
	{
		
		$nom_secteur = $_POST['nom_secteur'];
		$id_vag = $_POST['id_vag'];
		$data =  $this->m_bac_stat->stat_total_s($nom_secteur, $id_vag);
		$data_t =  $this->m_bac_stat->stat_total_t_s($nom_secteur, $id_vag);
		$row_m =  $this->m_bac_stat->stat_total_m_s($nom_secteur, $id_vag);
		//print_r($data);

		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		//	$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
		$pdf->SetAuthor('CHERABITE KAMEL');
		$pdf->SetTitle('جداول إحصائية');
		$pdf->setHeaderData(
			$ln = '',
			$lw = 0,
			$ht = '',
			$hs = '<table cellspacing="0" cellpadding="0" border="0">
		 <tr>
		 <td align="center">
		 <h4>الجمهورية الجزائرية الديمقراطية الشعبية</h4>
		 <h4>وزارة التربية الوطنية </h4>
		 <h4>الديوان الوطني للامتحانات و المسابقات</h4>
		 <h4>فـــرع : بــاتنة </h4>
		 <h4> الديوان الوطني للتعليم و التكوين عن بعد  (' . $data_t->nom_secteur . ')  سطيف</h4>
		 <h4>الإحصائيات الأولية</h4>
		
		
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
		$pdf->SetMargins(5, 60, 10, 5);
		//	$pdf->SetHeaderMargin(0, 0, 0, 0);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		$pdf->setFontSubsetting(false);
		$lg = array();
		$lg['a_meta_charset'] = 'UTF-8';
		$lg['a_meta_dir'] = 'rtl';
		$lg['a_meta_language'] = 'ar';
		$lg['w_page'] = 'page';
		$pdf->setLanguageArray($lg);
		$pdf->SetFont('mohammadbart1', '', 14);

		$pdf->AddPage();
		$fourmulaire = '<h4 align="center">للمترشحين لامتحان شهادة البكالوريا دورة : 2022</h4> <p></p>';
		$fourmulaire = $fourmulaire . '<div align="center">
    <table border="1" cellpadding="2" cellspacing="2" align="center" width="100%">

    <tr style="background-color:#909090 ;color:white;">
    <td  width="30%">الشعبة</td>
    <td width="15%"> ذكور / كفء</td>
    <td width="15%"> إناث/ كفء</td>
    
    <td width="20%">مجموع التربية البدنية </td>
    </tr>';
		$nbr = count($data);
		foreach ($data as $row) {
			//		$this->Cell($w[$i], 10, $header[$i], 1, 0, 'C', 1);
			//	}
			//  foreach($data as $info){
			//  print_r($info[0]->ICODE);
			$fourmulaire = $fourmulaire . '
    <tr>
    <td>' . $row->FILIERE . '</td>
    <td>' . $row->H . '</td>
    <td>' . $row->F . '</td>
    <td>' . $row->SUM . '</td>
   
    </tr>';
		}
		$fourmulaire = $fourmulaire . '
    <tr style="background-color:#909090 ;color:white;">
    <td>  المجموع</td>
    <td>' . $data_t->H . '</td>
    <td>' . $data_t->F . '</td>
    <td>' . $data_t->SUM . '</td>
   
    </tr>';

		$fourmulaire = $fourmulaire . '</table>
    ';
		$pdf->writeHTML($fourmulaire, true, false, false, false, '');
		$pdf->AddPage();
		$fourmulaire = '<h4 align="center">للمترشحين لامتحان شهادة التعليم المتوسط دورة : 2022</h4>
		<p></p>
		';
		$fourmulaire = $fourmulaire . '
    <table border="1" cellpadding="2" cellspacing="2" align="center" align-vertical="center" width="100%">
    <tr>

<td colspan="2">المجموع حسب الجنس</td>
<td rowspan="2">المجموع العام </td>

</tr>
<tr>
<td> ذكور كفء</td>
<td>إناث كفء</td>


</tr>
<tr>

<td>' . $row_m->H . '</td>
<td>' . $row_m->F . '</td>
<td>' . $row_m->SUM . '</td>
 
</tr>
	
	';

		$fourmulaire = $fourmulaire . '</table></div>
    ';

		$pdf->writeHTML($fourmulaire, true, false, false, false, '');


		// ob_end_clean();
		$pdf->Output('Table_stat_by_secteur.pdf', 'I');
	}
}