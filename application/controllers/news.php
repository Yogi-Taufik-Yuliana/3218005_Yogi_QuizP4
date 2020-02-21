<?php class News extends CI_Controller {       
	public function __construct(){         
		parent::__construct();
		$this->load->model('news_model');         
		$this->load->helper('url_helper');     
	}       
	
	public function index(){         
		$data['news'] = $this->news_model->get_news();         
		$data['title'] = '';           
		$this->load->view('templates/header', $data);         
		$this->load->view('news/index', $data);         
		$this->load->view('templates/footer');     
	}       
	
	public function view($judul = NULL){
		/*$data['news_item'] = $this->news_model->get_news($slug);                  
		
		if (empty($data['news_item'])){             
			show_404();         
		}           
		
		$data['nim'] = $data['news_item']['nim'];
		$this->load->view('templates/header', $data);         
		$this->load->view('news/view', $data);         
		$this->load->view('templates/footer');  */
		
		$data['news'] = $this->news_model->get_news();         
		$data['title'] = 'News archive';           
		$this->load->view('templates/header', $data);         
		$this->load->view('news/view', $data);         
		$this->load->view('templates/footer'); 		
	}          
	
	public function create(){         
		$this->load->helper('form');         
		$this->load->library('form_validation');           
		$data['title'] = '';           
		$this->form_validation->set_rules('nim', 'nim', 'required');         
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('pemb', 'pemb', 'required');
		
		if ($this->form_validation->run() === FALSE){             
			$this->load->view('templates/header', $data);             
			$this->load->view('news/create');             
			$this->load->view('templates/footer');           
		}else{             
			$this->news_model->set_news();             
			$this->load->view('templates/header', $data);             
			$this->load->view('news/index');             
			$this->load->view('templates/footer');   
			//
			+redirect( base_url().'index.php/news');     			
		}   		
	}          
	
	public function tambah(){
		$data['news'] = $this->news_model->get_news();         
		$data['title'] = 'News archive';           
		$this->load->view('templates/header', $data);         
		$this->load->view('news/create', $data);         
		$this->load->view('templates/footer'); 
	}
	
	public function edit(){         
		$nim = $this->uri->segment(3);                  
		
		if (empty($nim)){             
			show_404();         
		}                  
		
		$this->load->helper('form');         
		$this->load->library('form_validation');                  
		$data['title'] = '';                 
		$data['news_item'] = $this->news_model->get_news_by_id($nim);
		$this->form_validation->set_rules('nim', 'nim', 'required');         
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('pemb', 'pemb', 'required');     
		
		if ($this->form_validation->run() == FALSE){             
			$this->load->view('templates/header', $data);             
			$this->load->view('news/edit', $data);             
			$this->load->view('templates/footer');
		}else{             
			$this->news_model->set_news($nim);             
			//$this->load->view('news/success');             
			redirect( base_url().'index.php/news');         
		}     
	}          
	
	public function delete(){         
		$nim = $this->uri->segment(3);                  
		
		if (empty($nim)){             
			show_404();
		}                          
		
		$news_item = $this->news_model->get_news_by_id($nim);                  
		$this->news_model->delete_news($nim);                 
		
		redirect( base_url() . 'index.php/news');             
	} 
} 