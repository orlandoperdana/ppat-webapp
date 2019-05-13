<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Laporan PPAT/PPATS';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['laporan'] = $this->db->get('tb_laporan')->result_array();

        $data['bph'] = $this->db->get('bentuk_hukum')->result_array();
        $data['p1'] = $this->db->get('tb_laporan')->result_array();


        $this->form_validation->set_rules('no_akta', 'No Akta', 'required');
        $this->form_validation->set_rules('tgl_akta', 'Tgl Akta', 'required');
        $this->form_validation->set_rules('bph', 'BPH', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_akta' => $this->input->post('no_akta'),
                'tgl_akta' => $this->input->post('tgl_akta'),
                'bph' => $this->input->post('bph'),
                'nik_p1' => $this->input->post('nik_p1'),
                'nama_p1' => $this->input->post('nama_p1'),
                'alamat_p1' => $this->input->post('alamat_p1'),
                'npwp_p1' => $this->input->post('npwp_p1'),
                'nik_p2' => $this->input->post('nik_p2'),
                'nama_p2' => $this->input->post('nama_p2'),
                'alamat_p2' => $this->input->post('alamat_p2'),
                'npwp_p2' => $this->input->post('npwp_p2'),
                'jnh' => $this->input->post('jnh'),
                'ltb' => $this->input->post('ltb'),
                'lt' => $this->input->post('lt'),
                'lb' => $this->input->post('lb'),
                'nht' => $this->input->post('nht'),
                'nop' => $this->input->post('nop'),
                'njop' => $this->input->post('njop'),
                'tgl_ssp' => $this->input->post('tgl_ssp'),
                'nom_ssp' => $this->input->post('nom_ssp'),
                'tgl_ssb' => $this->input->post('tgl_ssb'),
                'nom_ssb' => $this->input->post('nom_ssb'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->insert('tb_laporan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Laporan added!</div>');
            redirect('laporan');
        }
    }

    public function edit()
    { }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_laporan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data dihapus!</div>');
        redirect('laporan');
    }
}
