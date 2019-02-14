<?php

require(APPPATH.'/libraries/REST_Controller.php');

class Cardapio extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Cardapio_model', 'cardapio', true);
    }
    
    function retornarCardapiosPorData_get() {
        $data = $this->get('data');
        $tipoRefeicao = $this->get('tipoRefeicao');
        
        if (! $data) {
            $this->response('Nenhum cardápio foi cadastrado na data especificada.', 400);
            exit;
        }
        
        $result = $this->cardapio->retornarCardapiosPorData($data, $tipoRefeicao);

        if ($result) {
            $this->response($result, 200);
            exit;
        } 
        else {
            $this->response('Data do cardápio inválida.', 404);
            exit;
        }
    }

}