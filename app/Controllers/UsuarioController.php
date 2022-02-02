<?php

namespace App\Controllers;

use App\Models\Usuario;

use monken\TablesIgniter;

class UsuarioController extends BaseController
{

    public function index()
    {
        return view('usuario/index');
    }

    function fetch()
    {
        $crudModel = new Usuario();

        $data_table = new TablesIgniter();

        $data_table->setTable($crudModel->tablaUsuario())
            ->setDefaultOrder("id", "DESC")
            ->setSearch(["nombre", "email","password"])
            ->setOrder(["id", "nombre", "email", "password"])
            ->setOutput(["id", "nombre", "email", "password", $crudModel->acciones_usuario()]);
        return $data_table->getDatatable();
    }

    function action(){
        if ($this->request->getVar('action')) {
            helper(['form', 'url']);
            $name_error = '';
            $email_error = '';
            $gender_error = '';
            $error = 'no';
            $success = 'no';
            $message = '';

            $error = $this->validate([
                'name'    =>    'required|min_length[3]',
                'email'    =>    'required|valid_email',
                'password' =>    'required'
            ]);

            if (!$error) {
                $error = 'yes';
                $validation = \Config\Services::validation();
                if ($validation->getError('name')) {
                    $name_error = $validation->getError('name');
                }

                if ($validation->getError('email')) {
                    $email_error = $validation->getError('email');
                }

                if ($validation->getError('password')) {
                    $gender_error = $validation->getError('password');
                }
            } else {
                $success = 'yes';
                if ($this->request->getVar('action') == 'Add') {
                    $crudModel = new Usuario();
                    // ========== INSERT INTO ========== 
                    $crudModel->save([
                        'nombre'        =>  $this->request->getVar('name'),
                        'email'       =>    $this->request->getVar('email'),
                        'password'    =>    $this->request->getVar('password')
                    ]);
                    $message = '<div class="alert alert-success">Usuario agregado</div>';
                }

                if ($this->request->getVar('action') == 'Edit') {
                    $crudModel = new Usuario();

                    $id = $this->request->getVar('hidden_id');
                    $data = [
                        'nombre'      =>  $this->request->getVar('name'),
                        'email'     =>  $this->request->getVar('email'),
                        'password'    =>  $this->request->getVar('password')
                    ];
                    // ========= UPDATE USUARIO ========= 
                    $crudModel->update($id, $data);
                    $message = '<div class="alert alert-success">Usuario Actualizado</div>';
                }
            }

            $output = array(
                'name_error'    =>    $name_error,
                'email_error'    =>    $email_error,
                'gender_error'    =>    $gender_error,
                'error'            =>    $error,
                'success'        =>    $success,
                'message'        =>    $message
            );

            echo json_encode($output);
        }
    }

    function fetch_single_data()
    {
        if ($this->request->getVar('id')) {
            $crudModel = new Usuario();
            $user_data = $crudModel->where('id', $this->request->getVar('id'))->first();
            echo json_encode($user_data);
        }
    }

    function delete()
    {
        if ($this->request->getVar('id')) {
            $id = $this->request->getVar('id');
            $crudModel = new Usuario();
            // DELETE -> METODOS DE CODEIGNITER TIPO ORM 
            $crudModel->where('id', $id)->delete($id);
            echo '<div class="alert alert-success">Usuario Eliminado</div>';
        }
    }
}
