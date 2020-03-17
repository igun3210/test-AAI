<?php defined('BASEPATH') OR exit('No direct script access allowed');

class customer_feedback_model extends CI_Model {

	protected $restuser_id = '';
	protected $restogroup_id = '';
	protected $restogroup_suffix = '';

    protected $table_voucher;
    protected $table_branch;
    
    function __construct() {
        parent::__construct();

        $this->table_st = 'tm_store';
        $this->table_cs = 'tm_customer_feeback';
    }

    public function get_store_detail($store_code='DEF') {
    	$this->db->from($this->table_st);
		$this->db->where("store_code", $store_code);
		$this->db->where("store_deleted", 0);
		
		$query = $this->db->get();

		if ($query) {
			if ($query->num_rows() > 0) return $query->row_array();
			return FALSE;
		} else {
			return FALSE;	
		}
	}

    public function add_customer_feeback($data=array()) {
  //   	echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit();

		$query = $this->db->insert($this->table_cs, $data);
		// var_dump($query);exit();
		if (!$query) {
			return FALSE;
		}
	}
}