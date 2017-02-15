<?php
   ob_start();
   session_start();
?>

<?

?>

<html lang = "en">


 <center>  
   <head>
      <title>GARDEN ASSISTANT</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: white;
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: E0E1DD;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:E0E1DD;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:E0E1DD;
         }
         
         h2{
            text-align: center;
            color: fdc600;
         }
      </style>
      
   </head>
	
   <body>
   
   
   
   	<table class="columns"  style="border-bottom: 2px solid dimgray" width="1415">
	<tr>
	 <td><center> <a href="http://www.stiga.com/"> <img src="https://docs.google.com/uc?id=0B0zch1-G_xjnSTNvb2xyYi1DdGM" alt="download" width="207" height="70" /></a><br><br></td>
	</tr>
	
	</table>
	<table class="columns"  style="border-bottom: 2px solid dimgray" width="1415">
	
	<tr>	 <td><center><font face="Verdana" size="7" color= "black"  > Log in to your GARDEN ASSISTANT<br/> </font> </div> </td>	 
	</tr>
	
     </table>
     <table class="columns"  style="border-bottom: 2px solid dimgray" width="1415">	 

	<tr>	
	 <td><center><font face="Verdana" size="5" color= "black"  > Insert your credentials to access data:<br/> </font> </div> </td>	 
	</tr>
	 <tr>	
	 <td><center><div class = "container form-signin">
	  </td>	 
	</tr>
   
   <tr>	
	 <td><center><div class = "dati"></div>
	  </td>	 
	</tr>
   
      
      <tr>	
	 <td>
         
         <?php
            $msg = '';
            

			
		
			
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
			/* connessione database */
				$DBhost = "localhost";
				$DBuser = "root";
				$DBpass = "";
				$DBName = "gardenassistant";

				/**/
				$table = "utenti";
                $usn = $_POST['username']; 
				/* connect */
				mysql_connect($DBhost,$DBuser,$DBpass) or die("Impossibile collegarsi al server");
				@mysql_select_db("$DBName") or die("Impossibile connettersi al database $DBName");

				/* query */
				$sqlquery = "SELECT * FROM $table WHERE username = '$usn' ORDER  by ID DESC limit 1";

				$result = mysql_query($sqlquery);
				$number = mysql_num_rows($result);

				$i = 0;
				if ($number < 1) {
				  print '<center><p>La ricerca non ha prodotto nessun risultato</p></center>';
				}
				else{
				  while ($number > $i) {
					$name = mysql_result($result,$i,"username");
					$pass = mysql_result($result,$i,"password");
					$i++;
				  }
				}
			
			
			
				
               if ($_POST['username'] == $name && 
                  $_POST['password'] == $pass) {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = $name;
                  setcookie("login_ga", "OK",time()+3600);
				  setcookie("username", $name);
				  setcookie("password", $pass);
                  echo '<center><font face="Verdana" size="5" color= "fdc600">ACCESS GRANTED... <a href="sites\GA\init_new.php"><button> <font face="Verdana" size="5" color= "4c575f"  > Click here</button></a>';
               }else {
                  echo '<center><font face="Verdana" size="5" color= "red">ACCESS DENIED... Wrong username or password';
               }
            }
         ?>
      </div> <!-- /container -->
       </td>	 
	</tr>

	<tr>	
	 <td>
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <center><h4  class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login"><font face="Verdana" size="5" color= "4c575f"  >VERIFY CREDENTIALS</button>
         </form>
			
      
         
      </div> 
	  
	</td>	 
	</tr>
       </table>
	   <table class="columns"  style="border-bottom: 2px solid dimgray" width="1415">
	   	<tr>
	<td><center><font face="Verdana" size="5" color= "black"  > No account? <a href="/sites/GA/scrivo_su_database.php"><button  > <font face="Verdana" size="5" color= "4c575f"  > Create it!</button></a> </font></td>
	</tr>
	   </table>
	   <table class="columns"  style="border-bottom: 2px solid dimgray" width="1415">
	   <tr>
	 <td><br><br><CENTER><div><iframe src="https://www.3bmeteo.com/moduli_esterni/localita_7_giorni_compatto/1655/4c575f/fdc600/5e5e5e/ffffff/it" width=1200 height=215 frameborder="0"></iframe><br/></div>
	</td>
	   </table> 
	   
   </body>
   

   <script type="text/javascript">

   
   </script>
   
   
   
</html>