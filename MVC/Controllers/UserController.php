<?php
/**
 * Created by PhpStorm.
 * User: quanghoa
 * Date: 8/14/19
 * Time: 6:30 PM
 */

require_once "../Models/User.php";

class UserController
{
    public function invoke(){
        if($_GET["action"] == "list"){
            $userModel = new User("","","");
            $users = $userModel->listUsers();
            include_once("../Views/list.html");
        }elseif ($_GET["action"] == "create"){
            include_once("../Views/register.html");
        }elseif ($_POST["action"] == "create_account"){
            // Save to database
        }
    }
}

$userController = new UserController();
$userController->invoke();