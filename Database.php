<!DOCTYPE html>

<!-- Modified from Fig 19.21 -->
<!-- Concepts from Deitel's Internet & World Wide Web and 
http://www.w3schools.com/ unless otherwise noted --> 

<html>
  <head>
    <meta charset = "utf-8">
    <title>Database</title>
    <link rel="stylesheet" type="text/css" href="CSS/CaraLandicho'sWebsite.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/Database.css"/>
    <title>Blogs</title>
  </head>
  <body>
    <?php
      //build SELECT query
      $query = "SELECT * FROM Blogtable ORDER BY ID DESC";
    
      //Connect to MySQL
      if ( !( $database = mysql_connect( "localhost:8080",
        "root", "password" ) ) )
        die( "<p>Could not connect to database</p></body></html>" );
      
      //open URLs database
      if ( !mysql_select_db( "Blog", $database ) )
        die( "<p>Could not open Blog database</p>
          </body></html>" );
        
      //query URLs database
      if ( !( $result = mysql_query( $query, $database ) ) )
      {
        print( "<p>Could not execute query!</p>" );
        die( mysql_error() . "</body></html>" );
      }
    
    ?><!-- end PHP script -->
    <table>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Comments</th>
        <th>Comment Box</th>
      </tr>
      <?php
        
        //fetch each record in result set
        for ( $counter = 0; $row = mysql_fetch_row( $result );
          ++$counter )
        {
          //build table to display results
          print( "<tr>" );
        
          foreach ( $row as $key => $value )
            {
              print( "<td>$value</td>" );
            }
          print( "<td><form action = 'Comment.php' method = 'post'
            <div><label>Name:</label><input type = 'text' name = 'commentname'/>
            </div><div><label>Comment:</label><textarea name = 'comment' rows = '5'
            cols = '25'></textarea></div><div><input type = 'submit' name = 'submit'
            value = 'Submit'></div></form></td>");
          
          print( "</tr>" );
          
        }
        
        mysql_close( $database );
      ?><!-- end PHP script -->
    </table>
  </body>
</html>