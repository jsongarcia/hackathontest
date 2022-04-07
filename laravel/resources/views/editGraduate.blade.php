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
<p><b>GRADUATE STUDIES</b></p>
        @foreach($data ?? [] as $record)
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
    </body>
</html>