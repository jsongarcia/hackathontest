<html>
    <head>
        <title>Information</title>
        
    </head>
    <body>
        <h2>WELCOME!!</h2>
        <ul>
            <li>Information</li>
            <li>Certifications</li>
            <li>Generate Info</li>
        </ul>
        <button onclick="logout()">Logout</button><br>
        <h2>INFORMATION STATUS</h2>
        <h3>FACULTY PROFILE PERSONAL INFORMATION: </h3>
        <form action="/updatePersonalInfo" method="POST" enctype="multipart/form-data">
            <img
            @if(isset($profilePic))
                src="profilepictures/{{$profilePic[0]->DIRECTORY}}"
                else
                src="profilepictures/default-pic.png"
            @endif
            width=200px height=200px>
            <input type="file" accept="image/*" name="profile">
        <table>
                @csrf
            <tr>
                <td>Email Address: </td>
                <td><input type="text" disabled value="{{DB::select('select * from faculty where ACTIVESESSION=?',[Session::get('user')])[0]->USERNAME}}"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" value="********" disabled></td>
            </tr>        
            <tr>
                <td>Employee Number: </td>
                <td><input type="text" disabled value="{{DB::select('select * from faculty where ACTIVESESSION=?',[Session::get('user')])[0]->ID}}"></td>
            </tr>
            <tr>
                <td>First Name: </td>
                <td><input type="text" name="FName"
                @if(isset($info))
                    value="{{$info[0]->FName}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Last Name: </td>
                <td><input type="text" name="LName"
                @if(isset($info))
                    value="{{$info[0]->LName}}"
                @endif
                ></td>
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
                <td>Date of Birth: </td>
                <td><input type="date" name="Birthday"
                @if(isset($info))
                    value="{{$info[0]->Birthdate}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Age: </td>
                <td><input type="text" name="age" disabled></td>
            </tr>
            <tr>
                <td>Place of Birth: </td>
                <td><input type="text"  name="BirthPlace"
                @if(isset($info))
                    value="{{$info[0]->BirthPlace}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Sex: </td>
                <td><input type="text"  name="Sex"
                @if(isset($info))
                    value="{{$info[0]->Sex}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Civil Status: </td>
                <td><input type="text" name="CivilStatus"
                @if(isset($info))
                    value="{{$info[0]->Civil}}"
                @endif
                ></td>
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
                ></td>
            </tr>
            <tr>
                <td>City/Municipality: </td>
                <td><input type="text" name="City"
                @if(isset($info))
                    value="{{$info[0]->City}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Province: </td>
                <td><input type="text" name="Province"
                @if(isset($info))
                    value="{{$info[0]->Province}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Zip Code: </td>
                <td><input type="text" name="Zip"
                @if(isset($info))
                    value="{{$info[0]->Zip}}"
                @endif
                ></td>
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
                ></td>
            </tr>
            <tr>
                <td>City/Municipality: </td>
                <td><input type="text" name="PermCity"
                @if(isset($info))
                    value="{{$info[0]->PermaCity}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Province: </td>
                <td><input type="text" name="PermProvince"
                @if(isset($info))
                    value="{{$info[0]->PermaProvince}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Zip Code: </td>
                <td><input type="text" name="PermZip"
                @if(isset($info))
                    value="{{$info[0]->PermaZip}}"
                @endif
                ></td>
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
                ></td>
            </tr>
            <tr>
                <td>Alternate Email Address: </td>
                <td><input type="text" name="altEmail"
                @if(isset($education))
                    value="{{$info[0]->AltEmail}}"
                @endif
                ></td>
            </tr>
        <tr>
        <td><input type="submit" value="Save Changes"></td>
        </tr>
        
        </table>
        </form>

        <h3>EDUCATIONAL BACKGROUND: </h3>
        <table>
        <form action="/updateEducation" method="POST">
            @csrf
            <tr>
                <td colspan="2"><b>Elementary</b></td>
            </tr>
            <tr>
                <td>Name of School: </td>
                <td><input type="text" name="school[]"
                @if(isset($education))
                    value="{{$education[0]->ElemSchool}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Basic Education/Degree/Course: </td>
                <td><input type="text" name="course[]"
                @if(isset($education))
                    value="{{$education[0]->ElemCourse}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td colspan="2">Period of attendance  : </td>

            </tr>
            <tr>
                <td>From: </td>
                <td><input type="date" name="fromDate[]"
                @if(isset($education))
                    value="{{$education[0]->ElemFrom}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>To: </td>
                <td><input type="date" name="toDate[]"
                @if(isset($education))
                    value="{{$education[0]->ElemTo}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Highest Level/Units Earned (if not graduated):  </td>
                <td><input type="text" name="units[]"
                @if(isset($education))
                    value="{{$education[0]->ElemUnits}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                <td><input type="date" name="yearGrad[]"
                @if(isset($education))
                    value="{{$education[0]->ElemYearGrad}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td><input type="text" name="honors[]"
                @if(isset($education))
                    value="{{$education[0]->ElemHonors}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td colspan="2"><b>Secondary</b></td>
            </tr>
            <tr>
                <td>Name of School: </td>
                <td><input type="text" name="school[]"
                @if(isset($education))
                    value="{{$education[0]->SecondSchool}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Basic Education/Degree/Course: </td>
                <td><input type="text" name="course[]"
                @if(isset($education))
                    value="{{$education[0]->SecondCourse}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td colspan="2">Period of attendance  : </td>

            </tr>
            <tr>
                <td>From: </td>
                <td><input type="date" name="fromDate[]"
                @if(isset($education))
                    value="{{$education[0]->SecondFrom}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>To: </td>
                <td><input type="date" name="toDate[]"
                @if(isset($education))
                    value="{{$education[0]->SecondTo}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Highest Level/Units Earned (if not graduated):  </td>
                <td><input type="text" name="units[]"
                @if(isset($education))
                    value="{{$education[0]->SecondUnits}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                <td><input type="date" name="yearGrad[]"
                @if(isset($education))
                    value="{{$education[0]->SecondYearGrad}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td><input type="text" name="honors[]"
                @if(isset($education))
                    value="{{$education[0]->SecondHonors}}"
                @endif
                ></td>
            </tr>
        </table><br />
        <input type="submit" value="Save Changes">
        </form>

        <p><b>VOCATIONAL COURSES</b></p>
        @foreach($vocational as $record)
        <table>
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
                <td colspan="2">Period of attendance  : </td>

            </tr>
            <tr>
                <td>From: </td>
                <td><input type="date" name="fromDate" value="{{$record->FromDate}}"></td>
            </tr>
            <tr>
                <td>To: </td>
                <td><input type="date" name="toDate" value="{{$record->ToDate}}"></td>
            </tr>
            <tr>
                <td>Highest Level/Units Earned (if not graduated):  </td>
                <td><input type="text" name="units" value="{{$record->Units}}"></td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                <td><input type="date" name="yearGrad" value="{{$record->Year}}"></td>
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td><input type="text" name="honors" value="{{$record->Honors}}"></td>
            </tr>
        </table><br />
        <input type="submit" value="Save Changes">
        </form>
        @endforeach


        <button><a href="/vocational">Add Vocational/Trade Course</a></button>
        <script>
            function logout(){
                window.location="/logout"
            }
        </script>
    </body>
</html>