<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class history_model extends CI_Model {
    function add(){
        $params = [
            'item_name' => "",
        ];
        $this->db->insert('product_item', $params);
    }
}