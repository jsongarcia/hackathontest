<html>
    <head>
        <title>Information</title>
    </head>
    <body>
        <h2>WELCOME!!</h2>
        <ul>
            <li>Information</li>
            <li>Certifications</li>
            <li>Generate Info</li>
        </ul>
        <button onclick="logout()">Logout</button><br>
        <h2>INFORMATION STATUS</h2>
        <h3>FACULTY PROFILE PERSONAL INFORMATION: </h3>
        <table>
            <form action="/updateEducation" method="POST">
                @csrf
            <tr>
                <td>Employee Number: </td>
                <td><input type="text" name="EmpNumber"></td>
            </tr>
            <tr>
                <td>First Name: </td>
                <td><input type="text" name="FName"></td>
            </tr>
            <tr>
                <td>Last Name: </td>
                <td><input type="text" name="LName"></td>
            </tr>
            <tr>
                <td>Middle Initial: </td>
                <td><input type="text" name="MName"></td>
            </tr>
            <tr>
                <td>Date of Birth: </td>
                <td><input type="date" name="Birthday"></td>
            </tr>
            <tr>
                <td>Age: </td>
                <td><input type="text" name="age" disabled></td>
            </tr>
            <tr>
                <td>Place of Birth: </td>
                <td><input type="text"  name="BirthPlace"></td>
            </tr>
            <tr>
                <td>Sex: </td>
                <td><input type="text"  name="Sex"></td>
            </tr>
            <tr>
                <td>Civil Status: </td>
                <td><input type="text" name="CivilStatus"></td>
            </tr>
            <tr>
                <td>Height: </td>
                <td><input type="text" name="Height"></td>
            </tr>
            <tr>
                <td>Weight: </td>
                <td><input type="text" name="Weight"></td>
            </tr>
            <tr>
                <td>Blood Type: </td>
                <td><input type="text" name="BloodType"></td>
            </tr>
            <tr>
                <td>GSIS ID No.: </td>
                <td><input type="text" name="GSIS"></td>
            </tr>
            <tr>
                <td>PAG-IBIG No.: </td>
                <td><input type="text" name="PAGIBIG"></td>
            </tr>
            <tr>
                <td>PHILHEALTH No.: </td>
                <td><input type="text" name="PHILHEALTH"></td>
            </tr>
            <tr>
                <td>SSS No.: </td>
                <td><input type="text" name="SSS"></td>
            </tr>
            <tr>
                <td>TIN No.: </td>
                <td><input type="text" name="TIN"></td>
            </tr>
            <tr>
                <td>Citizenship No.: </td>
                <td><input type="text" name="Citizenship"></td>
            </tr>
            <tr>
                <td colspan="2">Residential Address</td>
            </tr>
            <tr>
                <td>House/Block/Lot No.  : </td>
                <td><input type="text" name="House"></td>
            </tr>
            <tr>
                <td>Street: </td>
                <td><input type="text" name="Street"></td>
            </tr>
            <tr>
                <td>Subdivision/Village: </td>
                <td><input type="text" name="Subdivision"></td>
            </tr>
            <tr>
                <td>Barangay: </td>
                <td><input type="text" name="Barangay"></td>
            </tr>
            <tr>
                <td>City/Municipality: </td>
                <td><input type="text" name="City"></td>
            </tr>
            <tr>
                <td>Province: </td>
                <td><input type="text" name="Province"></td>
            </tr>
            <tr>
                <td>Zip Code: </td>
                <td><input type="text" name="Zip"></td>
            </tr>
            <tr>
                <td colspan="2">Permanent Address</td>
            </tr>
            <tr>
                <td>House/Block/Lot No.  : </td>
                <td><input type="text" name="PermHouse"></td>
            </tr>
            <tr>
                <td>Street: </td>
                <td><input type="text" name="PermStreet"></td>
            </tr>
            <tr>
                <td>Subdivision/Village: </td>
                <td><input type="text" name="PermSubdivision"></td>
            </tr>
            <tr>
                <td>Barangay: </td>
                <td><input type="text" name="PermBarangay"></td>
            </tr>
            <tr>
                <td>City/Municipality: </td>
                <td><input type="text" name="PermCity"></td>
            </tr>
            <tr>
                <td>Province: </td>
                <td><input type="text" name="PermProvince"></td>
            </tr>
            <tr>
                <td>Zip Code: </td>
                <td><input type="text" name="PermZip"></td>
            </tr>
            <tr>
                <td>Telephone No.: </td>
                <td><input type="text" name="PermTelephone"></td>
            </tr>
            <tr>
                <td>Phone No.: </td>
                <td><input type="text" name="Phone"></td>
            </tr>
            <tr>
                <td>Alternate Email Address: </td>
                <td><input type="text" name="altEmail"></td>
            </tr>
        </table>
        <h3>EDUCATIONAL BACKGROUND: </h3>
        <table>
            <tr>
                <td colspan="2"><b>Elementary</b></td>
            </tr>
            <tr>
                <td>Name of School: </td>
                <td><input type="text" name="school[]"
                @if(isset($education))
                    value="{{$education[0]->ElemSchool}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Basic Education/Degree/Course: </td>
                <td><input type="text" name="course[]"
                @if(isset($education))
                    value="{{$education[0]->ElemCourse}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td colspan="2">Period of attendance  : </td>

            </tr>
            <tr>
                <td>From: </td>
                <td><input type="date" name="fromDate[]"
                @if(isset($education))
                    value="{{$education[0]->ElemFrom}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>To: </td>
                <td><input type="date" name="toDate[]"
                @if(isset($education))
                    value="{{$education[0]->ElemTo}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Highest Level/Units Earned (if not graduated):  </td>
                <td><input type="text" name="units[]"
                @if(isset($education))
                    value="{{$education[0]->ElemUnits}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                <td><input type="date" name="yearGrad[]"
                @if(isset($education))
                    value="{{$education[0]->ElemYearGrad}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td><input type="text" name="honors[]"
                @if(isset($education))
                    value="{{$education[0]->ElemHonors}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td colspan="2"><b>Secondary</b></td>
            </tr>
            <tr>
                <td>Name of School: </td>
                <td><input type="text" name="school[]"
                @if(isset($education))
                    value="{{$education[0]->SecondSchool}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Basic Education/Degree/Course: </td>
                <td><input type="text" name="course[]"
                @if(isset($education))
                    value="{{$education[0]->SecondCourse}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td colspan="2">Period of attendance  : </td>

            </tr>
            <tr>
                <td>From: </td>
                <td><input type="date" name="fromDate[]"
                @if(isset($education))
                    value="{{$education[0]->SecondFrom}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>To: </td>
                <td><input type="date" name="toDate[]"
                @if(isset($education))
                    value="{{$education[0]->SecondTo}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Highest Level/Units Earned (if not graduated):  </td>
                <td><input type="text" name="units[]"
                @if(isset($education))
                    value="{{$education[0]->SecondUnits}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Year Graduated: </td>
                <td><input type="date" name="yearGrad[]"
                @if(isset($education))
                    value="{{$education[0]->SecondYearGrad}}"
                @endif
                ></td>
            </tr>
            <tr>
                <td>Scholarship/Academic Honors Received: </td>
                <td><input type="text" name="honors[]"
                @if(isset($education))
                    value="{{$education[0]->SecondHonors}}"
                @endif
                ></td>
            </tr>
        </table><br />
        <input type="submit" value="Save Changes">
        </form>
        <script>
            function logout(){
                window.location="/logout"
            }
        </script>
    </body>
</html>