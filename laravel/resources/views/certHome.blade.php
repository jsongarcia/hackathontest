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
                <li><a href="/report">Generate Reports</a></li>
                <li><a href="/logout">Log Out</a></li>
            </ul>
        </div>
<p><b>CERTIFICATES</b></p>
        @foreach($data ?? [] as $record)
        <table>
        <form action="/editCert/{{$record->ID}}" method="GET">
            @csrf
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
        </table><br />
        <iframe src="certificates/{{$record->Certificate}}" height=200px width=300px></iframe><br />
        <input type="submit" value="Edit Entry"><br /></form>
        @endforeach
        <br /><br />
        <button><a href="/cert/addEntry">Add Certificate</a></button>
</body>
</html>