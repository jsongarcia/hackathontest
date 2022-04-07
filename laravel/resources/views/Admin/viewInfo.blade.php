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
            <li><a href='/admin/logout'>Log out</a></li>
        </ul>
    </div>
    <div class="faculty">
    <form action="/admin/info/generate" method="GET">
    <div class="info">
    <ul>
        <li><h4><center>Filter Information</center></h4></li>
        <li><input type="checkbox" onclick="tickAll(this)">All Information</li>
        <ul>
            <li><input type="checkbox" name="personal">Personal Information</li>
            <li><input type="checkbox" name="education">Education</li>
            <li><input type="checkbox" name="vocational" >Vocational/Trade Courses</li>
            <li><input type="checkbox" name="college" >College Courses</li>
            <li><input type="checkbox" name="graduate" >Graduate Studies</li>
            <li><input type="checkbox" name="civil" >Civil Services</li>
            <li><input type="checkbox" name="work" >Work Experience</li>
            <li><input type="checkbox" name="cert" >Certifications</li>
        </ul>
    </ul>
</div>
    <div class="info">
    <table class="collapseTable">
        <caption><h4>Select Faculty</h4></caption>
        <tr>
            <td class="collapseTd"><input type="checkbox" onclick="tickFaculty(this)"></td>
            <td class="collapseTd">Employee ID</td>
            <td class="collapseTd">Employee Username</td>
        </tr>

        @foreach($faculty as $record)
        <tr>
            <td class="collapseTd"><input type="checkbox" name="faculty[]" value="{{$record->ID}}"></td>
            <td class="collapseTd">{{$record->ID}}</td>
            <td class="collapseTd">{{$record->USERNAME}}</td>
        @endforeach
    </table>
</div>

    <center><input type="submit" value="View Information" style="margin:20px;" name="action"><input type="submit" value="Download Information" style="margin:20px;" name="action"></center>
    </form>

    <script>
        function tickAll(element){
            for(var li of element.parentElement.parentElement.getElementsByTagName("ul")[0].getElementsByTagName("input")){
                li.checked=element.checked
            }   
        }

        function tickFaculty(element){
            for(var li of document.getElementsByTagName("input")){
                if(li.getAttribute("name")=="faculty[]"){
                    li.checked=element.checked
                }
            }
        }

    </script>
    </div>
</body>
</html>