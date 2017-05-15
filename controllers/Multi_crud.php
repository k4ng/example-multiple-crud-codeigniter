<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Multi_crud extends CI_Controller 
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model("multi_crud_model","get_db");
        }

        function index()
        {
            $q["data"] = $this->get_db->get_list()->result();
            $q["data_cout"] = $this->get_db->get_list()->num_rows();
            $this->load->view("daftar", $q);
        }

        function tambah()
        {
            $get = $this->input->get();
            $q['total_form'] = $get['total_form'];
            $this->load->view('tambah', $q);
        }

        function tambah_proses()
        {
            $post = $this->input->post();
            $result = array();
            $total_post = count($post['nama']);

            foreach($post['nama'] AS $key => $val)
            {
                $result[] = array(
                    "nama"  => $post['nama'][$key],
                    "umur"  => $post['umur'][$key],
                    "kelas"  => $post['kelas'][$key]
                );
            }
            $this->get_db->post_add($result);
            
            $this->session->set_flashdata('notif', '<p style="color:green;font-weight:bold;">'.$total_post.' data berhasil di simpan!</p>');
            redirect('multi_crud');
        }

        function sunting_hapus()
        {
            $post = $this->input->post();
            $check = $post['check'];

            if(isset($check))
            {
                if(isset($post['sunting']))
                {
                    $q['data'] = $this->get_db->get_edit($post)->result();
                    $q['data_count'] = $this->get_db->get_edit($post)->num_rows();

                    $this->load->view('sunting', $q);
                }
                elseif(isset($post['hapus']))
                {
                    $this->get_db->post_delete($post);

                    $this->session->set_flashdata('notif', '<p style="color:green;font-weight:bold;">'.count($check).' data berhasil dihapus!</p>');
                    redirect('multi_crud');
                }
            }
            else
            {
                $this->session->set_flashdata('notif', '<p style="color:red;font-weight:bold;">Harap centang dulu datanya!</p>');
                redirect('multi_crud');
            }
        }

        function sunting_proses()
        {
            $post = $this->input->post();
            $result = array();
            $total_post = count($post['id']);

            foreach($post['id'] AS $key => $val)
            {
                $result[] = array(
                    "id"  => $post['id'][$key],
                    "nama"  => $post['nama'][$key],
                    "umur"  => $post['umur'][$key],
                    "kelas"  => $post['kelas'][$key]
                );
            }
            $this->get_db->post_edit($result);
            
            $this->session->set_flashdata('notif', '<p style="color:green;font-weight:bold;">'.$total_post.' data berhasil di sunting!</p>');
            redirect('multi_crud');
        }
    }