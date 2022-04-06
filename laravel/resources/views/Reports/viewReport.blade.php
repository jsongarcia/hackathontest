<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="topbar">
            <ul>
                <li><a href="/home">Personal Information</a></li>
                <li><a href="/education">Education</a></li>
                <li><a href="/vocational">Vocational/Trade Course</a></li>
                <li><a href="/college">College</a></li>
                <li><a href="/graduate">Graduate Studies</a></li>
                <li><a href="/civil">Civil Service</a></li>
                <li><a href="/work">Work Experience</a></li>
                <li><a href="/cert">Certifications</a></li>
                <li><a href="/report">Generate Reports</a></li>
                <li><a href="/logout">Log Out</a></li>
            </ul>
        </div>
    @if(count($perso)>0)
        <table>
            <caption> PERONAL INFORMATION </caption>
            <tr>
                <td>Email Address:</td>
                <td>{{  DB::select('select * from faculty where ID=?',[$perso[0]->ID])[0]->USERNAME   }}</td>
            </tr>      
            <tr>
                <td>Employee Number: </td>
                <td>{{DB::select('select * from faculty where ACTIVESESSION=?',[Session::get('user')])[0]->ID}}</td>
            </tr>
            <tr>
                <td>Employee Name: </td>
                <td>{{$perso[0]->FName}} {{$perso[0]->MName}}. {{$perso[0]->LName}}</td>
            </tr>
            <tr>
                <td>Date of Birth: </td>
                <td>{{date_create($perso[0]->Birthdate)->format("m/d/Y")}}</td>
            </tr>
            <tr>
                <td>Age: </td>
                <td>{{ date_diff(date_create($perso[0]->Birthdate),date_create(date('Y-m-d')))->format('%y') }}</td>
            </tr>
            <tr>
                <td>Place of Birth: </td>
                <td>{{$perso[0]->BirthPlace}}</td>
            </tr>
            <tr>
                <td>Sex: </td>
                <td>{{$perso[0]->Sex}}</td>
            </tr>
            <tr>
                <td>Civil Status: </td>
                <td>{{$perso[0]->Civil}}</td>
            </tr>
            <tr>
                <td>Height: </td>
                <td>{{$perso[0]->Height}}</td>
            </tr>
            <tr>
                <td>Weight: </td>
                <td>{{$perso[0]->Weight}}"</td>
            </tr>
            <tr>
                <td>Blood Type: </td>
                <td>{{$perso[0]->BloodType}}</td>
            </tr>
            <tr>
                <td>GSIS ID No.: </td>
                <td>{{$perso[0]->GSIS}}</td>
            </tr>
            <tr>
                <td>PAG-IBIG No.: </td>
                <td>{{$perso[0]->PAGIBIG}}</td>
            </tr>
            <tr>
                <td>PHILHEALTH No.: </td>
                <td>{{$perso[0]->PHILHEALTH}}</td>
            </tr>
            <tr>
                <td>SSS No.: </td>
                <td>{{$perso[0]->SSS}}</td>
            </tr>
            <tr>
                <td>TIN No.: </td>
                <td>{{$perso[0]->TIN}}</td>
            </tr>
            <tr>
                <td>Citizenship No.: </td>
                <td>{{$perso[0]->Citizen}}</td>
            </tr>
            <tr>
                <td colspan="2">Residential Address</td>
            </tr>
            <tr>
                <td>House/Block/Lot No.  : </td>
                <td>{{$perso[0]->House}}</td>
            </tr>
            <tr>
                <td>Street: </td>
                <td>{{$perso[0]->Street}}</td>
            </tr>
            <tr>
                <td>Subdivision/Village: </td>
                <td>{{$perso[0]->Subd}}</td>
            </tr>
            <tr>
                <td>Barangay: </td>
                <td>{{$perso[0]->Barangay}}</td>
            </tr>
            <tr>
                <td>City/Municipality: </td>
                <td>{{$perso[0]->City}}</td>
            </tr>
            <tr>
                <td>Province: </td>
                <td>{{$perso[0]->Province}}</td>
            </tr>
            <tr>
                <td>Zip Code: </td>
                <td>{{$perso[0]->Zip}}</td>
            </tr>
            <tr>
                <td colspan="2">Permanent Address</td>
            </tr>
            <tr>
                <td>House/Block/Lot No.  : </td>
                <td>{{$perso[0]->PermaHouse}}</td>
            </tr>
            <tr>
                <td>Street: </td>
                <td>{{$perso[0]->PermaStreet}}</td>
            </tr>
            <tr>
                <td>Subdivision/Village: </td>
                <td>{{$perso[0]->PermaSubd}}</td>
            </tr>
            <tr>
                <td>Barangay: </td>
                <td>{{$perso[0]->PermaBarangay}}</td>
            </tr>
            <tr>
                <td>City/Municipality: </td>
                <td>{{$perso[0]->PermaCity}}</td>
            </tr>
            <tr>
                <td>Province: </td>
                <td>{{$perso[0]->PermaProvince}}</td>
            </tr>
            <tr>
                <td>Zip Code: </td>
                <td>{{$perso[0]->PermaZip}}</td>
            </tr>
            <tr>
                <td>Telephone No.: </td>
                <td>{{$perso[0]->Tel}}</td>
            </tr>
            <tr>
                <td>Phone No.: </td>
                <td>{{$perso[0]->Phone}}</td>
            </tr>
            <tr>
                <td>Alternate Email Address: </td>
                <td>{{$perso[0]->AltEmail}}</td>
            </tr>
        <tr>
        </tr>
        </table>
    @endif


    @if(count($educ)>0)
    <table>
        <caption>EDUCATIONAL BACKGROUND</caption>
            <tr>
                <td colspan="2"><b>Elementary</b></td>
            </tr>
            <tr>
                <td>Name of School: </td>
                <td>{{$educ[0]->ElemSchool}}</td>
            </tr>
            <tr>
                <td>Basic Education/Degree/Course: </td>
                <td>{{$educ[0]->ElemCourse}}</td>
            </tr>
            <tr>
                <td>Period of attendance: </td>
                <td>{{date_create($educ[0]->ElemFrom)->format('m/d/Y')}} - {{date_create($educ[0]->ElemTo)->format('m/d/Y')}}</td>
            </tr>
            <tr>
                <td>Highest Level/Units Earned:  </td>
                <td>{{$educ[0]->ElemUnits}}</td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                <td>{{date_create($educ[0]->ElemYearGrad)->format('Y')}}</td>
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td>{{$educ[0]->ElemHonors}}</td>
            </tr>
            <tr>
                <td colspan="2"><b>Secondary</b></td>
            </tr>
            <tr>
                <td>Name of School: </td>
                <td>{{$educ[0]->SecondSchool}}</td>
            </tr>
            <tr>
                <td>Basic Education/Degree/Course: </td>
                <td>{{$educ[0]->SecondCourse}}</td>
            </tr>
            <tr>
                <td>Period of attendance  : </td>
                <td>{{date_create($educ[0]->SecondFrom)->format('m/d/Y')}} - {{date_create($educ[0]->SecondTo)->format('m/d/Y')}}</td>
            </tr>
            <tr>
                <td>Highest Level/Units Earned:  </td>
                <td>{{$educ[0]->SecondUnits}}</td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                <td>{{date_create($educ[0]->SecondYearGrad)->format('Y')}}</td>
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td>{{$educ[0]->SecondHonors}}</td>
            </tr>
        </table><br />
    @endif


    @if(count($voc)>0)
    @foreach($voc ?? [] as $record)
        <table>
            <caption>VOCATIONAL COURSE</caption>
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
        @endforeach
    @endif


    @if(count($coll)>0)
    @foreach($coll ?? [] as $record)
        <table>
            <caption>COLLEGE COURSE</caption>
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
        </form>
        @endforeach
    @endif


    @if(count($grad)>0)
    @foreach($grad ?? [] as $record)
        <table>
            <caption>GRADUATE STUDY COURSE</caption>
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
        </form>
        @endforeach
    @endif

    @if(count($civil)>0)
    @foreach($civil ?? [] as $record)
        <table>
            <caption>CIVIL SERVICE</caption>
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
        <br />
        </form>
        @endforeach
    @endif


    @if(count($work)>0)
    @foreach($work as $record)
        <table>
            <caption>WORK EXPERIENCE</caption>
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
        @endforeach
    @endif


    @if(count($cert)>0)
    @foreach($cert ?? [] as $record)
        <table>
            <caption> CERTIFICATE </caption>
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
                <td colspan='2'><iframe src="/certificates/{{$record->Certificate}}" height=200px width=300px></iframe></td>
            </tr>
        </table><br />
        @endforeach
    @endif
</body>
</html>