<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Chat extends REST_Controller
{

  function __construct()
  {
    // Construct the parent class
    parent::__construct();

    $this->load->model(array('Chat_model'));
  }

  public function index_get()
  {
    $result = [
      'error'   => false,
      'message' => "Success",
      'data'    => 'Dimas Rakhmad'
    ];
    // Set the response and exit
    $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
  }

  public function test_get()
  {
    $result = [
      'error'   => false,
      'message' => "Success",
      'data'    => 'Dimas Rakhmad'
    ];
    // Set the response and exit
    $this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
  }

  public function send_post()
  {
    $id = $this->post('id');
    $name = $this->post('name');
    $data = [
      'id'   => $id,
      'name' => $name
    ];

    $check = $this->Chat_model->check($id);
    if ($check) {
      $save = $this->Chat_model->update($data);
    } else {
      $save = $this->Chat_model->add($data);
    }

    if ($save) {
      $message = [
        'error'   => false,
        'message' => 'Success',
        'data'    => ['id' => $id, 'name' => $name]
      ];
      $this->set_response($message, REST_Controller::HTTP_OK);
    } else {
      $message = [
        'error'   => true,
        'message' => 'Something Gone Wrong'
      ];
      $this->set_response($message, REST_Controller::HTTP_OK);
    }

  }

}
