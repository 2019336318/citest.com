<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends HomeBase
{


	public function index()
	{
		// 查询文章
		// $query = $this->db->query("SELECT * FROM pre_article ");
		// $article = $query->result_array();

		// 查询二级
		$cid = $this->uri->segment(3, 1);
		$sub_cid = $this->uri->segment(4, 0);
		$sub_nav = $this->db->where('pid', $cid)
			->get('category')
			->result_array();

		// var_dump($sub_nav);

		foreach ($sub_nav as $v) {
			$sub_cids[] = $v['cid'];
		}

		// $this->load->library('pagination');

		// $config['base_url'] = 'http://citest.com/index.php/Home/index/'.$cid.'/'.$sub_cid.'';
		// $config['base_url'] = 'http://citest.com/index.php/test/page/';
		// $config['total_rows'] = 200;
		// $config['per_page'] = 20;

		// $this->pagination->initialize($config);


		$offset = $this->uri->segment(5, 0);
		$limit = 4;

		// echo $this->pagination->create_links();
		// 全部文章de查询
		if ($sub_cid == 0) {
			$article = $this->db->select('a_img,aid,title,pubtime')
				->where_in('cid', $sub_cids)->limit($limit,$offset)
				->get('article')
				->result_array();
			$total = $this->db->where_in('cid', $sub_cids)->count_all_results('article');
		} else {
			$article = $this->db->select('a_img,aid,title,pubtime')
				->where([
					'isshow' => 1,
					'cid' => $sub_cid
				])->limit($limit,$offset)
				->get('article')
				->result_array();


			$total = $this->db->where([
					'isshow' => 1,
					'cid' => $sub_cid
				])->count_all_results('article');
		}


		// $config['total_rows'] = $total;
		// $config['per_page'] = $limit;
		// $this->pagination->initialize($config);
		$url =  'http://citest.com/index.php/Home/index/'.$cid.'/'.$sub_cid.'';
		$page =MYpage($url,$total,$limit,5,2);
		

		

		$date = [
			'article' => $article,
			'sub_nav' => $sub_nav,
			'cid' => $cid,
			'sub_cid' => $sub_cid,
			'page'=>$page
		];
		// pre($date);
		$this->load->view('home/index', $date);
	}
}
