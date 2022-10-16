<?php defined('BASEPATH') or exit('No direct script access allowed');
define('STATUS_ACTIVATED', '1');
define('STATUS_NOT_ACTIVATED', '0');
class Auth_onefd
{
    private $error = array();
    private $_cookie = array(
        // 'name'   => '',
        // 'value'  => '',
        'expire' => '86500',
        // 'domain' => '.some-domain.com',
        'path' => '/',
        // 'prefix' => '',
    );

    private $_cookie_id_name = "189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD"; // nom d'un cookie
    private $_cookie_id_password = "1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS"; // nom d'un cookie

    public function __construct()
    {

        $this->ci = &get_instance();
        $this->ci->config->load('onefd_auth', true);
        $this->ci->load->library('session');
        $this->ci->load->database();
        $this->ci->load->helper('cookie');

        $this->ci->load->model('administrator_model');
        $this->ci->lang->load('onefd_auth_lang', 'arabic');
        $this->autologin();
    }

    public function connect($identifiant, $password, $remember)
    {
        if ((strlen($identifiant) > 0) and (strlen($password) > 0)) {
            $user = $this->ci->administrator_model->validate($identifiant, $password);
			//echo $user->password;exit;
            if ($user) {
                /* $this->ci->session->set_userdata(array(
                'user_id'    => $user->id,
                'n_cwefd'    => $user->n_cwefd,
                'identifiant'    => $user->username,
                'status'    => ($user->status == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED));*/
                if ($user->status == 0) { // fail - not activated
                    $this->error = array('not_activated' => $this->ci->lang->line('deactivate_successful'));
                    return false;
                } elseif ($user->status == 1) {
                    $this->ci->session->set_userdata(array(
                        'user_id' => $user->id,
                        'n_cwefd' => $user->n_cwefd,
                        'id_user_cwefd' => $user->id_user_cwefd,
                        'identifiant' => $user->username,
                        'status' => ($user->status == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED));
                    return true;
                } else { // success
                    if ($remember) {
                        //$this->create_autologin($user->id);
                        $cookies_identifiant = $this->_cookie;
                        $cookies_identifiant['name'] = $this->_cookie_id_name;
                        $cookies_identifiant['value'] = $identifiant;

                        $cookies_identifiant['prefix'] = $this->ci->config->item('cookie_prefix');
                        set_cookie($cookies_identifiant);

                        $cookies_password = $this->_cookie;
                        $cookies_password['name'] = $this->_cookie_id_password;
                        $cookies_password['value'] = $password;

                        $cookies_password['prefix'] = $this->ci->config->item('cookie_prefix');
                        set_cookie($cookies_password);
                        $this->ci->session->set_userdata(array('nom' => $user->nom,
							'prenom' => $user->prenom,
                            'user_id' => $user->id,
                            'n_cwefd' => $user->n_cwefd,
                            'id_user_cwefd' => $user->id_user_cwefd,
                            'identifiant' => $user->username,
                            'status' => ($user->status == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED));

                    }
                    return true;
                }
                return true;
            } else {
                $this->error = array('login_false' => $this->ci->lang->line('login_unsuccessful'));
                return false;
            }
        } else {
            return false;
        }

    }
    public function logout()
    {
        //$this->delete_autologin();

        $this->ci->session->sess_destroy();
        delete_cookie($this->ci->config->item('cookie_prefix') . $this->_cookie_id_name);
        delete_cookie($this->ci->config->item('cookie_prefix') . $this->_cookie_id_password);

    }
    public function get_n_cwefd()
    {
        if ($this->ci->session->userdata('n_cwefd')) {
            $n_cwefd = $this->ci->session->userdata('n_cwefd');
            return $n_cwefd;
        } else {
            return null;
        }

    }
    public function get_error_message()
    {
        return $this->error;
    }
    public function logged_in()
    {
        if ($this->ci->session->userdata('identifiant')) {
            return true;
        } else {
            return false;
        }

    }
    public function is_logged_in($activated = true)
    {
        return $this->ci->session->userdata('status') === ($activated ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED);
    }
    public function autologin()
    {
        if (!$this->logged_in()) { // not logged in (as any user) or $this->is_logged_in(FALSE)

            $this->ci->load->helper('cookie');
            if (get_cookie($this->ci->config->item('cookie_prefix') . $this->_cookie_id_name, true) &&
                get_cookie($this->ci->config->item('cookie_prefix') . $this->_cookie_id_password, true)) {
                $username = get_cookie($this->ci->config->item('cookie_prefix') . $this->_cookie_id_name);
                $password = get_cookie($this->ci->config->item('cookie_prefix') . $this->_cookie_id_password);
                $user = $this->ci->administrator_model->validate($username, $password);
                if ($user == false) {
                    return false;
                } else {
                    $this->ci->session->set_userdata(array(
                        'user_id' => $user->id,
                        'n_cwefd' => $user->n_cwefd,
                        'id_user_cwefd' => $user->id_user_cwefd,
                        'identifiant' => $user->username,
                        'status' => ($user->status == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED));
                    return true;
                }
            }
        }
        return false;
    }

    public function get_cwefdBy_ID_user()
    {
        $user = $this->ci->administrator_model->get_cwefdBy_ID_user();
        if ($user !== false) {
            return $user;
        } else {
            return false;
        }
    }

    public function get_All_Users()
    {
        return $this->ci->administrator_model->get_All_Users__by_N_Cwefd();
    }
    public function get_Count_All_Users()
    {
        return $this->ci->administrator_model->get_Count_Users__by_N_Cwefd();
    }

}
