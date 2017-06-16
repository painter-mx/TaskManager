<?php
namespace App\Controllers;
use App\Libraries\View;
use App\Models\CustomersInfo;
use App\Models\User;

class AdministratorController
{
  public function Index()
  {
    if(!isset($_SESSION['signed']))
    {
      View::render('pages/notfound');
    }
    else
    {
      View::render('pages/administrator',compact('customersInfo'));
    }
  }

  public function addCustomerAction()
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $name = $_POST['FirstName'];
      $lastNamePat = trim($_POST["LastNamePat"]);
      $lastNameMat = trim($_POST["LastNameMat"]);
      $address = trim($_POST['Address']);
      $rfc = trim($_POST['RFC']);
      $email = trim($_POST['Email']);
      $phone = trim($_POST['Phone']);
      $nss = trim($_POST['SocialSecure']);

      $inputs = compact('name','lastNamePat','lastNameMat','address','rfc','email','phone','nss');

       if($name == '' || $lastNamePat == '' || $lastNameMat == '' || $address == ''
       || $rfc == '' || $email == '' || $phone == '' || $nss == '')
       {
         $this->errorManager('addCustomer','Porfavor complete los campos',$inputs);
       }
       else
       {
         $customer = new CustomersInfo;
         $customer->FirstName = $name;
         $customer->LastNamePat = $lastNamePat;
         $customer->LastNameMat = $lastNameMat;
         $customer->Address = $address;
         $customer->RFC = $rfc;
         $customer->Email = $email;
         $customer->Telefono = $phone;
         $customer->SocialSecure = $nss;
         $customer->save();
         header('Location:'.PUBLIC_PATH.'/MisClientes');
       }
    }
    else
    {
      View::render('pages/notfound');
    }
  }

  public function customerAction()
  {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
          $idCustomer = $_POST['customerId'];
          if(isset($_POST['delete']))
          {
            $customer = CustomersInfo::where('id', '=', $idCustomer)->delete();
            header('Location:'.PUBLIC_PATH.'/MisClientes');
          }elseif(isset($_POST['edit']))
          {
            echo "editar";
          }
        }
        else
        {
          View::render('pages/notfound');
        }
  }

  private function errorManager($page,$errorMessage,array $variables = [])
  {
    $variables['errorMessage'] = $errorMessage;
    View::render('pages/'.$page,$variables);
    exit;
  }

  private function successManager($page,$successMessage)
  {
    View::render('pages/'.$page,$variables);
    exit;
  }
}
?>
