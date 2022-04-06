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
<p><b>CIVIL SERVICE</b></p>
        @foreach($data ?? [] as $record)
        <table>
        <form action="/editCivil/{{$record->ID}}" method="GET">
            @csrf
            <tr>
                <td>Civil Service Type: </td>
                <td>{{$record->Service}}</td>
            </tr>
            <tr>
                <td>Rating: </td>
                <td>{{$record->Rating}}</td>
            </tr>
            <tr>
                <td>Date of Examination/Conferment: </td>
                <td>{{date_create($record->ExamDate)->format('m/d/Y')}}</td>
            </tr>
            <tr>
                <td>Place of Examination/Confement: </td>
                <td>{{$record->ExamPlace}}</td>
            </tr>
            <tr>
                <td>License Number: </td>
                <td>{{$record->LicenseNo}}</td>
            </tr>
            <tr>
                <td>License validity: </td>
                <td>{{date_create($record->Validity)->format('m/d/Y')}}</td>
            </tr>
        </table><br />
        <br />
        <input type="submit" name="action" value="Edit entry">
        </form>
        @endforeach
        <br /><br />
        <button><a href="/civil/addEntry">Add Civil Service</a></button>
</body>
</html>