<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_gaji_pokok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_gaji_pokok_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');

        require(APPPATH . '/controllers/session.php');
    }

    public function index()
    {
        $data = array(
            'master_gaji_pokok_data' => $this->Master_gaji_pokok_model->get_all(),
        );
        $this->template->load('template', 'master_gaji_pokok/master_gaji_pokok_list', $data);
    }

    public function read($id)
    {
        $row = $this->Master_gaji_pokok_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_master' => $row->id_master,
                'nama_master' => $row->nama_master,
                'gaji_master' => $row->gaji_master,
                'persen_pajak' => $row->persen_pajak,
            );
            $this->template->load('template', 'master_gaji_pokok/master_gaji_pokok_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('master_gaji_pokok'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('master_gaji_pokok/create_action'),
            'id_master' => set_value('id_master'),
            'nama_master' => set_value('nama_master'),
            'gaji_master' => set_value('gaji_master'),
            'persen_pajak' => set_value('persen_pajak'),
        );
        $this->template->load('template', 'master_gaji_pokok/master_gaji_pokok_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $gaji_master = str_replace(array('Rp', '.'), array('', ''), $this->input->post('gaji_master', TRUE));

            $data = array(
                'nama_master' => $this->input->post('nama_master', TRUE),
                // 'nama_master' => $this->input->post('nama_master',TRUE),
                'gaji_master' => $gaji_master,
                'persen_pajak' => $this->input->post('persen_pajak', TRUE)
            );

            $this->Master_gaji_pokok_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil Tambah Data');
            redirect(site_url('master_gaji_pokok'));
        }
    }

    public function update($id)
    {
        $row = $this->Master_gaji_pokok_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('master_gaji_pokok/update_action'),
                'id_master' => set_value('id_master', $row->id_master),
                'nama_master' => set_value('nama_master', $row->nama_master),
                'gaji_master' => set_value('gaji_master', $row->gaji_master),
                'persen_pajak' => set_value('persen_pajak', $row->persen_pajak),
            );
            $this->template->load('template', 'master_gaji_pokok/master_gaji_pokok_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('master_gaji_pokok'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_master', TRUE));
        } else {
            $gaji_master = str_replace(array('Rp', '.'), array('', ''), $this->input->post('gaji_master', TRUE));

            $data = array(
                'nama_master' => $this->input->post('nama_master', TRUE),
                'gaji_master' => $gaji_master,
                'persen_pajak' => $this->input->post('persen_pajak', TRUE),
                // 'gaji_master' => $this->input->post('gaji_master', TRUE),
            );

            $this->Master_gaji_pokok_model->update($this->input->post('id_master', TRUE), $data);
            $this->session->set_flashdata('message', 'Berhasil Edit Data');
            redirect(site_url('master_gaji_pokok'));
        }
    }

    public function delete($id)
    {
        $row = $this->Master_gaji_pokok_model->get_by_id($id);

        if ($row) {
            $this->Master_gaji_pokok_model->delete($id);
            $this->session->set_flashdata('message', 'Berhasil Hapus Data');
            redirect(site_url('master_gaji_pokok'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('master_gaji_pokok'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_master', 'nama master', 'trim|required');
        $this->form_validation->set_rules('gaji_master', 'gaji master', 'trim|required');
        $this->form_validation->set_rules('persen_pajak', 'persen pajak', 'trim|required');

        $this->form_validation->set_rules('id_master', 'id_master', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Master_gaji_pokok.php */
/* Location: ./application/controllers/Master_gaji_pokok.php */
/* Please DO NOT modify this information : */
/* Generated by CRUDV2 Generator For AdminLTE Template 2022-10-29 08:27:05 */