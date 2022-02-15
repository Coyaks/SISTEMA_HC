<?php 
namespace App\Controllers;
use App\Models\Login;

class LoginController extends BaseController{
    public function index(){
        $mensaje=session('mensaje');
        return view('login/index', ['mensaje'=>$mensaje]);
    }
    public function login(){
        //capturar email y password
        //OJO -> $_POST['email'] (Es tradicional) | new forma en ci4 ->$this->request->getVar('email');
        //getVar('') = $_REQUEST[''] 
        //getPost('') = $_POST['']
        //get('') = $_POST['']

        $email=$this->request->getPost('email');
        $password=$this->request->getPost('password');
        //verificar si credenciales existen en la DB
        $login=new Login(); 
        //$resultadoUsuario ->te devuelve un array (registro) con todos los DATOS del usuario
        $resultadoUsuario=$login->buscarUsuarioPorEmail($email);
        
        //$passwordDB=$resultadoUsuario[0]['password'];
        // si existe el email en la DB
        $msg_salida='';
        $success='';
        
        if(count($resultadoUsuario)>0){
            $passwordDB=$resultadoUsuario[0]['password'];
            if($password==$passwordDB){
                $msg_salida='ok';
            }else{
                $msg_salida='Password incorrecto!';
            }
        }else{
            $msg_salida='Email no existe!';
        }
        echo $msg_salida;
        // if(count($datosUsuario)>0 && password_verify($password, $datosUsuario[0]['password'])){
        // if(count($datosUsuario)>0){
        //     //instanciar una sesion
        //     $data=[
        //         'usuario'=>$datosUsuario[0]['email'],
        //         'password'=>$datosUsuario[0]['password']
        //     ];
        //     $session = session(); 
        //     $session->set($data);
        //     //redireccionar
        //     //return redirect()->to(base_url('/dashboard'))->with('mensaje', '1');
        //     echo 1;
        // }else{
        //     //return redirect()->to(base_url('/'))->with('mensaje','0');
        //     echo 0;
        // }
        // $datos=$login->obtenerUsuario2();
        // $data=[
        //     'datos'=>$datos
        // ];

        //echo json_encode($data);
        
    }

}