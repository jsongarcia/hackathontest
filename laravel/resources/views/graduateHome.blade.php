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
<p><b>GRADUATE STUDIES</b></p>
        @foreach($data ?? [] as $record)
        <table>
        <form action="/editGraduate/{{$record->ID}}" method="GET">
            @csrf
            <tr>
                <td>Name of School: </td>
                <td>{{$record->Name}}</td>
            </tr>
            <tr>
                <td>Basic Education/Degree/Course: </td>
                <td>{{$record->Course}}</td>
            </tr>
            <tr>
                <td>Period of attendance  : </td>
                <td>{{date_create($record->FromDate)->format('m/d/Y')}} - {{date_create($record->ToDate)->format('m/d/Y')}}</td>
            </tr>
            <tr>
                <td>Highest Level/Units Earned:  </td>
                <td>{{$record->Units}}</td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                <td>{{date_create($record->Year)->format('Y')}}</td>
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td>{{$record->Honors}}</td>
            </tr>
        </table><br />
        <input type="submit" name="action" value="Edit Entry">
        </form>
        @endforeach
        <br /><br />
        <button><a href="/graduate/addEntry">Add Graduate Study</a></button>
</body>
</html>