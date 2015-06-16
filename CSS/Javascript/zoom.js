var asyncRequest; // variable to hold XMLHttpRequest object

//modified from Fig. 16_05 (SwitchContent.html)

  // set up event handlers
  function registerListeners()
  {
    document.getElementById( "profile" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/profile.html" ); }, false );
    document.getElementById( "profile" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "family" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/family.html" ); }, false );
    document.getElementById( "family" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "family1" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/family1.html" ); }, false );  
    document.getElementById( "family1" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "b2k11a" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/b2k11a.html" ); }, false );
    document.getElementById( "b2k11a" ).addEventListener( "mouseout", 
      clearContent, false );  
          
    document.getElementById( "heb" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/heb.html" ); }, false ); 
    document.getElementById( "heb" ).addEventListener( "mouseout", 
      clearContent, false ); 
          
    document.getElementById( "dorks" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/dorks.html" ); }, false ); 
    document.getElementById( "dorks" ).addEventListener( "mouseout", 
      clearContent, false ); 
          
    document.getElementById( "sum1" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/sum1.html" ); }, false ); 
    document.getElementById( "sum1" ).addEventListener( "mouseout", 
      clearContent, false ); 
          
    document.getElementById( "pb" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/pb.html" ); }, false ); 
    document.getElementById( "pb" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "family2" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/family2.html" ); }, false );
    document.getElementById( "family2" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "hen" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/hen.html" ); }, false );
    document.getElementById( "hen" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "b2k11b" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/b2k11b.html" ); }, false );
    document.getElementById( "b2k11b" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "b2k11c" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/b2k11c.html" ); }, false );
    document.getElementById( "b2k11c" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "gc" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/gc.html" ); }, false );
    document.getElementById( "gc" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "gi" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/gi.html" ); }, false );
    document.getElementById( "gi" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "dorks2" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/dorks2.html" ); }, false );
    document.getElementById( "dorks2" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "intl" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/intl.html" ); }, false );
    document.getElementById( "intl" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "ow" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/ow.html" ); }, false );
    document.getElementById( "ow" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "dorks3" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/dorks3.html" ); }, false );
    document.getElementById( "dorks3" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "grad1" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/grad1.html" ); }, false );
    document.getElementById( "grad1" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "wing" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/wing.html" ); }, false );
    document.getElementById( "wing" ).addEventListener( "mouseout", 
      clearContent, false );
          
    document.getElementById( "bday" ).addEventListener( "mouseover", 
      function() { getContent( "AJAX/bday.html" ); }, false ); 
    document.getElementById( "bday" ).addEventListener( "mouseout", 
      clearContent, false );   
         
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
            document.getElementById( "contentArea" ).innerHTML = 
               asyncRequest.responseText; // places text in contentArea
         } // end if
      } // end function stateChange

      window.addEventListener( "load", registerListeners, false );