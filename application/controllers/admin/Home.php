<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AdminBase {


	public function index()
	{

		$this->load->view('admin/index');
	}

}