<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class C_imp_prim_engagement extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_depense');
        /*   $this->load->model('m_chapitre');*/
        $this->load->model('m_year_fiscal');

    }

    public function index()
    {
        $year_fiscal = $this->m_year_fiscal->get_year_fiscal();

        $data = array(
            "n_y" => $year_fiscal,
            "sum_depenses" => $this->m_depense->get_sum_depenses(),
            "depenses" => $this->m_depense->get_all_depenses(),
            "page_content" => "pages/v_engagement/v_imp_engagement",

            "grand_title" => " الإلتزامات ",
            "page_title" => " طباعة بطاقة الإلتزام الأولية ",
        );
        $this->load->view("layout/main_layout", $data);
    }
    public function imp_engagement($id_depense)
    {
        if ($this->form_validation->is_natural_no_zero($id_depense) === false) {
            redirect('c_imp_prim_engagement');
        } else {
            $depense = $this->m_depense->get_depenses_by_id($id_depense);

            require_once 'application/libraries/TCPDF-6.4.0/tcpdf.php';
            // require_once('tcpdf_include.php');
            $pdf = new TCPDF('L', PDF_UNIT, 'A3', true, 'UTF-8', false);
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
             </table>

             ';

            $tbl = '
<table  align="center" width="100%">
 <tr>
 <td width="5%"></td>
 <td width="45%">
 <br>
 <h1> تفـــاصيل الإلــتزام</h1>
        <table border="1" cellpadding="2" cellspacing="2" align="center" width="100%">
        <tr>
            <td width="10%"> الرقم</td>
            <td width="65%">طبيعـــة الإلــتزام</td>
            <td width="25%"> المبلـــغ</td>
        </tr>
        <tr>
            <td width="10%">
            01
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            </td>
            <td width="65%">التكفل  بالإعتمادات المفوضة للميزانية الأولية لسنة  ' . $depense->annee_courant . ' </td>
            <td width="25%">' . $depense->nouveau_montant . '</td>
       </tr>
       <tr>

            <td rowspan="2" width="75%"> المجمــــوع</td>
            <td width="25%">' . $depense->nouveau_montant . '</td>
       </tr>
        </table>
<h1 align="right">المجموع بالحروف : </h1>

 </td>
 <td width="5%"></td>
  <td width="45%">
     <h1> الجمهورية الجزائرية الديمقراطية الشعبية</h1>
     <h2> وزارة التربية الوطنية</h2>
     <h2>الديوان الوطني للتعليم و التكوين عن بعد</h2>
     <h2> المركز الولائي للتعليم و التكوين عن بعد</h2>
     <br>
     <h1> بطاقة الإلتزام</h1>

  <h2>ميزانية الدولة</h2>
  <table width="100%" align="right">
    <tr>
        <td width="50%" >
            <table border="1" cellpadding="2" cellspacing="2"  width="70%">
            <tr>
                <td>
                السنة :
                </td>
                <td align="center">
                ' . $depense->annee_courant . '
                </td>
            </tr>
            <tr>
                <td>
                 بطاقة رقم :
                </td>
                <td align="center">
                01
                </td>
            </tr>
          </table>
        </td>
        <td>
        <table border="1" cellpadding="2" cellspacing="2"  width="80%" align="right">
        <tr>
            <td colspan="2" align="center">
            تأشيرة المراقب المالي
            </td>

        </tr>
        <tr>
            <td>
            التاريخ :
            </td>
            <td>

            </td>
        </tr>
        <tr>
            <td>
            الرقم :
            </td>
            <td>

            </td>
       </tr>
      </table>
        </td>
    </tr>
  </table>
<p></p>
    <table  width="100%" border="1">
    <tr>
    <td colspan="6" align="right" >
        المـوضــوع : إقتصاد    <br/>
       الفـــرع :    ' . $depense->pknum_section . '     ' . $depense->libelle_section . '<br/>
    </td>
    </tr>
    <tr>
    <td>الباب</td>
    <td>المادة</td>
    <td> الفقرة</td>
    <td>الرصيد القديم</td>
    <td>مبلغ العملية</td>
    <td>الرصيد الجديد</td>
    </tr>
    <tr>
    <td>' . $depense->fknum_chapitre . ' <br />
    <br /></td>
    <td>' . $depense->num_article . '</td>
    <td></td>
    <td>00.00</td>
    <td>' . $depense->nouveau_montant . '</td>
    <td>' . $depense->nouveau_montant . '</td>
    </tr>
    <h1> ملاحظات المصلحة</h1>

    <h3 align="right"> التكفل بالإعتمادات الأولية </h3>
    <table width="100%" align="right" >

    <tr>
    <td width="15%" >الباب :</td>
    <td width="10%" >' . $depense->fknum_chapitre . '</td>
    <td width="85%" >' . $depense->libelle_chapitre . '</td>
    </tr>
    <tr>
    <td> المادة :</td>
    <td>' . $depense->num_article . '</td>
    <td> ' . $depense->libelle_article . '</td>
    </tr>
</table>
 <br /> <br />
 <table align="right">
 <tr>
 <td width="75%"></td>
 <td width="25%">سطيف في : <br /></td>
 </tr>
 <tr>
 <td></td>
 <td> الآمـر بالصرف</td>
 </tr>
 </table>


    </table>


  </td>
 </tr>
</table>
';

            $pdf->writeHTML($tbl, true, false, false, false, '');

            // $pdf->writeHTMLCell(0, 0, '', '', $fourmulaire, 0, 1, 0, true, '', true);

            //   $pdf->writeHTML($fourmulaire, true, false, true, false, '');
            ob_end_clean();
            $pdf->Output('Fiche d engagement.pdf', 'I');

        }

    }
}