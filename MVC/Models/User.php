<?php
/**
 * Created by PhpStorm.
 * User: quanghoa
 * Date: 8/14/19
 * Time: 6:31 PM
 */

class User
{
    protected $table = "users";
    /**
     * User constructor.
     */
    public function __construct($name,$email,$password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    function listUsers(){
        $users = [];

        $users[] = new User("Nguyen Van An","an@gmail.com","123456");
        $users[] = new User("Nguyen Van Anh","vananh@gmail.com","123456");
        $users[] = new User("Nguyen Thi Minh","minh@gmail.com","123456");

        return $users;
    }

    function save(){

    }

    function update(){

    }

    function delete(){

    }
}