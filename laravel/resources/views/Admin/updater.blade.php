<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>Document</title>
</head>
<body>
    <div class="topbar">
        <ul>
            <li><a href='/admin'>Accept Faculties</a></li>
            <li><a href='/admin/info'>View/Download Information</a></li>
            <li><a href='/admin/info/update'>Update Faculty Information</a></li>
            <li><a href='/admin/logout'>Log out</a></li>
        </ul>
    </div>
    @if(isset($info))
    <div class = "form">
        <h2>INFORMATION STATUS</h2>
        <h3>FACULTY PROFILE PERSONAL INFORMATION: </h3>
        <form action="/updatePersonalInfo" method="POST" enctype="multipart/form-data">
            <img
            @if(isset($profilePic))
                src="/profilepictures/{{$profilePic[0]->DIRECTORY}}"
                else
                src="/profilepictures/default-pic.png"
            @endif
            width=200px height=200px><br />
            <input type="file" accept="image/*" name="profile">
        <table>
                @csrf
            <tr>
                <td>Email Address: </td>
                <td><input type="text" disabled value="{{   DB::select('select * from faculty WHERE ID=?', [$info[0]->ID])[0]->USERNAME   }}"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" value="********" disabled></td>
            </tr>        
            <tr>
                <td>Employee Number: <editp/td>
                <td><input type="text" disabled name="UserID" value="{{ $info[0]->ID }}"><input type="hidden" name="UserID" value="{{ $info[0]->ID }}"></td>
            </tr>
            <tr>
                <td>First Name: </td>
                <td><input type="text" name="FName"
                @if(isset($info))
                    value="{{$info[0]->FName}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>Last Name: </td>
                <td><input type="text" name="LName"
                @if(isset($info))
                    value="{{$info[0]->LName}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>Middle Initial: </td>
                <td><input type="text" name="MName"
                @if(isset($info))
                    value="{{$info[0]->MName}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Name Extension: </td>
                <td><input type="text" name="Extension"
                @if(isset($info))
                    value="{{$info[0]->Extension}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Date of Birth: </td>
                <td><input type="date" name="Birthday"
                @if(isset($info))
                    value="{{$info[0]->Birthdate}}"
                @endif
                 required></td>
            </tr>
            <tr>
                <td>Age: </td>
                <td><input type="text" name="age" disabled
                @if(isset($info))
                    value="{{ date_diff(date_create($info[0]->Birthdate),date_create(date('Y-m-d')))->format('%y') }}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Place of Birth: </td>
                <td><input type="text"  name="BirthPlace"
                @if(isset($info))
                    value="{{$info[0]->BirthPlace}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>Sex: </td>
                <td><input type="text"  name="Sex"
                @if(isset($info))
                    value="{{$info[0]->Sex}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>Civil Status: </td>
                <td><input type="text" name="CivilStatus"
                @if(isset($info))
                    value="{{$info[0]->Civil}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>Height: </td>
                <td><input type="text" name="Height"
                @if(isset($info))
                    value="{{$info[0]->Height}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Weight: </td>
                <td><input type="text" name="Weight"
                @if(isset($info))
                    value="{{$info[0]->Weight}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Blood Type: </td>
                <td><input type="text" name="BloodType"
                @if(isset($info))
                    value="{{$info[0]->BloodType}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>GSIS ID No.: </td>
                <td><input type="text" name="GSIS"
                @if(isset($info))
                    value="{{$info[0]->GSIS}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>PAG-IBIG No.: </td>
                <td><input type="text" name="PAGIBIG"
                @if(isset($info))
                    value="{{$info[0]->PAGIBIG}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>PHILHEALTH No.: </td>
                <td><input type="text" name="PHILHEALTH"
                @if(isset($info))
                    value="{{$info[0]->PHILHEALTH}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>SSS No.: </td>
                <td><input type="text" name="SSS"
                @if(isset($info))
                    value="{{$info[0]->SSS}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>TIN No.: </td>
                <td><input type="text" name="TIN"
                @if(isset($info))
                    value="{{$info[0]->TIN}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Citizenship No.: </td>
                <td><input type="text" name="Citizenship"
                @if(isset($info))
                    value="{{$info[0]->Citizen}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td colspan="2">Residential Address</td>
            </tr>
            <tr>
                <td>House/Block/Lot No.  : </td>
                <td><input type="text" name="House"
                @if(isset($info))
                    value="{{$info[0]->House}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Street: </td>
                <td><input type="text" name="Street"
                @if(isset($info))
                    value="{{$info[0]->Street}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Subdivision/Village: </td>
                <td><input type="text" name="Subdivision"
                @if(isset($info))
                    value="{{$info[0]->Subd}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Barangay: </td>
                <td><input type="text" name="Barangay"
                @if(isset($info))
                    value="{{$info[0]->Barangay}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>City/Municipality: </td>
                <td><input type="text" name="City"
                @if(isset($info))
                    value="{{$info[0]->City}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>Province: </td>
                <td><input type="text" name="Province"
                @if(isset($info))
                    value="{{$info[0]->Province}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>Zip Code: </td>
                <td><input type="text" name="Zip"
                @if(isset($info))
                    value="{{$info[0]->Zip}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td colspan="2">Permanent Address</td>
            </tr>
            <tr>
                <td>House/Block/Lot No.  : </td>
                <td><input type="text" name="PermHouse"
                @if(isset($info))
                    value="{{$info[0]->PermaHouse}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Street: </td>
                <td><input type="text" name="PermStreet"
                @if(isset($info))
                    value="{{$info[0]->PermaStreet}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Subdivision/Village: </td>
                <td><input type="text" name="PermSubdivision"
                @if(isset($info))
                    value="{{$info[0]->PermaSubd}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Barangay: </td>
                <td><input type="text" name="PermBarangay"
                @if(isset($info))
                    value="{{$info[0]->PermaBarangay}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>City/Municipality: </td>
                <td><input type="text" name="PermCity"
                @if(isset($info))
                    value="{{$info[0]->PermaCity}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>Province: </td>
                <td><input type="text" name="PermProvince"
                @if(isset($info))
                    value="{{$info[0]->PermaProvince}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>Zip Code: </td>
                <td><input type="text" name="PermZip"
                @if(isset($info))
                    value="{{$info[0]->PermaZip}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>Telephone No.: </td>
                <td><input type="text" name="Telephone"
                @if(isset($info))
                    value="{{$info[0]->Tel}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Phone No.: </td>
                <td><input type="text" name="Phone"
                @if(isset($info))
                    value="{{$info[0]->Phone}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>Alternate Email Address: </td>
                <td><input type="text" name="altEmail"
                @if(isset($info))
                    value="{{$info[0]->AltEmail}}"
                @endif
                ></td>
            </tr>
        <tr>
        <td><input type="submit" value="Save Changes"></td>
        </tr>
        </table>
        </form>
    </div>
    @endif


    @if(isset($data))
    <div class="form">
