<?php
class ItemsModel extends CI_Model{

    protected $tableName = "product_items";

    function __construct(){
        parent::__construct();
        // load the database connection
        $this->load->database();
    }

    function getItem($id){
        $query = $this->db->where("id", $id)->get("item_details");
        $row = $query->result();
    }
    function getAllItems(){
        // get all data from table
        return $this->db->get("item_details_view")->result();
    }
    function updateItems($id, $arrayUpdate){
        /* 
            Example for array:
                $array = array(
                    'update' => $update
                )
            Then execute it.

        */
        $this->db->where("id", $id);
        $this->db->update($tableName, $arrayUpdate);
    }
    function deleteItem($id){
        $this->db->delete("nama tabel", $id);
    }
    function createItem($id, $arrayItems){
        /* 
            Example for array:
                $array = array(
                    'update' => $update
                )
            Then execute it.

        */
        $this->db->where("id", $id);
        $this->db->insert($tableName, $arrayItems);
    }
    function count($id){

    }
}