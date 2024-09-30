<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>INFORMATION</h1>

    <?php
    session_start();

   $name = $_SESSION['username'];
   $number = $_SESSION['number'];
   $email = $_SESSION['email'];
   $gender = $_SESSION['gender'];
   $country = $_SESSION['country'];
   $skills = $_SESSION['skills'];
   $biography = $_SESSION['biography'];

   echo "Name: ".($name)."<br>";
   echo "Number: ".($number)."<br>";
   echo "Email: ".($email)."<br>";
   echo "Gender: ".($gender)."<br>";
   echo "Country: ".($country)."<br>";
   echo "Skills: ".($skills)."<br>";
   echo "Biography: ".($biography);

    ?>
</body>
</html>