<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_gaji extends CI_Controller
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
        $data = array(
            'transaksi_gaji_data' => $this->Transaksi_gaji_model->get_all(),
        );

        foreach ($data as $arr) {
            foreach ($arr as $key) {
                $tanggal = $this->tanggal_indo($key->waktu_gaji);
                $key->tanggal = $tanggal;
            }
        }

        $this->template->load('template', 'transaksi_gaji/transaksi_gaji_list', $data);
    }

    public function read($id)
    {
        $row = $this->Transaksi_gaji_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_transaksi' => $row->id_transaksi,
                'id_karyawan' => $row->id_karyawan,
                'id_master' => $row->id_master,
                // 'waktu_gaji' => $row->waktu_gaji,
                'waktu_gaji' => $this->tanggal_indo($row->waktu_gaji),
                'bonus_gaji' => $row->bonus_gaji,
                'nominal_gaji' => $row->nominal_gaji,
                'keterangan' => $row->keterangan,
                'nama_master' => $row->nama_master,
                'nama_karyawan' => $row->nama_karyawan,
                'gaji_master' => $row->gaji_master,
                'total' => ($row->gaji_master) + ($row->bonus_gaji),
                'jabatan' => $row->nama_jabatan,

            );
            $this->template->load('template', 'transaksi_gaji/transaksi_gaji_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('transaksi_gaji'));
        }
    }

    public function create()
    {
        $this->load->model('Karyawan_model');
        $karyawan = $this->db->select('*')->from('karyawan')->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan', 'left')->get()->result();

        $this->load->model('Master_gaji_pokok_model');
        $master = $this->db->select('*')->from('master_gaji_pokok')->get()->result();

        $data = array(
            'button' => 'Tambah',
            'action' => site_url('transaksi_gaji/create_action'),
            'id_transaksi' => set_value('id_transaksi'),
            'id_karyawan' => set_value('id_karyawan'),
            'id_master' => set_value('id_master'),
            // 'waktu_gaji' => set_value(@mdate('%m-%d-%Y')),
            'waktu_gaji' => (@mdate('%Y-%m')),
            'bonus_gaji' => set_value('bonus_gaji'),
            // 'nominal_gaji' => set_value('nominal_gaji'),
            'keterangan' => set_value('keterangan'),
            'karyawan' => $karyawan,
            'master' => $master,
        );
        // print_r($karyawan);
        // die;
        $this->template->load('template', 'transaksi_gaji/transaksi_gaji_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $master = $this->db->get_where('master_gaji_pokok', array('id_master' => $this->input->post('id_master')))->row();

            // $nominal = array($master[0]->gaji_master, $this->input->post('bonus_gaji'));
            $nominal = (int)$master->gaji_master;
            $bonus_gaji = str_replace(array('Rp', '.'), array('', ''), $this->input->post('bonus_gaji', TRUE));

            $data = array(
                'id_karyawan' => $this->input->post('id_karyawan', TRUE),
                'id_master' => $this->input->post('id_master', TRUE),
                'waktu_gaji' => $this->input->post('waktu_gaji', TRUE),
                'bonus_gaji' => $bonus_gaji,
                // 'bonus_gaji' => $this->input->post('bonus_gaji', TRUE),
                // 'nominal_gaji' => array_sum($nominal),
                'nominal_gaji' => ($nominal),
                'keterangan' => $this->input->post('keterangan', TRUE),
            );

            $this->Transaksi_gaji_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil Tambah Data');
            redirect(site_url('transaksi_gaji'));
        }
    }

    public function update($id)
    {
        $row = $this->Transaksi_gaji_model->get_by_id($id);

        $karyawan = $this->db->select('*')->from('karyawan')->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan', 'left')->get()->result();
        $master = $this->db->select('*')->from('master_gaji_pokok')->get()->result();

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('transaksi_gaji/update_action'),
                'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
                'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
                'id_master' => set_value('id_master', $row->id_master),
                'waktu_gaji' => set_value('waktu_gaji', $row->waktu_gaji),
                'bonus_gaji' => set_value('bonus_gaji', $row->bonus_gaji),
                'nominal_gaji' => set_value('nominal_gaji', $row->nominal_gaji),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'karyawan' => $karyawan,
                'master' => $master,
            );
            $this->template->load('template', 'transaksi_gaji/transaksi_gaji_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('transaksi_gaji'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $master = $this->db->get_where('master_gaji_pokok', array('id_master' => $this->input->post('id_master')))->row();

            // $nominal = array($master[0]->gaji_master, $this->input->post('bonus_gaji'));
            $nominal = (int)$master->gaji_master;
            $bonus_gaji = str_replace(array('Rp', '.'), array('', ''), $this->input->post('bonus_gaji', TRUE));

            $data = array(
                'id_karyawan' => $this->input->post('id_karyawan', TRUE),
                'id_master' => $this->input->post('id_master', TRUE),
                'waktu_gaji' => $this->input->post('waktu_gaji', TRUE),
                'bonus_gaji' => $bonus_gaji,
                // 'nominal_gaji' => array_sum($nominal),
                'nominal_gaji' => ($nominal),
                'keterangan' => $this->input->post('keterangan', TRUE),
            );

            $this->Transaksi_gaji_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil Edit Data');
            redirect(site_url('transaksi_gaji'));
        }
    }

    public function delete($id)
    {
        $row = $this->Transaksi_gaji_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_gaji_model->delete($id);
            $this->session->set_flashdata('message', 'Berhasil Hapus Data');
            redirect(site_url('transaksi_gaji'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('transaksi_gaji'));
        }
    }

    public function laporan($id)
    {
        $row = $this->Transaksi_gaji_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_transaksi' => $row->id_transaksi,
                'id_karyawan' => $row->id_karyawan,
                'id_master' => $row->id_master,
                // 'waktu_gaji' => $row->waktu_gaji,
                'waktu_gaji' => $this->tanggal_indo($row->waktu_gaji),
                'bonus_gaji' => $row->bonus_gaji,
                'nominal_gaji' => $row->nominal_gaji,
                'keterangan' => $row->keterangan,
                'nama_master' => $row->nama_master,
                'nama_karyawan' => $row->nama_karyawan,
                'gaji_master' => $row->gaji_master,
                'jabatan' => $row->nama_jabatan,
                'alamat' => $row->alamat,
                'tanggal_sekarang' => $this->tanggal_indo(date("Y-m-d")),
                'total' => ($row->gaji_master) + ($row->bonus_gaji),
            );

            $mpdf = new \Mpdf\Mpdf();
            $html = $this->load->view('slip', $data, true);
            $filename = 'Slip Gaji - '. $data['waktu_gaji']. ' - '. $data['nama_karyawan'];
            $mpdf->WriteHTML($html);
            $mpdf->Output($filename, "I");
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('transaksi_gaji'));
        }
    }

    function tanggal_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        if (array_key_exists(2, $split)) {
            return $split[2]. ' '. $bulan[(int)$split[1]] . ' ' . $split[0];
        }else{
            return $bulan[(int)$split[1]] . ' ' . $split[0];
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim|required');
        $this->form_validation->set_rules('id_master', 'id master', 'trim|required');
        $this->form_validation->set_rules('waktu_gaji', 'waktu gaji', 'trim|required');
        $this->form_validation->set_rules('bonus_gaji', 'bonus gaji', 'trim|required');
        // $this->form_validation->set_rules('nominal_gaji', 'nominal gaji', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        $this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Transaksi_gaji.php */
/* Location: ./application/controllers/Transaksi_gaji.php */
/* Please DO NOT modify this information : */
/* Generated by CRUDV2 Generator For AdminLTE Template 2022-10-29 09:36:21 */