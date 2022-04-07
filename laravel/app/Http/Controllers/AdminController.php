<?php

namespace App\Http\Controllers;
use Session;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        if(Session::has("admin") && Session::get("admin")=='admin'){
            //Get all Faculty
            $faculty = DB::select('select * from faculty WHERE ACTIVATED=0');
            return view("Admin.acceptFaculty", ['faculty'=>$faculty]);
        }
    }
    public function activate(Request $r, $id){
        $faculty = DB::update('
        UPDATE faculty
        SET ACTIVATED=1
        WHERE ID=?
        ', [$id]);
        return "<script>window.location.href='/admin'</script>";
    }
    public function info(){
        $faculty = DB::select("select * from faculty");
        return view("Admin.viewInfo", ['faculty'=>$faculty]);
    }
    public function generate(Request $r){
        //Get Personal Info
        $perso = DB::select("select * from PERSONALINFO");
        //Get Educational Bg
        $educ = DB::select("select * from EDUCATIONALBACKGROUND");
        //Get Vocational
        $voc = DB::select("select * from VOCATIONALCOURSES");
        //Get College
        $coll = DB::select("select * from COLLEGES");
        //Get Graduate
        $grad = DB::select("select * from GRADUATESTUDIES");
        //Get Civil
        $civil = DB::select("select * from CIVILSERVICE");
        //Get work Exp
        $work = DB::select("select * from WORKEXPERIENCE");
        //Get Certs
        $cert = DB::select("select * from CERTIFICATIONS");
        $fac = $r->input("faculty");
        return view('Admin.generateInfo',[
            'action'=>($r->action=="View Information")?"View":"Download",
            'perso'=>($r->personal=="on")?$perso:[],
            'educ'=>($r->education=="on")?$educ:[],
            'voc'=>($r->vocational=="on")?$voc:[],
            'coll'=>($r->college=="on")?$coll:[],
            'grad'=>($r->graduate=="on")?$grad:[],
            'civil'=>($r->civil=="on")?$civil:[],
            'work'=>($r->work=="on")?$work:[],
            'cert'=>($r->cert=="on")?$cert:[],
            'fac'=>(count($fac)>0)?$fac:[]
        ]);
    }
    public function logout(){
        Session::forget("admin");
        return "<script>window.location.href='/'</script>";
    }

    public function updateInfos(){
        $faculty = DB::select("select * from faculty");
        return view("Admin.updateFaculty", ['faculty'=>$faculty]);
    }
    public function getInfo(Request $r){
        $facultyID = $r->target;
        $action = $r->action;

        //Get Personal Info
        $perso = DB::select("select * from PERSONALINFO where ID=?", [$facultyID]);
        $profilePic = DB::select("select * from PROFILEPICTURES where ID=?", [$facultyID]);
        //Get Educational Bg
        $educ = DB::select("select * from EDUCATIONALBACKGROUND where ID=?", [$facultyID]);
        //Get Vocational
        $voc = DB::select("select * from VOCATIONALCOURSES where FacultyID=?", [$facultyID]);
        //Get College
        $coll = DB::select("select * from COLLEGES where FacultyID=?", [$facultyID]);
        //Get Graduate
        $grad = DB::select("select * from GRADUATESTUDIES where FacultyID=?", [$facultyID]);
        //Get Civil
        $civil = DB::select("select * from CIVILSERVICE where FacultyID=?", [$facultyID]);
        //Get work Exp
        $work = DB::select("select * from WORKEXPERIENCE where FacultyID=?", [$facultyID]);
        //Get Certs
        $cert = DB::select("select * from CERTIFICATIONS where FacultyID=?", [$facultyID]);

        if($action=="Personal Information"){
            return view("Admin.updater", ['info'=>$perso, 'profilePic'=>$profilePic]);
        }
        if($action=="Education"){
            $userId = $facultyID;
            $data = DB::select("select * from EDUCATIONALBACKGROUND where ID=?",[$userId]);
            return view("Admin.updater", ['data'=>$data]);
        }
        if($action=="Vocational/Trade Course"){
            $userId = $facultyID;
            //Get the data
            $data = DB::select("select * from VOCATIONALCOURSES where FacultyID=?",[$userId]);
            return view("Admin.updater", ['vocational'=>$data]);
        }
        if($action=="College"){
            $userId = $facultyID;
            //Get the data
            $data = DB::select("select * from COLLEGES where FacultyID=?",[$userId]);
            return view("Admin.updater", ['college'=>$data]);
        }
        if($action=="Graduate Studies"){
            $userId = $facultyID;
            //Get the data
            $data = DB::select("select * from GRADUATESTUDIES where FacultyID=?",[$userId]);
            return view("Admin.updater", ['graduate'=>$data]);
        }
        if($action=="Civil Service"){
            $userId = $facultyID;
            //Get the data
            $data = DB::select("select * from CIVILSERVICE where FacultyID=?",[$userId]);
            return view("Admin.updater", ['civil'=>$data]);
        }
        if($action=="Work Experience"){
            $userId = $facultyID;
            //Get the data
            $data = DB::select("select * from WORKEXPERIENCE where FacultyID=?",[$userId]);
            return view("Admin.updater", ['work'=>$data]);
        }
        if($action=="Certifications"){
            $userId = $facultyID;
            //Get the data
            $data = DB::select("select * from CERTIFICATIONS where FacultyID=?",[$userId]);
            return view("Admin.updater", ['cert'=>$data]);
        }
    }

}
