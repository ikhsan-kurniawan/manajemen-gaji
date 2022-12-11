<?php

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('form_validation');
		$this->load->helper(array('Form', 'Cookie', 'String'));
	}

	function index()
	{
		// ambil cookie
		$this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
		$cookie = get_cookie('jenderalsoftware');
		if ($this->session->userdata('status') != "") {
			if ($this->session->userdata('status') == "login_ci") {
				redirect(base_url("index.php/dashboard"));
			}
		} else {
			$data = array(
				'meta_title' => 'Manajemen Gaji Pegawai',
				'meta_description' => 'Manajemen Gaji Pegawai',
				'meta_url' => 'Manajemen Gaji Pegawai',
				'nama_instansi' => 'CV Jenderal Solusi Digital',
				'meta_images'          => base_url('assets/images/logo.png'),
			);
			$this->load->view('login', $data);
		}
	}

	function aksi_login()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {

			$username = $this->input->post('username', TRUE);
			$password = ($this->input->post('password', TRUE));
			$remember = $this->input->post('remember', TRUE);
			$where = array(
				'username' => $username
			);
			$cek = $this->Login_model->cek_login("admin", $where)->row_array();
			if ($cek['username'] == $username && $cek['password'] != NULL) {
				$hash = $cek['password'];
				if (password_verify($password, $hash)) {
					// if ($password === $hash) { 

					$data_session = array(
						'nama'         => $username,
						// 'nama_lengkap' => $cek['nama_karyawan'],
						// 'jabatan' 		=> $cek['id_jabatan'],
						'id'         	=> $cek['id_admin'],
						'akses'         => 'admin',
						'status'       => "login_ci",
					);
					
					$this->session->set_userdata($data_session);
					redirect(base_url("index.php/dashboard"));
				} else {
					$this->session->set_userdata('pesan', 'username dan password salah');
					$this->session->set_flashdata('temp_username', $username);
					$this->session->set_flashdata('password', $this->input->post('password'));
					redirect(base_url("index.php/login"));
				}
			} else {
				$this->session->set_userdata('pesan', 'username dan password salah');
				$this->session->set_flashdata('username', $username);
				$this->session->set_flashdata('password', $this->input->post('password'));
				redirect(base_url("index.php/login"));
			}
		}
	}

	function logout()
	{
		// delete cookie dan session
		delete_cookie('jenderalsoftware');
		$this->session->sess_destroy();
		redirect(base_url('index.php/login'));
	}
	public function _rules()
	{
		$this->form_validation->set_rules('username', 'password', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}
