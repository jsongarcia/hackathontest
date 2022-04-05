<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <ul>
        <li><input type="checkbox" onclick="tickAll(this)">All Information</li>
        <ul>
            <li><input type="checkbox" name="personal">Personal Information</li>
            <li><input type="checkbox" onclick="educ(this)">Education</li>
            <ul>
            <li><input type="checkbox" name="elem" id="el">Elementary school</li>
            <li><input type="checkbox" name="second" id="se">Secondary school</li>
            </ul>
            <li><input type="checkbox" name="vocational" >Vocational/Trade Courses</li>
            <li><input type="checkbox" name="college" >College Courses</li>
            <li><input type="checkbox" name="work" >Work Experience</li>
            <li><input type="checkbox" name="cert" >Certifications</li>
        </ul>
    </ul>

    <script>
        function tickAll(element){
            for(var li of document.getElementsByTagName("input")){
                li.checked=element.checked
            }
        }
        function educ(element){
            document.getElementById("el").checked=element.checked
            document.getElementById("se").checked=element.checked
        }
    </script>
</body>
</html>