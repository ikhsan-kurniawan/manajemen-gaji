<?php
class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Master_gaji_pokok_model');
		$this->load->model('Jabatan_model');
		$this->load->model('Karyawan_model');
		$this->load->model('Transaksi_gaji_model');
		$this->load->library('form_validation');
		require(APPPATH . '/controllers/session.php');
	}

	function index()
	{
		$data = array(
			'jumlah_jabatan'     =>   $this->Jabatan_model->jumlah(),
			'jumlah_master'     =>   $this->Master_gaji_pokok_model->jumlah(),
			'jumlah_transaksi'     =>   $this->Transaksi_gaji_model->jumlah(),
			'jumlah_karyawan'     =>   $this->Karyawan_model->jumlah(),
		);
		$this->template->load('template', 'dashboard', $data);
	}
}
