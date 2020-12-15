// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
//choose gifts number 

var btn1=document.getElementById("bt1");
btn1.onclick = function() {
  btn1.style.backgroundColor="rgb(172, 139, 139)";
  document.getElementById("bt2").style.backgroundColor="white";
  document.getElementById("bt3").style.backgroundColor="white";

}

var btn2=document.getElementById("bt2");
btn2.onclick = function() {
  btn2.style.backgroundColor="rgb(172, 139, 139)";
  document.getElementById("bt1").style.backgroundColor="white";
  document.getElementById("bt3").style.backgroundColor="white";

}
var btn3=document.getElementById("bt3");
btn3.onclick = function() {
  btn3.style.backgroundColor="rgb(172, 139, 139)";
  document.getElementById("bt1").style.backgroundColor="white";
  document.getElementById("bt2").style.backgroundColor="white";

}

// step two choose the  card
var card1= document.getElementById("Card-1");
var card2= document.getElementById("Card-2");
var card3= document.getElementById("Card-3");
var card4= document.getElementById("Card-4");

card1.onclick = function() {
  card1.style.border="5px solid green";
  card2.style.border="5px solid honeydew";
  card3.style.border="5px solid honeydew";
  card4.style.border="5px solid honeydew";
}
card2.onclick = function() {
  card1.style.border="5px solid honeydew";
  card2.style.border="5px solid green";
  card3.style.border="5px solid honeydew";
  card4.style.border="5px solid honeydew";
}
card3.onclick = function() {
  card1.style.border="5px solid honeydew";
  card2.style.border="5px solid honeydew";
  card3.style.border="5px solid green";
  card4.style.border="5px solid honeydew";
}
card4.onclick = function() {
  card1.style.border="5px solid honeydew";
  card2.style.border="5px solid honeydew";
  card3.style.border="5px solid honeydew";
  card4.style.border="5px solid green";
}
//2nd step  continue 
var secondStep=document.getElementById("myBtn1");
secondStep.onclick = function() {
  document.getElementById("step2").style.display="none";
  
  document.getElementById("2ndStepContinue").style.display="inline-block";
}

// step two choose the  Color

var Color1= document.getElementById("Color-1");
var Color2= document.getElementById("Color-2");
var Color3= document.getElementById("Color-3");
var Color4= document.getElementById("Color-4");

Color1.onclick = function() {
  Color1.style.border="5px solid green";
  Color2.style.border="5px solid honeydew";
  Color3.style.border="5px solid honeydew";
  Color4.style.border="5px solid honeydew";
}
Color2.onclick = function() {
  Color1.style.border="5px solid honeydew";
  Color2.style.border="5px solid green";
  Color3.style.border="5px solid honeydew";
  Color4.style.border="5px solid honeydew";
}
Color3.onclick = function() {
  Color1.style.border="5px solid honeydew";
  Color2.style.border="5px solid honeydew";
  Color3.style.border="5px solid green";
  Color4.style.border="5px solid honeydew";
}
Color4.onclick = function() {
  Color1.style.border="5px solid honeydew";
  Color2.style.border="5px solid honeydew";
  Color3.style.border="5px solid honeydew";
  Color4.style.border="5px solid green";
}



