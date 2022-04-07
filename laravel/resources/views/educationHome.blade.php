<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
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
<h3>EDUCATIONAL BACKGROUND: </h3>
        <table class="infoTable">
        <form action="/editEducation" method="GET">
            @csrf
            <tr>
                <td colspan="2"><center>Elementary</center></td>
            </tr>
            <tr>
                <td>Name of School: </td>
                <td>{{$data[0]->ElemSchool}}</td>
            </tr>
            <tr>
                <td>Basic Education/Degree/Course: </td>
                <td>{{$data[0]->ElemCourse}}</td>
            </tr>
            <tr>
                <td>Period of attendance: </td>
                @if($data[0]->ElemFrom && $data[0]->ElemTo)
                <td>{{date_create($data[0]->ElemFrom)->format('m/d/Y')}} - {{date_create($data[0]->ElemTo)->format('m/d/Y')}}</td>
                @endif
            </tr>
            <tr>
                <td>Highest Level/Units Earned:  </td>
                <td>{{$data[0]->ElemUnits}}</td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                @if($data[0]->ElemYearGrad)
                <td>{{date_create($data[0]->ElemYearGrad)->format('Y')}}</td>
                @endif
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td>{{$data[0]->ElemHonors}}</td>
            </tr>
            <tr>
                <td colspan="2"><br /><center>Secondary</center></td>
            </tr>
            <tr>
                <td>Name of School: </td>
                <td>{{$data[0]->SecondSchool}}</td>
            </tr>
            <tr>
                <td>Basic Education/Degree/Course: </td>
                <td>{{$data[0]->SecondCourse}}</td>
            </tr>
            <tr>
                <td>Period of attendance  : </td>
                @if($data[0]->SecondFrom && $data[0]->SecondTo)
                <td>{{date_create($data[0]->SecondFrom)->format('m/d/Y')}} - {{date_create($data[0]->SecondTo)->format('m/d/Y')}}</td>
                @endif
               
            </tr>
            <tr>
                <td>Highest Level/Units Earned:  </td>
                <td>{{$data[0]->SecondUnits}}</td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                @if($data[0]->SecondYearGrad)
                <td>{{date_create($data[0]->SecondYearGrad)->format('Y')}}</td>
                @endif
                
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td>{{$data[0]->SecondHonors}}</td>
            </tr>
        </table><br />
        <input type="submit" value="Edit Education">
        </form>
</div>

</body>
</html>