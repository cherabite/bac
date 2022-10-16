<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MY_Form_validation extends CI_Form_validation
{

    protected $CI;

    public function __construct($rules = array())
    {
        parent::__construct($rules);
        $this->CI = &get_instance();
    }

/**
 * is_unique_multiple
 * check multiple unique field at time
 * handy when checking if two or more column of some set of value
 * e.g if firstname="something" and username="something"
 * usage:
 *  is_unique_multiple[
 *  table_name,
 *  column_name1.column_name2.column_name3,
 *  post_filed_name1.post_field_name2.post_field_name3
 *   ]
 *real example
 *  $this->form_validation->set_rules('fee_name', 'fee_name', "required|is_unique_multiple[table(arasoft_fee), column(fee_name).column(fee_term).column(fee_users), $this->post->fee_name.$this->post->term.$this->post->fee_users ]");
 **/
    public function is_unique_multiple($str, $data)
    {
        $data = explode(",", $data);
        if (count($data) < 2) {
            return true;
        }

        $table = @$data[0];
        $str = @$data[1];
        $str = explode(".", $str);
        $field = @$data[2];
        //var_dump($table,$str,$field);exit();
        $field = empty($field) ? $str : explode(".", $field);
        if (count($str) != count($field)) {
            return true;
        }
        $where = [];

        foreach ($str as $key => $value) {
            # code...
            $q = $this->CI->input->post($field[$key]);
            $where[$value] = $q;
        }

        $check = $this->CI->db->get_where($table, $where, 1);

        if ($check->num_rows() > 0) {

            $this->set_message('is_unique_multiple', 'This data exist already');

            return false;
        }

        return true;
    }
    public function is_double_exist($str, $field)
    {
        list($table, $column) = explode(',', $field, 2);

        $this->CI->form_validation->set_message('is_double_exist', ' %s قيمة  موجودة أكثر من مرة.');

        $query = $this->CI->db->query("SELECT COUNT(*) AS dupe FROM {$this->CI->db->dbprefix($table)} WHERE {$column} = '{$str}'");
        $row = $query->row();

        return ($row->dupe > 1) ? false : true;
    }
}
