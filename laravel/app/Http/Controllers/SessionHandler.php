<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class SessionHandler extends Controller
{
    public function index(Request $r){
        if(Session::has("user")){
            return "<script>window.location.href='/home'</script>";
        }else{
            if( $r->input('email') && $r->input('password')) {
                $email = $r->input("email");
                $pass = $r->input("password");
                $res = DB::select("select * from faculty where USERNAME=? and PASSWORD=?",[$email, $pass]);
                if(count($res)==1){ //There's a match!
                    //Make a session for the user
                    $sessionKey = md5(time().$email);
                    Session::put("user", $sessionKey);
                    DB::update("update faculty set ACTIVESESSION=? WHERE ID=?",[$sessionKey, $res[0]->ID]);
                    return "<script>window.location.href='/home'</script>";
                }else{
                return view("login", ["msg"=>"Invalid Username/Password."]);
                }
            }else
            return view("login");
        }
    }
    public function toHome(){
        if(Session::has("user")){
            //Get the user id
            $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get Personal Info
            $personalInfo = DB::select("select * from PERSONALINFO where ID=?", [$userId[0]->ID]);
            //get profilepicture
            $profilePic = DB::select("select * from PROFILEPICTURES where ID=?", [$userId[0]->ID]);
            return view("information", ["info"=>$personalInfo, "profilePic"=>$profilePic]);
        }else
        return "<script>window.location.href='/logout'</script>";
    }
    public function toRegister(){
        if(Session::has("user"))
            return view("information");
        else
            return view("register");
    }
    public function addUser(Request $req){
        $email = $req->input("email");
        $pas1 = $req->input("pass1");
        $pas1 = $req->input("pass2");
        //Check for same emails
        $sameEmails = DB::select("select * from faculty WHERE USERNAME=?", [$email]);
        if(count($sameEmails)==0){
            //Proceed with registration
            DB::statement("insert into faculty(USERNAME, PASSWORD) VALUES(?,?)", [$email, $pas1]);
            $id = DB::select("select * from faculty where USERNAME=?",[$email]);

            //Make Educational Background, Personal Info, ProfilePicture
            DB::statement("insert into EDUCATIONALBACKGROUND(ID) values(?)", [$id[0]->ID]);
            DB::statement("insert into PERSONALINFO(ID) values(?)", [$id[0]->ID]);
            DB::statement("insert into PROFILEPICTURES(ID,DIRECTORY) values(?,?)", [$id[0]->ID, "default-pic.png"]);
            return view("/register", ['msg'=>"Registered succesfully!"]);
        }else{
            //Return an error
            $msg = $email ." is already registered in the database.";
            return view("/register", ['msg'=>$msg]);
        }
    }
    public function logout(){
        DB::update("update faculty set ACTIVESESSION='' where ACTIVESESSION=?",[Session::get("user")]);
        Session::forget('user');
        return "<script>window.location.href='/'</script>";
    }

    public function updateEducation(Request $req){
        if(Session::get("user")){
        $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
        DB::update("
            update EDUCATIONALBACKGROUND
            set
            ElemSchool=?, ElemCourse=?, ElemFrom=?, ElemTo=?, ElemUnits=?, ElemYearGrad=?, ElemHonors =?,
            SecondSchool=?, SecondCourse=?, SecondFrom=?, SecondTo=?, SecondUnits=?, SecondYearGrad=?, SecondHonors =?

            WHERE ID=?
            ",
            [$req->school[0], $req->course[0], $req->fromDate[0], $req->toDate[0], $req->units[0], $req->yearGrad[0], $req->honors[0],
            $req->school[1], $req->course[1], $req->fromDate[1], $req->toDate[1], $req->units[1], $req->yearGrad[1], $req->honors[1],
            $userId[0]->ID]);
            return "<script>window.location.href='/education'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function certAdd(Request $r){
        if(Session::get("user")){
            $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
            $f = $_FILES["upload"];
            $name = $f["name"];
            $tempname = $f["tmp_name"];
            $newName= time().".".pathinfo($name, PATHINFO_EXTENSION);
            $name=$newName;
            move_uploaded_file($tempname, "certificates/$newName");
            //Send to Database
            DB::insert("insert into CERTIFICATIONS(FacultyID,Title,Type,FromDate,ToDate,Hours,LDType,Conducted,Certificate)
            values(?,?,?,?,?,?,?,?,?)",[
                $userId[0]->ID, $r->input("title"), $r->input("type"), $r->input("fromDate"), $r->input("toDate"), $r->input("hours"),$r->input("ldtype"), $r->input("conducted"), $newName
            ]);
            return "<script>window.location.href='/cert'</script>";
         }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function updatePersonalInfo(Request $req){
        if(Session::get("user")){
        $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
        //Get the profile pic first
        if(strlen($_FILES["profile"]['name'])>0){
            $f = $_FILES["profile"];
            $name = $f["name"];
            $tempname = $f["tmp_name"];
            $newName= time().".".pathinfo($name, PATHINFO_EXTENSION);
            $name=$newName;
            move_uploaded_file($tempname, "profilepictures/$newName");

            //Send to Database
            DB::update("update PROFILEPICTURES set DIRECTORY=? where ID=?",[$newName, $userId[0]->ID]);
        }
        DB::update("
            update PERSONALINFO
            set
            FName=?, LName=?, MName=?, Birthdate=?, BirthPlace=?, Sex=?, Civil=?, Height=?, Weight=?, BloodType=?,
            GSIS=?, PAGIBIG=?, PHILHEALTH=?, SSS=?, TIN=?, Citizen=?, House=?, Street=?, Subd=?, Barangay=?, City=?, Province=?, Zip=?, 
            PermaHouse=?, PermaStreet=?,PermaSubd=?, PermaBarangay=?, PermaCity=?, PermaProvince=?, PermaZip=?, Tel=?, Phone=?, AltEmail=?

            WHERE ID=?
            ",
            [$req->FName, $req->LName, $req->MName, $req->Birthday,$req->BirthPlace, $req->Sex, $req->CivilStatus, $req->Height, $req->Weight, $req->BloodType,
            $req->GSIS, $req->PAGIBIG, $req->PHILHEALTH, $req->SSS, $req->TIN, $req->Citizenship, $req->House,$req->Street, $req->Subdivision,$req->Barangay, $req->City, $req->Province, $req->Zip,
            $req->PermHouse, $req->PermStreet, $req->PermSubdivision,$req->PermBarangay, $req->PermCity, $req->PermProvince, $req->PermZip, $req->Telephone, $req->Phone, $req->altEmail,
            $userId[0]->ID]);
            return "<script>window.location.href='/home'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function publishCert(Request $req, $id){
        if(Session::get("user")){
        $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
        //Get the profile pic first
        if(strlen($_FILES["upload"]['name'])>0){
            $f = $_FILES["upload"];
            $name = $f["name"];
            $tempname = $f["tmp_name"];
            $newName= time().".".pathinfo($name, PATHINFO_EXTENSION);
            $name=$newName;
            move_uploaded_file($tempname, "certificates/$newName");
            //Send to Database
            DB::update("update CERTIFICATIONS set Certificate=? where ID=?",[$newName, $id]);
        }
        DB::update("
            update CERTIFICATIONS
            set
            Title=?, Type=?, FromDate=?, ToDate=?, Hours=?, LDType=?, Conducted=?
            WHERE ID=?
            ",
            [$req->title, $req->type,$req->fromDate,$req->toDate,$req->hours,$req->ldtype,$req->conducted,
            $id]);
            return "<script>window.location.href='/cert'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function educationHome(){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the data
            $data = DB::select("select * from EDUCATIONALBACKGROUND where ID=?",[$userId[0]->ID]);
            return view("educationHome", ['data'=>$data]);
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function vocationalHome(){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the data
            $data = DB::select("select * from VOCATIONALCOURSES where FacultyID=?",[$userId[0]->ID]);
            return view("vocationalHome", ['data'=>$data]);
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function certHome(){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the data
            $data = DB::select("select * from CERTIFICATIONS where FacultyID=?",[$userId[0]->ID]);
            return view("certHome", ['data'=>$data]);
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function editCert(Request $r, $id){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the data
            $data = DB::select("select * from CERTIFICATIONS where ID=?",[$id]);
            return view("editCert", ['data'=>$data]);
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function addCert(){
        if(Session::has("user")){
            return view("cert");
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function workHome(){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the data
            $data = DB::select("select * from WORKEXPERIENCE where FacultyID=?",[$userId[0]->ID]);
            return view("workHome", ['data'=>$data]);
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function editWork(Request $r, $id){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the data
            $data = DB::select("select * from WORKEXPERIENCE where ID=?",[$id]);
            return view("editWork", ['data'=>$data]);
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function workAdd(){
        if(Session::has("user")){
            return view("work");
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function graduateAdd(){
        if(Session::has("user")){
            return view("graduate");
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function vocationalAdd(){
        if(Session::has("user")){
            return view("vocational");
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function collegeAdd(){
        if(Session::has("user")){
            return view("college");
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function civilAdd(){
        if(Session::has("user")){
            return view("civil");
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function cert(){
        if(Session::has("user")){
            return view("cert");
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function civilHome(){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the data
            $data = DB::select("select * from CIVILSERVICE where FacultyID=?",[$userId[0]->ID]);
            return view("civilHome", ['data'=>$data]);
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function editCivil(Request $r, $id){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the data
            $data = DB::select("select * from CIVILSERVICE where ID=?",[$id]);
            return view("editCivil", ['data'=>$data]);
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function graduateHome(){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the data
            $data = DB::select("select * from GRADUATESTUDIES where FacultyID=?",[$userId[0]->ID]);
            return view("graduateHome", ['data'=>$data]);
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function collegeHome(){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the data
            $data = DB::select("select * from COLLEGES where FacultyID=?",[$userId[0]->ID]);
            return view("collegeHome", ['data'=>$data]);
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function editCollege(Request $r, $id){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the data
            $data = DB::select("select * from COLLEGES where ID=?",[$id]);
            return view("editCollege", ['data'=>$data]);
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function addWork(Request $r){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
            $gov=0;
            if($r->input("government")=="yes")
                $gov=1;
            //Insert the values
            DB::insert("insert into WORKEXPERIENCE(FacultyID, FromDate , ToDate , Position , Department , Salary , SalaryGrade ,Status ,Government )
                        values(?,?,?,?,?,?,?,?,?)",[
                            $userId[0]->ID, $r->input("fromDate"), $r->input("toDate"), $r->input("position"), $r->input("department"), $r->input("salary"), $r->input("salarygrade"), $r->input("status"), $gov
                        ]);
                        return "<script>window.location.href='/work'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function publishWork(Request $r, $id){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
            $gov=0;
            if($r->input("government")=="yes")
                $gov=1;
            if($r->input("action")=="Save Changes"){
                DB::update(
                    "update WORKEXPERIENCE
                    set FromDate=? , ToDate=? , Position=? , Department=? , Salary=? , SalaryGrade=? ,Status=? ,Government=?
                    WHERE ID=? and FacultyID=?",[$r->input("fromDate"), $r->input("toDate"), $r->input("position"), $r->input("department"), $r->input("salary"), $r->input("salarygrade"), $r->input("status"), $gov,
                    $id, $userId[0]->ID]
                );
            }else if($r->input("action")=="Delete"){
                DB::delete("delete from WORKEXPERIENCE
                            WHERE ID=? and FacultyID=?", [$id, $userId[0]->ID]);
            }
            return "<script>window.location.href='/work'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function editPersonalInfo(){
        //Get the user id
        $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
        //Get Personal Info
        $personalInfo = DB::select("select * from PERSONALINFO where ID=?", [$userId[0]->ID]);
        //get profilepicture
        $profilePic = DB::select("select * from PROFILEPICTURES where ID=?", [$userId[0]->ID]);
        return view("editPersonalInfo", ["info"=>$personalInfo, "profilePic"=>$profilePic]);
    }
    public function editEducation(){
        $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the data
            $data = DB::select("select * from EDUCATIONALBACKGROUND where ID=?",[$userId[0]->ID]);
            return view("editEducation", ['data'=>$data]);
    }
    public function editVocational(Request $r, $id){
        $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the data
            $data = DB::select("select * from VOCATIONALCOURSES where ID=?",[$id]);
            return view("editVocational", ['data'=>$data]);
    }
    public function addCivil(Request $r){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
            //Insert the values
            DB::insert("insert into CIVILSERVICE(FacultyID, Service, Rating, ExamDate, ExamPlace, LicenseNo, Validity)
                        values(?,?,?,?,?,?,?)",[
                            $userId[0]->ID, $r->input("civil"), $r->input("rating"), $r->input("date"), $r->input("place"), $r->input("num"), $r->input("validity")
                        ]);
                        return "<script>window.location.href='/civil'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function publishCivil(Request $r, $id){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
            if($r->input("action")=="Save Changes"){
                DB::update(
                    "update CIVILSERVICE
                    set Service=?, Rating=?, ExamDate=?, ExamPlace=?, LicenseNo=?, Validity=?
                    WHERE ID=? and FacultyID=?",[$r->input("civil"), $r->input("rating"), $r->input("date"), $r->input("place"), $r->input("num"), $r->input("valid"),
                    $id, $userId[0]->ID]
                );
            }else if($r->input("action")=="Delete"){
                DB::delete("delete from CIVILSERVICE
                            WHERE ID=? and FacultyID=?", [$id, $userId[0]->ID]);
            }
            return "<script>window.location.href='/civil'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function addCollege(Request $r){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
            //Insert the values
            DB::insert("insert into COLLEGES(FacultyID,Name,Course,FromDate,ToDate,Units,Year,Honors)
                        values(?,?,?,?,?,?,?,?)",[
                            $userId[0]->ID, $r->input("school"), $r->input("course"), $r->input("fromDate"), $r->input("toDate"), $r->input("units"), $r->input("yearGrad"), $r->input("honors")
                        ]);
                        return "<script>window.location.href='/college'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function addGraduate(Request $r){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
            //Insert the values
            DB::insert("insert into GRADUATESTUDIES(FacultyID,Name,Course,FromDate,ToDate,Units,Year,Honors)
                        values(?,?,?,?,?,?,?,?)",[
                            $userId[0]->ID, $r->input("school"), $r->input("course"), $r->input("fromDate"), $r->input("toDate"), $r->input("units"), $r->input("yearGrad"), $r->input("honors")
                        ]);
                        return "<script>window.location.href='/graduate'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function editGraduate(Request $r,$id){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty where ACTIVESESSION=?", [Session::get("user")]);
            //Get the data
            $data = DB::select("select * from GRADUATESTUDIES where ID=?",[$id]);
            return view("editGraduate", ['data'=>$data]);
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function publishGraduate(Request $r, $id){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
            if($r->input("action")=="Save Changes"){
                DB::update(
                    "update GRADUATESTUDIES
                    set Name=?,Course=?, FromDate=?, ToDate=?, Units=?, Year=?, Honors=?  
                    WHERE ID=? and FacultyID=?",[$r->input("school"), $r->input("course"), $r->input("fromDate"), $r->input("toDate"), $r->input("units"), $r->input("yearGrad"), $r->input("honors"),
                    $id, $userId[0]->ID]
                );
            }else if($r->input("action")=="Delete"){
                DB::delete("delete from GRADUATESTUDIES
                            WHERE ID=? and FacultyID=?", [$id, $userId[0]->ID]);
            }
            return "<script>window.location.href='/graduate'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }

    public function publishCollege(Request $r, $id){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
            if($r->input("action")=="Save Changes"){
                DB::update(
                    "update COLLEGES
                    set Name=?,Course=?, FromDate=?, ToDate=?, Units=?, Year=?, Honors=?  
                    WHERE ID=? and FacultyID=?",[$r->input("school"), $r->input("course"), $r->input("fromDate"), $r->input("toDate"), $r->input("units"), $r->input("yearGrad"), $r->input("honors"),
                    $id, $userId[0]->ID]
                );
            }else if($r->input("action")=="Delete"){
                DB::delete("delete from COLLEGES
                            WHERE ID=? and FacultyID=?", [$id, $userId[0]->ID]);
            }
            return "<script>window.location.href='/college'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
    public function addVocational(Request $r){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
            //Insert the values
            DB::insert("insert into VOCATIONALCOURSES(FacultyID,Name,Course,FromDate,ToDate,Units,Year,Honors)
                        values(?,?,?,?,?,?,?,?)",[
                            $userId[0]->ID, $r->input("school"), $r->input("course"), $r->input("fromDate"), $r->input("toDate"), $r->input("units"), $r->input("yearGrad"), $r->input("honors")
                        ]);
                        return "<script>window.location.href='/vocational'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }

    public function publishVocational(Request $r, $id){
        if(Session::has("user")){
            $userId = DB::select("select * from faculty WHERE ACTIVESESSION=?",[Session::get("user")]);
            if($r->input("action")=="Save Changes"){
                DB::update(
                    "update VOCATIONALCOURSES
                    set Name=?,Course=?, FromDate=?, ToDate=?, Units=?, Year=?, Honors=?  
                    WHERE ID=? and FacultyID=?",[$r->input("school"), $r->input("course"), $r->input("fromDate"), $r->input("toDate"), $r->input("units"), $r->input("yearGrad"), $r->input("honors"),
                    $id, $userId[0]->ID]
                );
            }else if($r->input("action")=="Delete"){
                DB::delete("delete from VOCATIONALCOURSES
                            WHERE ID=? and FacultyID=?", [$id, $userId[0]->ID]);
            }
            return "<script>window.location.href='/vocational'</script>";
        }else{
            return "<script>window.location.href='/logout'</script>";
        }
    }
}
