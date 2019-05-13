<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function getTambahData()
    {
        $query = "SELECT *
                    FROM `tb_laporan`
                    ";

        return $this->db->query($query)->result_array();
    }
}