<h3>EDUCATIONAL BACKGROUND: </h3>
        <table>
        <form action="/updateEducation" method="POST">
            <input type="hidden" name="ID" value="{{$data[0]->ID}}">
            @csrf
            <tr>
                <td colspan="2"><b>Elementary</b></td>
            </tr>
            <tr>
                <td>Name of School: </td>
                <td><input type="text" name="school[]"
                @if(isset($data))
                    value="{{$data[0]->ElemSchool}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>Basic Education/Degree/Course(Write in full): </td>
                <td><input type="text" name="course[]"
                @if(isset($data))
                    value="{{$data[0]->ElemCourse}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td colspan="2">Period of attendance  : </td>

            </tr>
            <tr>
                <td>From: </td>
                <td><input type="date" name="fromDate[]"
                @if(isset($data))
                    value="{{$data[0]->ElemFrom}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>To: </td>
                <td><input type="date" name="toDate[]"
                @if(isset($data))
                    value="{{$data[0]->ElemTo}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>Highest Level/Units Earned (if not graduated):  </td>
                <td><input type="text" name="units[]"
                @if(isset($data))
                    value="{{$data[0]->ElemUnits}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                <td><input type="date" name="yearGrad[]"
                @if(isset($data))
                    value="{{$data[0]->ElemYearGrad}}"
                @endif
                required></td>
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td><input type="text" name="honors[]"
                @if(isset($data))
                    value="{{$data[0]->ElemHonors}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td colspan="2"><b>Secondary</b></td>
            </tr>
            <tr>
                <td>Name of School: </td>
                <td><input type="text" name="school[]"
                @if(isset($data))
                    value="{{$data[0]->SecondSchool}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Basic Education/Degree/Course: </td>
                <td><input type="text" name="course[]"
                @if(isset($data))
                    value="{{$data[0]->SecondCourse}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td colspan="2">Period of attendance  : </td>

            </tr>
            <tr>
                <td>From: </td>
                <td><input type="date" name="fromDate[]"
                @if(isset($data))
                    value="{{$data[0]->SecondFrom}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>To: </td>
                <td><input type="date" name="toDate[]"
                @if(isset($data))
                    value="{{$data[0]->SecondTo}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Highest Level/Units Earned (if not graduated):  </td>
                <td><input type="text" name="units[]"
                @if(isset($data))
                    value="{{$data[0]->SecondUnits}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                <td><input type="date" name="yearGrad[]"
                @if(isset($data))
                    value="{{$data[0]->SecondYearGrad}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td><input type="text" name="honors[]"
                @if(isset($data))
                    value="{{$data[0]->SecondHonors}}"
                @endif
                ></td>
            </tr>
        </table><br />
        <input type="submit" value="Save Changes">
        </form>
