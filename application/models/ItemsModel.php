<?php
class ItemsModel extends CI_Model{

    protected $tableName = "product_items";

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_products()
    {
        return $this->db->get('item_details_view')->result();
    }

    public function is_product_exist($id, $produkId)
    {
        return ($this->db->where(array('id' => $id, 'product_id' => $produkId))->get('item_details')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function product_data($id)
    {
        return $this->db->where("id", $id)->get('item_details_view')->row();
    }

    public function related_products($current, $category)
    {
        return $this->db->where(array('id !=' => $current, 'category_id' => $category))->limit(4)->get('products')->result();
    }

    public function create_order(Array $data)
    {
        $this->db->insert('orders', $data);

        return $this->db->insert_id();
    }

    public function create_order_items($data)
    {
        return $this->db->insert_batch('order_items', $data);
    }
}