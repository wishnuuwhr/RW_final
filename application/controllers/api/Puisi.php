<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Puisi extends REST_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Puisi_model', 'puisi');
    }

    //GET METHOD
    public function index_get()
    {
        $id = $this->get('id');
        if($id === null) {
            $puisi = $this->puisi->getPuisi();
        } else {
            $puisi = $this->puisi->getPuisi($id);
        }
        
        if($puisi) {
             $this->response([
                    'status' => true,
                    'data' => $puisi
                ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    
}