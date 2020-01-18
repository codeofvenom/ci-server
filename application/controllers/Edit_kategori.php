<?php

require APPPATH . '/libraries/REST_Controller.php';

Class Edit_kategori extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_post() {
        $id_post = $this->post('id');
        $post    = $this->db->get_where('kategori',array('id'=>$id_post))->result();
        $this->response($post, REST_Controller::HTTP_OK);
    }


}
?>

