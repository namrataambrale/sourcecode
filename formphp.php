<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["mobilenumber"])) {
    $mobilenumber = "";
  } else {
    $mobilenumber = test_input($_POST["mobilenumber"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/(7|8|9)\d{9}/",$mobilenumber)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["course"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["course"]);
  }
}
if (empty($_POST["course"])) {
    $course = "";
  } else {
    $course = test_input($_POST["course"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("",$course)) {
      $websiteErr = "Invalid URL"; 
    }
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Mobile number: <input type="text" name="mobilenumber" value="<?php echo $mobilenumber;?>">
  <span class="error"><?php echo $mobilenumber;?></span>
  <br><br>
  Course Interested In: <textarea name="course" rows="5" cols="40"><?php echo $course;?></textarea>
  <span class="error"><?php echo $course;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $mobilenumber;
echo "<br>";
echo $course;
?>

</body>
</html>