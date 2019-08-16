<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function helloWorld(){
        $students = Student::all();
        return view("demo",compact("students"));
    }

    public function sayHello(){
        return "say Hello";
    }
}
