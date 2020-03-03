<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends HomeBase {


	public function index()
	{	
		// 分类id
		$cid=$this->uri->segment(3);
		$type_id=$this->uri->segment(4,0);

		if($type_id == 0){
			$aid = $this->uri->segment(5);


			$sub_ids =$this->db
			->select('cid')
			->where('pid',$cid)
			->get('category')
			->result_array();
	
			$ids =array();
	
			foreach ($sub_ids as $v){
				$ids[]=$v['cid'];
			}

		}else{
			$aid = $this->uri->segment(5);


			$sub_ids =$this->db
			->select('cid')
			->where('cid',$type_id)
			->get('article')
			->result_array();
	
			$ids =array();
	
			foreach ($sub_ids as $v){
				$ids[]=$v['cid'];
			}
		}

		// pre( $sub_ids);

		// pre( $ids);
		// die;

		// 文章id
	
		// pre($ids);

		

		// 加载模块
		$this->load->model('Article_model');

		$detail = $this->Article_model->detail($aid);

		// 上一篇id
		$prev = $this->Article_model->prev($aid,$ids);

		// 下一篇id
		$next = $this->Article_model->next($aid,$ids);

		// pre($detail);
		// pre($prev);
		// pre($next);
		$data=[
			'detail'=>$detail,
			'type_id'=>$type_id,
			'aid'=>$aid,
			'cid'=>$cid,
			'prev'=>$prev,
			'next'=>$next
		];
		$this->load->view('home/article',$data);
	}

}