//slide show of pictures
var pic = 1; //track number of image
var show; //what image to show

//get images and button listeners
function start()
{
  show = document.getElementById("image");
  var leftButton = document.getElementById("buttonLeft");
  var rightButton = document.getElementById("buttonRight");
  leftButton.addEventListener("click", moveLeft, false);
  rightButton.addEventListener("click", moveRight, false);
}
//end function start

function moveRight() //changes image through incrementing
{
  if (pic < 7)
  {  
    pic += 1;
  }
  //end if
  else
  {
    pic = 1;
  }
  //end else
  show.setAttribute("src", "CSS/Images/CollegeAlbum/img" + pic + ".jpg");
  show.setAttribute("alt", "image" + pic);
  //change attribute
}
//end function move right
  
function moveLeft() //changes image through decrementing
{
  if (pic > 1)
  {
    pic -= 1;
  }
  //end if
  else
  {  
    pic = 7;
  }
  //end else
  show.setAttribute("src", "CSS/Images/CollegeAlbum/img" + pic + ".jpg");
  show.setAttribute("alt", "image" + pic);
} 
//end function move left

window.addEventListener("load", start, false);