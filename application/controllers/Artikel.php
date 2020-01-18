<?php

require APPPATH . '/libraries/REST_Controller.php';

Class Artikel extends REST_Controller {

    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get() {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->join('kategori', 'kategori.id=post.id_kategori');
        $kategori = $this->db->get()->result();
        $this->response($kategori, REST_Controller::HTTP_OK);
    }

    function index_post() {
        $id_kategori = $this->post('id_kategori');
        $isi_post = $this->post('isi_post');
        $foto = $this->post('foto');
        $judul = $this->post('judul');
        $artikel = array('id_kategori' => $id_kategori, 'isi_post' => $isi_post, 'foto' => $foto,'judul'=>$judul);
        $this->db->insert('post', $artikel);
        $this->response($artikel, REST_Controller::HTTP_CREATED);
    }

    function index_put() {
        $id_post = $this->put('id_post');
        $id_kategori = $this->put('id_kategori');
        $isi_post = $this->put('isi_post');
        $judul = $this->put('judul');
        $foto = $this->put('foto');
        $artikel = array('id_kategori' => $id_kategori, 'isi_post' => $isi_post,'id_post'=>$id_post, 'foto' => $foto,'judul'=>$judul);
        $this->db->where('id_post', $id_post);
        $this->db->update('post', $artikel);
        $this->response($artikel, REST_Controller::HTTP_CREATED);
    }
    
      function index_delete() {
        $id_post = $this->delete('id_post');
        $this->db->where('id_post', $id_post);
        $this->db->delete('post');
        $message = array('id_post' => $id_post, 'message' => 'data sudah dihapus');
        $this->response($message, REST_Controller::HTTP_OK);
    }

}
?>

