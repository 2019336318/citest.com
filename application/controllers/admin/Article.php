<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article extends AdminBase
{


    public function index()
    {
        $this->load->model('Article_model');
        $type = $this->uri->segment(4);
        $limit = 4;
        $offset = $this->uri->segment(5, 0);
        $total = $this->db->where('cid', $type)->count_all_results('article');
        $where = [
            'cid' => $type
        ];
        $art = $this->Article_model->getInfo($where, $limit, $offset);
        $url =  'http://citest.com/index.php/admin/Article/index/' . $type;
        $page = MYpage($url, $total, $limit, 5, 2);


        $data = array(
            'article' => $art,
            'page' => $page,
            'cid' => $type
        );

        $this->load->view('admin/article_list', $data);
    }


    //添加
    public function add()
    {


        // $this->load->model('Category_model');
        // $cate = $this->Category_model->allCate();


        // $cate_array = array();
        // foreach ($cate as $key => $item) {
        //     if($item['pid']==0){
        //         $cate_array[$key] = $item;
        //     }
        //     foreach ($cate as $v) {
        //         if($v['pid']>0 && $v['pid']==$item['cid']){
        //             $cate_array[$key]['sub'][] = $v;
        //         }
        //     }
        // }

        /*if(isset($_POST['sub'])){
            pre($_POST);die;
        }*/


        $this->load->helper('form');
        $this->load->library('form_validation');


        $this->form_validation->set_rules('title', '标题', 'trim|required');
        $this->form_validation->set_rules('author', '作者', 'trim|required');

        if ($this->form_validation->run() == TRUE) { //通过验证
            $cid = $this->input->post('cid');
            $title = $this->input->post('title');
            $content = $this->input->post('editorValue');
            $author = $this->input->post('author');
            $isshow = $this->input->post('isshow');

            //上传图片并且返回图片路径
            $img_path = $this->upload();


            //缩略图
            $thumb = $this->img_resize($img_path);

            $data = array(
                'cid' => $cid,
                'title' => $title,
                'content' => $content,
                'author' => $author,
                'isshow' => $isshow,
                'pubtime' => time(),
                'a_img' => $img_path
            );

            //上传
            $res = $this->db->insert('article', $data);

            if ($res) {
                echo "<script>alert('添加文章成功！');window.location.href='" . site_url("admin/Article/index/{$cid}") . "'</script>";
            }
        }


        // $data = array(
        //     'cate' => $cate_array,
        // );

        $this->load->view('admin/article_add');
    }

    public function upload()
    {

        $path = 'uploads/';
        if (!file_exists($path)) {
            mkdir($path, 0777);
        }

        $config['upload_path']      = $path;
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 1024 * 10;
        //$config['max_width']        = 1024;
        //$config['max_height']       = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('a_img')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('admin/article_add', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            return $path . $data['upload_data']['file_name'];
        }
    }



    public function img_resize($img_path)
    {


        $new_image = 'uploads/thumb/';

        if (!file_exists($new_image)) {
            mkdir($new_image, 0777);
        }

        $config['image_library'] = 'gd2';
        $config['source_image'] = $img_path;
        $config['thumb_marker'] = '';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE; //等比缩略图
        $config['new_image']  = $new_image; //保存缩略图
        $config['width']     = 200;
        $config['height']   = 100;

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    public function water_img($img_path){
        $new_image = 'uploads/water/';

        if (!file_exists($new_image)) {
            mkdir($new_image, 0777);
        }
    }

    public function edit()
    {
        $id = $this->uri->segment(4, 0);
        $this->load->model('Article_model');
        $detail = $this->Article_model->detail($id);



        $this->load->helper('form');
        $this->load->library('form_validation');


        $this->form_validation->set_rules('title', '标题', 'trim|required');
        $this->form_validation->set_rules('author', '作者', 'trim|required');

        if ($this->form_validation->run() == TRUE) { //通过验证
            $cid = $this->input->post('cid');
            $title = $this->input->post('title');
            $content = $this->input->post('editorValue');
            $author = $this->input->post('author');
            $isshow = $this->input->post('isshow');

            // pre($_POST);
            // pre($_FILES);die;
            if ($_FILES['a_img']['error'] == 0) {
                //上传图片并且返回图片路径
                $img_path = $this->upload();
                //缩略图
                $thumb = $this->img_resize($img_path);
                $old_img = $detail['a_img'];
                unlink($old_img);



                $old_thumb = 'uploads/thumb/' . substr($detail['a_img'], strpos($detail['a_img'], '/') + 1);
                unlink($old_thumb);
            } else {
                $img_path = $detail['a_img'];
            }

            $updata = array(
                'cid' => $cid,
                'title' => $title,
                'content' => $content,
                'author' => $author,
                'isshow' => $isshow,
                'pubtime' => time(),
                'a_img' => $img_path
            );

            $res =$this->db->where('aid', $id)->update('article', $updata);
            if ($res) {
                echo "<script>alert('编辑文章成功！');window.location.href='" . site_url("admin/Article/index/{$cid}") . "'</script>";
            }
        }
        $data =
            [
                'detail' => $detail
            ];
        // pre($detail);

        // pre($old_thumb);
        $this->load->view('admin/article_edit', $data);
    }

    public function del()
    {
        $id = $this->uri->segment(4, 0);

        if ($id != 0) {

            $this->load->model('Article_model');

            $detail = $this->Article_model->detail($id);
            $type = $detail['cid'];
            $img =$detail['a_img'];
            $thumb = 'uploads/thumb/' . substr($detail['a_img'], strpos($detail['a_img'], '/') + 1);
            if (file_exists($img) && file_exists($thumb)) {
                unlink($img);
                unlink($thumb);
            }
            $res = $this->db->delete('article', array('aid' => $id));
            if ($res) {
                echo "<script>alert('删除成功！');window.location.href='" . site_url("admin/Article/index/{$type}") . "'</script>";
            }
        }
    }
}
