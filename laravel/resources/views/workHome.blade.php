<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
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
<p><b>WORK EXPERIENCES</b></p>
        @foreach($data as $record)
        <table>
        <form action="/editWork/{{$record->ID}}" method="GET">
            @csrf
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
        <input type="submit" name="action" value="Edit Entry">
        </form>
        @endforeach
        <br /><br />
        <button><a href="/work/addEntry">Add Work Experience</a></button>
</div>

</body>
</html>