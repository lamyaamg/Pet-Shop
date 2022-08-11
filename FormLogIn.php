<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function validate($str) {
    {  return trim(htmlspecialchars($str));    }
    if (empty($_POST['name'])) 
    {   $nameError = 'Name should be filled';   } 
    else 
    {   $name = validate($_POST['name']);
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) 
        {   $nameError = 'Your name should only contain letters, numbers, white spaces'; }
    }
    if (empty($_POST['email'])) 
    {   $emailError = 'Please enter your email';    } 
    else 
    {   $email = validate($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {   $emailError = 'Invalid Email';  }
	}

    if (empty($_POST['password'])) 
    {   $passwordError = 'Password cannot be empty';    } 
    else 
    {   $password = validate($_POST['password']);
        if (strlen($password) < 10) 
        {   $passwordError = 'Password should be longer than 10 characters';   }
	}
 
    if (empty($_POST['phone'])) 
    {   $phoneError = 'Phone number should be filled';   } 
    else 
    { 
        $phone = validate($_POST['phone']);
    if (!preg_match ("/^[0-9]*$/", $_POST['phone']) )
    {  
    $phoneError = "Only numeric value is allowed."; }
    } 
}}

?>

<!DOCTYPE html>
<html>

    <head>
        <title> Log Into Adoption Form </title>
	    <style>
            .error 
        {
           color:red;	
        }
	</style>
	
	<script>
	function validateform()
	{  
	var name=document.myform.name.value;  
	var password=document.myform.password.value;  
	var num=document.myform.phone.value;  
	var x=document.myform.email.value;  
	var atposition=x.indexOf("@");  
	var dotposition=x.lastIndexOf(".");  
	if (name==null || name=="")
	{  
		alert("Name can't be blank");  
		return false;  
	}
	else if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length)
	{  
	alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
	return false;  
	}  
	else if(isNaN(num))
	{  
	alert("Enter Numeric value only");  
	return false;  
	}  	
	else if(password.length<9)
	{  
		alert("Password must be at least 9 characters long.");  
		return false;  
	} 	
	} 
	</script>
</head>
   </head>
    <body>
        <header style= "background-color: rgb(140, 110, 165);">
            <h1 style="text-align: center; font-family:'PT Sans'; color: rgb(221, 199, 199);">Pet Adoption</h1>

        </header>       

        <aside style="float: left; border-right: 2px dashed rgb(95, 51, 131);
        height:500px; padding-right:10px">
        <img src="pets.jpg" width="150" height="130" alt="pets"> <br><br>
        <img src="bird.jpg" width="150" height="120" alt="pets"> <br> <br><br>
        <img src="fish.jpg" width="150" height="90" alt="pets">
        </aside>

        <aside style="float: right; border-left: 2px dashed rgb(95, 51, 131);
        height:500px; padding-left:10px">
        <img src="pets.jpg" width="150" height="130" alt="pets"> <br><br>
        <img src="bird.jpg" width="150" height="120" alt="pets"> <br> <br><br>
        <img src="fish.jpg" width="150" height="90" alt="pets">
        </aside>
        
        <section style="margin-left:195px; padding-left:250px;" >
        <form method="post"  onsubmit="return validateform()" style = "font-family:'PT Sans'; font-size: 18px;"
        action="FormAdoption.html" name="myform">
            <fieldset style = "width:500px; background-color: rgb(221, 199, 199);">
                <legend style="color:rgb(95, 51, 131);" >Your Information</legend>
    <label> Name: </label>
	<input type="text" name="name" value="<?php if (isset($name)) echo $name ?>"> 
	<span class="error"><?php if (isset($nameError)) echo $nameError ?></span><br>
	<label> Email: </label>
	<input type="text" name="email" value="<?php if (isset($email)) echo $email ?>"> 
	<span class="error"><?php if (isset($emailError)) echo $emailError ?></span><br>
    <label> Phone Number: </label>
	<input type="text" name="phone" value="<?php if (isset($phone)) echo $phone ?>"> 
	<span id="numloc"><?php if (isset($phoneError)) echo $phoneError ?></span><br>
	<label> Password: </label>
	<input type="password" name="password"> 
	<span class="error"><?php if (isset($passwordError)) echo $passwordError ?></span><br>
            </fieldset>      <br>      

            <button type = "submit" style ="background-color:rgb(140, 110, 165);
             width:54%; font-size: 16px; color:rgb(221, 199, 199);">Submit</button>
            <br><br>
        </form>
        </section>

</body>
</html>