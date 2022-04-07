<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>Document</title>
</head>
<body>
    @if($action=="View")
    <div class="topbar">
        <ul>
            <li><a href='/admin'>Accept Faculties</a></li>
            <li><a href='/admin/info'>View/Download Information</a></li>
            <li><a href='/admin/logout'>Log out</a></li>
        </ul>
    </div>
    @endif
        @foreach($fac as $user)
        <hr />
        <center><h3>Showing Information for: {{  DB::select('select * from faculty where ID=?',[$user])[0]->USERNAME   }}</h3></center>
            @foreach($perso as $record)
                @if($user==$record->ID)
    <div class="report">
                    <table class="infoTable">
                    <caption><b> PERSONAL INFORMATION </b></caption>
                    <tr>
                        <td>Email Address:</td>
                        <td>{{  DB::select('select * from faculty where ID=?',[$record->ID])[0]->USERNAME   }}</td>
                    </tr>      
                    <tr>
                        <td>Employee Number: </td>
                        <td>{{$record->ID}}</td>
                    </tr>
                    <tr>
                        <td>Employee Name: </td>
                        <td>{{$record->FName}} {{$record->MName}} @if($record->MName) . @endif  {{$record->LName}} {{$record->Extension}}</td>
                    </tr>
                    <tr>
                        <td>Date of Birth: </td>
                        <td>{{date_create($record->Birthdate)->format("m/d/Y")}}</td>
                    </tr>
                    <tr>
                        <td>Age: </td>
                        <td>{{ date_diff(date_create($record->Birthdate),date_create(date('Y-m-d')))->format('%y') }}</td>
                    </tr>
                    <tr>
                        <td>Place of Birth: </td>
                        <td>{{$record->BirthPlace}}</td>
                    </tr>
                    <tr>
                        <td>Sex: </td>
                        <td>{{$record->Sex}}</td>
                    </tr>
                    <tr>
                        <td>Civil Status: </td>
                        <td>{{$record->Civil}}</td>
                    </tr>
                    <tr>
                        <td>Height: </td>
                        <td>{{$record->Height}}</td>
                    </tr>
                    <tr>
                        <td>Weight: </td>
                        <td>{{$record->Weight}}"</td>
                    </tr>
                    <tr>
                        <td>Blood Type: </td>
                        <td>{{$record->BloodType}}</td>
                    </tr>
                    <tr>
                        <td>GSIS ID No.: </td>
                        <td>{{$record->GSIS}}</td>
                    </tr>
                    <tr>
                        <td>PAG-IBIG No.: </td>
                        <td>{{$record->PAGIBIG}}</td>
                    </tr>
                    <tr>
                        <td>PHILHEALTH No.: </td>
                        <td>{{$record->PHILHEALTH}}</td>
                    </tr>
                    <tr>
                        <td>SSS No.: </td>
                        <td>{{$record->SSS}}</td>
                    </tr>
                    <tr>
                        <td>TIN No.: </td>
                        <td>{{$record->TIN}}</td>
                    </tr>
                    <tr>
                        <td>Citizenship No.: </td>
                        <td>{{$record->Citizen}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Residential Address</td>
                    </tr>
                    <tr>
                        <td>House/Block/Lot No.  : </td>
                        <td>{{$record->House}}</td>
                    </tr>
                    <tr>
                        <td>Street: </td>
                        <td>{{$record->Street}}</td>
                    </tr>
                    <tr>
                        <td>Subdivision/Village: </td>
                        <td>{{$record->Subd}}</td>
                    </tr>
                    <tr>
                        <td>Barangay: </td>
                        <td>{{$record->Barangay}}</td>
                    </tr>
                    <tr>
                        <td>City/Municipality: </td>
                        <td>{{$record->City}}</td>
                    </tr>
                    <tr>
                        <td>Province: </td>
                        <td>{{$record->Province}}</td>
                    </tr>
                    <tr>
                        <td>Zip Code: </td>
                        <td>{{$record->Zip}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Permanent Address</td>
                    </tr>
                    <tr>
                        <td>House/Block/Lot No.  : </td>
                        <td>{{$record->PermaHouse}}</td>
                    </tr>
                    <tr>
                        <td>Street: </td>
                        <td>{{$record->PermaStreet}}</td>
                    </tr>
                    <tr>
                        <td>Subdivision/Village: </td>
                        <td>{{$record->PermaSubd}}</td>
                    </tr>
                    <tr>
                        <td>Barangay: </td>
                        <td>{{$record->PermaBarangay}}</td>
                    </tr>
                    <tr>
                        <td>City/Municipality: </td>
                        <td>{{$record->PermaCity}}</td>
                    </tr>
                    <tr>
                        <td>Province: </td>
                        <td>{{$record->PermaProvince}}</td>
                    </tr>
                    <tr>
                        <td>Zip Code: </td>
                        <td>{{$record->PermaZip}}</td>
                    </tr>
                    <tr>
                        <td>Telephone No.: </td>
                        <td>{{$record->Tel}}</td>
                    </tr>
                    <tr>
                        <td>Phone No.: </td>
                        <td>{{$record->Phone}}</td>
                    </tr>
                    <tr>
                        <td>Alternate Email Address: </td>
                        <td>{{$record->AltEmail}}</td>
                    </tr>
                </table>
                @endif
            @endforeach
            <hr />
            @foreach($educ as $record)
                @if($user==$record->ID)
                <table class="infoTable">
                    <caption><b>EDUCATIONAL BACKGROUND</b></caption>
                        <tr>
                            <td colspan="2">Elementary</td>
                        </tr>
                        <tr>
                            <td>Name of School: </td>
                            <td>{{$record->ElemSchool}}</td>
                        </tr>
                        <tr>
                            <td>Basic Education/Degree/Course: </td>
                            <td>{{$record->ElemCourse}}</td>
                        </tr>
                        <tr>
                            <td>Period of attendance: </td>
                            @if($record->ElemFrom && $record->ElemTo)
                            <td>{{date_create($record->ElemFrom)->format('m/d/Y')}} - {{date_create($record->ElemTo)->format('m/d/Y')}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Highest Level/Units Earned:  </td>
                            <td>{{$record->ElemUnits}}</td>
                        </tr>
                        <tr>
                            <td>Year Graduated: </td>
                            @if($record->ElemYearGrad)
                            <td>{{date_create($record->ElemYearGrad)->format('Y')}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Scholarship/Academic Honors Received: </td>
                            <td>{{$record->ElemHonors}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Secondary</td>
                        </tr>
                        <tr>
                            <td>Name of School: </td>
                            <td>{{$record->SecondSchool}}</td>
                        </tr>
                        <tr>
                            <td>Basic Education/Degree/Course: </td>
                            <td>{{$record->SecondCourse}}</td>
                        </tr>
                        <tr>
                            <td>Period of attendance  : </td>
                            @if($record->SecondFrom && $record->SecondTo)
                            <td>{{date_create($record->SecondFrom)->format('m/d/Y')}} - {{date_create($record->SecondTo)->format('m/d/Y')}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Highest Level/Units Earned:  </td>
                            <td>{{$record->SecondUnits}}</td>
                        </tr>
                        <tr>
                            <td>Year Graduated: </td>
                            @if($record->SecondYearGrad)
                            <td>{{date_create($record->SecondYearGrad)->format('Y')}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Scholarship/Academic Honors Received: </td>
                            <td>{{$record->SecondHonors}}</td>
                        </tr>
                    </table><br />
                @endif
            @endforeach

            <input type="hidden" value="{{$vocEcho=true}}">
            @foreach($voc as $record)
                @if($user==$record->FacultyID)
                @if($vocEcho)
                    {{$vocEcho=false}}
                    <hr />
                    <table class="infoTable">
                        <caption><b>VOCATIONAL COURSE</b></caption>
                    </table>
                @endif
                <table class="infoTable">
                    <tr>
                        <td>Name of School: </td>
                        <td>{{$record->Name}}</td>
                    </tr>
                    <tr>
                        <td>Basic Education/Degree/Course: </td>
                        <td>{{$record->Course}}</td>
                    </tr>
                    <tr>
                        <td>Period of attendance  : </td>
                        <td>{{date_create($record->FromDate)->format('m/d/Y')}} - {{date_create($record->ToDate)->format('m/d/Y')}} </td>
                    </tr>
                    <tr>
                        <td>Highest Level/Units Earned (if not graduated):  </td>
                        <td>{{$record->Units}}</td>
                    </tr>
                    <tr>
                        <td>Year Graduated: </td>
                        <td>{{date_create($record->Year)->format('Y')}}</td>
                    </tr>
                    <tr>
                        <td>Scholarship/Academic Honors Received: </td>
                        <td>{{$record->Honors}}</td>
                    </tr>
                </table><br />
                </form>
                @endif
            @endforeach

            <input type="hidden" value="{{$collEcho=true}}">
            @foreach($coll as $record)
            @if($user==$record->FacultyID)
            @if($collEcho)
                    {{$collEcho=false}}
                    <hr />
                    <table class="infoTable">
                        <caption><b>COLLEGE COURSE</b></caption>
                    </table>
            @endif
            <table class="infoTable">
                <tr>
                    <td>Name of School: </td>
                    <td>{{$record->Name}}</td>
                </tr>
                <tr>
                    <td>Basic Education/Degree/Course: </td>
                    <td>{{$record->Course}}</td>
                </tr>
                <tr>
                    <td>Period of attendance: </td>
                    <td>{{date_create($record->FromDate)->format('m/d/Y')}} - {{date_create($record->ToDate)->format('m/d/Y')}}</td>
                </tr>
                <tr>
                    <td>Highest Level/Units Earned (if not graduated):  </td>
                    <td>{{$record->Units}}</td>
                </tr>
                <tr>
                    <td>Year Graduated: </td>
                    <td>{{date_create($record->Year)->format('Y')}}</td>
                </tr>
                <tr>
                    <td>Scholarship/Academic Honors Received: </td>
                    <td>{{$record->Honors}}</td>
                </tr>
            </table><br />
            @endif
            @endforeach
            
            <input type="hidden" value="{{$gradEcho=true}}">
            @foreach($grad as $record)
            @if($user==$record->FacultyID)
            @if($gradEcho)
                    {{$gradEcho=false}}
                    <hr />
                    <table class="infoTable">
                        <caption><b>GRADUATE STUDY</b></caption>
                    </table>
            @endif
            <table class="infoTable">
            
                <tr>
                    <td>Name of School: </td>
                    <td>{{$record->Name}}</td>
                </tr>
                <tr>
                    <td>Basic Education/Degree/Course: </td>
                    <td>{{$record->Course}}</td>
                </tr>
                <tr>
                    <td>Period of attendance  : </td>
                    <td>{{date_create($record->FromDate)->format('m/d/Y')}} - {{date_create($record->ToDate)->format('m/d/Y')}}</td>
                </tr>
                <tr>
                    <td>Highest Level/Units Earned:  </td>
                    <td>{{$record->Units}}</td>
                </tr>
                <tr>
                    <td>Year Graduated: </td>
                    <td>{{date_create($record->Year)->format('Y')}}</td>
                </tr>
                <tr>
                    <td>Scholarship/Academic Honors Received: </td>
                    <td>{{$record->Honors}}</td>
                </tr>
            </table><br />
            @endif
            @endforeach

            <input type="hidden" value="{{$civilEcho=true}}">
            @foreach($civil as $record)
            @if($user==$record->FacultyID)
            @if($civilEcho)
                    {{$civilEcho=false}}
                    <hr />
                    <table class="infoTable">
                        <caption><b>CIVIL SERVICE</b></caption>
                    </table>
            @endif
            <table class="infoTable">
                <tr>
                    <td>Civil Service Type: </td>
                    <td>{{$record->Service}}</td>
                </tr>
                <tr>
                    <td>Rating: </td>
                    <td>{{$record->Rating}}</td>
                </tr>
                <tr>
                    <td>Date of Examination/Conferment: </td>
                    <td>{{date_create($record->ExamDate)->format('m/d/Y')}}</td>
                </tr>
                <tr>
                    <td>Place of Examination/Confement: </td>
                    <td>{{$record->ExamPlace}}</td>
                </tr>
                <tr>
                    <td>License Number: </td>
                    <td>{{$record->LicenseNo}}</td>
                </tr>
                <tr>
                    <td>License validity: </td>
                    <td>{{date_create($record->Validity)->format('m/d/Y')}}</td>
                </tr>
            </table><br />
            @endif
            @endforeach

            <input type="hidden" value="{{$workEcho=true}}">
            @foreach($work as $record)
            @if($user==$record->FacultyID)
            @if($workEcho)
                    {{$workEcho=false}}
                    <hr />
                    <table class="infoTable">
                        <caption><b>WORK EXPERIENCE</b></caption>
                    </table>
            @endif
            <table class="infoTable">
                <tr>
                    <td>Inclusive Dates: </td>
                    <td>{{date_create($record->FromDate)->format('m/d/Y')}} - {{date_create($record->ToDate)->format('m/d/Y')}}</td>
                </tr>
                <tr>
                    <td>Position/Title: </td>
                    <td>{{$record->Position}}</td>
                </tr>
                <tr>
                    <td>Department/Agency/Office/Company: </td>
                    <td>{{$record->Department}}</td>
                </tr>
                <tr>
                    <td>Monthly Salary: </td>
                    <td>{{$record->Salary}}</td>
                </tr>
                <tr>
                    <td>Salary/Job/Pay Grade: </td>
                    <td>{{$record->SalaryGrade}}</td>
                </tr>
                <tr>
                    <td>Status of Appointment: </td>
                    <td>{{$record->Status}}</td>
                </tr>
                <tr>
                    <td>Government Service: </td>
                    <td>
                    @if($record->Government)
                    Yes
                    @else
                    No
                    @endif
                    </td>
                </tr>
            </table><br />
            </form>
            @endif
            @endforeach


            <input type="hidden" value="{{$certEcho=true}}">
            @foreach($cert as $record)
            @if($user==$record->FacultyID)
            @if($certEcho)
                    {{$certEcho=false}}
                    <hr />
                    <table class="infoTable">
                        <caption><b>CERTIFICATES</b></caption>
                    </table>
            @endif
            <table class="infoTable">
                <tr>
                    <td>Title: </td>
                    <td>{{$record->Title}}</td>
                </tr>
                <tr>
                    <td>Type: </td>
                    <td>{{$record->Type}}</td>
                </tr>
                <tr>
                    <td>Date of Attendance: </td>
                    <td>{{date_create($record->FromDate)->format('m/d/Y')}} - {{date_create($record->ToDate)->format('m/d/Y')}}</td>
                </tr>
                <tr>
                    <td>Number of Hours: </td>
                    <td>{{$record->Hours}}</td>
                </tr>
                <tr>
                    <td>Conducted/Sponsored By: </td>
                    <td>{{$record->Conducted}}</td>
                </tr>
                <tr>
                    <td>Type of LD: </td>
                    <td>{{$record->LDType}}</td>
                </tr>
                <tr>
                    <td colspan='2'><center><iframe src="/certificates/{{$record->Certificate}}"></center></iframe></td>
                </tr>
            </table><br />
            @endif
            @endforeach
</div>
            @endforeach
</div>

@if($action=="Download")
    <script>window.print()</script>
@endif
</body>
</html>