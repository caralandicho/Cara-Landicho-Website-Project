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
    <?php 
      //variables used in script
      $commentname = isset($_POST[ "commentname" ]) ? $_POST[ "commentname" ] : "";
      $comment = isset($_POST[ "comment" ]) ? $_POST[ "comment" ] : "";
      $iserror = false;
      $formerrors = array( "commentnameerror" => false, "commenterror" => false );
    
      //array of input
      $inputlist = array( "commentname" => "Commentname", "comment" => "Comment" );
      
      $commentnamelist = array( "commentname" => "Commentname" );
      
      $commentlist = array( "comment" => "Comment" );
      
      //copied from http://www.phpeasystep.com/phptu/6.html
      $commentname = stripslashes( $commentname );
      $comment = stripslashes( $comment );
      $commentname = mysql_real_escape_string( $commentname );
      $comment = mysql_real_escape_string( $comment );
    
      //check for errors
      if ( isset( $_POST[ "submit" ]) )
      {
        if ( $commentname == "" )
        {
          $formerrors[ "commentnameerror" ] = true;
          $iserror = true;
        }
      
        if ( $comment == "" )
        {
          $formerrors[ "commenterror" ] = true;
          $iserror = true;
        }
      
        //build INSERT query
        if ( !$iserror )
        {
          $query = "INSERT INTO Commenttable " .
            "( commentname, comment ) " . 
            "VALUES ( '$commentname', '$comment' )";
      
          //connect to MySQL
          if ( !( $database = mysql_connect( "localhost:8080", "root",
            "password" ) ) )
            die( "<p>Could not connect to database</p>" );
        
          //open URLs Database
          if ( !mysql_select_db( "Comment", $database ) )
            die( "<p>Could not open Comment database</p>" );
        
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
        print( "<p class = 'error'>You either didn't submit anything or a field is blank
          </p>" );
      }
    ?>
  </body>
</html>
  