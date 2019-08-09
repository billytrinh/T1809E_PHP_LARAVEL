<?php
/**
 * Created by PhpStorm.
 * User: quanghoa
 * Date: 8/9/19
 * Time: 7:21 PM
 */

class SinhVien
{
    public $name;
    public $age;

    /**
     * SinhVien constructor.
     * @param $name
     * @param $age
     */
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }


    public function getName(){
        return $this->name;
    }

}