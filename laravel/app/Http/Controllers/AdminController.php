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
}
