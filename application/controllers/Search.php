<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends HomeBase {


	public function index()
	{
		$keyword = $this->input->get('q');

		$this->session->set_userdata(array('keyword'=>$keyword));

		redirect('Search/find');
	}	

	public function find(){

		$keyword=$this->session->keyword;
		// echo $keyword;
		$this->load->model('Article_model');

		

		$offset = $this->uri->segment(3,0);
		$limit=2;
		$total = $this->Article_model->like_count($keyword);
		$url = site_url('Search/find/');

		$page = MYpage($url,$total,$limit,3,2);

		$article = $this->Article_model->like($keyword,$limit,$offset);
		// pre($keyword);

		$data=[
			'article'=>$article,
			'total'=>$total,
			'keyword'=>$keyword,
			'page'=>$page
		];


		$this->load->view('home/search',$data);
	}

}