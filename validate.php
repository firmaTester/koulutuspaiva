<?php

	// <-- Single line comment, does not need an end
	
	/* <-- Start the comment, end it with --> */
	
	// About form handling with PHP
	// http://www.w3schools.com/php/php_forms.asp
	// PRACTISE! 	Make it work
	// Tip: what is the "form method" in index.html?
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// Echoing, http://www.w3schools.com/php/php_echo_print.asp
	// PRACTISE! 	Check the link out, skim fast. What does echo and print do?
	/*
		Answer:
		
	*/
	echo "<p>Trying to validate using username '".$username."'";
	
	// About if-structure in php http://www.w3schools.com/php/php_if_else.asp
	// PRACTISE! 	1. Google "PHP strlen", what does it do? When does the program allow the inner script to run?
	// 				2. What is wrong in the if below? 
	//				Make it so that if there are any characters in username and password, allow the inner script to run
	/*
		Answer for 1:
		
	
	*/

	if(strlen($username) == 0 && strlen($password) > 0) {
		
		// Connecting to db, http://www.w3schools.com/php/php_mysql_connect.asp
		// PRACTISE! 	Get the database connection to work! What to do?
		//				Tip: Connection credentials:
		//				hostname: localhost
		//				username: testuser
		//				password: kissa123
		//				database: testday_db
		/*
			Answer:
			
		*/
		
		
			
		$connection = mysqli_connect("", "", "", "") or die("Error connecting to database; ".mysqli_error($connection));
		
		// Selecting from database: http://www.w3schools.com/php/php_mysql_select.asp
		// Practise! 	Make the query for getting username, 
		// "Give me all data from 'users' table, where the username field is like $username"
		
		//Answer to the QUERY HERE
		//Btw, check what "mysqli_real_escape_string()" does ( "Google PHP mysqli_real_escape_string")
				
		$username = mysqli_real_escape_string($connection, $username);

		$query = "QUERY HERE = '".$username."';";
		
		//Executing phase shift.... Not. Executing query.
		$result = $connection->query($query) or die("Error in query execution: ".mysqli_error($connection));
		
		$user = null;
		
		// Fetching the data: http://www.w3schools.com/php/func_mysqli_fetch_array.asp
		// Practise! What does mysqli_fetch_array do?
		/*
			Answer:
			
		*/
		while($singleUser = mysqli_fetch_array($result)) {
			
			//Make sure that the username + password combination is ok!
			// The password is hashed in the database using sha1 http://www.w3schools.com/php/func_string_sha1.asp
			//	PRACTISE! hash the user given password, and compare it to the password from the database
			//	( Aka. replace the if(1==1) with right if(rules_here) )
			//	Also, just to be sure, compare the usernames also
			
			if(1==1) {
				$user = $singleUser['name'];
				break;
			}
			else
			{
				echo "<h2 style='color: red;'>Wrong password!</h2>";
			}
		}
		// 	Make it that if the user variable is not null,  ( replace if(1==1) )
		//	aka the user is validated and saved to $user, print the "Welcome"
		if(1==1)
			echo "<h2>Welcome, ".$user."!</h2><p>Congrats! Practises over! Get a coffee or something</p>";
		else
			echo "<p>Username or password mismatch, <span style='color: red'>FAIL</span><p>";
	}
?>
