<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conecte extends CI_Controller {

	
	public function __construct(){

		parent::__construct();
        $this->load->helper(array('form', 'codegen_helper'));
		$this->load->model('Conecte_model');

	}


	public function index(){

        $this->load->library('form_validation');       
        $this->data['custom_error'] = '';
		$this->load->view('conecte/login',$this->data);        
		
	}

	public function sair(){
        $this->session->sess_destroy();
        redirect('conecte');
    }


    public function login(){

        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','valid_email|required|xss_clean|trim');
        $this->form_validation->set_rules('telefone','Telefone','required|xss_clean|trim');
        $ajax = $this->input->get('ajax');
        if ($this->form_validation->run() == false) {
            
            if($ajax == true){
                $json = array('result' => false);
                echo json_encode($json);
            }
            else{
                $this->session->set_flashdata('error','Los datos de acceso son incorrectos.');
                redirect(base_url().'conecte');
            }
        } 
        else {

            $email = $this->input->post('email');
            $telefone = $this->input->post('telefone');


            $this->db->where('email',$email);
            $this->db->where('telefone',$telefone);
            $this->db->limit(1);
            $cliente = $this->db->get('clientes')->row();

            if(count($cliente) > 0){
                $dados = array('nome' => $cliente->nomeCliente, 'id' => $cliente->idClientes,'token' => 20540658, 'conectado' => TRUE);
                $this->session->set_userdata($dados);

                if($ajax == true){
                    $json = array('result' => true);
                    echo json_encode($json);
                }
                else{
                    redirect(base_url().'conecte');
                }

                
            }
            else{
                
                
                if($ajax == true){
                    $json = array('result' => false);
                    echo json_encode($json);
                }
                else{
                    $this->session->set_flashdata('error','Los datos de acceso son incorrectos.');
                    redirect(base_url().'conecte');
                }
            }
            
        }
        
    }




	public function painel(){
		
		if((!$this->session->userdata('session_id')) || (!$this->session->userdata('conectado') || ($this->session->userdata('token') != 20540658))){
        	redirect('conecte');
        }

        $data['menuPainel'] = 'painel';
		$data['compras'] = $this->Conecte_model->getLastCompras($this->session->userdata('id'));
		$data['os'] = $this->Conecte_model->getLastOs($this->session->userdata('id'));
		$data['output'] = 'conecte/painel';
		$this->load->view('conecte/template',$data);

	}

	public function conta(){
		
		if((!$this->session->userdata('session_id')) || (!$this->session->userdata('conectado') || ($this->session->userdata('token') != 20540658))){
        	redirect('conecte');
        }

        $data['menuConta'] = 'conta';
        $data['result'] = $this->Conecte_model->getDados();
       
        $data['output'] = 'conecte/conta';
        $this->load->view('conecte/template',$data);
	}


    public function editarDados($id = null){

        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('conectado') || ($this->session->userdata('token') != 20540658))){
            redirect('conecte');
        }

        $data['menuConta'] = 'conta';

        $this->load->library('form_validation');
        $data['custom_error'] = '';

        if ($this->form_validation->run('clientes') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'nomeCliente' => $this->input->post('nomeCliente'),
                'documento' => $this->input->post('documento'),
                'telefone' => $this->input->post('telefone'),
                'celular' => $this->input->post('celular'),
                'email' => $this->input->post('email'),
                'rua' => $this->input->post('rua'),
                'numero' => $this->input->post('numero'),
                'bairro' => $this->input->post('bairro'),
                'cidade' => $this->input->post('cidade'),
                'estado' => $this->input->post('estado'),
                'cep' => $this->input->post('cep')
            );

            if ($this->Conecte_model->edit('clientes', $data, 'idClientes', $this->input->post('idClientes')) == TRUE) {
                $this->session->set_flashdata('success','Datos editados con éxito!');
                redirect(base_url() . 'index.php/conecte/conta');
            } else {
                
            }
        }

        $data['result'] = $this->Conecte_model->getDados();
       
        $data['output'] = 'conecte/editar_dados';
        $this->load->view('conecte/template',$data);

        $this->load->
    }

	public function compras(){
		
		if((!$this->session->userdata('session_id')) || (!$this->session->userdata('conectado') || ($this->session->userdata('token') != 20540658))){
        	redirect('conecte');
        }

        $data['menuVendas'] = 'vendas';
		$this->load->library('pagination');
        
        
        $config['base_url'] = base_url().'index.php/conecte/compras/';
        $config['total_rows'] = $this->Conecte_model->count('vendas',$this->session->userdata('id'));
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        	
        $this->pagination->initialize($config); 	

		$data['results'] = $this->Conecte_model->getCompras('vendas','*','',$config['per_page'],$this->uri->segment(3),'','',$this->session->userdata('id'));
       
	    $data['output'] = 'conecte/compras';
       	$this->load->view('conecte/template',$data);

	}

	public function os(){
		
		if((!$this->session->userdata('session_id')) || (!$this->session->userdata('conectado') || ($this->session->userdata('token') != 20540658))){
        	redirect('conecte');
        }

        $data['menuOs'] = 'os';
		$this->load->library('pagination');
        
        
        $config['base_url'] = base_url().'index.php/conecte/os/';
        $config['total_rows'] = $this->Conecte_model->count('os',$this->session->userdata('id'));
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        	
        $this->pagination->initialize($config); 	

		$data['results'] = $this->Conecte_model->getOs('os','*','',$config['per_page'],$this->uri->segment(3),'','',$this->session->userdata('id'));
       
	    $data['output'] = 'conecte/os';
       	$this->load->view('conecte/template',$data);
	}

    public function aparatos(){
        
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('conectado') || ($this->session->userdata('token') != 20540658))){
            redirect('conecte');
        }

        $data['menua'] = 'aparatos';
        $this->load->library('pagination');
        
        
        $config['base_url'] = base_url().'index.php/conecte/aparatos/';
        $config['total_rows'] = $this->Conecte_model->count('aparatos',$this->session->userdata('id'));
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
            
        $this->pagination->initialize($config);     

        $data['results'] = $this->Conecte_model->obtenerA('aparatos','*','',$config['per_page'],$this->uri->segment(3),'','',$this->session->userdata('id'));
       
        $data['output'] = 'conecte/aparatos';
        $this->load->view('conecte/template',$data);
    }

    public function solicitaros(){

        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('conectado') || ($this->session->userdata('token') != 20540658))){
            redirect('conecte');
        }


        $this->load->library('form_validation');
        $data['menuOs'] = 'os';
        $data['custom_error'] = '';
        
        if ($this->form_validation->run('os') == false) {
           $this->data['custom_error'] = (validation_errors() ? true : false);
        } else {

            $dataInicial = $this->input->post('dataInicial');
            $dataFinal = $this->input->post('dataFinal');

            try {
                
                $dataInicial = explode('/', $dataInicial);
                $dataInicial = $dataInicial[2].'-'.$dataInicial[1].'-'.$dataInicial[0];

                $dataFinal = explode('/', $dataFinal);
                $dataFinal = $dataFinal[2].'-'.$dataFinal[1].'-'.$dataFinal[0];

            } catch (Exception $e) {
               $dataInicial = date('Y/m/d'); 
            }

            $data = array(
                'dataInicial' => $dataInicial,

                'clientes_id' => $this->input->post('clientes_id'),//set_value('idCliente'),

                'usuarios_id' => $this->input->post('usuarios_id'),//set_value('idUsuario'),

                'dataFinal' => $dataFinal,

                'garantia' => set_value('garantia'),

                'descricaoProduto' => set_value('descricaoProduto'),

                'defeito' => set_value('defeito'),

                'status' => set_value('status'),

                'observacoes' => set_value('observacoes'),

                'laudoTecnico' => set_value('laudoTecnico'),
                
                'modelo' => set_value('modelo'),
                
                'marca' => set_value('marca'),
                
                'serie' => set_value('serie'),
                
                'tipo' => set_value('tipo'),

                'faturado' => 0
            );

            if ( is_numeric($id = $this->Conecte_model->add('os', $data, true)) ) {
                $this->session->set_flashdata('success','Su solicitud se registró con exito, en breve nos contactaremos con usted');
                mail('tuEmail', 'Solicitud de Servicio', 'Solicitud de Servicio abierta por el Cliente, por favor Ponerce en contacto en el Cliente lo antes posible.');
                redirect('conecte/os/');

            } else {
                
                $this->data['custom_error'] = '<div class="form_error"><p>Hubo un error</p></div>';
            }
        }
        $data['result'] = $this->Conecte_model->getDados(); 
        $data['output'] = 'conecte/solicitar_servicio';
        $this->load->view('conecte/template', $data);
    }
    
    public function adicionarAjax(){
        $this->load->library('form_validation');

        if ($this->form_validation->run('os') == false) {
           $json = array("result"=> false);
           echo json_encode($json);
        } else {
            $data = array(
                'dataInicial' => set_value('dataInicial'),

                'clientes_id' => $this->input->post('clientes_id'),//set_value('idCliente'),

                'usuarios_id' => $this->input->post('usuarios_id'),//set_value('idUsuario'),

                'dataFinal' => set_value('dataFinal'),

                'garantia' => set_value('garantia'),

                'descricaoProduto' => set_value('descricaoProduto'),

                'defeito' => set_value('defeito'),

                'status' => set_value('status'),

                'observacoes' => set_value('observacoes'),

                'laudoTecnico' => set_value('laudoTecnico'),
                
                'modelo' => set_value('modelo'),
                
                'marca' => set_value('marca'),
                
                'serie' => set_value('serie'),
                
                'tipo' => set_value('tipo')
            );

            if ( is_numeric($id = $this->os_model->add('os', $data, true)) ) {
                $json = array("result"=> true, "id"=> $id);
                echo json_encode($json);

            } else {
                $json = array("result"=> false);
                echo json_encode($json);

            }
        }
         
    }

	public function visualizarOs($id = null){
		
		if((!$this->session->userdata('session_id')) || (!$this->session->userdata('conectado') || ($this->session->userdata('token') != 20540658))){
        	redirect('conecte');
        }

        $data['menuOs'] = 'os';
		$this->data['custom_error'] = '';
        $this->load->model('mapos_model');
        $this->load->model('os_model');
        $data['result'] = $this->os_model->getById($this->uri->segment(3));
        $data['produtos'] = $this->os_model->getProdutos($this->uri->segment(3));
        $data['servicos'] = $this->os_model->getServicos($this->uri->segment(3));
        $data['emitente'] = $this->mapos_model->getEmitente();

        $data['output'] = 'conecte/visualizar_os';
        $this->load->view('conecte/template', $data);

	}

	public function visualizarCompra($id = null){
		
		if((!$this->session->userdata('session_id')) || (!$this->session->userdata('conectado') || ($this->session->userdata('token') != 20540658))){
        	redirect('conecte');
        }

        $data['menuVendas'] = 'vendas';
		$data['custom_error'] = '';
        $this->load->model('mapos_model');
        $this->load->model('vendas_model');
        $data['result'] = $this->vendas_model->getById($this->uri->segment(3));
        $data['produtos'] = $this->vendas_model->getProdutos($this->uri->segment(3));
        $data['emitente'] = $this->mapos_model->getEmitente();

        $data['output'] = 'conecte/visualizar_compra';
        $this->load->view('conecte/template', $data);
	}

    public function apcrear() {

        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('conectado') || ($this->session->userdata('token') != 20540658))){
            redirect('conecte');
        }

        
        $this->load->library('form_validation');
        $data['menua'] = 'aparatos';
        $data['custom_error'] = '';
        $this->load->model('conecte_model');
        

        if ($this->form_validation->run('aparatos') == false) {
            $data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {            
            $data = array(
                'IDclientes' => set_value('clid'),
                'nombre' => set_value('nombre'),
                'tipo' => set_value('tipo'),
                'modelo' => set_value('modelo'),                
                'marca' => set_value('marca'),
                'n_serie' => set_value('serie')
                
            );

            if ($this->conecte_model->aparatoadd('aparatos', $data) == TRUE) {
                $this->session->set_flashdata('success','Producto agregado con éxito!');
                redirect(base_url() . 'index.php/conecte/aparatos/');
            } else {
                $data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';
            }
        }
        
        $data['output'] = 'conecte/adicionaraparato';;
        $this->load->view('conecte/template', $data);
     
    } 

   public function adicionarCo() {
      

        
        
        $this->load->model('clientes_model');
        $this->load->library('form_validation');
        if ($this->form_validation->run('clientes') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
            redirect(base_url().'conecte');
        } else {
            $data = array(
                'nomeCliente' => set_value('nomeCliente'),
                'documento' => set_value('documento'),
                'telefone' => set_value('telefone'),
                'celular' => $this->input->post('celular'),
                'email' => set_value('email'),
                'rua' => set_value('rua'),
                'numero' => set_value('numero'),
                'bairro' => set_value('bairro'),
                'cidade' => set_value('cidade'),
                'estado' => set_value('estado'),
                'cep' => set_value('cep'),
                'dataCadastro' => date('Y-m-d')
            );

            if ($this->clientes_model->add('clientes', $data) == TRUE) {
                $this->session->set_flashdata('success','Su registro ha sido exitoso!! ahora podrá iniciar sesión con su email y su numero de telefono');
                 redirect(base_url().'conecte');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ha ocurrido un error guardando sus datos pongase en contacto con el administrador</p></div>';
                $this->data['view'] = 'conecte/login';
            $this->load->view($this->data);
            }
            
            
        }
      

    }

    

}

/* End of file conecte.php */
/* Location: ./application/controllers/conecte.php */