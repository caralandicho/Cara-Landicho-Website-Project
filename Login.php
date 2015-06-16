<!DOCTYPE html>

<!-- Modified from Fig 19.20 -->
<!-- Concepts from Deitel's Internet & World Wide Web and 
http://www.w3schools.com/ unless otherwise noted --> 

<html>
  <head>
    <meta charset = "utf-8">
    <link rel="stylesheet" type="text/css" href="CSS/CaraLandicho'sWebsite.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/Login.css"/>
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
    <?php
      //variables used in script
      $title = isset($_POST[ "title" ]) ? $_POST[ "title" ] : "";
      $description = isset($_POST[ "description" ]) ? $_POST[ "description" ] : "";
      $comment = isset($_POST[ "comment" ]) ? $_POST[ "comment" ] : "";
      $iserror = false;
      $formerrors = array( "titleerror" => false, "descriptionerror" => false );
    
      //array of input
      $inputlist = array( "title" => "Title", "description" => "Description", 
        "comment" => "Comment" );
      
      $titlelist = array( "title" => "Title" );
      
      $descriptionlist = array( "description" => "Description" );
      
      $commentlist = array( "comment" => "Comment" );
      
      //copied from http://www.phpeasystep.com/phptu/6.html
      $title = stripslashes( $title );
      $description = stripslashes( $description );
      $comment = stripslashes( $comment );
      $title = mysql_real_escape_string( $title );
      $description = mysql_real_escape_string( $description );
      $comment = mysql_real_escape_string( $comment );
    
      //check for errors
      if ( isset( $_POST[ "submit" ]) )
      {
        if ( $title == "" )
        {
          $formerrors[ "titleerror" ] = true;
          $iserror = true;
        }
      
        if ( $description == "" )
        {
          $formerrors[ "descriptionerror" ] = true;
          $iserror = true;
        }
      
        //build INSERT query
        if ( !$iserror )
        {
          $query = "INSERT INTO Blogtable " .
            "( title, description, comment ) " . 
            "VALUES ( '$title', '$description', '$comment' )";
      
          //connect to MySQL
          if ( !( $database = mysql_connect( "localhost:8080", "root",
            "password" ) ) )
            die( "<p>Could not connect to database</p>" );
        
          //open URLs Database
          if ( !mysql_select_db( "Blog", $database ) )
            die( "<p>Could not open Blog database</p>" );
        
          //execute query in URLs database
          if ( !( $result = mysql_query( $query, $database ) ) )
          {
            print( "<p>Could not execute query!</p>" );
            die( mysql_error() );
          }
      
          mysql_close( $database );
      
          header( 'Location: Blog.php' );
          die();
        }
      }
    
      if ( $iserror )
      {
        print( "<p class = 'error'>Fields with * need to be filled in properly.</p>" );
      }
    
      print( "<!-- post form data to Login.php -->
        <form method = 'post' action = 'Login.php'>
      
        <!-- create two text boxes for user input, taken from
          http://stackoverflow.com/questions/3688074/php-get-value-from-textarea -->" );
      foreach ($inputlist as $inputname => $inputalt )
      {
        print( "<div>" );
        
        if ( $formerrors[ ( $inputname )."error" ] == true )
            print( "<span class = 'error'>*</span>" );

        print( "</div>" );
      }
    
     foreach ($titlelist as $titlename => $titlealt )
      {
        print( "<div><label>$titlealt:</label><input type = 'text'
          name = '$titlename' size = '30' value = '" . $$titlename . "'>" );
        
        print( "</div>" );
      }
      
      foreach ($descriptionlist as $descriptionname => $descriptionalt )
      {
        print( "<div><label>$descriptionalt:</label><textarea
          name = $descriptionname rows = '25' cols = '100'>" . $$descriptionname . 
          "</textarea>" );
        
        print( "</div>" );
      }
      
      foreach ($commentlist as $commentname => $commentalt )
      {
        print( "<div><label>$commentalt:</label><input type = 'text'
          name = '$commentname' size = '30' value = '" . $$commentname . "'>" );
        
        print( "</div>" );
      }
      
      print( "<!-- Submit Button -->
        <p class = 'head'><input type = 'submit' name = 'submit'
          value = 'Submit'></p></form></body></html>" );
    ?><!-- end PHP script -->
  </body>
</html>