</div>
    @endif

    @if(isset($vocational))
    <div class="form">
    <p><b>VOCATIONAL COURSES</b></p>
            @foreach($vocational ?? [] as $record)
            <hr />
            <table class="infoTable">
            <form action="/publishVocational/{{$record->ID}}" method="POST">
                @csrf
                <tr>
                    <td>Name of School: </td>
                    <td><input type="text" name="school" value="{{$record->Name}}"></td>
                </tr>
                <tr>
                    <td>Basic Education/Degree/Course: </td>
                    <td><input type="text" name="course" value="{{$record->Course}}"></td>
                </tr>
                <tr>
                    <td>Period of attendance  : </td>
                </tr>
                <tr>
                    <td>From:</td>
                    <td><input type="date" name="fromDate" value="{{$record->FromDate}}"></td>
                </tr>
                <tr>
                    <td>To:</td>
                    <td><input type="date" name="toDate" value="{{$record->ToDate}}"></td>
                </tr>
                <tr>
                    <td>Highest Level/Units Earned (if not graduated):  </td>
                    <td><input type="text" name="units" value="{{$record->Units}}"></td>
                </tr>
                <tr>
                    <td>Year Graduated: </td>
                    <td><input type="text" name="yearGrad" value="{{$record->Year}}"></td>
                </tr>
                <tr>
                    <td>Scholarship/Academic Honors Received: </td>
                    <td><input type="text" name="honors" value="{{$record->Honors}}"></td>
                </tr>
            </table><br />
            <input type="submit" name="action" value="Save Changes">
            </form>
            @endforeach
    </div>
    @endif

    @if(isset($college))
    <div class="form">
