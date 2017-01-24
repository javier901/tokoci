<?php
/**
 * Created by PhpStorm.
 * User: hasyim
 * Date: 1/13/17
 * Time: 7:24 PM
 */

class Model_products extends CI_Model {

/*    public function males()
    {
        return $this->db
            ->get('products')
            ->result()
            ?: [];
      //return !empty($hasil[0]) ? $hasil : [];
    }*/

    public function all()
    {
        //query semua record di table products
        $hasil = $this->db->get('products');
        if ($hasil->num_rows() > 0){
            return $hasil;
        } else {
            return array();
        }
    }

    public function find($id)
    {
        //query mencari berdasarkan id
        $hasil = $this->db->where('id', $id)
                          ->limit(1)
                          ->get('products');
        if ($hasil->num_rows() > 0 ){
            return $hasil->row();
        } else {
            return array();
        }
    }

    public function create($data_products)
    {
        //Query insert
        $this->db->insert('products', $data_products);
    }

    public function update($id,$data_products)
    {
        //Query update From...  Where id = $id
        $this->db->where('id', $id)
                 ->update('products', $data_products);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)
                 ->delete('products');
    }

}