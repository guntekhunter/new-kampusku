<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Materi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // ambil data dari model tutorial_model dan data dari post nama pada halaman tutorial
        $this->load->model('Materi_model');
        $bahasa = $this->input->post('id');
        $getBahasa = $this->Materi_model->getMateri();
        $namanya = $this->Materi_model->getNama($bahasa);
        $dapatkan = $this->Materi_model->getBahasa($bahasa);
        $id = $this->Materi_model->getId($bahasa);
        $data['bahasa'] = $getBahasa;
        $data['coba'] = $namanya;
        $data['dapat'] = $dapatkan;
        $data['id'] = $id;

        $data['tutor'] = $this->db->get('materi')->result_array();
        $data['bahasa'] = $this->db->get('tbl_jurusan')->result_array();

        $data['ommaleka'] = $getBahasa;
        $this->form_validation->set_rules('nama', 'Nama', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('artikel/materi', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $gambar = $_FILES['userfile'];
            if ($gambar = '') {
            } else {
                $config['upload_path']          = './gambar/bahasa';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;

                $this->load->library('upload', $config);


                if (!$this->upload->do_upload('userfile')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        gambar gagal diupload ganti gambar dengan ukuran lebih kecil dan nama pendek lalu coba lagi</div>');
                    redirect('artikel/materi');
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }
            $coba = array(
                'nama_jurusan' => $nama,
                'gambar' => $gambar
            );

            $this->db->insert("tbl_jurusan", $coba);
            // $this->db->insert("tbl_bahasa", ["nama" => $this->input->post('nama')], ["gambar" => $this->input->post('gambar')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Jurusan baru berhasil ditambahkan</div>');
            redirect('artikel/materi');
        }
    }
    public function ambil()
    {
        $data['title'] = 'Materi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Materi_model');
        $bahasa = $this->input->post('id');
        $getBahasa = $this->Materi_model->getMateri();
        $namanya = $this->Materi_model->getNama($bahasa);
        $dapatkan = $this->Materi_model->getBahasa($bahasa);
        $id = $this->Materi_model->getId($bahasa);
        $data['bahasa'] = $getBahasa;
        $data['coba'] = $namanya;
        $data['dapat'] = $dapatkan;
        $data['id'] = $id;

        // var_dump($data['id']);

        $data['tutor'] = $this->db->get('materi')->result_array();
        $data['bahasa'] = $this->db->get('tbl_jurusan')->result_array();
        $data['ommaleka'] = $getBahasa;
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('url', 'Url', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('artikel/materi', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './gambar/materi';
            $config['allowed_types']        = 'pdf';

            $this->load->library('upload', $config);


            if (!$this->upload->do_upload('url')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    materi gagal, silahkan upload file dalam bentuk pdf</div>');
                redirect('materi');
            } else {
                $materi = $this->upload->data('file_name');
            }
            $data = [
                'id_jurusan' => htmlspecialchars($this->input->post('id', true)),
                'file_judul' => htmlspecialchars($this->input->post('nama', true)),
                'file_deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'file_tanggal' => time(),
                'file_oleh' => htmlspecialchars($this->input->post('user', true)),
                'file_data' => $materi
            ];


            $this->db->insert('materi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                materi baru ditambahkan</div>');
            redirect('materi');
        }
    }
}
