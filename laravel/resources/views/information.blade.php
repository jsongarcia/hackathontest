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
        <div class="form">
        <h2>INFORMATION STATUS</h2>
        <h3>FACULTY PROFILE PERSONAL INFORMATION: </h3>
        <form action="/editPersonalInfo" method="GET">
            <img
            @if(isset($profilePic))
                src="profilepictures/{{$profilePic[0]->DIRECTORY}}"
                else
                src="profilepictures/default-pic.png"
            @endif
            width=200px height=200px>
        <table class="infoTable">
            <tr>
                <td>Email Address:</td>
                <td>{{DB::select('select * from faculty where ACTIVESESSION=?',[Session::get('user')])[0]->USERNAME}}</td>
            </tr>      
            <tr>
                <td>Employee Number: </td>
                <td>{{DB::select('select * from faculty where ACTIVESESSION=?',[Session::get('user')])[0]->ID}}</td>
            </tr>
            <tr>
                <td>Employee Name: </td>
                <td>{{$info[0]->FName}} {{$info[0]->MName}} @if(($info[0]->MName)) . @endif {{$info[0]->LName}} {{$info[0]->Extension}}</td>
            </tr>
            <tr>
                <td>Date of Birth: </td>
                @if($info[0]->Birthdate)
                <td>{{date_create($info[0]->Birthdate)->format("m/d/Y")}}</td>
                @endif
            </tr>
            <tr>
                <td>Age: </td>
                <td>{{ date_diff(date_create($info[0]->Birthdate),date_create(date('Y-m-d')))->format('%y') }}</td>
            </tr>
            <tr>
                <td>Place of Birth: </td>
                <td>{{$info[0]->BirthPlace}}</td>
            </tr>
            <tr>
                <td>Sex: </td>
                <td>{{$info[0]->Sex}}</td>
            </tr>
            <tr>
                <td>Civil Status: </td>
                <td>{{$info[0]->Civil}}</td>
            </tr>
            <tr>
                <td>Height: </td>
                <td>{{$info[0]->Height}}</td>
            </tr>
            <tr>
                <td>Weight: </td>
                <td>{{$info[0]->Weight}}</td>
            </tr>
            <tr>
                <td>Blood Type: </td>
                <td>{{$info[0]->BloodType}}</td>
            </tr>
            <tr>
                <td>GSIS ID No.: </td>
                <td>{{$info[0]->GSIS}}</td>
            </tr>
            <tr>
                <td>PAG-IBIG No.: </td>
                <td>{{$info[0]->PAGIBIG}}</td>
            </tr>
            <tr>
                <td>PHILHEALTH No.: </td>
                <td>{{$info[0]->PHILHEALTH}}</td>
            </tr>
            <tr>
                <td>SSS No.: </td>
                <td>{{$info[0]->SSS}}</td>
            </tr>
            <tr>
                <td>TIN No.: </td>
                <td>{{$info[0]->TIN}}</td>
            </tr>
            <tr>
                <td>Citizenship No.: </td>
                <td>{{$info[0]->Citizen}}</td>
            </tr>
            <tr>
                <td colspan="2">Residential Address</td>
            </tr>
            <tr>
                <td>House/Block/Lot No.  : </td>
                <td>{{$info[0]->House}}</td>
            </tr>
            <tr>
                <td>Street: </td>
                <td>{{$info[0]->Street}}</td>
            </tr>
            <tr>
                <td>Subdivision/Village: </td>
                <td>{{$info[0]->Subd}}</td>
            </tr>
            <tr>
                <td>Barangay: </td>
                <td>{{$info[0]->Barangay}}</td>
            </tr>
            <tr>
                <td>City/Municipality: </td>
                <td>{{$info[0]->City}}</td>
            </tr>
            <tr>
                <td>Province: </td>
                <td>{{$info[0]->Province}}</td>
            </tr>
            <tr>
                <td>Zip Code: </td>
                <td>{{$info[0]->Zip}}</td>
            </tr>
            <tr>
                <td colspan="2">Permanent Address</td>
            </tr>
            <tr>
                <td>House/Block/Lot No.  : </td>
                <td>{{$info[0]->PermaHouse}}</td>
            </tr>
            <tr>
                <td>Street: </td>
                <td>{{$info[0]->PermaStreet}}</td>
            </tr>
            <tr>
                <td>Subdivision/Village: </td>
                <td>{{$info[0]->PermaSubd}}</td>
            </tr>
            <tr>
                <td>Barangay: </td>
                <td>{{$info[0]->PermaBarangay}}</td>
            </tr>
            <tr>
                <td>City/Municipality: </td>
                <td>{{$info[0]->PermaCity}}</td>
            </tr>
            <tr>
                <td>Province: </td>
                <td>{{$info[0]->PermaProvince}}</td>
            </tr>
            <tr>
                <td>Zip Code: </td>
                <td>{{$info[0]->PermaZip}}</td>
            </tr>
            <tr>
                <td>Telephone No.: </td>
                <td>{{$info[0]->Tel}}</td>
            </tr>
            <tr>
                <td>Phone No.: </td>
                <td>{{$info[0]->Phone}}</td>
            </tr>
            <tr>
                <td>Alternate Email Address: </td>
                <td>{{$info[0]->AltEmail}}</td>
            </tr>
        <tr>
        <td><input type="submit" value="Edit Profile"></td>
        </tr>
        
        </table>
        </form>
    </div>
        
    </body>
</html>