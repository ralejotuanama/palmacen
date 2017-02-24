<?php
class Mapos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    function getById($id){
        $this->db->from('usuarios');
        $this->db->select('usuarios.*, permissoes.nome as permissao');
        $this->db->join('permissoes', 'permissoes.idPermissao = usuarios.permissoes_id', 'left');
        $this->db->where('idUsuarios',$id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function alterarSenha($senha,$oldSenha,$id){

        $this->db->where('idUsuarios', $id);
        $this->db->limit(1);
        $usuario = $this->db->get('usuarios')->row();

        if($usuario->senha != $oldSenha){
            return false;
        }
        else{
            $this->db->set('senha',$senha);
            $this->db->where('idUsuarios',$id);
            return $this->db->update('usuarios');    
        }

        
    }

    function pesquisar($termo){
         $data = array();
         
         // Buscando Nombre del Cliente
    	 $this->db->like('nomeCliente', $termo);
    	 // Buscando id del Cliente
    	 $this->db->or_like('idClientes', $termo);
    	 // Buscando documento del Cliente
    	 $this->db->or_like('documento', $termo);
         // Buscando email del Cliente
         $this->db->or_like('email', $termo);
    	 // buscando telefono del Cliente
    	 $this->db->or_like('telefone', $termo);
    	 $this->db->limit(5);
    	 $data['clientes'] = $this->db->get('clientes')->result();


         // buscando id os
         $this->db->like('idOs', $termo);
         // buscando  os de cliente
         $this->db->or_like('clientes_id',$termo);
         // buscando  Data inicial os
         $this->db->or_like('dataInicial',$termo);
         // buscando  Data Final os
         $this->db->or_like('dataFinal',$termo);
         // buscando  Defecto os
         $this->db->or_like('defeito',$termo);
         // buscando  por marca os
         $this->db->or_like('marca',$termo);
         // buscando  por modelo os
         $this->db->or_like('modelo',$termo);
         // buscando  por serie os
         $this->db->or_like('serie',$termo);
         $this->db->limit(5);
         $data['os'] = $this->db->get('os')->result();

         // buscando id produtos
         $this->db->like('idProdutos',$termo);
         // buscando Descripción produtos
         $this->db->or_like('descricao',$termo);
         // buscando Precio Venta produtos
         $this->db->or_like('precoVenda',$termo);
         $this->db->limit(5);
         $data['produtos'] = $this->db->get('produtos')->result();

         //buscando id serviços
         $this->db->like('idServicos',$termo);
         //buscando Nombre serviços
         $this->db->or_like('nome',$termo);
         //buscando Precio serviços
         $this->db->or_like('preco',$termo);
         $this->db->limit(5);
         $data['servicos'] = $this->db->get('servicos')->result();


         //buscando ID de Aparato
         $this->db->like('aparatos_id', $termo);
         //buscando al Cliente dueño del aparato
         $this->db->or_like('IDclientes',$termo);
         //buscando tipo de aparato
         $this->db->or_like('tipo',$termo);
         //buscando Modelo Aparato
         $this->db->or_like('modelo',$termo);
         //buscando Serial Aparato
         $this->db->or_like('n_serie',$termo);
         //buscando Marca Aparato
         $this->db->or_like('marca',$termo);
         $this->db->limit(5);
         $data['aparatos'] = $this->db->get('aparatos')->result();

         return $data;
    }

    
    function add($table,$data){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }   
	
	function count($table){
		return $this->db->count_all($table);
	}

    function getOsAbertas(){
        $this->db->select('os.*, clientes.nomeCliente');
        $this->db->from('os');
        $this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
        $this->db->where('os.status','Abierto');
        $this->db->limit(10);
        return $this->db->get()->result();
    }

    function getOsWeb(){
        $this->db->select('os.*, clientes.nomeCliente');
        $this->db->from('os');
        $this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
        $this->db->where('os.status','PENDIENTE ASIGNAR TÉCNICO');
        $this->db->limit(10);
        return $this->db->get()->result();
    }

    function getProdutosMinimo(){

        $sql = "SELECT * FROM produtos WHERE estoque <= estoqueMinimo LIMIT 10"; 
        return $this->db->query($sql)->result();

    }

    function getOsEstatisticas(){
        $sql = "SELECT status, COUNT(status) as total FROM os GROUP BY status ORDER BY status";
        return $this->db->query($sql)->result();
    }

    public function getEstatisticasFinanceiro(){
        $sql = "SELECT SUM(CASE WHEN baixado = 1 AND tipo = 'ingreso' THEN valor END) as total_ingreso, 
                       SUM(CASE WHEN baixado = 1 AND tipo = 'gasto' THEN valor END) as total_gasto,
                       SUM(CASE WHEN baixado = 0 AND tipo = 'ingreso' THEN valor END) as total_ingreso_pendente,
                       SUM(CASE WHEN baixado = 0 AND tipo = 'gasto' THEN valor END) as total_gasto_pendente FROM lancamentos";
        return $this->db->query($sql)->row();
    }


    public function getEmitente()
    {
        return $this->db->get('emitente')->result();
    }

    public function addEmitente($nome, $cnpj, $ie, $logradouro, $numero, $bairro, $cidade, $uf,$telefone,$email, $logo){
       
       $this->db->set('nome', $nome);
       $this->db->set('cnpj', $cnpj);
       $this->db->set('ie', $ie);
       $this->db->set('rua', $logradouro);
       $this->db->set('numero', $numero);
       $this->db->set('bairro', $bairro);
       $this->db->set('cidade', $cidade);
       $this->db->set('uf', $uf);
       $this->db->set('telefone', $telefone);
       $this->db->set('email', $email);
       $this->db->set('url_logo', $logo);
       return $this->db->insert('emitente');
    }



   
    public function editEmitente($id, $nome, $cnpj, $ie, $logradouro, $numero, $bairro, $cidade, $uf,$telefone,$email){
        
       $this->db->set('nome', $nome);
       $this->db->set('cnpj', $cnpj);
       $this->db->set('ie', $ie);
       $this->db->set('rua', $logradouro);
       $this->db->set('numero', $numero);
       $this->db->set('bairro', $bairro);
       $this->db->set('cidade', $cidade);
       $this->db->set('uf', $uf);
       $this->db->set('telefone', $telefone);
       $this->db->set('email', $email);
       $this->db->where('id', $id);
       return $this->db->update('emitente');
    }


    public function editLogo($id, $logo){
        
        $this->db->set('url_logo', $logo); 
        $this->db->where('id', $id);
        return $this->db->update('emitente'); 
         
    }
}