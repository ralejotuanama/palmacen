<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aparatos_model extends CI_Model {



    public function obtenerA($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array',$cliente){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->join('clientes', 'aparatos.IDclientes = clientes.idClientes', 'left');
        /*$this->db->where('aparatos.IDclientes', $cliente);*/
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    public function count($table,$cliente){
        $this->db->where('clientes_id', $cliente);
        return $this->db->count_all($table);
    }


 }   