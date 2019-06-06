<?php
class Login
{
    private $db_connection = null;
    public $errors = array();
    public $messages = array();
    public function __construct()
    {
     
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }
    private function dologinWithPostData()
    {

        $user_name= $_POST['user_name'];
        $Clave= $_POST['user_password'];

        if (empty($_POST['user_name'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {
        
               
                if ($user_name=='Administrador') {
                   
                    if ($Clave=='AbbottBuenosM') {
                        $_SESSION['Login'] = 'True';
                    } else {
                        $this->errors[] = "Usuario y/o contraseña no coinciden.";
                    }
                } else {
                    $this->errors[] = "El Usuario No Existe o No se encuentra Activo";
                }
            
        }
    }
    public function doLogout()
    {
        $_SESSION = array();
        session_destroy();
        $this->messages[] = "Se Ha Cerrado La Sesion";

    }
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        return false;
    }
}
?>