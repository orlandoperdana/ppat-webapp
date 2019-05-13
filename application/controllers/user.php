<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Profil';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['wilker'] = $this->db->get('wilker')->result_array();

        //$this->load->model('Wilker_model', 'wilker');
        //$wilker['getWilker'] = $this->wilker->getWilker();


        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        //$this->form_validation->set_rules('no_sk', 'No. SK', 'required|trim');
        //$this->form_validation->set_rules('tgl_sk', 'Tanggal SK', 'required');
        //$this->form_validation->set_rules('t_lhr', 'Tempat Lahir', 'required|trim');
        //$this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim');
        //$this->form_validation->set_rules('wilker', 'Wilayah Kerja', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $nik = $this->input->post('nik');
            $no_sk = $this->input->post('no_sk');
            $tgl_sk = $this->input->post('tgl_sk');
            $t_lhr = $this->input->post('t_lhr');
            $tgl_lhr = $this->input->post('tgl_lhr');
            $alamat = $this->input->post('alamat');
            $no_hp = $this->input->post('no_hp');
            $wilker = $this->input->post('wilker_id');

            //cek jika ada gambar diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profil/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profil/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->set('nik', $nik);
            $this->db->set('no_sk', $no_sk);
            $this->db->set('tgl_sk', $tgl_sk);
            $this->db->set('t_lhr', $t_lhr);
            $this->db->set('tgl_lhr', $tgl_lhr);
            $this->db->set('no_hp', $no_hp);
            $this->db->set('alamat', $alamat);
            $this->db->set('wilker_id', $wilker);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil has been updated</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be same as current password</div>');
                    redirect('user/changepassword');
                } else {
                    //password OK
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
