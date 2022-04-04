<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>ADD VOCATIONAL/TRADE COURSE </h3>
        <table>
        <form action="/publishVocational" method="POST">
            @csrf
            <tr>
                <td colspan="2"><b>Elementary</b></td>
            </tr>
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