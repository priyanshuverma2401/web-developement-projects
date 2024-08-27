<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body{
      background-color: lightgray;
    }
  </style>
  <title>Document</title>
</head>
<body>
  <center>
  <div class="container">
    <div class="image" style="align-items: center;">
      <img src="Screenshot 2024-07-27 182732.png" alt="">
    </div>
    <div class="content" style="width: 950px; height: fit-content; padding: 35px; background-color: white
    ; border: none; border-radius: 10px;">
      <div class="actualcontent" style="border-left: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black;">
        <div class="nav" style="background-color: gray; color: black;">
          <h3><b>Result for B.tech 5<sup>th</sup> Semester Examination, 2023</b></h3>
        </div>
        <div class="search" style="margin-top: 40px;">
          <form action="result.php" method="POST">
          <label for="regno">Enter Your Registration Number:</label>
          <input type="text" row="1" col="15" name="regno" id="regno" required>
          <button type="submit">Show Result</button>
        </form>
        </div>
        <div class="note" style="margin-top: 50px; align-items: left; text-align: left;">
          <p style="color: red;"> The Result for a Registration Number cannot be found because of any of the following reasons
          </p>
          <ul>
            <li>You may have entered a wrong Registration Number</li>
            <li>Your Registration number does not belong to B.Tech</li>
            <li>Your College may not have sent the Internal/Practical Assessment marks to the university Please contact your college in this case</li>
            <li>Your Result is on hold due to some Reasons</li>
            <li>In case of any typological error or discrepancy, the student is required to report at their respective college for neccessary information to the university</li>
          </ul>
        </div>
        <div class="disclaimer" style="margin-top: 50px; text-align: left;">
          <p style="color: red;">Disclaimer</p>
          <p style="margin-top: 20px;">
            The result published are provisional and subject to change after post publication scruitny by university. The university shall not be held responsible for any inadvertent error that may have crept into the result being displayed
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright" style="text-align: center;">
    <p>Copyright <i class="fa-regular fa-copyright"></i> 2023 onward - All right reserved - Bihar Engineering University, Patna</p>
  </div>
</center>
</body>
</html>