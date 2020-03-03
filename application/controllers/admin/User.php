<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends Captcha
{


	public function index()
	{
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', '用户名', 'required');
		$this->form_validation->set_rules('password', '密码', 'required');
		// $this->load->view('admin/login');

		// 验证码
		// $this->load->helper('captcha');

		// $vals = array(
		// 	'word'      => '',
		// 	'img_path'  => './captcha/',
		// 	'img_url'   => 'http://citest.com/captcha/',
		// 	'font_path' => '',
		// 	'img_width' => '150',
		// 	'img_height'    => 30,
		// 	'expiration'    => 7200,
		// 	'word_length'   => 4,
		// 	'font_size' => 16,
		// 	'img_id'    => 'Imageid',
		// 	'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

		// 	// White background and border, black text and red grid
		// 	'colors'    => array(
		// 		'background' => array(255, 255, 255),
		// 		'border' => array(255, 255, 255),
		// 		'text' => array(0, 0, 0),
		// 		'grid' => array(255, 40, 40)
		// 	)
		// );

		// $cap = create_captcha($vals);
		// echo $cap['image'];
		// var_dump( $cap);




		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login');
		} else {
			$code = $this->input->post('code');
			$code2 = strtolower($this->session->userdata('code'));
			if (strtolower($code) != $code2) {
				echo '<script>alert("验证码错误")</script>';
				$this->load->view('admin/login');
			} else {
				$user = $this->input->post('username');
				$pwd = md5($this->input->post('password'));



				$admin_info = $this->db
					->where(array(
						'a_user' => $user,
						'a_pass' => $pwd
					))
					->get('admin')
					->row_array();
				if ($admin_info) {
					$data =[
						'user'=>$admin_info['a_user'],
						'id'=>$admin_info['a_id'],
						'is_login'=>1,
					];
					$this->session->set_userdata($data);
				

					echo '<script>alert("欢迎光临' . $_POST['username'] . '");
					location.href="'.site_url('admin/home').'"</script>';
					// $this->load->view('admin/index');
				}else{
				
					echo '<script>alert("密码或者用户名错误");</script>';
					$this->load->view('admin/login');

				}
			}
		}
	}


	public function logout(){
		$user = $_SESSION['user'];
		$sess_info = array(
			'user',
			'id',
			'is_login'
		);
		$this->session->unset_userdata($sess_info);
		echo '<script>alert("欢迎下次光临' . $user . '");
					location.href="'.site_url('admin/user').'"</script>';
	}

	public function get_code()
	{
		$this->load->library('captcha');
		$code = $this->getCaptcha();
		$this->session->set_userdata('code', $code);
		$this->showImg();
	}
}