<p><b>COLLEGES</b></p>
        @foreach($college ?? [] as $record)
        <hr />
        <table>
        <form action="/publishCollege/{{$record->ID}}" method="POST">
            @csrf
            <tr>
                <td>Name of School: </td>
                <td><input type="text" name="school" value="{{$record->Name}}" required></td>
            </tr>
            <tr>
                <td>Basic Education/Degree/Course (Write in full): </td>
                <td><input type="text" name="course" value="{{$record->Course}}" required></td>
            </tr>
            <tr>
                <td colspan="2">Period of attendance  : </td>

            </tr>
            <tr>
                <td>From: </td>
                <td><input type="date" name="fromDate" value="{{$record->FromDate}}" required></td>
            </tr>
            <tr>
                <td>To: </td>
                <td><input type="date" name="toDate" value="{{$record->ToDate}}" required></td>
            </tr>
            <tr>
                <td>Highest Level/Units Earned (if not graduated):  </td>
                <td><input type="text" name="units" value="{{$record->Units}}"></td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                <td><input type="date" name="yearGrad" value="{{$record->Year}}" required></td>
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td><input type="text" name="honors" value="{{$record->Honors}}"></td>
            </tr>
        </table><br />
        <input type="submit" name="action" value="Save Changes">
        </form>
        @endforeach
        <br /><br />
