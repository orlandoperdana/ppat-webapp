<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wilker_model extends CI_Model
{
    //get wilker from db
    public function getWilker()
    {
        $query = "SELECT `user`.*, `wilker`.`wilker_id`
        FROM `user` JOIN `wilker`
        ON `user`.`wilker_id` = `wilker`.`id`
        ";

        return $this->db->query($query)->result_array();
    }
}
