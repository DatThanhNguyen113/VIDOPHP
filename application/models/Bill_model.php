<?php
class Bill_model extends CI_Model{

    public function createBill($userid){
        $proc = sprintf("CALL usp_bill_action(%u)",$userid);
        $data = $this->db->query($proc)->result_array();
       // $data = $this->db->get();
    //    $this->db->close();
        return $data[0]['ID'];
    }

    public function insertDetail($billid,$productid,$qty,$rowprice){
        try{
            //$proc = sprintf("INSERT INTO `bill_detail`(`bill_id`,`product_id`,`amount`,`total_row_price`) VALUES(%u,%u,%u,%u)",$billid,$productid,$qty,$rowprice);
           $proc = sprintf("CALL usp_detail_action(%u,%u,%u,%u)",$billid,$productid,$qty,$rowprice);
            //echo $proc;
            $arr = array(
                'bill_id'=>$billid,
                'product_id' =>$productid,
                'amount' => $qty,
                'total_row_price' => $rowprice
            );
            $this->db->query($proc);
            // $data  = $this->db->insert('bill_detail',$arr);
            // $rowCount = $this->db->affected_rows();
        }
        catch(Exception $e){
            echo  $this->db->error();
           
            return  $e->getMessage();
        }
    }

    public function updateBill($billid,$row_price){
        $proc = sprintf("CALL trgg_update_bill(%u,%u)",$billid,$row_price);
        $this->db->query($proc);
    }

    public function updateProduct($product_id,$qty){
        $proc = sprintf("CALL usp_product_update(%u,%u)",$product_id,$qty);
        $this->db->query($proc);
    }

    public function addShipDetail($receiver_name,$address,$city,$phone,$bill_id){
        $arr = array(
            'receiver_name'=>$receiver_name,
            'address' =>$city,
            'city' => $city,
            'phone' => $phone,
            'bill_id' => $bill_id
        );
        $this->db->insert('ship_detail',$arr);
    }
}