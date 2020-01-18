<?php

require APPPATH . '/libraries/REST_Controller.php';

Class User extends REST_Controller {

    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get() {
        $this->db->select('*');
        $this->db->from('user');
        $user = $this->db->get()->result();
        $this->response($user, REST_Controller::HTTP_OK);
    }
    

}
?>

