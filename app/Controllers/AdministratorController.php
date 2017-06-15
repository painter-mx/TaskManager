<?php
namespace App\Controllers;
use App\Libraries\View;
use App\Models\CustomersInfo;

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


  public function customerAction()
  {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
          $idCustomer = $_POST['customerId'];
          if(isset($_POST['delete']))
          {
            $customer = CustomersInfo::where('id', '=', $idCustomer)->delete();
            header('Location:'.PUBLIC_PATH.'/administrator');
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
}
?>
