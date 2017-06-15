<?php
/*
* Fecha de creacion junio 7 2017.
* Ultima fecha de actualización junio  2017.
* Autor : Víctor Isaí Santana Machuca.
*/

namespace App\Controllers;
use App\Libraries\View;
use App\Models\User;
use App\Models\CustomersInfo;

/*
* Controlador de paginas del sitio web metodos a ejecutar
*/
class PageController
{
  public function index()
  {

    View::render('pages/index');
  }
  public function out()
  {
    session_destroy();
    header('Location:'.PUBLIC_PATH);
  }
  public function login()
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $user = trim($_POST['user']);         //DATA FROM LOGIN FORM index.view.php
      $password = trim($_POST['password']);
      $inputs = compact('user','password');

      if ($user == '')
      {
        $this->loginWithError('El campo usuario es obligatorio',$inputs);
      }
      elseif($password == '')
      {
        $this->loginWithError('El campo Password es obligatorio',$inputs);
      }

      // Login Validation
      $users = User::where('User','=',$user)->first();
      if(isset($users) && $users->User == $user)
      {
        $password1 = User::where('Password','=',$password)->first();
        if(isset($password1) && $password1->Password == $password)
        {
          $rol = User::where('Password','=',$password)->first();
          if($rol->Rol == 'Facturacion')
          {
            View::render('pages/facturacion');
          }
          else
          {
            $_SESSION['signed'] = true;
            header('Location:'.PUBLIC_PATH.'/administrator');
          //  View::render('pages/administrator');
          }
        }
        else
        {
          $this->loginWithError('Password Incorrecto',$inputs);
        }
      }
      else
      {
        $this->loginWithError('Usuario Incorrecto',$inputs);
      }
    }
    else
    {
      View::render('pages/index');
    }
  }

  private function loginWithError($errorMessage,array $variables = [])
  {
    $variables['errorMessage'] = $errorMessage;
    View::render('pages/index',$variables);
    exit;
  }

  public function customerIndex()
  {
    $customersInfo = CustomersInfo::All();
    View::render('pages/customer',compact('customersInfo'));
  }

  public function imssIndex()
  {

    if(isset($_SESSION['signed']))
    {
      View::render('pages/imss');
    }
    else
    {
      View::render('pages/notfound');
    }
  }

  public function tasksIndex()
  {
    if(isset($_SESSION['signed']))
    {
      View::render('pages/tasks');
    }
    else
    {
      View::render('pages/notfound');
    }
  }

  public function employeesIndex()
  {
    if(isset($_SESSION['signed']))
    {
      View::render('pages/employees');
    }
    else
    {
      View::render('pages/notfound');
    }
  }

  public function about()
  {
    $page = "Nosotros";
    View::render('pages/about',compact('page'));
  }

  public function contact()
  {
    $page = "Contacto";

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $name = trim($_POST['name']);
      $email= trim($_POST['email']);
      $message = htmlentities(trim($_POST['message']));
      $captchaInput= trim($_POST['captcha']);
      $inputs = compact('name','email','message');

      /**
      *
      * VALIDACION DE LOS CAMPOS
      **/
      if($name == '')
      {
        $this->contactWithError('El campo nombre es obligatorio',$inputs);
      }elseif($email == ''){
        $this->contactWithError('El campo Email es obligatorio',$inputs);
      }elseif($message == ''){
        $this->contactWithError('El campo Mensaje es obligatorio',$inputs);
      }elseif ($captchaInput != $_SESSION['phrase']) {
        $this->contactWithError('El texto no coincide con la imagen',$inputs);
      }
      /**
      *
      * ENVIO DE E-MAIL
      *
      **/
      $mail = new Mail;
      if(!$mail->validateAddress($email)){
        $this->contactWithError('El email ingresado no es valido');
      }

      $mail->setFrom(LDL_MAIL['AddressFrom'], LDL_MAIL['NameFrom']);
      $mail->addAddress(LDL_MAIL['AddressInbox'], LDL_MAIL['NameInbox']);
      $mail->isHTML(true);
      $mail->Subject = "Lampara de lava : {$name} <{$email}>";
      $mail->Body    = nl2br($message);

      if($mail->send())
      {
        View::render('pages/success');
      }else {
        $this->contactWithError('El mensaje no pudo ser enviado. Error : '.$mail->ErrorInfo,$inputs);
      }
    }
    else {

      /**
      *
      * CREACION DEL CAPTCHA
      **/
      $captcha = new CaptchaBuilder;
      $captcha->build();
      $_SESSION['phrase'] = $captcha->getPhrase();
      View::render('pages/contact',compact('captcha','page'));

    }
  }

  private function contactWithError($errorMessage,array $variables = [])
  {
    /**
    *
    *CREACION DEL NUEVO CAPTCHA CUAND HAY ERRORES
    */
    $captcha = new CaptchaBuilder;
    $captcha->build();
    $_SESSION['phrase'] = $captcha->getPhrase();
    $variables['captcha'] = $captcha;
    $variables['errorMessage'] = $errorMessage;
    View::render('pages/contact',$variables);
    exit;
  }

  public function notFound()
  {
    View::render('pages/notfound');
  }
}
 ?>
