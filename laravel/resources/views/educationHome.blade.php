<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1, initial-scale=1.0">
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
                <li><a href="/logout">Log Out</a></li>
            </ul>
        </div>
<h3>EDUCATIONAL BACKGROUND: </h3>
        <table>
        <form action="/editEducation" method="GET">
            @csrf
            <tr>
                <td colspan="2"><b>Elementary</b></td>
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
                <td>{{date_create($data[0]->ElemFrom)->format('m/d/Y')}} - {{date_create($data[0]->ElemTo)->format('m/d/Y')}}</td>
            </tr>
            <tr>
                <td>Highest Level/Units Earned:  </td>
                <td>{{$data[0]->ElemUnits}}</td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                <td>{{date_create($data[0]->ElemYearGrad)->format('Y')}}</td>
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td>{{$data[0]->ElemHonors}}</td>
            </tr>
            <tr>
                <td colspan="2"><b>Secondary</b></td>
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
                <td>{{date_create($data[0]->SecondFrom)->format('m/d/Y')}} - {{date_create($data[0]->SecondTo)->format('m/d/Y')}}</td>
            </tr>
            <tr>
                <td>Highest Level/Units Earned:  </td>
                <td>{{$data[0]->SecondUnits}}</td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                <td>{{date_create($data[0]->SecondYearGrad)->format('Y')}}</td>
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td>{{$data[0]->SecondHonors}}</td>
            </tr>
        </table><br />
        <input type="submit" value="Edit Education">
        </form>
</body>
</html>