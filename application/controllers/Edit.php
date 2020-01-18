<?php

require APPPATH . '/libraries/REST_Controller.php';

Class Edit extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_post() {
        $id_post= $this->post('id_post');
        $post = $this->db->get_where('post',array('id_post'=>$id_post))->result();
        $this->response($post, REST_Controller::HTTP_OK);
    }
    
    function index_put(){
         $id_kategori= $this->put('id_kategori');
         $this->db->where('id_kategori',$id_kategori);
         $post= $this->db->get('post')->result();
         $this->response($post, REST_Controller::HTTP_OK);
    }


}
?>

