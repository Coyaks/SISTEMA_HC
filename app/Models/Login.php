<?php 
namespace App\Models;

use CodeIgniter\Model;

class Login extends Model{
    protected $table      = 'usuarios';
    //protected $primaryKey='id';
    protected $allowedFields=['email','password']; 
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    public function buscarUsuarioPorEmail($email){
        //QueryBuilder
        // $builder=$this->db->table('usuarios');
        // $builder->where($data);

        $builder=$this->db->table($this->table)->where('email',$email);
        return $builder->get()->getResultArray();
    }
}