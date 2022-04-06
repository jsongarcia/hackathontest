<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        if(Session::has("admin") && Session::get("admin")=='admin'){
            echo "Lol";
        }
    }
    public function logout(){
        Session::forget("admin");
        return "<script>window.location.href='/'</script>";
    }
}
