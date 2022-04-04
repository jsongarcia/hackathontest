<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class SessionHandler extends Controller
{
    public function index(Request $r){
        if(Session::has("user"))
            return view("information");
        else{
            $email = $r->input("email");
            $pass = $r->input("password");
            $res = DB::select("select * from faculty where USERNAME=? and PASSWORD=?",[$email, $pass]);
            if(count($res)==1){ //There's a match!
                //Make a session for the user
                $sessionKey = md5(time().$email);
                Session::put("user", $sessionKey);
                DB::update("update faculty set ACTIVESESSION=? WHERE ID=?",[$sessionKey, $res[0]->ID]);
                return view('information');
            }
            return view("login", ['email'=>$email, 'pass'=>$pass, 'res'=>$res]);
        }
    }
    public function toHome(){
        if(Session::has("user"))
            return view("information");
        else
        return view("login");
    }
    public function toRegister(){
        if(Session::has("user"))
            return view("information");
        else
            return view("register");
    }
    public function addUser(Request $req){
        $email = $req->input("email");
        $pas1 = $req->input("pass1");
        $pas1 = $req->input("pass2");
        //Check for same emails
        $sameEmails = DB::select("select * from faculty WHERE USERNAME=?", [$email]);
        if(count($sameEmails)==0){
            //Proceed with registration
            DB::statement("insert into faculty(USERNAME, PASSWORD) VALUES(?,?)", [$email, $pas1]);
            $id = DB::select("select * from faculty where USERNAME=?",[$email]);
            DB::statement("insert into EDUCATIONALBACKGROUND(ID) values(?)", [$id[0]->ID]);
            return view("/register", ['msg'=>"Registered succesfully!"]);
        }else{
            //Return an error
            $msg = $email ." is already registered in the database.";
            return view("/register", ['msg'=>$msg]);
        }
    }
    public function logout(){
        DB::update("update faculty set ACTIVESESSION='' where ACTIVESESSION=?",[Session::get("user")]);
        Session::forget('user');
        return view("login");
    }

    public function updateEducation(Request $req){
        $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
        DB::update("
            update EDUCATIONALBACKGROUND
            set
            ElemSchool=?, ElemCourse=?, ElemFrom=?, ElemTo=?, ElemUnits=?, ElemYearGrad=?, ElemHonors =?,
            SecondSchool=?, SecondCourse=?, SecondFrom=?, SecondTo=?, SecondUnits=?, SecondYearGrad=?, SecondHonors =?

            WHERE ID=?
            ",
            [$req->school[0], $req->course[0], $req->fromDate[0], $req->toDate[0], $req->units[0], $req->yearGrad[0], $req->honors[0],
            $req->school[1], $req->course[1], $req->fromDate[1], $req->toDate[1], $req->units[1], $req->yearGrad[1], $req->honors[1],
            $userId[0]->ID]);
        
            return view("information");
    }
}
