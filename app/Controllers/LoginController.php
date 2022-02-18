<?php

namespace App\Controllers;

use App\Models\Login;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login/index');
    }
    public function login()
    {
        //capturar email y password
        //OJO -> $_POST['email'] (Es tradicional) | new forma en ci4 ->$this->request->getVar('email');
        //getVar('') = $_REQUEST[''] 
        //getPost('') = $_POST['']
        //get('') = $_POST['']

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        //verificar si credenciales existen en la DB
        $login = new Login();
        //$resultadoUsuario ->te devuelve un array (registro) con todos los DATOS del usuario
        $resultadoUsuario = $login->buscarUsuarioPorEmail($email);
        // si existe el email en la DB
        $msg_salida = '';

        if (count($resultadoUsuario) > 0) {
            $passwordDB = $resultadoUsuario[0]['password'];
            if ($password == $passwordDB) {
                //crear sesión 
                $dataSession = [
                    'idUsuario' => $resultadoUsuario[0]['id'],
                    'nombreApellidos' => $resultadoUsuario[0]['nombre'] . ' ' . $resultadoUsuario[0]['apellidos'],
                    'email' => $resultadoUsuario[0]['email'],
                    'idRol' => $resultadoUsuario[0]['idRol'],
                    'logeado'  => true
                ];
                // $session = session();
                // $session->set($dataSession);
                session()->set($dataSession);
                $msg_salida = 'ok';
            } else {
                $msg_salida = 'Password incorrecto!';
            }
        } else {
            $msg_salida = 'Email no existe!';
        }
        echo $msg_salida;
    }

    public function logout()
    {
        //inicializar nuevamente la session y destruirla
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
