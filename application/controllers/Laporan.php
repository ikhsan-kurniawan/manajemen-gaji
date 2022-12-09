<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_gaji_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->helper('date');

        require(APPPATH . '/controllers/session.php');
    }

    public function index()
    {
        $karyawan = $this->db->select('id_karyawan, nama_karyawan')->from('karyawan')->get()->result();
        

        $data = array(
            'button' => 'Pilih',
            'action' => site_url('laporan/pilih_action/'),
            'karyawan' => $karyawan
        );

        $this->template->load('template', 'laporan/laporan_pilih', $data);
    }

    public function pilih_action(){
        $data = $this->db->select('*')->from('transaksi_gaji')->join('karyawan', 'transaksi_gaji.id_karyawan = karyawan.id_karyawan', 'left')->where('transaksi_gaji.id_karyawan',$this->input->get('id_karyawan'))->get()->result();
        
        // var_dump($data);
        // die;
        redirect(site_url('laporan/karyawan/'). $this->input->get('id_karyawan'));
        

    }

    public function karyawan($id){
        $query = $this->db->select('*')->from('transaksi_gaji')->join('karyawan', 'transaksi_gaji.id_karyawan = karyawan.id_karyawan', 'left')->where('transaksi_gaji.id_karyawan',$id)->get();
        
        $nama = $this->db->select('*')->from('karyawan')->join('jabatan', 'karyawan.id_jabatan = jabatan.id_jabatan', 'left')->where('karyawan.id_karyawan', $id)->get()->result();

        // print_r($nama[0]->nama_jabatan);
        // die;

        $data = array(
            'data_laporan' => $query->result(),
            'baris_gaji' => $query->num_rows(),
            'nama_karyawan' => $nama[0]->nama_karyawan,
            'jabatan' => $nama[0]->nama_jabatan,
        ); 

        // print_r($data);
        // die;

        $this->template->load('template', 'laporan/laporan_list', $data);
    }
    

}