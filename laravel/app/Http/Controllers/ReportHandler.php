<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;

class ReportHandler extends Controller
{
    public function report(){
        return view("Reports.report");
    }

    public function generateReport(Request $r){
        $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
        //Get Personal Info
        $perso = DB::select("select * from PERSONALINFO where ID=?", [$userId[0]->ID]);
        //Get Educational Bg
        $educ = DB::select("select * from EDUCATIONALBACKGROUND where ID=?",[$userId[0]->ID]);
        //Get Vocational
        $voc = DB::select("select * from VOCATIONALCOURSES where FacultyID=?",[$userId[0]->ID]);
        //Get College
        $coll = DB::select("select * from COLLEGES where FacultyID=?",[$userId[0]->ID]);
        //Get Graduate
        $grad = DB::select("select * from GRADUATESTUDIES where FacultyID=?",[$userId[0]->ID]);
        //Get Civil
        $civil = DB::select("select * from CIVILSERVICE where FacultyID=?",[$userId[0]->ID]);
        //Get work Exp
        $work = DB::select("select * from WORKEXPERIENCE where FacultyID=?",[$userId[0]->ID]);
        //Get Certs
        $cert = DB::select("select * from CERTIFICATIONS where FacultyID=?",[$userId[0]->ID]);
        
        return view('Reports.viewReport',[
            'action'=>($r->action=="Preview Information")?"View":"Download",
            'perso'=>($r->personal=="on")?$perso:[],
            'educ'=>($r->education=="on")?$educ:[],
            'voc'=>($r->vocational=="on")?$voc:[],
            'coll'=>($r->college=="on")?$coll:[],
            'grad'=>($r->graduate=="on")?$grad:[],
            'civil'=>($r->civil=="on")?$civil:[],
            'work'=>($r->work=="on")?$work:[],
            'cert'=>($r->cert=="on")?$cert:[],
        ]);
    }
}
