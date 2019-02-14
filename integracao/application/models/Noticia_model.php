<?php 

	class Noticia_model extends CI_Model {

		function __construct() {
			parent::__construct();
            $this->load->database();
		}

		public function retornarNoticias() {
            $this->db->select('id, titulo');
            $query = $this->db->get('v_Noticias');

            if ($query) { //Se não deu erro na consulta por acesso à view
                if ($query->num_rows() > 0) {
                    return $query->result_array();
                } else {
                    return 0;
                } 
            }
		}

		public function retornarNoticia($id) {
			$this->db->select('*');
			$this->db->where('id', $id);
            
            $query = $this->db->get('v_Noticia');
            
            if ($query->num_rows() == 1) {
                return $query->result_array();
            } else {
                return 0;
            }
		}
	}

?>