<?php
         $name="";
         $err_name="";
        $uname="";
        $err_uname="";
        $pass="";
        $err_pass="";
        $cpass="";
        $err_cpass="";

        $mail="";
        $err_mail="";
        $phone="";
        $err_phone="";
        $code="";
        $err_code="";

        $city="";
        $err_city="";

        $state="";
        $err_state="";
        $zip="";
        $err_zip="";
        $address="";
        $err_address="";

        $date="";
        $err_date="";

        $month="";
        $err_month="";

        $year="";
        $err_year="";

        $gender="";
        $err_gender="";
       
        $hear="";
        $err_hear="";
        
        $bio="";
        $err_bio="";

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST["name"])){
                $err_name="Name required";
            }
            else if(strlen($_POST["name"]) < 6){
                $err_name="Name must be more than 6 characters long";
            }
            else if(strpos($_POST["name"]," ")){
                $err_name="Name should not contain whitespace";
            }

            else{   
                $name=htmlspecialchars($_POST["name"]);

            }

            if(empty($_POST["uname"])){
                $err_uname="User name required";
            }
            else if(strlen($_POST["uname"]) < 6){
                $err_uname="Username must be more than 6 characters long";
            }
            else if(strpos($_POST["uname"]," ")){
                $err_uname="Username should not contain whitespace";
            }

            else{   
                $uname=$_POST["uname"];

            }
            if(empty($_POST["pass"]))
		 {
			 $err_pass="[Password Required]";
		 }
		 elseif(htmlspecialchars($_POST["pass"]))
		 {
			 $err_pass=["HTML KeyWords Used"];
		 }
		 elseif (strlen($_POST["uname"])<8) {
		 	$err_pass=["[Password must be 8 charachters long"];
		 }
		 elseif(!strpos($_POST["pass"],"#"))
		 {
			 $err_pass="[Password should contain special character]";
		 }
		 elseif(!is_numeric($_POST["pass"]))
		 {
			 $err_pass="[Password should contain Numeric values]";
		 }
		 elseif(!ctype_upper($_POST["pass"]))
		 {
			 $err_pass="[Password should contain UpperCase values]";
		 }
		 elseif(!ctype_lower($_POST["pass"]))
		 {
			 $err_pass="[Password should contain LowerCase values]";
		 }

		 elseif(strpos($_POST["pass"]," "))
		 {
			 $err_pass="[Password should not contain white space]";
		 }
		 else
		 {
			 $err_pass=$_POST["pass"];
         }

            
			if(empty($_POST["pass"])){
                $err_cpass="Enter pass again";
                
            }
            else if($_POST["cpass"]!=$pass){
                $err_cpass="Password mismatch";
            }


            if(empty($_POST["mail"])){
                $err_mail="E-mail required";
            }
            else if(!strpos($_POST["mail"],"@")){
                $err_mail="Must contain @";
            }
            else{   
                $name=htmlspecialchars($_POST["mail"]);

            }


            if(empty($_POST["city"])|| empty($_POST["state"])||empty($_POST["zip"] )){
                $err_address="Address required";
            }
            
            else if(strpos($_POST["city"]," ")|| strpos($_POST["state"]," ")||strpos($_POST["zip"]," ")){
                $err_address="Address should not contain whitespace";
            }

            else{   
                $address=htmlspecialchars($_POST["city"].",".$_POST["state"].",".$_POST["zip"]);

            }

            
            if(!is_numeric($_POST["code"])||!is_numeric($_POST["phone"]) ){
                $err_phone="Phone number should not contain letters";

            }
            else{
                $phone= $_POST["code"].$_POST["phone"];
            }


            if(empty($_POST["gender"])){
                $err_gender="Gender must be selected";
            }
            else{
                $gender=$_POST["gender"];
            }


            if(empty($_POST["date"])){
                $err_date="Date must be selected";
            }
            else{
                $date=$_POST["date"];
            }


            if(empty($_POST["month"])){
                $err_month="Month must be selected";
            }
            else{
                $month=$_POST["month"];
            }


            if(empty($_POST["year"])){
                $err_year="Year must be selected";
            }
            else{
                $byear=$_POST["year"];
            }


            $up=$_POST["pass"];
            for($i=0;$i<strlen($up);$i++){
                if(ctype_lower($up[$i])){
                    $upt=true;
                    break;
                }
                else{
                    $err_pass="there is no upper";
                }
            }
            $low=$_POST["pass"];
            for($i=0;$i<strlen($up);$i++){
                if(ctype_lower($up[$i])){
                    $lowt=true;
                    break;
                }
                else{
                    $err_pass="there is no upper";
                }
            }


            if(!isset($_POST["hear[]"])){
                $err_hear="This must be selected";
            }
            else{
                $hobbies=$_POST["hear[]"];
            }


            if(empty($_POST["text"])){
                $err_bio="Bio should not be empty";
            }
            else{
                $bio=htmlspecialchars($_POST["text"]);
            }
           
           
        
        }
    ?>
