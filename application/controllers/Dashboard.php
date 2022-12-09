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
			'jumlah_jabatan'     =>   $this->Jabatan_model->total_rows(),
			'jumlah_master'     =>   $this->Master_gaji_pokok_model->total_rows(),
			'jumlah_transaksi'     =>   $this->Transaksi_gaji_model->total_rows(),
			'jumlah_karyawan'     =>   $this->Karyawan_model->total_rows(),
		);
		$this->template->load('template', 'dashboard', $data);
	}
}
