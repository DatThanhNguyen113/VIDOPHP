<?php
class Product_model extends CI_Model{

    public function getByType($type){
        $this->db->select('*')->from('product')->where(['product_type_id'=>$type]);
        $data = $this->db->get();
        return $data->result();
    }

    public function getDetail($id){
        $this->db->select('*')->from('product')->where(['id'=>$id]);
        $data = $this->db->get();
        return $data->result();
    }

    public function getBestPrice(){
        $this->db->select('*')->from('product')->order_by("price","asc")->limit(4);
        $data = $this->db->get();
        return $data->result();
    }

    public function getByName($name){
        $query = $this->db->select('*')->from('product')->like('name',$name);
        $query  =   $this->db->get();
        return $query->result();
    }

    public function getHisroty($userid){
        $query = $this->db->select('B.image,B.name,A.amount,A.total_row_price,C.create_time')
                            ->from('bill_detail As A')
                            ->join("product As B",'B.id = A.product_id','RIGHT')
                            ->join('bill As C','C.id = A.bill_id AND C.user_id = ' .$userid,'INNER')
                            ->get();
                            if($query !== FALSE && $query->num_rows() > 0){
                                return $query->result();
                            }
    }

    public function getAllBill(){
        // $this->db->select('*')->from('bill_detail');
        // $data = $this->db->get();

        $query = $this->db->select('C.id, B.name, A.amount, A.total_row_price, D.user_name')
                            ->from('bill_detail As A')
                            ->join('product As B', 'B.id = A.product_id', 'RIGHT')
                            ->join('bill As C', 'C.id = A.bill_id', 'INNER')
                            ->join('user As D', 'D.id = C.user_id', 'INNER')
                            ->get();
        return $query->result();
    }
	
	function detail($id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where(array('id'=>$id));
        $data = $this->db->get();

        //Tra ve 1 dong 
        return $data->row_array();
    }

    function insert($data)
    {
        $insert =$this->db->insert('product', $data);
        if (!$insert ) 
        {
            echo "Error. Failed to insert product ";exit;
        } else 
        {
            echo "Ok,". $this->db->last_query();//exit;
        }
    }

    function update($id, $data)
    {
        $this->db->update('product', $data, array('id' => $id));
        return $this->db->affected_rows() ;
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('product');
    }
	
	    public function getAllProduct(){
        $query = $this->db->get('product');
        return $query->result();
    }

    public function getAllCategory(){
        $query = $this->db->get('product_type');
        return $query->result();
    }
}