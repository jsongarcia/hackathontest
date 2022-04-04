<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class SessionHandler extends Controller
{
    public function index(Request $r){
        if(Session::has("user")){
            return "<script>window.location.href='/home'</script>";
        }else{
            if( $r->input('email') && $r->input('password')) {
                $email = $r->input("email");
                $pass = $r->input("password");
                $res = DB::select("select * from faculty where USERNAME=? and PASSWORD=?",[$email, $pass]);
                if(count($res)==1){ //There's a match!
                    //Make a session for the user
                    $sessionKey = md5(time().$email);
                    Session::put("user", $sessionKey);
                    DB::update("update faculty set ACTIVESESSION=? WHERE ID=?",[$sessionKey, $res[0]->ID]);
                    return "<script>window.location.href='/home'</script>";
                }else{
                return view("login", ["msg"=>"Invalid Username/Password."]);
                }
            }else
            return view("login");
        }
    }
    public function toHome(){
        if(Session::has("user")){
            //Get the user id
            $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the Educational bg
            $educationalBg = DB::select("select * from EDUCATIONALBACKGROUND where ID=?",[$userId[0]->ID]);
            //Get Personal Info
            $personalInfo = DB::select("select * from PERSONALINFO where ID=?", [$userId[0]->ID]);
            //get profilepicture
            $profilePic = DB::select("select * from PROFILEPICTURES where ID=?", [$userId[0]->ID]);
            return view("information", ["education"=>$educationalBg, "info"=>$personalInfo, "profilePic"=>$profilePic]);
        }else
        return "<script>window.location.href='/logout'</script>";
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

            //Make Educational Background, Personal Info, ProfilePicture
            DB::statement("insert into EDUCATIONALBACKGROUND(ID) values(?)", [$id[0]->ID]);
            DB::statement("insert into PERSONALINFO(ID) values(?)", [$id[0]->ID]);
            DB::statement("insert into PROFILEPICTURES(ID,DIRECTORY) values(?,?)", [$id[0]->ID, "default-pic.png"]);
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
        return "<script>window.location.href='/'</script>";
    }

    public function updateEducation(Request $req){
        if(Session::get("user")){
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
            return "<script>window.location.href='/home'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function updatePersonalInfo(Request $req){
        if(Session::get("user")){
        $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
        //Get the profile pic first
        if($_FILES["profile"]){
            $f = $_FILES["profile"];
            $name = $f["name"];
            $tempname = $f["tmp_name"];
            $newName= time().".".pathinfo($name, PATHINFO_EXTENSION);
            $name=$newName;
            move_uploaded_file($tempname, "profilepictures/$newName");

            //Send to Database
            DB::update("update PROFILEPICTURES set DIRECTORY=? where ID=?",[$newName, $userId[0]->ID]);
        }
        DB::update("
            update PERSONALINFO
            set
            FName=?, LName=?, MName=?, Birthdate=?, BirthPlace=?, Sex=?, Civil=?, Height=?, Weight=?, BloodType=?,
            GSIS=?, PAGIBIG=?, PHILHEALTH=?, SSS=?, TIN=?, Citizen=?, House=?, Street=?, Subd=?, Barangay=?, City=?, Province=?, Zip=?, 
            PermaHouse=?, PermaStreet=?,PermaSubd=?, PermaBarangay=?, PermaCity=?, PermaProvince=?, PermaZip=?, Tel=?, Phone=?, AltEmail=?

            WHERE ID=?
            ",
            [$req->FName, $req->LName, $req->MName, $req->Birthday,$req->BirthPlace, $req->Sex, $req->CivilStatus, $req->Height, $req->Weight, $req->BloodType,
            $req->GSIS, $req->PAGIBIG, $req->PHILHEALTH, $req->SSS, $req->TIN, $req->Citizenship, $req->House,$req->Street, $req->Subdivision,$req->Barangay, $req->City, $req->Province, $req->Zip,
            $req->PermHouse, $req->PermStreet, $req->PermSubdivision,$req->PermBarangay, $req->PermCity, $req->PermProvince, $req->PermZip, $req->Telephone, $req->Phone, $req->altEmail,
            $userId[0]->ID]);
            return "<script>window.location.href='/home'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
}
