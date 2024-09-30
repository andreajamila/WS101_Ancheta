<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    session_start();

    $Fname = $num = $em = $pass = $confirmpass = $gndr = $cntry  = $skill = $bio = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_REQUEST['username'];
        $number = $_REQUEST['number'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $confirm_password = $_REQUEST['confirm_password'];
        $country = $_REQUEST['country'];
        $biography = $_REQUEST['biography'];

        if(empty($name)){
            $Fname = "*Please Enter a Name";
        }elseif(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
            $Fname = "*Only Letters and Space are allowed"; 
        }else{
            $name = trim($name);
            $name = stripslashes($name);
            $name = htmlspecialchars($name);
            $_SESSION['username'] = $name;
        }

        if(empty($number)){
            $num = "*Please enter a number";
        }elseif(!preg_match('/\+[6,3,9]{3}+[0-9]{9}/s', $number)){
            $num = "*Invalid Number"; 
        }else{
            $_SESSION['number'] = $number;
        }

        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $em = "*Please enter a ealid email";
        }else{
            $name = trim($name);
            $name = stripslashes($name);
            $name = htmlspecialchars($name);
            $_SESSION['email'] = $email;
        }

        if(empty($password)){
            $pass = "*Please enter a Password";
        }elseif(strlen($password) < 8 || !preg_match('/^[a-zA-Z0-9]+$/', $password)){
            $pass = "*Invalid Password.<br> The password must be at least 8 characters, have a combination of alphanumeric
             characters, and have at least uppercase letter"; 
        }

        if(empty($password)){
            $confirmpass = "*Enter a Password to confirm";
        }elseif($password != $confirm_password || !preg_match('/^[a-zA-Z0-9]+$/', $password)){
            $confirmpass = "Incorrect Password"; 
        }

        if(empty($_POST['gender'])){
            $gndr = "*choose your gender";
        }else{
            $_SESSION['gender'] = $gender;
        }

        if(empty($country)){
            $cntry = "*Pick a Country";
        }else{
            $_SESSION['country'] = $country;
        }

        if(empty($_POST['skills'])){
            $skill = "*Pick at least one skill";
        }else{
            $_SESSION['skills'] = $skills;
        }

        if(empty($_POST['biography'])){
            $bio = "*Include a bio (maximum of 200 characters)";
        }else{
            $_SESSION['biography'] = $biography;
        }
        
        if(empty($Fname) && empty($num) && empty($em) && empty($pass) && empty($confirmpass) && empty($gndr) && empty($cntry)
        && empty($skill) && empty($bio)){
            header("Location: about.php");
            exit();
        }
    }
?>
    <h2>REGISTRATION FORM</h2><br>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
    <label for="username">Name</label><br>
    <input type="text" id="username" name="username">
    <label for='username' style="color:red"><?php echo $Fname?></label><br><br>

    <label for="number">Number</label><br>
    <input type="tel" id="number" name="number" placeholder="+639**********" maxlength="13">
    <label for='number' style="color:red"><?php echo $num?></label><br><br>
    
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email">
    <label for='email' style="color:red"><?php echo $em?></label><br><br>

    <label for="password">Password</label><br>
    <input type="password" id="password" name="password">
    <label for='pass' style="color:red"><?php echo $pass?></label><br><br>

    <label for="confirm_password">Confirm Password</label><br>
    <input type="password" id="confirm_password" name="confirm_password">
    <label for='confirmpass' style="color:red"><?php echo $confirmpass?></label><br><br>

    <label for="gender" name="gender">Gender</label>
    <input type="radio" id="gender" name="gender" value="Male">
    <label for="Male">Male</label>
    <input type="radio" id="gender" name="gender" value="Female">
    <label for="Female">Female</label>
    <label for='gender' style="color:red"><?php echo $gndr?></label><br><br>

    <label for="Country">Country</label>
    <select name="country">
        <option value="...Select Country...">...Select Country...</option>
        <option value="South Korea">South Korea</option>
        <option value="Japan">Japan</option>
        <option value="Philippines">Philippines</option>
        <option value="Russia">Russia</option>
        <option value="France">France</option>
    </select>
    <label for='country' style="color:red"><?php echo $cntry?></label><br><br>

    <label for="Skills" id="skills">Skills</label>
    <input type="checkbox" id="skills" name="skills" value="Problem-Solving">Problem-Solving
    <input type="checkbox" id="skills" name="skills" value="Creativity">Creativity
    <input type="checkbox" id="skills" name="skills" value="Leadership">Leadership
    <label for='skills' style="color:red"><?php echo $skill?></label><br><br>
   
    <label for="Biography" id="biography">Biography</label><br>
    <textarea name="biography" id="biography" row="7" col="7" maxlength="200"></textarea>
    <label for='biography' style="color:red"><?php echo $bio?></label><br><br>

    <input type="submit" name="submitBtn">
    </form>
</body>
</html>