<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends HomeBase {


	public function index()
	{
		
		$this->load->view('home/about');
	}

}