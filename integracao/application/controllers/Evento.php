<?php

require(APPPATH.'/libraries/REST_Controller.php');

class Evento extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Evento_model', 'evento', true);
    }
    
    function retornarEventos_get() {
        $result = $this->evento->retornarEventos();

        if ($result) {
            $this->response($result, 200); 
        } 
        else {
            $this->response('Nenhum registro encontrado.', 404);
        }
    }

    function retornarEvento_get() {
        $id  = $this->get('id');
        
        if (! $id) {
            $this->response('Nenhum Evento foi encontrado com o ID especificado.', 400);
            exit;
        }
        
        $result = $this->evento->retornarEvento($id);

        if ($result) {
            $this->response($result, 200);
            exit;
        } 
        else {
            $this->response('ID do evento inválido ou evento inativo.', 404);
            exit;
        }
    }

}