<?php class News_model extends CI_Model {
	
	public function __construct(){
		$this->load->database();
		}
	
	public function get_news($slug = FALSE){
		if ($slug === FALSE){
			$query = $this->db->get('tskripsi');
			
			return $query->result_array();
		}
		
		$query = $this->db->get_where('tskripsi', array('slug' => $slug));
	
		return $query->row_array();
	}
	
	public function get_news_by_id($nim = 0){
		if ($nim == 0){
			$query = $this->db->get('tskripsi');
			
			return $query->result_array();
		}
		
		$query = $this->db->get_where('tskripsi', array('nim' => $nim));
		
		return $query->row_array();	
	}
	
	public function set_news($nim = 0){
		$this->load->helper('url');
		$slug = url_title($this->input->post('nim'), 'dash', TRUE);
		$data = array('nim' => $this->input->post('nim'), 'nama' => $this->input->post('nama'), 'judul' => $this->input->post('judul'), 'pemb' => $this->input->post('pemb'));
		
		if ($nim == 0){
			return $this->db->insert('tskripsi', $data);
		} else {
			$this->db->where('nim', $nim);
		
			return $this->db->update('tskripsi', $data);
		}
	}
		
	public function delete_news($nim){
		$this->db->where('nim', $nim);
		
		return $this->db->delete('tskripsi');
		}
} 