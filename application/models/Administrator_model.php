<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class administrator_model extends CI_Model
{
    private $table_user = 'user'; // user
    private $table_centre_cwefd = 'centre_cwefd'; // centre_cwefd
    private $table_users_perms = 'users_perms';

    public function __construct()
    {

    }

    public function validate($username, $password)
    {
       // $base_helper = $this->load->database('default', true);
		       $base_helper = $this->load->database('default', true);
		 $base_helper   -> select ('*');
					        $base_helper   -> where ('username' , $username);
										 $base_helper   ->where('password' ,$password);
													   
							
						return	$user= $base_helper   -> get($this->table_user)->first_row();
    }

    private function _getUser($username)
    {
        $base_helper = $this->load->database('default', true);
        $user = $base_helper->select(array('username', 'password'))->get_where($this->table_user, array('username' => $username))->row();
        if (isset($user->password)) {
            return $user->password;
        }

        return false;
    }

    public function get_user($id_user)
    {

        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('user ');
        $this->db->where('id', $id_user);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row;
        } else {
            return false;
        }
        $query->free_result();
    }
    public function get_user_By_id()
    {
        $id = isset($id) ? $id : $this->session->userdata('user_id');
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('user ');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row;
        } else {
            return false;
        }
        $query->free_result();
    }
    public function is_admin($admin)
    {
        $base_helper = $this->load->database('default', true);
        $id = isset($id) ? $id : $this->session->userdata('user_id');
        $user = $base_helper->select(array('username', 'group', 'password'))->get_where($this->table_user, array('id' => $id))->row();
        if (isset($user->group)) {
            if ($user->group == $admin) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function is_admin_master($admin_master)
    {
        $base_helper = $this->load->database('default', true);
        $id = isset($id) ? $id : $this->session->userdata('user_id');
        $user = $base_helper->select(array('username', 'group'))->get_where($this->table_user, array('id' => $id))->row();
        if (isset($user->group)) {
            if ($user->group == $admin_master) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function get_cwefdBy_ID_user()
    {

        $base_helper = $this->load->database('default', true);
        $id = isset($id) ? $id : $this->session->userdata('user_id');
        $base_helper->select('*'); // <-- There is never any reason to write this line!
        $base_helper->from('user ');
        $base_helper->where('id', $id);

        $base_helper->join('centre_cwefd', 'user.n_cwefd = centre_cwefd.CODE_CWEFD');
        $query = $base_helper->get();
        if ($query->num_rows() > 0) {
            $row = $query->first_row();
            return $row;
        } else {
            return false;
        }
        $query->free_result();
    }
    public function get_Max_Id_Use_by_N_Cwefd()
    {
        $base_helper = $this->load->database('default', true);
        $n_cwefd = isset($n_cwefd) ? $n_cwefd : $this->session->userdata('n_cwefd');
        $base_helper->select('id_user_cwefd');
        $base_helper->where('n_cwefd', $n_cwefd);
        $base_helper->order_by('id_user_cwefd', 'DESC');
        $base_helper->limit(1);
        $query = $base_helper->get($this->table_user);
        if ($query->num_rows() > 0) {
            $result = $query->row();

            $max = $result->id_user_cwefd;
            $id_max = $max + 1;
            return $id_max;

        } else {
            return 0;
        }
        $query->free_result();
    }
    public function get_All_Users__by_N_Cwefd()
    {
        $base_helper = $this->load->database('default', true);
        $n_cwefd = isset($n_cwefd) ? $n_cwefd : $this->session->userdata('n_cwefd');
        $base_helper->select('*');
        $base_helper->where('n_cwefd', $n_cwefd);
        //  $base_helper->where('group', $member);
        $base_helper->order_by('username', 'ASC');
        $query = $base_helper->get($this->table_user);
        $nbr = $query->num_rows();
        if ($nbr > 0) {
            $users = $query->result();
            return $data = array(
                'res' => $users,
                'nbr' => $nbr,
            );

        } else {
            return false;
        }
        $query->free_result();
    }

    public function get_Count_Users__by_N_Cwefd()
    {
        $base_helper = $this->load->database('default', true);
        $n_cwefd = isset($n_cwefd) ? $n_cwefd : $this->session->userdata('n_cwefd');
        $base_helper->select('*');
        $base_helper->where('n_cwefd', $n_cwefd);
        //$base_helper->where('group', $member);
        $base_helper->order_by('username', 'ASC');
        return $base_helper->count_all_results($this->table_user);
        $query->free_result();
    }

    public function add_user($data)
    {
        $res = $this->db->insert('user', $data);
        if ($res) {
            return true;
        } else {
            return false;
        }

    }
    public function remove_user($id_user = null)
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->where('n_cwefd', $num_cwefd);
        $this->db->where('id', $id_user);
        $res = $this->db->delete('user');
        return $res;
    }
    public function update_user($data, $id_user)
    {
        $this->db->where('id', $id_user);
        $update = $this->db->update('user', $data);
        return ($update == true) ? true : false;
    }

    public function add_to_group($group_permissions, $n_cwefd, $id_user_cwefd)
    {
        $base_helper = $this->load->database('default', true);
        if (!is_array($group_permissions)) {
            $group_permissions = array($group_permissions);
        }

        $return = 0;

        // Then insert each into the database
        foreach ($group_permissions as $group_per) {
            if ($base_helper->insert($this->table_users_perms, array('n_cwefd' => $n_cwefd,
                'id_user_cwefd ' => $id_user_cwefd,
                'id_perms' => $group_per))) {

                $return += 1;
            }
        }

        return $return;
    }

    public function remove_froum_group($n_cwefd, $id_user_cwefd)
    {
        $base_helper = $this->load->database('default', true);
        $base_helper->where('n_cwefd', $n_cwefd);
        $base_helper->where('id_user_cwefd', $id_user_cwefd);
        $base_helper->delete($this->table_users_perms);

    }

    public function get_All_Permissions_By_Id_User($n_cwefd, $id_user_cwefd)
    {
        $base_helper = $this->load->database('default', true);
        if ($n_cwefd != null && $id_user_cwefd !== null) {
            $base_helper->select('id_perms');
            $base_helper->where('n_cwefd', $n_cwefd);
            $base_helper->where('id_user_cwefd', $id_user_cwefd);
            $query = $base_helper->get($this->table_users_perms);
            if ($query->num_rows() > 0) {
                $permissions = $query->result_array();
                return $permissions;

            } else {
                return false;
            }
        } else {
            return false;
        }
        $query->free_result();
    }
    public function _All_Permissions_By_Id_User()
    {
        $base_helper = $this->load->database('default', true);
        $n_cwefd = isset($n_cwefd) ? $n_cwefd : $this->session->userdata('n_cwefd');
        $id_user_cwefd = isset($id_user_cwefd) ? $id_user_cwefd : $this->session->userdata('id_user_cwefd');
        if ($n_cwefd != null && $id_user_cwefd !== null) {
            $base_helper->select('id_perms');
            $base_helper->where('n_cwefd', $n_cwefd);
            $base_helper->where('id_user_cwefd', $id_user_cwefd);
            $query = $base_helper->get($this->table_users_perms);
            if ($query->num_rows() > 0) {
                $permissions = $query->result_array();
                return $permissions;

            } else {
                return false;
            }
        } else {
            return false;
        }
        $query->free_result();
    }
    public function _All_Niv_By_Id_User()
    {
        $base_helper = $this->load->database('default', true);
        $n_cwefd = isset($n_cwefd) ? $n_cwefd : $this->session->userdata('n_cwefd');
        $id_user_cwefd = isset($id_user_cwefd) ? $id_user_cwefd : $this->session->userdata('id_user_cwefd');
        if ($n_cwefd != null && $id_user_cwefd !== null) {
            $base_helper->select('id_perms');
            $base_helper->from('users_perms ');
            $base_helper->where(array('n_cwefd' => $n_cwefd, 'id_user_cwefd' => $id_user_cwefd, 'id_perms >' => 4));
            $base_helper->order_by('order', 'ASC');
            $base_helper->join('group_perms', 'users_perms.id_perms = group_perms.id_group');
            $query = $base_helper->get();
            if ($query->num_rows() > 0) {
                $permissions = $query->result_array();
                return $permissions;

            } else {
                return false;
            }
        } else {
            return false;
        }
        $query->free_result();
    }

    public function update_status_All_Users($status, $status_count, $users)
    {
        $base_helper = $this->load->database('default', true);
        $retern = false;
        $member = 'member';

        foreach ($users as $user) {

            $base_helper->where('username', $user->username);
            $base_helper->set('status', '0', false);
            $base_helper->update($this->table_user);

            $retern = true;
        }
        if ($status_count > 0) {
            if (!is_array($status)) {
                $status = array($status);
            }
            foreach ($status as $stat) {

                $base_helper->where('username', $stat);
                $base_helper->set('status', '1', false);
                $base_helper->update($this->table_user);

                $retern = true;
            }
        }
        return $retern;

    }
}