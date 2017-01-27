<?php
/**
 * Created by PhpStorm.
 * User: hasyim
 * Date: 1/13/17
 * Time: 7:10 PM
 */
class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

       /* if ($this->session->userdata('group') != '1')
        {
            $this->session->set_flashdata('error','Sorry you not logged in');
            redirect('login');
        }*/

        //load model -> model_products
        $this->load->model('Model_products');
    }


    public function index()
    {
        $data['products'] = $this->Model_products->all()->result();
        $this->load->view('backend/view_all_products', $data);
    }

    public function create()
    {
        //validasi form menggunakan form_vaidation
        //sebelum eksekusi query
        $this->form_validation->set_rules('name', 'Product Name', 'required');
        $this->form_validation->set_rules('description', 'Product Description', 'required');
        $this->form_validation->set_rules('price', 'Product Price', 'required|integer');
        $this->form_validation->set_rules('stock', 'Available Stock', 'required|integer');
        //$this->form_validation->set_rules('userfile', 'Product Image', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('backend/form_tambah_product');
        } else {
            if ($_FILES['userfile']['name'] != '') {
                //form submit gambar diisi
                //load uploading file library
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 300; //mb
                $config['max_width'] = 3000; //pixels
                $config['max_height'] = 3000; //pixels

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()) {
                    // file gagal di upload
                    // ->kembali ke form tambah
                    $this->load->view('backend/form_tambah_product');
                } else {
                    // file berhasil di upload -> exec query insert
                    // eksekusi Query
                    $gambar = $this->upload->data();
                    $data_product = array(
                        'name' => set_value('name'),
                        'description' => set_value('description'),
                        'price' => set_value('price'),
                        'stock' => set_value('stock'),
                        'image' => $gambar['file_name']
                    );
                    $this->Model_products->create($data_product);
                    redirect('admin/products');
                }
            } else {
                //form submit dengan gambar dikosongkan
                $data_product = array(
                    'name' => set_value('name'),
                    'description' => set_value('description'),
                    'price' => set_value('price'),
                    'stock' => set_value('stock'),
                );
                $this->Model_products->create($data_product);
                redirect('admin/products');
            }
        }
    }

    public function update($id)
    {
        //validasi form menggunakan form_vaidation
        //sebelum eksekusi query
        $this->form_validation->set_rules('name', 'Product Name', 'required');
        $this->form_validation->set_rules('description', 'Product Description', 'required');
        $this->form_validation->set_rules('price', 'Product Price', 'required|integer');
        $this->form_validation->set_rules('stock', 'Available Stock', 'required|integer');

        if ($this->form_validation->run() == FALSE) {

            $data['product'] = $this->Model_products->find($id);
            $this->load->view('backend/form_edit_product', $data);
        } else {
            if ($_FILES['userfile']['name'] != '') {
                //form submit gambar diisi
                $config['upload_path'] = './uploads';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 300; //mb
                $config['max_width'] = 3000; //pixels
                $config['max_height'] = 3000; //pixels

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()) {

                    $data['product'] = $this->Model_products->find($id);
                    $this->load->view('backend/form_edit_product', $data);
                } else {
                    //eksekusi Query
                    $gambar = $this->upload->data();
                    $data_product = array(
                        'name' => set_value('name'),
                        'description' => set_value('description'),
                        'price' => set_value('price'),
                        'stock' => set_value('stock'),
                        'image' => $gambar['file_name']
                    );
                    $this->Model_products->update($id, $data_product);
                    redirect('admin/products');
                }
            } else {
                $data_product = array(
                    'name' => set_value('name'),
                    'description' => set_value('description'),
                    'price' => set_value('price'),
                    'stock' => set_value('stock'),
                );
                $this->Model_products->update($id, $data_product);
                redirect('admin/products');
            }
        }
    }

    public function delete($id)
    {
        $this->Model_products->delete($id);
        redirect('admin/products');
    }

}
