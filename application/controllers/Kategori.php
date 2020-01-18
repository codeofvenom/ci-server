<?php

require APPPATH . '/libraries/REST_Controller.php';

class Kategori extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get() {
        $kategori = $this->db->get('kategori')->result();
        $this->response($kategori, REST_Controller::HTTP_OK);
    }

    function index_post() {
        $nama_kategori = $this->post('nama_kategori');
        $kategori = array('nama_kategori' => $nama_kategori);
        $this->db->insert('kategori', $kategori);
        $this->response($kategori, REST_Controller::HTTP_CREATED);
    }

    function index_put() {
        $id = $this->put('id');
        $nama_kategori = $this->put('nama_kategori');
        $kategori = array('nama_kategori' => $nama_kategori);
        $this->db->where('id', $id);
        $this->db->update('kategori', $kategori);
        $this->response($kategori, REST_Controller::HTTP_OK);
    }

    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $this->db->delete('kategori');
        $message = array('id' => $id, 'message' => 'data sudah dihapus');
        $this->response($message, REST_Controller::HTTP_OK);
    }

}
