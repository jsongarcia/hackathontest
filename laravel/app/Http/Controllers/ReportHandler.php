<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportHandler extends Controller
{
    public function report(){
        return view("Reports.report");
    }
}
