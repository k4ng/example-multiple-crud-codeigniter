<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Multi_crud_model extends CI_Model 
    {

        function get_list()
        {
            $this->db->select("id, nama, umur, kelas");
            $this->db->from("murid");
            $this->db->order_by('id', 'DESC');
            $q = $this->db->get();

            return $q;
        }

        function get_edit($post)
        {
            $this->db->select("id, nama, umur, kelas");
            $this->db->from("murid");
            $this->db->where_in('id', $post['check']);
            $this->db->order_by('id', 'DESC');
            $q = $this->db->get();

            return $q;
        }

        function post_add($result = array())
        {
            $total_array = count($result);

            if($total_array != 0)
            {
                $this->db->insert_batch('murid', $result);
            }
        }

        function post_edit($result = array())
        {
            $total_array = count($result);

            if($total_array != 0)
            {
                $this->db->update_batch('murid', $result, 'id');
            }
        }

        function post_delete($post = array())
        {
            $total_array = count($post);

            if($total_array != 0)
            {
                $this->db->where_in('id', $post['check']);
                $this->db->delete('murid');
            }
        }
    }