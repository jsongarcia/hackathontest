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
<p><b>CERTIFICATES</b></p>
        @foreach($data ?? [] as $record)
        <table>
        <form action="/publishCert/{{$record->ID}}" method="POST" enctype="multipart/form-data">
            @csrf
            <tr>
                <td>Title: </td>
                <td><input type="text" name="title" value="{{$record->Title}}"></td>
            </tr>
            <tr>
                <td>Type: </td>
                <td><input type="text" name="type" value="{{$record->Type}}"></td>
            </tr>
            <tr>
                <td>Date of Attendance: </td>
            </tr>
            <tr>
                <td>From</td>
                <td><input type="date" name="fromDate"  value="{{$record->FromDate}}"></td>
            </tr>
            <tr>
                <td>To</td>
                <td><input type="date" name="toDate" value="{{$record->ToDate}}"></td>
            </tr>
            <tr>
                <td>Number of Hours: </td>
                <td><input type="text" name="hours" value="{{$record->Hours}}"></td>
            </tr>
            <tr>
                <td>Conducted/Sponsored By: </td>
                <td><input type="text" name="conducted" value="{{$record->Conducted}}"></td>
            </tr>
            <tr>
                <td>Type of LD: </td>
                <td><input type="text" name="ldtype" value="{{$record->LDType}}"></td>
            </tr>
            <tr>
                <td>Certificate(IMG/PDF)<br />(<i>Leave blank if nothing to change</i>): </td>
                <td><input type="file" name="upload" accept="image/*, application/pdf"></td>
            </tr>
        </table><br />
        <input type="submit" value="Save Changes"><br /></form>
        @endforeach
        <br /><br />
        <button><a href="/cert/addEntry">Add Certificate</a></button>
</body>
</html>