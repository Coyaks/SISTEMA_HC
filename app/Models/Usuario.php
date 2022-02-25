<?php 
namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model{

    protected $table='usuarios';
    // protected $primaryKey='id';
	// "$allowedFields" -> que campos quiero que se inserten y actualicen
    protected $allowedFields=['nombre','apellidos','email','password','idRol','estado'];

    public function tablaUsuario(){
        $builder=$this->db->table('usuarios');
        return $builder;
    }

    public function acciones_usuario(){
		$action_button = function($row){
			return '
				<button type="button" name="edit" class="btn btn-warning btn-sm edit" data-id="'.$row['id'].'"><i class="fas fa-edit"></i></button>
				&nbsp;
				<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row['id'].'"><i class="fas fa-trash-alt"></i></button>
				';
		};

		return $action_button;
	}

}