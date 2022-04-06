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
            <li><a href='/admin'>Accept Faculties</a></li>
            <li><a href='/admin/info'>View/Download Information</a></li>
            <li><a href='/admin/logout'>Log out</a></li>
        </ul>
    </div>
    @if(count($faculty)>0)
    <table>
        <caption>Unactivated Faculty Accounts</caption>
        <tr>
            <td>Employee Number</td>
            <td>Faculty User Name</td>
            <td>Action</td>
        </tr>
        @foreach($faculty as $record)
        <tr>
            <td>{{$record->ID}}</td>
            <td>{{$record->USERNAME}}</td>
            <td><form action="/admin/activate/{{$record->ID}}" method="GET"> @csrf <input type="submit" value="ACTIVATE"></form></td>
        </tr>
        @endforeach
    </table>
    @else
        <table>
            <caption>No unactivated faculty accounts found</caption>
        </table>
    @endif
</body>
</html>