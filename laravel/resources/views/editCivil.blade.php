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
<p><b>CIVIL SERVICE</b></p>
        @foreach($data ?? [] as $record)
        <table>
        <form action="/publishCivil/{{$record->ID}}" method="POST">
            @csrf
            <tr>
                <td>Civil Service Type: </td>
                <td><input type="text" name="civil" value="{{$record->Service}}"></td>
            </tr>
            <tr>
                <td>Rating: </td>
                <td><input type="text" name="rating" value="{{$record->Rating}}"></td>
            </tr>
            <tr>
                <td>Date of Examination/Conferment: </td>
                <td><input type="date" name="date" value="{{$record->ExamDate}}"></td>
            </tr>
            <tr>
                <td>Place of Examination/Confement: </td>
                <td><input type="text" name="place" value="{{$record->ExamPlace}}"></td>
            </tr>
            <tr>
                <td>License (if applicable):  </td>
            </tr>
            <tr>
                <td>License Number: </td>
                <td><input type="text" name="num" value="{{$record->LicenseNo}}"></td>
            </tr>
            <tr>
                <td>License validity: </td>
                <td><input type="date" name="valid" value="{{$record->Validity}}"></td>
            </tr>
        </table><br />
        <br />
        <input type="submit" name="action" value="Save Changes">
        </form>
        @endforeach
        <br /><br />
        <button><a href="/civil/addEntry">Add Civil Service</a></button>
</div>
</body>
</html>