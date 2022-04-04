<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>ADD WORK EXPERIENCE</h3>
        <table>
        <form action="/publishWork" method="POST">
            @csrf
            <tr>
                <td>Inclusive Dates: </td>
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
                <td>Position/Title: </td>
                <td><input type="text" name="position"></td>
            </tr>
            <tr>
                <td>Department/Agency/Office/Company: </td>
                <td><input type="text" name="department"></td>
            </tr>
            <tr>
                <td>Monthly Salary: </td>
                <td><input type="text" name="salary"></td>
            </tr>
            <tr>
                <td>Salary/Job/Pay Grade: </td>
                <td><input type="text" name="salarygrade"></td>
            </tr>
            <tr>
                <td>Status of Appointment: </td>
                <td><input type="text" name="status"></td>
            </tr>
            <tr>
                <td>Government Service: </td>
                <td>
                <select name="government">
                    <option selected="selected" disabled></option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                </td>
            </tr>
        </table><br />
        <input type="submit" value="Add Entry">
        </form>
</body>
</html>