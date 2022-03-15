<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi_model extends CI_Model
{
    public function getMateri()
    {
        $query = $this->db->get("tbl_jurusan");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    public function getNama($bahasa)
    {
        $this->db->select('materi.*', 'tbl_jurusan.nama_jurusan', 'tbl_jurusan.id');
        $this->db->from('materi');
        $this->db->join('tbl_jurusan', 'materi.id_jurusan = tbl_jurusan.id');
        $this->db->where(['tbl_jurusan.id' => $bahasa]);
        $query = $this->db->get();
        return $query->result();
    }
    public function getBahasa($bahasa)
    {
        $this->db->select('tbl_jurusan.nama_jurusan');
        $this->db->from('tbl_jurusan');
        $this->db->where(['tbl_jurusan.id' => $bahasa]);
        $query = $this->db->get();
        return $query->result();
    }
    public function getId($bahasa)
    {
        $this->db->select('tbl_jurusan.*');
        $this->db->from('tbl_jurusan');
        $this->db->where(['tbl_jurusan.id' => $bahasa]);
        $query = $this->db->get();
        return $query->result();
    }
}
