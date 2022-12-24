<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->model('Transaksi_gaji_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');

        require(APPPATH . '/controllers/session.php');
    }

    public function index()
    {
        $data = array(
            'karyawan_data' => $this->Karyawan_model->get_active(),
        );
        foreach ($data as $arr) {
            foreach ($arr as $key) {
                $cek = $this->Transaksi_gaji_model->cekRowId($key->id_karyawan);
                $key->cek = $cek;
            }
        }
        // print_r($data);
        // die;
        $this->template->load('template', 'karyawan/karyawan_list', $data);
    }

    public function arsip()
    {
        $data = array(
            'karyawan_data' => $this->Karyawan_model->get_nonactive(),
        );

        $this->template->load('template', 'karyawan/arsip_list', $data);
    }

    public function read($id)
    {
        $row = $this->Karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_karyawan' => $row->id_karyawan,
                'id_jabatan' => $row->id_jabatan,
                'nik' => $row->nik,
                'nama_karyawan' => $row->nama_karyawan,
                'jenis_kelamin' => $row->jenis_kelamin,
                'alamat' => $row->alamat,
                'tanggal_lahir' => $row->tanggal_lahir,
                'status' => $row->status,
                // 'username' => $row->username,
                // 'password' => $row->password,
                'nama_jabatan' => $row->nama_jabatan,
            );
            $this->template->load('template', 'karyawan/karyawan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('karyawan'));
        }
    }

    public function create()
    {
        $this->load->model('Jabatan_model');
        $query = $this->db->select('*')->from('jabatan')->get()->result();

        $data = array(
            'button' => 'Tambah',
            'action' => site_url('karyawan/create_action'),
            'id_karyawan' => set_value('id_karyawan'),
            'id_jabatan' => set_value('id_jabatan'),
            'nik' => set_value('nik'),
            'nama_karyawan' => set_value('nama_karyawan'),
            'jenis_kelamin' => set_value('jenis_kelamin'),
            'alamat' => set_value('alamat'),
            'tanggal_lahir' => set_value('tanggal_lahir'),
            // 'username' => set_value('username'),
            // 'password' => set_value('password'),
            'jabatan' => $query,
        );

        // print_r($data);
        // die;

        $this->template->load('template', 'karyawan/karyawan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_jabatan' => $this->input->post('id_jabatan', TRUE),
                'nik' => $this->input->post('nik', TRUE),
                'nama_karyawan' => $this->input->post('nama_karyawan', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
                'status' => 'aktif',
                // 'username' => $this->input->post('username', TRUE),
                // 'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
            );

            $this->Karyawan_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil Tambah Data');
            redirect(site_url('karyawan'));
        }
    }

    public function update($id)
    {
        $row = $this->Karyawan_model->get_by_id($id);
        $this->load->model('Jabatan_model');
        $query = $this->db->select('*')->from('jabatan')->get()->result();

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('karyawan/update_action'),
                'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
                'id_jabatan' => set_value('id_jabatan', $row->id_jabatan),
                'nik' => set_value('nik', $row->nik),
                'nama_karyawan' => set_value('nama_karyawan', $row->nama_karyawan),
                'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
                'alamat' => set_value('alamat', $row->alamat),
                'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
                // 'username' => set_value('username', $row->username),
                // 'password' => set_value('password', $row->password),
                'jabatan' => $query,
            );
            $this->template->load('template', 'karyawan/karyawan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('karyawan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_karyawan', TRUE));
        } else {
            $data = array(
                'id_jabatan' => $this->input->post('id_jabatan', TRUE),
                'nik' => $this->input->post('nik', TRUE),
                'nama_karyawan' => $this->input->post('nama_karyawan', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
                'status' => 'aktif',
                // 'username' => $this->input->post('username', TRUE),
                // 'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
            );

            $this->Karyawan_model->update($this->input->post('id_karyawan', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil Edit Data');
            redirect(site_url('karyawan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $this->Karyawan_model->delete($id);
            $this->session->set_flashdata('message', 'Berhasil Hapus Data');
            redirect(site_url('karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('karyawan'));
        }
    }

    public function nonaktif($id){
        $row = $this->Karyawan_model->get_by_id($id);

        $data = $this->db->where('id_karyawan', $id)->from('karyawan')->get()->result();
        foreach ($data as $val){
            $val->status = "nonaktif";
            $new = array(
                'id_jabatan' => $val->id_jabatan,
                'nik' => $val->nik,
                'nama_karyawan' => $val->nama_karyawan,
                'jenis_kelamin' => $val->jenis_kelamin,
                'alamat' => $val->alamat,
                'tanggal_lahir' => $val->tanggal_lahir,
                'status' => $val->status,
            );
        }
        if ($row) {
            $this->Karyawan_model->update($id, $new);
            $this->session->set_flashdata('message', 'Berhasil Menonaktifkan Karyawan');
            redirect(site_url('karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('karyawan'));
        }
    }

    public function aktif($id){
        $row = $this->Karyawan_model->get_by_id($id);

        $data = $this->db->where('id_karyawan', $id)->from('karyawan')->get()->result();
        foreach ($data as $val){
            $val->status = "aktif";
            $new = array(
                'id_jabatan' => $val->id_jabatan,
                'nik' => $val->nik,
                'nama_karyawan' => $val->nama_karyawan,
                'jenis_kelamin' => $val->jenis_kelamin,
                'alamat' => $val->alamat,
                'tanggal_lahir' => $val->tanggal_lahir,
                'status' => $val->status,
            );
        }
        if ($row) {
            $this->Karyawan_model->update($id, $new);
            $this->session->set_flashdata('message', 'Berhasil Mengaktifkan Karyawan');
            redirect(site_url('karyawan/arsip'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('karyawan/arsip'));
        }
    }
    
    public function _rules()
    {
        $this->form_validation->set_rules('id_jabatan', 'id jabatan', 'trim|required');
        $this->form_validation->set_rules('nik', 'nik', 'trim|required');
        $this->form_validation->set_rules('nama_karyawan', 'nama karyawan', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
        // $this->form_validation->set_rules('username', 'username', 'trim|required');
        // $this->form_validation->set_rules('password', 'password', 'trim|required');

        $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by CRUDV2 Generator For AdminLTE Template 2022-10-28 21:20:20 */