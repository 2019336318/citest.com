<?php
    function pre($arr){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

    function MYpage($url,$total,$limit,$segment,$num_links){
		$CI = & get_instance();
		$CI->load->library('pagination');

		$config['base_url'] = $url;
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = $segment;
		$config['num_links'] = $num_links;

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = "</ul>";
		$config['first_link'] = "首页";
		$config['last_link'] = "尾页";

		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";

		$config['next_link'] = "下一页";
		$config['prev_link'] = "上一页";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";

		$config['cur_tag_open'] = "<li class='active'><a href='javascript:void(0)'>";
		$config['cur_tag_close'] = "</a></li>";

		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";

		$CI->pagination->initialize($config);

		return $CI->pagination->create_links();
	}
