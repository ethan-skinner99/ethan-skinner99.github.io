<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

    $recipient="commemorative.goals@gmail.com";
    $subject="Order for Print";
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $email=$_POST["email"];     
    $phone=$_POST["phone"];
    $country=$_POST["country"];
    $state=$_POST["state"];
    $city=$_POST["city"];
    $address=$_POST["address"];
    $postal=$_POST["postal"];
    $print=$_POST["print"];
    $number=$_POST["number"];

    if(!empty($firstname) || !empty($lastname)||!empty($email)|| !empty($phone)||!empty($country)
    ||!empty($state)||!empty($city) ||!empty($address)||!empty($postal)||!empty($print)||!empty($number)){
      
      
         //connection to db
         $dbhost = "localhost:3306"; /*most of the time it's localhost*/
         $username = "root";
         $password = "Hos3nuw3";
         $dbname = "rocket_numbers";
         $connection = mysqli_connect($dbhost, $username, $password,$dbname); //It connects
         if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
          }
          else{
                echo "Connection sucessful";
                $sql = "INSERT INTO rocket_numbers.user_input 
                (first_name,last_name,email,phone,country,state,city,
                address,postal,print,number) values('$firstname','$lastname','$email',$phone,'$country',
                '$state','$city','$address','$postal','$print',$number)";

                    if (mysqli_query($connection, $sql)) {
                    echo "New record created successfully";
                    } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                    }
                
               
            }
            mysqli_close($connection);
    }
        else { 
            echo "All feilds are required";
            die();
        }

    $mailBody="$firstname\nFirst_Name: $lastname\nLast_name: $email\nEmail: $phone\nPhone: $country\ncountry: $state\nstate: $city\ncity $address\naddress: 
    $postal\npostal: $print\nprint: $number\nnumber:";

    mail($recipient, $subject, $mailBody, "From: $firstname <$email>");

    $thankYou="<p>Thank you! Your Number Selection has been submitted</p>";

  
    function IsInjected($str)
    {
        $injections = array('(\n+)',
               '(\r+)',
               '(\t+)',
               '(%0A+)',
               '(%0D+)',
               '(%08+)',
               '(%09+)'
               );
                   
        $inject = join('|', $injections);
        $inject = "/$inject/i";
        
        if(preg_match($inject,$str))
        {
          return true;
        }
        else
        {
          return false;
        }
    }
    
    if(IsInjected($email))
    {
        echo "Bad email value!";
        exit;
    }
  




?>

