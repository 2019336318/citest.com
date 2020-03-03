<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Category_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		//查询所有
		public function allCate(){
			return $this->db
						->get('category')
						->result_array();
		}


		//查询二级导航
		public function subCate(){
			return $this->db
						->where('pid > ',0)
						->get('category')
						->result_array();
		}


	}