<html>
<head>
</head>
<body>

        <fieldset>
            <legend><h1>Club Member Registrations</h1></legend>
            <form action="" method="post">
                <table>
                    <tr>
                        <td><span><b>Name</b></span></td>
                        <td>: <input type="text" name="name" placeholder ="Name">
                            <span><?php echo $err_name;?></span></td>
                    </tr>
                    <tr>
                        <td><span><b>Username</b></span></td>
                        <td>: <input type="text" name="uname" placeholder ="Username">
                            <span><?php echo $err_uname;?></span></td>
                    </tr>
                    <tr>
                        <td><span><b>Password</b></span></td>
                        <td>: <input type="password" name="pass" placeholder ="Password">
                        <span><?php echo $err_pass;?></span></td>
                    </tr>
                    <tr>
                        <td><span><b>Confirm Password</b></span></td>
                        <td>: <input type="password" name="cpass" placeholder ="Confirm Password">
                        <span><?php echo $err_cpass;?></span></td>
                    </tr>
                    <tr>
                        <td><span><b>Email</b></span></td>
                        <td>: <input type="text" name="mail" placeholder ="E-mail">
                        <span><?php echo $err_mail;?></span></td>
                    </tr>
                    <tr>
                        <td><span><b>Phone</b></span></td>
                        <td>: <input type="text" name="code" placeholder ="code" size='4'> - <input type="text" name="phone" placeholder ="Number">
                        <span><?php echo $err_phone;?></span></td>
                    </tr>

                    <tr>
					<tr>
                        <td><span><b>Address</b></span></td>
						<td>: <input type="text" name="sa" placeholder="Street Address"></td>
						<tr>
                        <td> <td><input type="text" name="city" placeholder ="city" size='6'> - <input type="text" name="state" placeholder ="State" size='6'> </br>
                         <input type="text" name="zip" placeholder ="Postal zip code">
						 
                        <span><?php echo $err_address ;?></span>
                        <span><?php echo $err_city ;?></span>
                        <span><?php echo $err_city ;?></span></td></td>
						</tr>
                    </tr>
					<td><span><b>Birth Date</b></span></td>
                        <td>:<select name ="date">
                        <option disabled selected>Date</option>
                        <?php         for($date = 1; $date <= 31; $date++) echo"<option value = '".$date."'>".$date."</option>";     ?>
                        </select>

                        <select name ="month">
                        <option disabled selected>Month</option>
						<option>Jan</option>
							<option>Feb</option>
							<option>March</option>
							<option>April</option>
							<option>May</option>
							<option>June</option>
							<option>July</option>
							<option>Aug</option>
							<option>Sep</option>
							<option>oct</option>
							<option>Nov</option>
							<option>Dec</option>
						</select>
                 
                        <select name ="year">
                        <option disabled selected>Year</option>
                        <?php         for($year = 1960; $year <= 2021; $year++)echo"<option value = '".$year."'>".$year."</option>";     ?>
                        </select>

                        <span><?php echo $err_date;?></span>
                        <span><?php echo $err_month;?></span>
                        <span><?php echo $err_year;?></span></td>
                    </tr>
						</select>
					</td>
				</tr>
                
                    <tr>
                        <td><span><b>Gender</b></span></td>
                        <td>: <input type="radio" name="gender" value="male">Male
                            <input type="radio" name="gender" value="male">Female
                            <span><?php echo $err_gender;?></span></td>
                    </tr>
                    <tr>
                        <td><span><b>Where did you hear about us ?</b></span></td>
                        <td> <input type="checkbox"value="A friend of collage" name="hear[]"> A friend of collage </br>
                        <input type="checkbox" value="Google" name="hear[]">Google </br>
                        <input type="checkbox" value="Blogpost" name="hear[]">Blogpost </br>
                        <input type="checkbox" value="News Article" name="hear[]">News Article <br>
                        <span><?php echo $err_hear;?></span></td>
                    </tr>
                    
                    <tr>
                        <td><span><b>Bio</b></span></td>
                        <td>: <textarea name="text"></textarea><br>
						<span><?php echo $err_bio;?></span></td>
						</tr>
						<br>
			<tr>
				<td><td><input type="submit" name="Register" value="Register"></td></td>
			</tr>

                </table>
			</form> 
    </fieldset>   
</body>
</html>