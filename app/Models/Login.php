<?php 
namespace App\Models;

use CodeIgniter\Model;

class Login extends Model{
    protected $table      = 'usuarios';
    //protected $primaryKey='id';
    protected $allowedFields=['email','password']; 
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    public function obtenerUsuario($data){ 
        //QueryBuilder
        $usuario=$this->db->table('usuarios');
        $usuario->where($data);
        return $usuario->get()->getResultArray();
    }
    public function buscarUsuarioPorEmail($email){
        $builder=$this->db->table($this->table)->where('email',$email);
        return $builder->get()->getResultArray();
    }
}