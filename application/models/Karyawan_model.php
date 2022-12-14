<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{

    public $table = 'karyawan';
    public $id = 'id_karyawan';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id_karyawan,id_jabatan,nik,nama_karyawan,jenis_kelamin,alamat,tanggal_lahir');
        $this->datatables->from('karyawan');
        //add this line for join
        //$this->datatables->join('table2', 'karyawan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('karyawan/read/$1'), '<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success', 'title' => 'Lihat Detail Data')) . " 
            " . anchor(site_url('karyawan/update/$1'), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-warning', 'title' => 'Ubah Data')) . " 
                " . anchor(site_url('karyawan/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger" title="Hapus Data" onclick="javasciprt: return confirm(\'Apakah anda yakin ingin menghapus data ini ?\')"'), 'id_karyawan');
        return $this->datatables->generate();
    }

    function get_combine()
    {
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $query = $this->db->select('*')
            ->from('karyawan')
            ->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan', 'left')
            ->get();
        // return $this->db->get($this->table)->result();
        return $query->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id)->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan', 'left');
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_karyawan', $q);
        $this->db->or_like('id_jabatan', $q);
        $this->db->or_like('nik', $q);
        $this->db->or_like('nama_karyawan', $q);
        $this->db->or_like('jenis_kelamin', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('tanggal_lahir', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_karyawan', $q);
        $this->db->or_like('id_jabatan', $q);
        $this->db->or_like('nik', $q);
        $this->db->or_like('nama_karyawan', $q);
        $this->db->or_like('jenis_kelamin', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('tanggal_lahir', $q);
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

/* End of file Karyawan_model.php */
/* Location: ./application/models/Karyawan_model.php */
/* Please DO NOT modify this information : */
/* Generated by CRUDV2 Generator For AdminLTE Template 2022-10-28 21:20:20 */