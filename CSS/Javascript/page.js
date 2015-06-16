var asyncRequest; // variable to hold XMLHttpRequest object

//modified from Fig. 16_05 (SwitchContent.html)

  // set up event handlers
  function registerListeners()
  {
    document.getElementById( "ph" ).addEventListener( "click", 
      function() { getContent( "AJAX/LifeinthePhilippines.html" ); }, false ); 
    document.getElementById( "hs" ).addEventListener( "click", 
      function() { getContent( "AJAX/HighSchool.html" ); }, false );
    document.getElementById( "tmc" ).addEventListener( "click", 
      function() { getContent( "AJAX/College.html" ); }, false );
    document.getElementById( "music" ).addEventListener( "click", 
      function() { getContent( "AJAX/Music.html" ); }, false );
         
      } // end function registerListeners

      // set up and send the asynchronous request.
      function getContent( url )
      {
         // attempt to create XMLHttpRequest object and make the request
         try
         {
            asyncRequest = new XMLHttpRequest(); // create request object

            // register event handler
            asyncRequest.addEventListener(
               "readystatechange", stateChange, false); 
            asyncRequest.open( "GET", url, true ); // prepare the request
            asyncRequest.send( null ); // send the request
         } // end try
         catch ( exception )
         {
            alert( "Request failed." );
         } // end catch
      } // end function getContent
      
      // clear the content of the box
      function clearContent()
      {
         document.getElementById( "contentArea" ).innerHTML = "";
      } // end function clearContent
      
      // displays the response data on the page
      function stateChange()
      {
         if ( asyncRequest.readyState == 4 && asyncRequest.status == 200 )
         {
            document.getElementById( "page" ).innerHTML = 
               asyncRequest.responseText; // places text in contentArea
         } // end if
      } // end function stateChange

      window.addEventListener( "load", registerListeners, false );