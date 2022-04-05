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
                <li><a href="/education/home">Education</a></li>
                <li><a href="/vocational/home">Vocational/Trade Course</a></li>
                <li><a href="/college/home">College</a></li>
                <li><a href="/graduate/home">Graduate Studies</a></li>
                <li><a href="/civil/home">Civil Service</a></li>
                <li><a href="/work/home">Work Experience</a></li>
                <li><a href="/logout">Log Out</a></li>
            </ul>
        </div>
<h3>ADD COLLEGE </h3>
        <table>
        <form action="/publishCollege" method="POST">
            @csrf
            <tr>
                <td>Name of School: </td>
                <td><input type="text" name="school"></td>
            </tr>
            <tr>
                <td>Basic Education/Degree/Course: </td>
                <td><input type="text" name="course"></td>
            </tr>
            <tr>
                <td colspan="2">Period of attendance  : </td>

            </tr>
            <tr>
                <td>From: </td>
                <td><input type="date" name="fromDate"></td>
            </tr>
            <tr>
                <td>To: </td>
                <td><input type="date" name="toDate"></td>
            </tr>
            <tr>
                <td>Highest Level/Units Earned (if not graduated):  </td>
                <td><input type="text" name="units"></td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                <td><input type="date" name="yearGrad"></td>
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td><input type="text" name="honors"></td>
            </tr>
        </table><br />
        <input type="submit" value="Add Entry">
        </form>
</body>
</html>