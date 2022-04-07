<html>
    <head>
        <title>Information</title>
        <link rel="stylesheet" href="css/main.css">
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
        <div class = "form">
        <h2>INFORMATION STATUS</h2>
        <h3>FACULTY PROFILE PERSONAL INFORMATION: </h3>
        <form action="/updatePersonalInfo" method="POST" enctype="multipart/form-data">
            <img
            @if(isset($profilePic))
                src="profilepictures/{{$profilePic[0]->DIRECTORY}}"
                else
                src="profilepictures/default-pic.png"
            @endif
            width=200px height=200px><br />
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
                <td>Employee Number: <editp/td>
                <td><input type="text" disabled value="{{DB::select('select * from faculty where ACTIVESESSION=?',[Session::get('user')])[0]->ID}}"></td>
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
    </body>
</html>