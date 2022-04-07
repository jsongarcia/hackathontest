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
<p><b>CERTIFICATES</b></p>
        @foreach($data ?? [] as $record)
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
                <td><input type="file" name="upload" accept="image/*, application/pdf" required></td>
            </tr>
        </table><br />
        <input type="submit" value="Save Changes"><br /></form>
        @endforeach
        <br /><br />
</div>
</body>
</html>