<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 扩展 Controller
 */
class MY_Controller extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
     
    }
}
 
/**
 * 前台基类
 */
class HomeBase extends MY_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->nav();
    }
    public function nav(){
		$query=$this->db->query("SELECT * FROM pre_category WHERE pid=0");
		$nav=$query->result_array();
		$date = [
			'nav'=>$nav
		];
		$this->load->vars($date);
    }

    public function footer(){
		$this->load->view('home/footer');
    }

}






class AdminBase extends MY_Controller
{
    function  __construct()
    {
        parent::__construct();
        // $this->is_login();
      $this->nav();
    }

    public function is_login(){
        $is_log = $this->session->userdata('is_login');
        // echo $is_log;
        if($is_log != ''){
            // echo '<script>alert("您已登录' . $_SESSION['user'] . '");
            // location.href="'.site_url('admin/home').'"</script>';
        }else{  
            // echo '<script>alert("您未登录");
            // location.href="'.site_url('admin/user').'"</script>';
            // redirect(site_url('admin/user'));
        }
    }

    public function nav(){

        
        $this->load->model('Category_model');
        $cate = $this->Category_model->allCate();

        $type = $this->uri->segment(4);
        $cate_array = array();
        foreach ($cate as $key => $item) {
            if($item['pid']==0){
                $cate_array[$key] = $item;
            }
            foreach ($cate as $v) {
                if($v['pid']>0 && $v['pid']==$item['cid']){
                    $cate_array[$key]['sub'][] = $v;
                }
            }
        }
        $data = array(
            'cate' => $cate_array,
            'type'=>$type
        );
        $this->load->view('admin/header',$data);
    }

 
}

class Captcha extends AdminBase
{
    private $width;
    private $height;
    private $codeNum;
    private $code;
    private $im;

    function __construct($width=80, $height=30, $codeNum=4){
        parent::__construct();
        $this->width = $width;
        $this->height = $height;
        $this->codeNum = $codeNum;

    }

    function showImg(){
        //创建图片
        $this->createImg();
        //设置干扰元素
        $this->setDisturb();
        //设置验证码
        $this->setCaptcha();
        //输出图片
        $this->outputImg();
    }

    function getCaptcha(){ 
  $this->createCode();
        return $this->code;
    }

    private function createImg(){
        $this->im = imagecreatetruecolor($this->width, $this->height);
        $bgColor = imagecolorallocate($this->im, 0, 0, 0);
        imagefill($this->im, 0, 0, $bgColor);
    }

    private function setDisturb(){
        $area = ($this->width * $this->height) / 20;
        $disturbNum = ($area > 250) ? 250 : $area;
        //加入点干扰
        for ($i = 0; $i < $disturbNum; $i++) {
            $color = imagecolorallocate($this->im, rand(0, 255), rand(0, 255), rand(0, 255));
            imagesetpixel($this->im, rand(1, $this->width - 2), rand(1, $this->height - 2), $color);
        }
        //加入弧线
        for ($i = 0; $i <= 5; $i++) {
            $color = imagecolorallocate($this->im, rand(128, 255), rand(125, 255), rand(100, 255));
            imagearc($this->im, rand(0, $this->width), rand(0, $this->height), rand(30, 300), rand(20, 200), 50, 30, $color);
        }
    }

    private function createCode(){
        $str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKMNPQRSTUVWXYZ";

        for ($i = 0; $i < $this->codeNum; $i++) {
            $this->code .= $str{rand(0, strlen($str) - 1)};
        }
    }

    private function setCaptcha(){
        for ($i = 0; $i < $this->codeNum; $i++) {
            $color = imagecolorallocate($this->im, rand(50, 250), rand(100, 250), rand(128, 250));
            $size = rand(floor($this->height / 5), floor($this->height / 3));
            $x = floor($this->width / $this->codeNum) * $i + 5;
            $y = rand(0, $this->height - 20);
            imagechar($this->im, $size, $x, $y, $this->code{$i}, $color);
        }
    }

    private function outputImg(){
        if (imagetypes() & IMG_JPG) {
            header('Content-type:image/jpeg');
            imagejpeg($this->im);
        } elseif (imagetypes() & IMG_GIF) {
            header('Content-type: image/gif');
            imagegif($this->im);
        } elseif (imagetypes() & IMG_PNG) {
            header('Content-type: image/png');
            imagepng($this->im);
        } else {
            die("Don't support image type!");
        }
    }


}  