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
            <li><a href='/admin'>Accept Faculties</a></li>
            <li><a href='/admin/info'>View/Download Information</a></li>
            <li><a href='/admin/info/update'>Update Faculty Information</a></li>
            <li><a href='/admin/logout'>Log out</a></li>
        </ul>
    </div>
    @if(count($faculty)>0)
    <form action="/admin/info/update/get" method="get">
    <table class="collapseTable">
        <caption><b>Faculty Accounts<b></caption>
        <tr>
            <th class="collapseTd"> Employee Number</th>
            <th class="collapseTd">Faculty User Name</th>
            <th class="collapseTd">Select</th>
        </tr>
        @foreach($faculty as $record)
        <tr>
            <td class="collapseTd">{{$record->ID}}</td>
            <td class="collapseTd">{{$record->USERNAME}}</td>
            <td class="collapseTd"><input type="radio" name="target" value="{{$record->ID}}"></td>
        </tr>
        @endforeach
    </table>
    
    @else
        <table>
            <caption>No faculty accounts found</caption>
        </table>
    @endif

    <div class="infoSelection">
        <h3>Select which information to update</h3>
        <input type="submit" name="action" value="Personal Information">
        <input type="submit" name="action" value="Education">
        <input type="submit" name="action" value="Vocational/Trade Course">
        <input type="submit" name="action" value="College"><br /><br />
        <input type="submit" name="action" value="Graduate Studies">
        <input type="submit" name="action" value="Civil Service">
        <input type="submit" name="action" value="Work Experience">
        <input type="submit" name="action" value="Certifications">
        </ul>
    </div>
    </form>
</body>
</html>