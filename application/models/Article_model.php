<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Article_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    // 查询文章详情
    public function detail($id){
        return $this->db
                ->where('aid',$id)
                ->get('article')
                ->row_array();
    }
    public function prev($aid,$ids){
        $prev_id=$this->db
        ->select('aid')
        ->where('aid<',$aid)
        ->where_in('cid',$ids)
        ->order_by('aid DESC')
        ->limit(1)
        ->get('article')
        ->row_array()
        ;
        if($prev_id){
            $prev = $prev_id['aid'];
        }else{
            $prev = '';
        }
        return $prev;
    }

    public function next($aid,$ids){
        $next_id=$this->db
        ->select('aid')
        ->where('aid>',$aid)
        ->where_in('cid',$ids)
        ->order_by('aid ASC')
        ->limit(1)
        ->get('article')
        ->row_array()
        ;
        if($next_id){
            $next = $next_id['aid'];
        }else{
            $next = '';
        }
        return $next;
    }

    public function like($key,$limit='',$offset=''){
        return $this->db
        ->select('*')
        ->like('title',$key)
        ->limit($limit,$offset)
        ->or_like('content',$key)
        ->get('article')
        ->result_array();
    }

    public function like_count($key){
       return $this->db
        ->like('title',$key)
        ->or_like('content',$key)
        ->count_all_results('article');
    }


    public function getAll(){

        return $this->db
                    ->get('article')
                    ->result_array();

    }

    public function getInfo($where,$limit,$offset){
        
        return $this->db
                    ->where($where)
                    ->order_by('pubtime','DESC')
                    ->limit($limit,$offset)
                    ->get('article')
                    ->result_array();
    }
}