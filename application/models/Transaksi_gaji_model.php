<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_gaji_model extends CI_Model
{

    public $table = 'transaksi_gaji';
    public $id = 'id_transaksi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id_transaksi,id_karyawan,id_master,waktu_gaji,bonus_gaji,nominal_gaji,keterangan');
        $this->datatables->from('transaksi_gaji');
        //add this line for join
        //$this->datatables->join('table2', 'transaksi_gaji.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('transaksi_gaji/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data')) . " 
            " . anchor(site_url('transaksi_gaji/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data')) . " 
                " . anchor(site_url('transaksi_gaji/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger" title="Hapus Data" onclick="javasciprt: return confirm(\'Apakah anda yakin ingin menghapus data ini ?\')"'), 'id_transaksi');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();
        $this->db->order_by($this->id, $this->order);
        $query = $this->db->select('*')
            ->from($this->table)
            ->join('karyawan', 'karyawan.id_karyawan = transaksi_gaji.id_karyawan', 'left')
            ->join('master_gaji_pokok', 'master_gaji_pokok.id_master = transaksi_gaji.id_master', 'left')
            ->get();

        // print_r($query->result());
        // die;
        // return $this->db->get($this->table)->result();
        return $query->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id)->join('karyawan', 'transaksi_gaji.id_karyawan = karyawan.id_karyawan', 'left')->join('master_gaji_pokok', 'transaksi_gaji.id_master = master_gaji_pokok.id_master', 'left')->join('jabatan', 'karyawan.id_jabatan = jabatan.id_jabatan', 'left');
        return $this->db->get($this->table)->row();
    }


    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_transaksi', $q);
        $this->db->or_like('id_karyawan', $q);
        $this->db->or_like('id_master', $q);
        $this->db->or_like('waktu_gaji', $q);
        $this->db->or_like('bonus_gaji', $q);
        $this->db->or_like('nominal_gaji', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_transaksi', $q);
        $this->db->or_like('id_karyawan', $q);
        $this->db->or_like('id_master', $q);
        $this->db->or_like('waktu_gaji', $q);
        $this->db->or_like('bonus_gaji', $q);
        $this->db->or_like('nominal_gaji', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Transaksi_gaji_model.php */
/* Location: ./application/models/Transaksi_gaji_model.php */
/* Please DO NOT modify this information : */
/* Generated by CRUDV2 Generator For AdminLTE Template 2022-10-29 09:36:21 */