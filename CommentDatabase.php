<!DOCTYPE html>

<!-- Modiefied from Fig 19.21 -->
<!-- Concepts from Deitel's Internet & World Wide Web and 
http://www.w3schools.com/ unless otherwise noted --> 

<html>
  <head>
    <meta charset = "utf-8">
    <title>Comment Database</title>
    <link rel="stylesheet" type="text/css" href="CSS/CaraLandicho'sWebsite.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/Database.css"/>
  </head>
  <body>
    <?php
      //build SELECT query
      $query = "SELECT * FROM Commenttable ORDER BY ID DESC";
    
      //Connect to MySQL
      if ( !( $database = mysql_connect( "localhost:8080",
        "root", "password" ) ) )
        die( "<p>Could not connect to database</p></body></html>" );
      
      //open URLs database
      if ( !mysql_select_db( "Comment", $database ) )
        die( "<p>Could not open Comment database</p>
          </body></html>" );
        
      //query URLs database
      if ( !( $result = mysql_query( $query, $database ) ) )
      {
        print( "<p>Could not execute query!</p>" );
        die( mysql_error() . "</body></html>" );
      }
    
    ?><!-- end PHP script -->
    <h1>Comments:</h1>
    <table id = "table">
      <?php
        //fetch each record in result set
        for ( $counter = 0; $row = mysql_fetch_row( $result );
          ++$counter )
        {
          //build table to display results
          print( "<tr>" );
        
          foreach ( $row as $key => $value )
            print( "<td>$value</td>" );
          
          print( "</tr>" );
        }
        mysql_close( $database );
      ?><!-- end PHP script -->
    </table>
  </body>
</html>