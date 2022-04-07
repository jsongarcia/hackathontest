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
<p><b>WORK EXPERIENCES</b></p>
        @foreach($data as $record)
        <table>
        <form action="/publishWork/{{$record->ID}}" method="POST">
            @csrf
            <tr>
                <td>Inclusive Dates: </td>
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
                <td>Position/Title (Write in full/Don't abbreviate): </td>
                <td><input type="text" name="position" value="{{$record->Position}}" required></td>
            </tr>
            <tr>
                <td>Department/Agency/Office/Company (Write in full/Don't abbreviate): </td>
                <td><input type="text" name="department" value="{{$record->Department}}" required></td>
            </tr>
            <tr>
                <td>Monthly Salary: </td>
                <td><input type="text" name="salary" value="{{$record->Salary}}" required></td>
            </tr>
            <tr>
                <td>Salary/Job/Pay Grade (if applicable): </td>
                <td><input type="text" name="salarygrade" value="{{$record->SalaryGrade}}"></td>
            </tr>
            <tr>
                <td>Status of Appointment: </td>
                <td><input type="text" name="status" value="{{$record->Status}}" required></td>
            </tr>
            <tr>
                <td>Government Service: </td>
                <td>
                @if($record->Government)
                <select name="government" required>
                    <option value="yes" selected="selected">Yes</option>
                    <option value="no">No</option>
                </select>
                @else
                <select name="government" required>
                    <option value="yes">Yes</option>
                    <option value="no" selected="selected">No</option>
                </select>
                @endif
                </td>
            </tr>
        </table><br />
        <input type="submit" name="action" value="Save Changes">
        </form>
        @endforeach
        <br /><br />
</div>
</body>
</html>