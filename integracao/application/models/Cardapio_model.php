<?php 

	class Cardapio_model extends CI_Model {

		function __construct() {
			parent::__construct();
            $this->load->database();
		}

		public function retornarCardapiosPorData($data, $tipoRefeicao = null) {
			$this->db->select('*');
			$this->db->where('data', $data);
            
            if ($tipoRefeicao != null) {
                $this->db->where('tipo_refeicao', $tipoRefeicao);
            }
        
            $query = $this->db->get('v_CardapiosPorData');
            
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return 0;
            }
		}
	}

?>