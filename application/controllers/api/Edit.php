<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Edit extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Edit_model', 'edit');
    }

 //POST METHOD
    public function index_post()
    {
        $data = [
            'genre' => $this->post('genre'),
            'judul' => $this->post('judul'),
            'pencipta' => $this->post('pencipta'),
            'isi' => $this->post('isi')
        ];

        if($this->edit->createPuisi($data) > 0) {
            $this->response([
                    'status' => true,
                    'message' => 'puisi ditambahkan'
                ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                    'status' => false,
                    'message' => 'terdapat kesalahan'
                ], REST_Controller::HTTP_BAD_REQUEST);
        }

    }

    //PUT METHOD
    public function index_put()
        {
            $id = $this->put('id');
            $data = [
                
                'genre' => $this->put('genre'),
                'judul' => $this->put('judul'),
                'pencipta' => $this->put('pencipta'),
                'isi' => $this->put('isi')
        ];

        if($this->edit->updatePuisi($data, $id) > 0) {
            $this->response([
                    'status' => true,
                    'message' => 'puisi diubah'
                ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                    'status' => false,
                    'message' => 'gagal mengubah, terdapat kesalahan'
                ], REST_Controller::HTTP_BAD_REQUEST);
        }
        }

}