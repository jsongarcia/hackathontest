<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>