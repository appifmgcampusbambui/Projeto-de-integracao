<?php 

	class Evento_model extends CI_Model {

		function __construct() {
			parent::__construct();
            $this->load->database();
		}

		public function retornarEventos() {
            $this->db->select('*');
            $query = $this->db->get('v_Eventos');
            
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return 0;
            }
		}

		public function retornarEvento($id) {
			$this->db->select('*');
			$this->db->where('id', $id);
            
            $query = $this->db->get('v_Evento');
            
            if ($query->num_rows() == 1) {
                return $query->result_array();
            } else {
                return 0;
            }
		}
	}

?>