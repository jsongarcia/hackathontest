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
<h3>ADD CIVIL SERVICE</h3>
        <table>
        <form action="/publishCivil" method="POST">
            @csrf
            <tr>
                <td>Civil Service Type: </td>
                <td><input type="text" name="civil"></td>
            </tr>
            <tr>
                <td>Rating: </td>
                <td><input type="text" name="rating"></td>
            </tr>
            <tr>
                <td>Date of Examination/Conferment: </td>
                <td><input type="date" name="date"></td>
            </tr>
            <tr>
                <td>Place of Examination/Confement: </td>
                <td><input type="text" name="place"></td>
            </tr>
            <tr>
                <td>License (if applicable):  </td>
            </tr>
            <tr>
                <td>License Number: </td>
                <td><input type="text" name="num"></td>
            </tr>
            <tr>
                <td>License validity: </td>
                <td><input type="date" name="validity"></td>
            </tr>
        </table><br />
        <input type="submit" value="Add Entry">
        </form>
</div>

</body>
</html>