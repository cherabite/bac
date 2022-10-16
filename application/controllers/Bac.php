<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Bac extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_bac');
	}
	function show_form_config_new_year()
	{
		$data = array(

			"page_content" => "pages/bac/v_config_vag",
			"grand_title" => "دورة 2022",
			"page_title" => " فتح مرحلة جديدة",
		);
		$this->load->view("layout/main_layout", $data);
	}
	public function confirm_new_year()
	{
		$this->form_validation->set_rules('new_year', ' إنشاء مرحلة جديدة', 'trim|required');

		if ($this->form_validation->run() === false) {

			redirect();
		} else {

			$this->m_bac->update_new_year($this->input->post('new_year'));
			$this->session->set_flashdata('msg', 'لقد تم فتح مرحلة  جدبيدة');

			$data = array(
				"vag" => $this->m_bac->select_vag_active(),
				"page_content" => "pages/bac/v_form_add_condidat",
				"grand_title" => "دورة 2022",
				"page_title" => "إضافة مترشح",
			);
			$this->load->view("layout/main_layout", $data);
		}
	}

	public function show_v_form_add_condidat()
	{
		$data = array(
			"vag" => $this->m_bac->select_vag_active(),
			"page_content" => "pages/bac/v_form_add_condidat",
			"grand_title" => "دورة 2022",
			"page_title" => "إضافة مترشح",
		);
		$this->load->view("layout/main_layout", $data);
	}
	public function add_condidat()
	{
		$this->form_validation->set_rules('npr', 'رقم الإستمارة', 'trim|required|numeric|callback_unique_npr');
		$this->form_validation->set_rules('id_dossier', 'رقم الملف', 'trim|required|numeric|callback_unique_id_dossier');
		$this->form_validation->set_rules('sport', 'تعيين التربية البدنية', 'trim|required');
		$this->form_validation->set_rules('categorie', 'تعيين ذوي الإحتياجات الخاصة', 'trim|required');
		$this->form_validation->set_rules('code_secteur', 'تعيين المقاطعة', 'trim|required');


		if ($this->form_validation->run() === false) {
			$data = array(
				"vag" => $this->m_bac->select_vag_active(),
				"page_content" => "pages/bac/v_form_add_condidat",
				"grand_title" => "دورة 2022",
				"page_title" => "إضافة مترشح",
			);
			$this->load->view("layout/main_layout", $data);
		} else {

			$nom = $this->session->userdata('nom');
			$prenom = $this->session->userdata('prenom');
			$data = array(
				'npr' => $this->input->post('npr'),

				'id_dossier' => $this->input->post('id_dossier'),
				'sport' => $this->input->post('sport'),
				'categorie' => $this->input->post('categorie'),
				'code_secteur' => $this->input->post('code_secteur'),
				'id_vag'	=> $this->input->post('id_vag'),
				'date_created' => date('Y-m-d H:i:s'),
				'created_by' => $nom . '  ' . $prenom,
				'id_deleted' => 0
			);

			if ($id = $this->m_bac->add_condidat($data)) {
				$this->session->set_flashdata('success', 'لقد تمت الإضافة بنجاح');
				$data = array(
					"vag" => $this->m_bac->select_vag_active(),
					"user" => $this->m_bac->select_by_id($id),
					"page_content" => "pages/bac/v_confirm_add",
					"grand_title" => "دورة 2022",
					"page_title" => "إضافة مترشح",
				);
				$this->load->view("layout/main_layout", $data);
			} else {
				$this->session->set_flashdata('error', ' فشلت عملية الإضافة  ');
				$data = array(
					"vag" => $this->m_bac->select_vag_active(),
					"page_content" => "pages/bac/v_form_add_condidat",
					"grand_title" => "دورة 2022",
					"page_title" => "إضافة مترشح",
				);
				$this->load->view("layout/main_layout", $data);
			}
		}
	}
	public function edite_condidat($condidat_id = null)
	{
		if ($this->form_validation->is_natural_no_zero($condidat_id) === false) {

			redirect('/', 'refresh');
		} else {
			$data = array(
				"vag" => $this->m_bac->select_vag_active(),
				"user" => $this->m_bac->select_by_id($condidat_id),
				"page_content" => "pages/bac/v_update_condidat",
				"grand_title" => "دورة 2022  ",
				"page_title" => " تعديل بيانات مترشح",
			);
			$this->load->view("layout/main_layout", $data);
		}
	}

	public function update_condidat()
	{
		$this->form_validation->set_rules('npr', 'رقم الإستمارة', 'trim|required|numeric|callback_check_npr');
		$this->form_validation->set_rules('id_dossier', 'رقم الملف', 'trim|required|numeric|callback_check_id_dossier');
		$this->form_validation->set_rules('sport', 'تعيين التربية البدنية', 'trim|required');
		$this->form_validation->set_rules('categorie', 'تعيين ذوي الإحتياجات الخاصة', 'trim|required');
		$this->form_validation->set_rules('code_secteur', 'تعيين المقاطعة', 'trim|required');
		$id_condidat = $this->input->post('id');

		if ($this->form_validation->run() === false) {

			$data = array(
				"user" => $this->m_bac->select_by_id($id_condidat),
				"page_content" => "pages/bac/v_update_condidat",
				"grand_title" => "دورة 2022  ",
				"page_title" => " تعديل بيانات مترشح",
			);
			$this->load->view("layout/main_layout", $data);
		} else {

			$nom = $this->session->userdata('nom');
			$prenom = $this->session->userdata('prenom');
			$data = array(
				'npr' => $this->input->post('npr'),
				'id_dossier' => $this->input->post('id_dossier'),
				'sport' => $this->input->post('sport'),
				'categorie' => $this->input->post('categorie'),
				'code_secteur' => $this->input->post('code_secteur'),

				'date_created' => date('Y-m-d H:i:s'),
				'created_by' => $nom . '  ' . $prenom,
				'id_deleted' => 0
			);

			if ($data) {
				$this->m_bac->update_condidat($data, $id_condidat);
				$this->session->set_flashdata('success', 'لقد تم تعديل البيانات  بنجاح');
				$data = array(
					"user" => $this->m_bac->select_by_id($id_condidat),
					"page_content" => "pages/bac/v_confirm_add",
					"grand_title" => "دورة 2022",
					"page_title" => "تعديل بيانات مترشح",
				);
				$this->load->view("layout/main_layout", $data);
			} else {
				$this->session->set_flashdata('error', ' فشلت عملية التعديل  ');
				$data = array(
					"user" => $this->m_bac->select_by_id($id_condidat),
					"page_content" => "pages/bac/v_update_condidat",
					"grand_title" => "دورة 2022  ",
					"page_title" => " تعديل بيانات مترشح",
				);
				$this->load->view("layout/main_layout", $data);
			}
		}
	}
	function remove_condidat($id)
	{

		if ($this->m_bac->remove_condidat($id)) {
			$this->session->set_flashdata('msg', 'لقد تم الحذف بنجاح');
		} else {
			$this->session->set_flashdata('msg', ' فشلت عملية الحذف  ');
		}

		redirect('bac/show_v_form_add_condidat', 'refresh');
	}


	public function check_npr()
	{
		$npr = $this->input->post('npr');

		$res = $this->m_bac->chech_npr($npr);
		if ($res) {
			$this->form_validation->set_message('check_npr', 'من فظلك رقم  الإستمارة  يجب أن تكون قيمة وحيدة');
			return false;
		} else {
			return true;
		}
	}
	public function check_id_dossier()
	{
		$id_dossier = $this->input->post('id_dossier');

		$res = $this->m_bac->chech_id_dossier($id_dossier);
		if ($res) {
			$this->form_validation->set_message('check_id_dossier', 'من فظلك رقم  الملف  يجب أن تكون قيمة وحيدة');
			return false;
		} else {
			return true;
		}
	}

	public function unique_npr()
	{
		$npr = $this->input->post('npr');

		$res = $this->m_bac->unique_npr($npr);
		if ($res) {
			$this->form_validation->set_message('unique_npr', 'من فظلك رقم  الإستمارة  يجب أن تكون قيمة وحيدة');
			return false;
		} else {
			return true;
		}
	}
	public function unique_id_dossier()
	{
		$id_dossier = $this->input->post('id_dossier');

		$res = $this->m_bac->unique_id_dossier($id_dossier);
		if ($res) {
			$this->form_validation->set_message('unique_id_dossier', 'من فظلك رقم  الملف  يجب أن تكون قيمة وحيدة');
			return false;
		} else {
			return true;
		}
	}
	public function show_imp_liste_condidat()
	{
		$data = array(

			"page_content" => "pages/bac/v_imp_liste_condidat",
			"grand_title" => "دورة 2022  ",
			"page_title" => " قائمة المترشحين",
		);
		$this->load->view("layout/main_layout", $data);
	}
	public function show_v_liste_condidat()
	{
		$data = array(

			"page_content" => "pages/bac/v_liste_condidat",
			"grand_title" => "دورة 2022  ",
			"page_title" => " قائمة المترشحين",
		);
		$this->load->view("layout/main_layout", $data);
	}
	function show_liste()
	{
		$icode = $_POST['icode'];
		$id_vag = $_POST['id_vag'];
		$nom_secteur = $_POST['nom_secteur'];
		//$id_vag=111;
		$users = $this->m_bac->get_liste_by_filter_show($icode,$id_vag,$nom_secteur);
		if ($users) {
			$data['select'] = '
								<table class=" table  table-striped text-center table-bordered mydatatable" style="width:100%">
							<thead class="thead table-dark">
								<tr>


									<th>رقم الاستمارة</th>

									<th>رقم الملف</th>
									<th> الاسم و اللقب</th>
									<th> تاريخ الميلاد </th>
									<th> مكان الميلاد </th>
									<th> جنس </th>
									<th> شعبة </th>
									<th> رياضة </th>
									<th> خصوصية </th>
									<th>مقاطعة</th>
									<th>مرحلة</th>
									<th><i class="text-center fa fa-cogs"></i></th>


								</tr>
								 <tr>
                                   
                                    <th class="thSearch"></th>
                                    <th class="thSearch"></th>
                                    <th class="thSearch"></th>
                                    <th class="thSearch"></th>
                                    <th class="thSearch"></th>
                                    <th class="thSearch"></th>
									<th class="thSearch"></th>
									<th class="thSearch"></th>
									<th class="thSearch"></th>
									<th class="thSearch"></th>
									<th class="thSearch"></th>
                                    <th></th>

                                </tr>

							</thead>
							<tbody>	
			
			
			
			';
			foreach ($users as $user) {
				if ($user->PRESUME == 1) {
					$date = date_create($user->DNS);
					$dns_pre = date_format($date, 'Y');
					$dns = 'خلال' . ' ' . $dns_pre;
				} else {
					$dns = $user->DNS;
				}
				if ($user->sport == 1) {
					$sport = 'كفء';
				} else {
					$sport = 'غ/كفء';
				}
				$data['select'] = $data['select'] . '<tr>
										<td>' . $user->npr . ' </td>
										<td> ' . $user->id_dossier . '</td>
										<td>' . $user->NOM . ' ' . $user->PRENOM . '</td>
										<td>' . $dns . ' </td>
										<td>' . $user->LNS . ' </td>
										<td>' . $user->SEXE . ' </td>
										<td>' . $user->ICODE . '
											</td>
										<td>' . $sport . '</td>
										<td>' . $user->cat . ' </td>
										<td>' . $user->nom_secteur . ' </td>
                                        <td>' . $user->id_vag . ' </td>
										<td>
											<div style="display: flex;">
												<a href=" ' . base_url('bac/edite_condidat/' . $user->id) . '"><i class=" fa fa-edit fa-md " style="color:#007bff;margin:3px"></i></a>


												<a class="confirmation" href=" ' . base_url('bac/remove_condidat/' . $user->id) . '"><i class=" fa fa-trash fa-md " style="color:red;margin:3px"></i></a>

											</div>
										</td>

									</tr>';
			}
			$data['select'] = $data['select'] . '</tbody></table>';
		} else {
			$data['select'] = '
								<table class=" table  table-striped text-center table-bordered mydatatable" style="width:100%">
							<thead class="thead table-dark">
								<tr>


									<th>رقم الاستمارة</th>

									<th>رقم الملف</th>
									<th> الاسم و اللقب</th>
									<th> تاريخ الميلاد </th>
									<th> مكان الميلاد </th>
									<th> جنس </th>
									<th> شعبة </th>
									<th> رياضة </th>
									<th> خصوصية </th>
									<th> مقاطعة </th>
									<th><i class="text-center fa fa-cogs"></i></th>


								</tr>
								 <tr>
                                   
                                    <th class="thSearch"></th>
                                    <th class="thSearch"></th>
                                    <th class="thSearch"></th>
                                    <th class="thSearch"></th>
                                    <th class="thSearch"></th>
                                    <th class="thSearch"></th>
									<th class="thSearch"></th>
									<th class="thSearch"></th>
									<th class="thSearch"></th>
									<th class="thSearch"></th>
                                    <th></th>

                                </tr>
							</thead>
							<tbody>	';

			$data['select'] = $data['select'] . '</tbody></table>';
		}

		echo json_encode($data);
	}
	public function show_v_liste_condidat_sport()
	{
		$data = array(

			"page_content" => "pages/bac/v_stat_condidat_sport",
			"grand_title" => "دورة   2022بكالوريا   ",
			"page_title" => " قائمة المترشحين",
		);
		$this->load->view("layout/main_layout", $data);
	}

	/************************************************************ */
	public function show_chapitre()
	{

		$data = array(
			"chapitres" => $this->m_chapitre->get_all_chapitre(),
			"page_content" => "pages/v_chapitres/v_add_chapitre",
			"grand_title" => "الأبواب و المواد",
			"page_title" => "الأبواب",
		);
		$this->load->view("layout/main_layout", $data);
	}

	public function edit_chapitre($id_chapitre = null)
	{

		if ($this->form_validation->is_natural_no_zero($id_chapitre) === false) {
			redirect('C_chapitre_article/show_chapitre');
		} else {

			$data = array(
				"chapitre" => $this->m_chapitre->get_chapitre($id_chapitre),
				"sections" => $this->m_chapitre->get_all_section(),
				"page_content" => "pages/v_chapitres/v_edit_chapitre",
				"grand_title" => "الأبواب و المواد",
				"page_title" => "تعديل الباب",
			);
			$this->load->view("layout/main_layout", $data);
		}
	}

	public function update_chapitre()
	{
		$this->form_validation->set_rules('PKnum_section', 'الفصل', 'trim|required');
		$this->form_validation->set_rules('PKnum_chapitre', 'الباب', 'trim|required|is_double_exist[chapitre,pknum_chapitre]');
		$this->form_validation->set_rules('libelle_chapitre', 'تعيين الباب', 'trim|required');

		if ($this->form_validation->run() === false) {

			$data = array(
				"chapitre" => $this->m_chapitre->get_chapitre($this->input->post('id_chapitre')),
				"sections" => $this->m_chapitre->get_all_section(),
				"page_content" => "pages/v_chapitres/v_edit_chapitre",
				"grand_title" => "الأبواب و المواد",
				"page_title" => "تعديل الباب",
			);
			$this->load->view("layout/main_layout", $data);
		} else {
			$data = array(
				'fknum_section' => $this->input->post('PKnum_section'),
				'pknum_chapitre' => $this->input->post('PKnum_chapitre'),
				'libelle_chapitre' => $this->input->post('libelle_chapitre'),
				'id_chapitre' => $this->input->post('id_chapitre'),
			);

			if ($this->m_chapitre->update_chapitre($data)) {
				$this->session->set_flashdata('msg', 'لقد تم التعدبل بنجاح');
				$data = array(
					"chapitres" => $this->m_chapitre->get_all_chapitre(),
					"page_content" => "pages/v_chapitres/v_add_chapitre",
					"grand_title" => "الأبواب و المواد",
					"page_title" => "الأبواب",
				);
				$this->load->view("layout/main_layout", $data);
			} else {
			}
		}
	}
	public function form_add_chapitre()
	{
		$data = array(
			"sections" => $this->m_chapitre->get_all_section(),
			"page_content" => "pages/v_chapitres/v_form_add_chapitre",
			"grand_title" => "الأبواب و المواد",
			"page_title" => "إضافة باب",
		);
		$this->load->view("layout/main_layout", $data);
	}
	public function add_chapitre()
	{
		$this->form_validation->set_rules('PKnum_section', 'الفصل', 'trim|required');
		$this->form_validation->set_rules('PKnum_chapitre', 'الباب', 'trim|required|is_unique[chapitre.pknum_chapitre]');
		$this->form_validation->set_rules('libelle_chapitre', 'تعيين الباب', 'trim|required');

		if ($this->form_validation->run() === false) {

			$data = array(

				"sections" => $this->m_chapitre->get_all_section(),
				"page_content" => "pages/v_chapitres/v_form_add_chapitre",
				"grand_title" => "الأبواب و المواد",
				"page_title" => "إضافة الباب",
			);
			$this->load->view("layout/main_layout", $data);
		} else {
			$data = array(
				'fknum_section' => $this->input->post('PKnum_section'),
				'pknum_chapitre' => $this->input->post('PKnum_chapitre'),
				'libelle_chapitre' => $this->input->post('libelle_chapitre')
			);

			if ($this->m_chapitre->add_chapitre($data)) {
				$this->session->set_flashdata('msg', 'لقد تمت الإضافة بنجاح');
				$data = array(
					"chapitres" => $this->m_chapitre->get_all_chapitre(),
					"page_content" => "pages/v_chapitres/v_add_chapitre",
					"grand_title" => "الأبواب و المواد",
					"page_title" => "الأبواب",
				);
				$this->load->view("layout/main_layout", $data);
			} else {
				$this->session->set_flashdata('msg', ' فشلت عملية الإضافة  ');
				$data = array(
					"chapitres" => $this->m_chapitre->get_all_chapitre(),
					"page_content" => "pages/v_chapitres/v_add_chapitre",
					"grand_title" => "الأبواب و المواد",
					"page_title" => "الأبواب",
				);
				$this->load->view("layout/main_layout", $data);
			}
		}
	}
	public function remove_chapitre($id_chapitre = null)
	{

		if ($this->m_chapitre->remove_chapitre($id_chapitre)) {
			$this->session->set_flashdata('msg', 'لقد تم الحذف بنجاح');
			$data = array(
				"chapitres" => $this->m_chapitre->get_all_chapitre(),
				"page_content" => "pages/v_chapitres/v_add_chapitre",
				"grand_title" => "الأبواب و المواد",
				"page_title" => "الأبواب",
			);
			$this->load->view("layout/main_layout", $data);
		} else {
			$this->session->set_flashdata('msg', ' فشلت عملية الحذف  ');
			$data = array(
				"chapitres" => $this->m_chapitre->get_all_chapitre(),
				"page_content" => "pages/v_chapitres/v_add_chapitre",
				"grand_title" => "الأبواب و المواد",
				"page_title" => "الأبواب",
			);
			$this->load->view("layout/main_layout", $data);
		}
	}

	public function getchapitre_ajax()
	{
		$num_section = $this->input->post('num_section');
		$allchapitres = $this->m_chapitre->getchapitre_ajax($num_section);
		header('Content-Type: application/json', true);
		echo json_encode($allchapitres);
	}
	public function get_article_ajax()
	{
		$num_chapitre = $this->input->post('num_chapitre');
		$allarticles = $this->m_chapitre->get_article_ajax($num_chapitre);
		header('Content-Type: application/json', true);
		echo json_encode($allarticles);
	}
	//************** ARTICLES ******************/
	public function show_article()
	{

		$data = array(
			"articles" => $this->m_chapitre->get_all_article(),
			"page_content" => "pages/v_articles/v_add_article",
			"grand_title" => "الأبواب و المواد",
			"page_title" => "المواد",
		);
		$this->load->view("layout/main_layout", $data);
	}

	public function edit_article($id_article = null)
	{

		if ($this->form_validation->is_natural_no_zero($id_article) === false) {
			redirect('C_article_article/show_article');
		} else {

			$data = array(
				"article" => $this->m_chapitre->get_article($id_article),
				"sections" => $this->m_chapitre->get_all_section(),
				"page_content" => "pages/v_articles/v_edit_article",
				"grand_title" => "الأبواب و المواد",
				"page_title" => "تعديل المواد",
			);
			$this->load->view("layout/main_layout", $data);
		}
	}

	public function update_article()
	{
		$this->form_validation->set_rules('PKnum_chapitre', 'الفصل', 'trim|required');
		$this->form_validation->set_rules('num_article', 'المادة', 'trim|required|check_update_article');
		$this->form_validation->set_rules('libelle_article', 'تعيين المادة', 'trim|required');
		$this->form_validation->set_rules('paragraphe_article', 'تعيين الفقرة', 'trim');

		if ($this->form_validation->run() === false) {

			$data = array(
				"article" => $this->m_chapitre->get_article($this->input->post('id_article')),
				"sections" => $this->m_chapitre->get_all_section(),
				"page_content" => "pages/v_articles/v_edit_article",
				"grand_title" => "الأبواب و المواد",
				"page_title" => "تعديل المواد",
			);
			$this->load->view("layout/main_layout", $data);
		} else {
			$data = array(
				'fknum_chapitre' => $this->input->post('PKnum_chapitre'),
				'num_article' => $this->input->post('num_article'),
				'libelle_article' => $this->input->post('libelle_article'),
				'paragraphe' => $this->input->post('paragraphe_article'),
				'id_article' => $this->input->post('id_article'),
			);

			if ($this->m_chapitre->update_article($data)) {
				$this->session->set_flashdata('msg', 'لقد تم التعدبل بنجاح');
				$data = array(
					"articles" => $this->m_chapitre->get_all_article(),
					"page_content" => "pages/v_articles/v_add_article",
					"grand_title" => "الأبواب و المواد",
					"page_title" => "المواد",
				);
				$this->load->view("layout/main_layout", $data);
			} else {
			}
		}
	}
	public function form_add_article()
	{
		$data = array(
			"sections" => $this->m_chapitre->get_all_section(),
			"page_content" => "pages/v_articles/v_form_add_article",
			"grand_title" => "الأبواب و المواد",
			"page_title" => "إضافة مادة",
		);
		$this->load->view("layout/main_layout", $data);
	}
	public function add_article()
	{
		$this->form_validation->set_rules('PKnum_chapitre', 'الفصل', 'trim|required');
		$this->form_validation->set_rules('num_article', 'المادة', 'trim|required|callback_check_article');
		$this->form_validation->set_rules('libelle_article', 'تعيين المادة', 'trim|required');
		$this->form_validation->set_rules('paragraphe_article', 'تعيين الفقرة', 'trim');

		if ($this->form_validation->run() === false) {

			$data = array(

				"sections" => $this->m_chapitre->get_all_section(),
				"page_content" => "pages/v_articles/v_form_add_article",
				"grand_title" => "الأبواب و المواد",
				"page_title" => "إضافة مادة",
			);
			$this->load->view("layout/main_layout", $data);
		} else {
			$data = array(
				'fknum_chapitre' => $this->input->post('PKnum_chapitre'),
				'num_article' => $this->input->post('num_article'),
				'libelle_article' => $this->input->post('libelle_article'),
				'paragraphe' => $this->input->post('paragraphe_article')
			);

			if ($this->m_chapitre->add_article($data)) {
				$this->session->set_flashdata('msg', 'لقد تمت الإضافة بنجاح');
				$data = array(
					"articles" => $this->m_chapitre->get_all_article(),
					"page_content" => "pages/v_articles/v_add_article",
					"grand_title" => "الأبواب و المواد",
					"page_title" => "المواد",
				);
				$this->load->view("layout/main_layout", $data);
			} else {
				$this->session->set_flashdata('msg', ' فشلت عملية الإضافة  ');
				$data = array(
					"articles" => $this->m_chapitre->get_all_article(),
					"page_content" => "pages/v_articles/v_add_article",
					"grand_title" => "الأبواب و المواد",
					"page_title" => "المواد",
				);
				$this->load->view("layout/main_layout", $data);
			}
		}
	}
	public function remove_article($id_article = null)
	{

		if ($this->m_chapitre->remove_article($id_article)) {
			$this->session->set_flashdata('msg', 'لقد تم الحذف بنجاح');
			$data = array(
				"articles" => $this->m_chapitre->get_all_article(),
				"page_content" => "pages/v_articles/v_add_article",
				"grand_title" => "الأبواب و المواد",
				"page_title" => "المواد",
			);
			$this->load->view("layout/main_layout", $data);
		} else {
			$this->session->set_flashdata('msg', ' فشلت عملية الحذف  ');
			$data = array(
				"articles" => $this->m_chapitre->get_all_article(),
				"page_content" => "pages/v_articles/v_add_article",
				"grand_title" => "الأبواب و المواد",
				"page_title" => "المواد",
			);
			$this->load->view("layout/main_layout", $data);
		}
	}

	/***************************************** */

	public function check_article()
	{
		$chapitre = $this->input->post('PKnum_chapitre'); //
		$article = $this->input->post('num_article'); //
		$res = $this->m_chapitre->chech_article($article, $chapitre);
		if ($res) {
			$this->form_validation->set_message('check_article', 'من فظلك رقم المادة و الفصل يجب أن تكون قيمة وحيدة');
			return false;
		} else {
			return true;
		}
	}
	public function check_update_article()
	{
		$chapitre = $this->input->post('PKnum_chapitre'); //
		$article = $this->input->post('num_article'); //
		$res = $this->m_chapitre->check_update_article($article, $chapitre);
		if ($res) {
			$this->form_validation->set_message('check_article', 'من فظلك رقم المادة و الفصل يجب أن لا تكون  أكثر من قيمة ');
			return false;
		} else {
			return true;
		}
	}
}
