<?php

require(APPPATH.'/libraries/REST_Controller.php');

class Noticia extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Noticia_model', 'noticia', true);
    }
    
    function retornarNoticias_get() {
        $result = $this->noticia->retornarNoticias();

        if ($result) {
            $this->response($result, 200); 
        }
        else {
            $this->response('Nenhum registro encontrado.', 404);
        }
    }

    function retornarNoticia_get() {
        $id  = $this->get('id');
        
        if (! $id) {
            $this->response('Nenhuma notícia foi encontrada com o ID especificado.', 400);
            exit;
        }
        
        $result = $this->noticia->retornarNoticia($id);

        if ($result) {
            $this->response($result, 200);
            exit;
        } 
        else {
            $this->response('ID da notícia inválido.', 404);
            exit;
        }
    }

}