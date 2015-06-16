<!DOCTYPE html> 

<!-- Modified from Fig 19.20 -->
<!-- Concepts from Deitel's Internet & World Wide Web and 
http://www.w3schools.com/ unless otherwise noted --> 

<html>
  <head>
    <meta charset = "utf-8"/>
    <link rel="stylesheet" type="text/css" href="CSS/CaraLandicho'sWebsite.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/Blog.css"/>
    <title>Blogs</title>
  </head>
  <body>
    <header>
      <h1>Words of Thought</h1>
      <article> "I write entirely to find out what I'm thinking, what I'm looking at, 
      what I see and what it means. What I want and what I fear." -Joan Didion
      </article>
    </header>
    <nav id="nav">
      <a href="CaraLandicho'sWebsite.html">Home</a>
    </nav>
    <aside>
    <?php
      //variables used in script
      $username = isset($_POST[ "username" ]) ? $_POST[ "username" ] : "";
      $password = isset($_POST[ "password" ]) ? $_POST[ "password" ] : "";
      $iserror = false;
      $formerrors = array( "usernameerror" => false, "passworderror" => false );
    
      //array of input
      $inputlist = array( "username" => "Username", "password" => "Password" );
      
      $usernamelist = array( "username" => "Username" );
      
      $passwordlist = array( "password" => "Password" );
    
      //check for errors
      if ( isset( $_POST[ "submit" ]) )
      {
        if ( $username == "" )
        {
          $formerrors[ "usernameerror" ] = true;
          $iserror = true;
        }
      
        if ( $password == "" )
        {
          $formerrors[ "passworderror" ] = true;
          $iserror = true;
        }
      
      
        //build SELECT query 
        //modified also from http://www.phpeasystep.com/phptu/6.html
        
        if ( !$iserror )
        {
          $query = "SELECT * FROM Logintable WHERE username = '$username'
            and password = '$password'";
      
          //connect to MySQL
          if ( !( $database = mysql_connect( "localhost:8080", "root",
            "password" ) ) )
            die( "<p>Could not connect to database</p>" );
        
          //open URLs Database
          if ( !mysql_select_db( "Login", $database ) )
            die( "<p>Could not open URLs database</p>" );
        
          //execute query in URLs database
          if ( !( $result = mysql_query( $query, $database ) ) )
          {
            print( "<p>Could not execute query!</p>" );
            die( mysql_error() );
          }
          
          $count = mysql_num_rows( $result );
          
          if ( $count == 1 )
          {
            session_start();
            $_SESSION[ 'username' ];
            $_SESSION[ 'password' ];
            header( 'Location:Login.php' );
          }
          else
          {
            echo "Invalid Username or Password. Go back to try again.";
          }
      
          mysql_close( $database );
          
          die();
        }
      }
    
      print( "<h1>Login</h1>" );
    
      if ( $iserror )
      {
        print( "<p class = 'error'>Fields with * need to be filled in properly.</p>" );
      }
    
      print( "<!-- post form data to Blog.php -->
        <form method = 'post' action = 'Blog.php'>
      
        <!-- create two text boxes for user input -->" );
      foreach ( $inputlist as $inputname => $inputalt )
      {
        print( "<div>" );
        
        if ( $formerrors[ ( $inputname)."error" ] == true )
            print( "<span class = 'error'>*</span>" );

        print( "</div>" );
      }
      
      foreach ( $usernamelist as $usernamename => $usernamealt )
      {
        print( "<div><label>$usernamealt:</label><input type = 'text'
          name = '$usernamename' value = '" . $$usernamename . "'>" );

        print( "</div>" );
      }
      
      foreach ( $passwordlist as $passwordname => $passwordalt )
      {
        print( "<div><label>$passwordalt:</label><input type = 'password'
          name = '$passwordname' value = '" . $$passwordname . "'>" );
        
        print( "</div>" );
      }
    
      print( "<!-- Submit Button -->
        <p class = 'head'><input type = 'submit' name = 'submit'
          value = 'Login'></p></form>" );
    ?><!-- end PHP script -->
    </aside>
    <?php include 'Database.php'; ?>
    <?php include 'CommentDatabase.php'; ?>
    <footer>
      <p> &copy; 2012 Cara Landicho </p>
    </footer>
  </body>
</html>