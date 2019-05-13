<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppat_model extends CI_Model
{
    public function getKapuas()
    {
        $query = $this->db->query(
            'SELECT user.wilker_id, wilker.nama_wilker, 
                COUNT( * ) as total FROM user
                JOIN wilker ON wilker.nama_wilker = user.wilker_id
                GROUP BY wilker_id'
        );
        return $query->result();
    }
}
