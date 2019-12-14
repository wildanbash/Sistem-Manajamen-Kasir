<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sales extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model(['item_model', 'sales_model', 'user_model']);
    }

    public function item_data(){
        
        $item = $this->item_model->get()->result();
        $data = [
            'item' => $item,
        ];
        $this->template->load('template', 'transaction/sales/sales_form', $data);
    }

    public function add_sales(){
        $post = $this->input->post(null, TRUE);
        $item = $this->sales_model->item_barcode($post)->row();
        $price_sales = $item->price;
        $barcode = $post['barcode'];
        $invoice2 = $post['invoice'];
        $qty = $post['qty'];
        $total = $price_sales * $qty;
        $stock_item = $item->stock;
        if($stock_item == 0){
            echo "<script>alert('Stok Barang Habis');</script>";
            echo "<script>window.location='".site_url('sales/form')."';</script>"; 
        }else if(($stock_item-$qty) < 0){
            echo "<script>alert('Barang Tersisa '+$stock_item);</script>";
            echo "<script>window.location='".site_url('sales/form')."';</script>"; 
        }else{
            $params = [
                'invoice' => $invoice2,
                'barcode' => $barcode,
                'qty' => $qty,
                'total' => $total,
            ];
            $this->db->insert('transaction_sales', $params);
            echo "<script>window.location='".site_url('sales/form')."';</script>";    
            // $data = array('invoice2' => $invoice2); 
            // $this->template->load('template', 'transaction/sales/sales_form', $data); 
        }
        // $data = $this->sales_model->show_item($post)->row();
        // $this->template->load('template', 'transaction/sales/sales_form', $data);
    }

    public function showitem(){
        $item = $this->item_model->getitem()->result();
        $data = ['showitem' => $item];
        $this->template->load('template', 'transaction/sales/sales_form', $data);
    }

}