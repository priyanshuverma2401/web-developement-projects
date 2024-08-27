<?php
  $remarks="";
  function grade($marks, $full_marks){
    if($marks >= ((90*$full_marks)/100)){
      return "A+";
    }else if($marks >= ((80*$full_marks)/100)){
      return "A";
    }else if($marks >= ((70*$full_marks)/100)){
      return "B";
    }else if($marks >= ((60*$full_marks)/100)){
      return "C";
    }else if($marks >= ((50*$full_marks)/100)){
      return "D";
    }else if($marks >= ((40*$full_marks)/100)){
      return "E";
    }else{
      return "F";
    }
  }
  class student{
    //personal information
    public $regno;
    public $name;
    public $fname;
    public $mname;
    public $cname;
    public $course_name;

    //marks ESE
    public $psdese;
    public $aiese;
    public $dbmsese;
    public $flatese;
    public $seese;
    public $seminarese;
    public $internshipese;
    public $nptelese;
    public $dbmslabese;

    //marks IA
    public $psdia;
    public $aiia;
    public $dbmsia;
    public $flatia;
    public $seia;
    public $seminaria;
    public $internshipia;
    public $nptelia;
    public $dbmslabia;

    //marks credit
    public $psdcredit;
    public $aicredit;
    public $dbmscredit;
    public $flatcredit;
    public $secredit;
    public $seminarcredit;
    public $internshipcredit;
    public $nptelcredit;
    public $dbmslabcredit;

    //semester cgpa
    public $firstsem;
    public $secondsem;
    public $thirdsem;
    public $fourthsem;
    public $currsem;
    public $sixthsem;
    public $seventhsem;
    public $eighthsem;

    //current cgpa
    public $cgpa;

    //calculating cgpa
    function calc_cgpa(){
      $this->cgpa = (floatval($this->firstsem) + floatval($this->secondsem) + floatval($this->thirdsem) + floatval($this->fourthsem) + floatval($this->currsem))/ 5;

      $this->cgpa = number_format($this->cgpa, 2);
    }


  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $regno = $_POST["regno"];
    

    $sql = "SELECT * FROM `personal_info` WHERE `regno` = '$regno'";
    $result = mysqli_query($conn, $sql);
    $numRecords = mysqli_num_rows($result);
    if($numRecords == 1){
      $stud = new student();
      $row = mysqli_fetch_assoc($result);
      $stud->name = $row["name"];
      $stud->regno = $regno;
      $stud->fname = $row["fname"];
      $stud->mname = $row["mname"];
      $stud->cname = $row["cname"];
      $stud->course_name = $row["course_name"];

      $sql2 = "SELECT * FROM `ese` WHERE `regno` = '$regno'";
      $result2 = mysqli_query($conn, $sql2);
      $numRecord2 = mysqli_num_rows($result2);
      if($numRecord2 == 1){
        $row2 = mysqli_fetch_assoc($result2);
        $stud->psdese = $row2["100508"];
        $stud->aiese = $row2["105501"];
        $stud->dbmsese = $row2["105502"];
        $stud->flatese = $row2["105503"];
        $stud->seese = $row2["105504"];
        $stud->seminarese = $row2["105505"];
        $stud->internshipese = $row2["100510P"];
        $stud->nptelese = $row2["100511P"];
        $stud->dbmslabese = $row2["105502P"];
      }else{
        header("location: notfound.php");
      }

      $sql3 = "SELECT * FROM `ia` WHERE `regno` = '$regno'";
      $result3 = mysqli_query($conn, $sql3);
      $numRecords3 = mysqli_num_rows($result3); 
      if($numRecords3 == 1){
        $row3 = mysqli_fetch_assoc($result3);
        $stud->psdia = $row3["100508"];
        $stud->aiia = $row3["105501"];
        $stud->dbmsia = $row3["105502"];
        $stud->flatia = $row3["105503"];
        $stud->seia = $row3["105504"];
        $stud->seminaria = $row3["105505"];
        $stud->internshipia = $row3["100510P"];
        $stud->nptelia = $row3["100511P"];
        $stud->dbmslabia = $row3["105502P"];
      }else{
        header("location: notfound.php");
      }

      $sql4 = "SELECT * FROM `credit` WHERE `regno` = '$regno'";
      $result4  = mysqli_query($conn, $sql4);
      $numRecord4 = mysqli_num_rows($result4);
      if($numRecord4 == 1){
        $row4 = mysqli_fetch_assoc($result4);
        $stud->psdcredit = $row4["100508"];
        $stud->aicredit = $row4["105501"];
        $stud->dbmscredit = $row4["105502"];
        $stud->flatcredit = $row4["105503"];
        $stud->secredit = $row4["105504"];
        $stud->seminarcredit = $row4["105505"];
        $stud->internshipcredit = $row4["100510P"];
        $stud->nptelcredit = $row4["100511P"];
        $stud->dbmslabcredit = $row4["105502P"];
      }else{
        header("location: notfound.php");
      }

      $sql5 = "SELECT * FROM `prev_sgpa` WHERE `regno` = '$regno'";
      $result5 = mysqli_query($conn, $sql5);
      $numRecords5 = mysqli_num_rows($result5);
      if($numRecords5 == 1){
        $row5 = mysqli_fetch_assoc($result5);
        $stud->firstsem = $row5["1st"];
        $stud->secondsem = $row5["2nd"];
        $stud->thirdsem = $row5["3rd"];
        $stud->fourthsem = $row5["4th"];
        $stud->currsem = $row5["5th"];
        $stud->sixthsem = $row5["6th"];
        $stud->seventhsem = $row5["7th"];
        $stud->eighthsem = $row5["8th"];
        $stud->calc_cgpa();
      }else{
        header("location: notfound.php");
      }

    }else{
      header("location: notfound.php");
    }

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title><?php echo $regno ?></title>
  <style>
    body{
      background-color: lightgrey;
    }
    table{
      width: 100%;
      border: 1px solid black;
      border-collapse: collapse;
    }
    .table1{
      margin-top: 10px;
    }
    .table1 tr{
      width: 100%;
    }
    .table1 tr td{
      border: 1px solid black;
    }
    .title2{
      margin-top: 30px;
    }
    .table2{
      margin-top: 2px;
    }
    .table2, tr,th,td{
      border: 1px solid black;
      border-collapse: collapse;
      border-spacing: 0;
      
    }
    tr{
      height: 30px;
    }
    .tbody2{
      text-align: center;
    }
    .container{
      width: 60%;
      background-color: white;
      padding: 25px;

    }

  </style>
</head>
<body>
  <center>
  <div class="image" style="align-items: center;">
      <img src="Screenshot 2024-07-27 182732.png" alt="">
    </div>

  <div class="container" style="border-radius: 25px;">
    
    <div class="title">
      <p style="text-align: right;"> <a href="landing.php">View Another Result</a></p>
      <h1><b>Bihar Engineering University, Patna</b></h1>
      <h3 style="color: red; display: inline-block;"> <b>B.Tech 5th Semester examination, 2023</b></h3>
      
    </div>
    <div class="content">
      <table class="table1">
        <tr>
          <td style="width: 50%;"><b>Semester:</b> V</td>
          <td tyle="width: 50%;"><b>Examination(Month/year):</b>May/2024</td>
        </tr>
      </table>
      <table class="table1">
        <tr>
          <td style="width: 33.33%;"><b>Registration No:</b></td>
          <td tyle="width: 67.67%;" colspan="3"><b><?php echo $stud->regno ?></b></td>
        </tr>
        <tr>
          <td style="width: 33.33%;"><b>Student Name:</b></td>
          <td tyle="width: 67.67%;" colspan="3"><b><?php echo $stud->name ?></b></td>
        </tr>
        <tr>
          <td style="width: 33.33%;"><b>Father's Name:</b></td>
          <td tyle="width: 22.55%;"><?php echo $stud->fname ?></td>
          <td tyle="width: 22.55%;"><b>Mother Name:</b></td>
          <td tyle="width: 22.55%;"><?php echo $stud->mname ?></td>
        </tr>
        <tr>
          <td style="width: 33.33%;"><b>College Name:</b></td>
          <td tyle="width: 67.67%;" colspan="3"><b><?php echo $stud->cname ?></b></td>
        </tr>
        <tr>
          <td style="width: 33.33%;"><b>Course Name:</b></td>
          <td tyle="width: 67.67%;" colspan="3"><b><?php echo $stud->course_name ?></b></td>
        </tr>
      </table>
      
      
        <div class="title2" style="width: 100%;" >
          <h4>THEORY</h4>
        </div>
      <table class="table2" >
        <thead>
          <tr>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>ESE</th>
            <th>IA</th>
            <th>Total</th>
            <th>Grade</th>
            <th>Credit</th>
          </tr>
        </thead>
        <tbody class="tbody2">
          <tr>
            <td>100508</td>
            <td>Professional Skill Developement</td>
            <td><?php echo $stud->psdese ?></td>
            <td><?php echo $stud->psdia ?></td>
            <td><?php echo $stud->psdese + $stud->psdia ?></td>
            <td><?php
              echo grade($stud->psdese + $stud->psdia, 100);
              if(grade($stud->psdese + $stud->psdia, 100) == "F"){
                $remarks = $remarks.", ". "100508";
              }
            ?></td>
            <td><?php echo $stud->psdcredit.".00" ?></td>
          </tr>
          <tr>
            <td>105501</td>
            <td>Artificial Intelligence</td>
            <td><?php echo $stud->aiese ?></td>
            <td><?php echo $stud->aiia ?></td>
            <td><?php echo $stud->aiese + $stud->aiia ?></td>
            <td>
            <?php
              echo grade($stud->aiese + $stud->aiia, 100);
              if(grade($stud->aiese + $stud->aiia, 100) == "F"){
                $remarks = $remarks.", ". "105501";
              }
            ?>
            </td>
            <td><?php echo $stud->aicredit.".00" ?></td>
          </tr>
          <tr>
            <td>105502</td>
            <td>Database Management Systems</td>
            <td><?php echo $stud->dbmsese ?></td>
            <td><?php echo $stud->dbmsia ?></td>
            <td><?php echo $stud->dbmsese + $stud->dbmsia ?></td>
            <td>
            <?php
              echo grade($stud->dbmsese + $stud->dbmsia, 100);
              if(grade($stud->dbmsese + $stud->dbmsia, 100) == "F"){
                $remarks = $remarks.", ". "105502";
              }
            ?>
            </td>
            <td><?php echo $stud->dbmscredit.".00" ?></td>
          </tr>
          <tr>
            <td>105503</td>
            <td>Formal Language & Automata Theory</td>
            <td><?php echo $stud->flatese ?></td>
            <td><?php echo $stud->flatia ?></td>
            <td><?php echo $stud->flatese + $stud->flatia ?></td>
            <td>
            <?php
              echo grade($stud->flatese + $stud->flatia, 100);
              if(grade($stud->flatese + $stud->flatia, 100) == "F"){
                $remarks = $remarks.", ". "105503";
              }
            ?>
            </td>
            <td><?php echo $stud->flatcredit.".00" ?></td>
          </tr>
          <tr>
            <td>105504</td>
            <td>Software Engineering</td>
            <td><?php echo $stud->seese ?></td>
            <td><?php echo $stud->seia ?></td>
            <td><?php echo $stud->seese + $stud->seia ?></td>
            <td>
            <?php
              echo grade($stud->seese + $stud->seia, 100);
              if(grade($stud->seese + $stud->seia, 100) == "F"){
                $remarks = $remarks.", ". "105504";
              }
            ?>
            </td>
            <td><?php echo $stud->secredit.".00" ?></td>
          </tr>
          <tr>
            <td>105505</td>
            <td>Seminar</td>
            <td><?php echo $stud->seminarese ?></td>
            <td><?php echo $stud->seminaria ?></td>
            <td><?php echo $stud->seminarese + $stud->seminaria ?></td>
            <td>
            <?php
              echo grade($stud->seminarese + $stud->seminaria, 50);
              if(grade($stud->seminarese + $stud->seminaria, 50) == "F"){
                $remarks = $remarks.", ". "105505";
              }
            ?>
            </td>
            <td><?php echo $stud->seminarcredit.".00" ?></td>
          </tr>

        </tbody>
      </table>
    
    
      <div class="title3">
        <h4>PRACTICAL</h4>
      </div>
      <table class="table2">
        <thead>
          <tr>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>ESE</th>
            <th>IA</th>
            <th>Total</th>
            <th>Grade</th>
            <th>Credit</th>
          </tr>
        </thead>
        <tbody class="tbody2">
          <tr>
            <td>100510P</td>
            <td>Summer Entrepreneurship - II</td>
            <td><?php echo $stud->internshipese ?></td>
            <td><?php echo $stud->internshipia ?></td>
            <td><?php echo $stud->internshipese + $stud->internshipia ?></td>
            <td>
            <?php
              echo grade($stud->internshipese + $stud->internshipia, 100);
              if(grade($stud->internshipese + $stud->internshipia, 100) == "F"){
                $remarks = $remarks.", ". "100510P";
              }
            ?>
            </td>
            <td><?php echo $stud->internshipcredit.".00" ?></td>
          </tr>
          <tr>
            <td>100511P</td>
            <td>MOOCs / SWAYAM / NPTEL Courses - 2</td>
            <td><?php echo $stud->nptelese ?></td>
            <td><?php echo $stud->nptelia ?></td>
            <td><?php echo $stud->nptelese + $stud->nptelia ?></td>
            <td>
            <?php
              echo grade($stud->nptelese + $stud->nptelia, 100);
              if(grade($stud->nptelese + $stud->nptelia, 100) == "F"){
                $remarks = $remarks.", ". "100511P";
              }
            ?>
            </td>
            <td><?php echo $stud->nptelcredit.".00" ?></td>
          </tr>
          <tr>
            <td>105502P</td>
            <td>Database Management Systems</td>
            <td><?php echo $stud->dbmslabese ?></td>
            <td><?php echo $stud->dbmslabia ?></td>
            <td><?php echo $stud->dbmslabese + $stud->dbmslabia ?></td>
            <td>
            <?php
              echo grade($stud->dbmsese + $stud->dbmsia, 50);
              if(grade($stud->dbmsese + $stud->dbmsia, 50) == "F"){
                $remarks = $remarks.", ". "105502P";
              }
            ?>
            </td>
            <td><?php echo $stud->dbmslabcredit.".00" ?></td>
          </tr>
          

        </tbody>
      </table>
      <table class="table1">
        <tr>
          <td style="width: 100%; text-align: right;"><b>SGPA : <?php echo $stud->currsem ?></b></td>
          
        </tr>
      </table>
    </div>
    
    <div class="prev_sem" >
      <table style="border-collapse: collapse; text-align: center;">
      <tr>
        <th style="border-collapse: separate;">Semester</th>
        <th>I</th>
        <th>II</th>
        <th>III</th>
        <th>IV</th>
        <th>V</th>
        <th>VI</th>
        <th>VII</th>
        <th>VIII</th>
        <th>Cur. CGPA</th>
      </tr>
      <tr>
        <th>SGPA</th>
        <td><?php echo $stud->firstsem ?></td>
        <td><?php echo $stud->secondsem ?></td>
        <td><?php echo $stud->thirdsem ?></td>
        <td><?php echo $stud->fourthsem ?></td>
        <td><?php echo $stud->currsem ?></td>
        <td><?php echo $stud->sixthsem ?></td>
        <td><?php echo $stud->seventhsem ?></td>
        <td><?php echo $stud->eighthsem ?></td>
        <td><?php echo $stud->cgpa ?></td>
      </tr>
    </table>
    </div>
    <div class="remarks" style="border: 1px solid black; text-align: left; margin-top: 20px;">
      <p><b>Remarks:</b><span style="color: red"><?php echo " ". $remarks ?></span></p>
    </div>
    <div class="remarks" style="border: 1px solid black; text-align: left; margin-top: 20px;">
      <p><b>Publish Date : <?php  echo date("d-m-y"); ?></b></p>
    </div>
    <div class="note" style="margin-top: 20px; text-align: left;">
      <ul>
        <h5><b>NOTE:</b></h4><hr>
          <li>ESE : End Semester Exam</li>
          <li>IA : Internal Assessment</li>
          <li>SGPA : Semester Grade Point Average</li>
          <li>CGPA : Cumulative Grade Point Average</li>
          <li>AB : Absent</li>
          <li>NA : Not Applicable</li>
          <li>N/A : Not Available</li>
          <li>* : Passed Under Regulation</li>
          <li>CA : Cancellation of Assessment</li>
          <li>UMC : Unfair Mean Case</li>
          <li>WEB COPY : Not valid for official purpose</li>
          <li>University does not own for the errors or omissions, if any, in the statement</li>
      </ul>
    </div>
    <div class="print" style="margin-top: 30px; align-items: center;">
      <div class="printer_icon" style="align-items: center; height: 60px;">
        <i class="fa-solid fa-print" style="display: block;"></i>
        <p><a href="#" onclick="window.print()">Print Result</a></p>
      </div>
    </div>
    <p style="margin-bottom: 10px;">Copyright <i class="fa-regular fa-copyright"></i> 2023 onward - All right reserved - Bihar Engineering University, Patna</p>
  </div>
    </div>
  </center>
</body>
</html>