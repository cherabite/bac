<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_users extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth_onefd');
    }

    public function index()
    {

        $res = $this->auth_onefd->get_All_Users();
        $data = array(
            "users" => $res['res'],
            "nbr_users" => $res['nbr'],
            "page_content" => "pages/users/v_list_users",
            "grand_title" => "تحديد صلاحيات المستخدمين",
            "page_title" => "قائمة المستعملين",
        );
        $this->load->view("layout/main_layout", $data);

    }

    public function create_user()
    {
        if ($_POST) {
            $this->form_validation->set_rules('nom', 'اللقب', 'trim|required|min_length[3]|max_length[30]');
            $this->form_validation->set_rules('prenom', 'الإسم', 'trim|required|min_length[3]|max_length[30]');
            $this->form_validation->set_rules('username', 'إسم المستخدم', 'trim|required|min_length[3]|max_length[30]|is_unique[user.username]');
            $this->form_validation->set_rules('password', 'كلمة المرور', 'trim|required|min_length[3]|max_length[30]');
            $this->form_validation->set_rules('dns', 'تاريخ الميلاد', 'trim|required');
            $this->form_validation->set_rules('fonction', 'الوظيفة', 'trim|required');
            // $this->form_validation->set_rules('statut', 'التفعيل', 'trim|required|is_natural|exact_length[4]');

            if ($this->form_validation->run() === false) {
                $data = array(
                    "validation_errors" => validation_errors(),
                    "page_content" => "pages/users/v_create_user",
                    "grand_title" => "تحديد صلاحيات المستخدمين",
                    "page_title" => " مستعمل جديد",
                );
                $this->load->view("layout/main_layout", $data);
            } else {
                $permission = serialize($this->input->post('permission'));
                //$perms_count = count($this->input  ->post('permission'));
                $active = $this->input->post('status');
                if ((int) $active == 1) {
                    $status = 1;
                } else {
                    $status = 0;
                }
                $data = array(
                    'permission' => $permission,
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'fonction' => $this->input->post('fonction'),
                    'dns' => $this->input->post('dns'),
                    'status' => $status,
                    'group' => '',
                    'n_cwefd' => $this->auth_onefd->get_n_cwefd(),
                );
                if ($this->administrator_model->add_user($data)) {
                    $this->session->set_flashdata('msg', get_flashdata('لقد تمت الإضافة بنجاح', 's'));

                    redirect('c_users', 'refresh');

                } else {
                    $this->session->set_flashdata('msg', get_flashdata(' فشلت عملية الإضافة ', 'd'));

                    redirect('c_users', 'refresh');

                }
            }
        } else {
            $data = array(

                "page_content" => "pages/users/v_create_user",
                "grand_title" => "تحديد صلاحيات المستخدمين",
                "page_title" => "قائمة المستعملين",
            );
            $this->load->view("layout/main_layout", $data);
        }
    }
    public function edite_user($user_id = null)
    {
        if ($this->form_validation->is_natural_no_zero($user_id) === false) {

            redirect('/', 'refresh');

        } else {
            $data = array(
                "user" => $this->administrator_model->get_user($user_id),
                "page_content" => "pages/users/v_update_user",
                "grand_title" => "تحديد صلاحيات المستخدمين",
                "page_title" => " تعديل بيانات مستعمل",
            );
            $this->load->view("layout/main_layout", $data);
        }
    }

    public function update_user()
    {
        $this->form_validation->set_rules('nom', 'اللقب', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('prenom', 'الإسم', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('username', 'إسم المستخدم', 'trim|required|min_length[3]|max_length[30]|is_double_exist[user,username]');
        $this->form_validation->set_rules('password', 'كلمة المرور', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('dns', 'تاريخ الميلاد', 'trim|required');
        $this->form_validation->set_rules('fonction', 'الوظيفة', 'trim|required');

        if ($this->form_validation->run() === false) {
            $user_id = $this->input->post('user_id');
            $permission = serialize($this->input->post('permission'));
            $data = array(
                "permission" => $permission,
                "user_id" => $user_id,
                "validation_errors" => validation_errors(),
                "page_content" => "pages/users/v_update_user",
                "grand_title" => "تحديد صلاحيات المستخدمين",
                "page_title" => " تعديل بيانات مستعمل",
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $permission = serialize($this->input->post('permission'));
            //$perms_count = count($this->input  ->post('permission'));
            $active = $this->input->post('status');
            if ((int) $active == 1) {
                $status = 1;
            } else {
                $status = 0;
            }
            $data = array(
                'permission' => $permission,
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'dns' => $this->input->post('dns'),
                'fonction' => $this->input->post('fonction'),
                'status' => $status,
                'group' => '',
                'n_cwefd' => $this->auth_onefd->get_n_cwefd(),
            );
            if ($this->administrator_model->update_user($data, $this->input->post('user_id'))) {
                $this->session->set_flashdata('msg', get_flashdata('لقد تمت التعديل بنجاح', 's'));

                redirect('c_users', 'refresh');

            } else {
                $this->session->set_flashdata('msg', get_flashdata(' فشلت عملية التعديل ', 'd'));

                redirect('c_users', 'refresh');

            }
        }
    }

    public function get_data_user($user)
    {
        if ($user !== null) {
            return $data = array(
                'id' => $user->id,
                'nom' => $user->nom,
                'prenom' => $user->prenom,
                'username' => $user->username,
                'password' => $this->encrypt->decode($user->password),
                'jour' => substr($user->dns, 8, 2),
                'mois' => substr($user->dns, 5, 2),
                'annee' => substr($user->dns, 0, 4),
                'status' => $user->status,
                'n_cwefd' => substr($user->username, 7, 2),
                'id_user_cwefd' => substr($user->username, 4, 2),
                'group_perms' => $this->auth_onefd->get_All_Permissions_By_Id_User($user->n_cwefd, $user->id_user_cwefd));
        } else {
            return null;
        }

    }
    public function update_status_All_Users()
    {
        $users = $this->auth_onefd->get_All_Users();
        $status = $this->input->post('status');
        $status_count = count($this->input->post('status'));
        $data['resultat'] = $this->auth_onefd->update_status_All_Users($status, $status_count, $users);
        $data['message'] = $this->lang->line('save_successful');
        $data['users'] = $this->auth_onefd->get_All_Users();

        $this->load->view('templates/menu_header_view');
        $this->load->view('admin/users/list_users_view', $data);
        $this->load->view('templates/footer_view');

    }

    public function remove_user($id_user = null)
    {
        if ($this->administrator_model->remove_user($id_user)) {
            $this->session->set_flashdata('msg', 'لقد تم الحذف بنجاح');
        } else {
            $this->session->set_flashdata('msg', ' فشلت عملية الحذف  ');
        }

        redirect('C_users', 'refresh');

    }
}