</div>
    @endif
    
    @if(isset($graduate))
    <div class="form">
    <p><b>GRADUATE STUDIES</b></p>
            @foreach($graduate ?? [] as $record)
            <table>
            <form action="/publishGraduate/{{$record->ID}}" method="POST">
                @csrf
                <tr>
                    <td>Name of School: </td>
                    <td><input type="text" name="school" value="{{$record->Name}}" required></td>
                </tr>
                <tr>
                    <td>Basic Education/Degree/Course (Write in full): </td>
                    <td><input type="text" name="course" value="{{$record->Course}}" required></td>
                </tr>
                <tr>
                    <td colspan="2">Period of attendance  : </td>

                </tr>
                <tr>
                    <td>From: </td>
                    <td><input type="date" name="fromDate" value="{{$record->FromDate}}" required></td>
                </tr>
                <tr>
                    <td>To: </td>
                    <td><input type="date" name="toDate" value="{{$record->ToDate}}" required></td>
                </tr>
                <tr>
                    <td>Highest Level/Units Earned (if not graduated):  </td>
                    <td><input type="text" name="units" value="{{$record->Units}}"></td>
                </tr>
                <tr>
                    <td>Year Graduated: </td>
                    <td><input type="date" name="yearGrad" value="{{$record->Year}}" required></td>
                </tr>
                <tr>
                    <td>Scholarship/Academic Honors Received: </td>
                    <td><input type="text" name="honors" value="{{$record->Honors}}"></td>
                </tr>
            </table><br />
            <input type="submit" name="action" value="Save Changes">
            </form>
            @endforeach
            <br /><br />
    </div>
    @endif


    @if(isset($civil))
    <div class="form">
    <p><b>CIVIL SERVICE</b></p>
            @foreach($civil ?? [] as $record)
            <table>
            <form action="/publishCivil/{{$record->ID}}" method="POST">
                @csrf
                <tr>
                    <td>Civil Service Type: </td>
                    <td><input type="text" name="civil" value="{{$record->Service}}" required></td>
                </tr>
                <tr>
                    <td>Rating: </td>
                    <td><input type="text" name="rating" value="{{$record->Rating}}" required></td>
                </tr>
                <tr>
                    <td>Date of Examination/Conferment: </td>
                    <td><input type="date" name="date" value="{{$record->ExamDate}}" required></td>
                </tr>
                <tr>
                    <td>Place of Examination/Confement: </td>
                    <td><input type="text" name="place" value="{{$record->ExamPlace}}" required></td>
                </tr>
                <tr>
                    <td>License (if applicable):  </td>
                </tr>
                <tr>
                    <td>License Number: </td>
                    <td><input type="text" name="num" value="{{$record->LicenseNo}}"></td>
                </tr>
                <tr>
                    <td>License validity: </td>
                    <td><input type="date" name="valid" value="{{$record->Validity}}"></td>
                </tr>
            </table><br />
            <br />
            <input type="submit" name="action" value="Save Changes">
            </form>
            @endforeach
            <br /><br />
    </div> 
    @endif

    @if(isset($work))
    <div class="form">
    <p><b>WORK EXPERIENCES</b></p>
            @foreach($work as $record)
            <table>
            <form action="/publishWork/{{$record->ID}}" method="POST">
                @csrf
                <tr>
                    <td>Inclusive Dates: </td>
                </tr>
                <tr>
                    <td>From: </td>
                    <td><input type="date" name="fromDate" value="{{$record->FromDate}}" required></td>
                </tr>
                <tr>
                    <td>To: </td>
                    <td><input type="date" name="toDate" value="{{$record->ToDate}}" required></td>
                </tr>
                <tr>
                    <td>Position/Title (Write in full/Don't abbreviate): </td>
                    <td><input type="text" name="position" value="{{$record->Position}}" required></td>
                </tr>
                <tr>
                    <td>Department/Agency/Office/Company (Write in full/Don't abbreviate): </td>
                    <td><input type="text" name="department" value="{{$record->Department}}" required></td>
                </tr>
                <tr>
                    <td>Monthly Salary: </td>
                    <td><input type="text" name="salary" value="{{$record->Salary}}" required></td>
                </tr>
                <tr>
                    <td>Salary/Job/Pay Grade (if applicable): </td>
                    <td><input type="text" name="salarygrade" value="{{$record->SalaryGrade}}"></td>
                </tr>
                <tr>
                    <td>Status of Appointment: </td>
                    <td><input type="text" name="status" value="{{$record->Status}}" required></td>
                </tr>
                <tr>
                    <td>Government Service: </td>
                    <td>
                    @if($record->Government)
                    <select name="government" required>
                        <option value="yes" selected="selected">Yes</option>
                        <option value="no">No</option>
                    </select>
                    @else
                    <select name="government" required>
                        <option value="yes">Yes</option>
                        <option value="no" selected="selected">No</option>
                    </select>
                    @endif
                    </td>
                </tr>
            </table><br />
            <input type="submit" name="action" value="Save Changes">
            </form>
            @endforeach
            <br /><br />
    </div>
    @endif

    @if(isset($cert))
    <div class="form">
    <p><b>CERTIFICATES</b></p>
            @foreach($cert ?? [] as $record)
            <table>
            <form action="/publishCert/{{$record->ID}}" method="POST" enctype="multipart/form-data">
                @csrf
                <tr>
                    <td>Title of L&D/Training Programs (Write in full): </td>
                    <td><input type="text" name="title" value="{{$record->Title}}" required></td>
                </tr>
                <tr>
                    <td>Type: </td>
                    <td><input type="text" name="type" value="{{$record->Type}}" required></td>
                </tr>
                <tr>
                    <td>Date of Attendance: </td>
                </tr>
                <tr>
                    <td>From</td>
                    <td><input type="date" name="fromDate"  value="{{$record->FromDate}}" required></td>
                </tr>
                <tr>
                    <td>To</td>
                    <td><input type="date" name="toDate" value="{{$record->ToDate}}" required></td>
                </tr>
                <tr>
                    <td>Number of Hours: </td>
                    <td><input type="text" name="hours" value="{{$record->Hours}}" required></td>
                </tr>
                <tr>
                    <td>Conducted/Sponsored By: </td>
                    <td><input type="text" name="conducted" value="{{$record->Conducted}}" required></td>
                </tr>
                <tr>
                    <td>Type of L&D (Managerial, Supervisory, etc.): </td>
                    <td><input type="text" name="ldtype" value="{{$record->LDType}}" required></td>
                </tr>
                <tr>
                    <td>Certificate(IMG/PDF)<br />(<i>Leave blank if nothing to change</i>): </td>
                    <td><input type="file" name="upload" accept="image/*, application/pdf"></td>
                </tr>
            </table><br />
            <input type="submit" value="Save Changes"><br /></form>
            @endforeach
            <br /><br />
    </div>
    @endif
</body>
</html>