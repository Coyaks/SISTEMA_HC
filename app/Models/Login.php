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
    public function obtenerUsuario2(){
        //QueryBuilder
        //$query=$this->db->query("SELECT * FROM usuarios");
        //Conectarse a la dn y a la tabla
        $usuario=$this->db->query('SELECT * from usuarios');
        return $usuario->getResult();
    }
}