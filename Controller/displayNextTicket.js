/*
    Description: javascript to display the next showing for a user

    Author: Brad Mair
 */

 function DisplayTicket()
 {
   var ticketInfoArray = Array.from(arguments);

   //Displays Title
   document.getElementById("ticketCardTITLE").innerHTML = "<text>"+ticketInfoArray[0]+"</text>";

   //Displays Ticket Code
   var ticketCode = ticketInfoArray[1].toUpperCase();
   document.getElementById("ticketCardCODE").innerHTML = "Ticket: <text>"+ticketCode+"</text>";
   document.getElementById("ticketCardCODE").style.opacity = 1;

   //Displays Seating Type
   if (ticketInfoArray[2] == "0")
   {
     var ticketType = "Standard Seating";
   }
   else
   {
     var ticketType = "Premium Seating";
   }
   document.getElementById("ticketCardTYPE").innerHTML = "Ticket Type: <text>"+ticketType+"</text>";
   document.getElementById("ticketCardTYPE").style.opacity = 1;

   //Displays Screen Number
   document.getElementById("ticketCardSCREEN").innerHTML = "Screen: <text>0"+ticketInfoArray[3]+"</text>";
   document.getElementById("ticketCardSCREEN").style.opacity = 1;

   //Displays PayPal E-Mail used to pay for ticket
   document.getElementById("ticketCardPAYPAL").innerHTML = "PayPal E-Mail: <text>"+ticketInfoArray[4]+"</text>";
   document.getElementById("ticketCardPAYPAL").style.opacity = 1;

   //Displays Date of Showing
   document.getElementById("ticketCardDATE").innerHTML = "Date: <text>"+ticketInfoArray[5]+"</text>";
   document.getElementById("ticketCardDATE").style.opacity = 1;

   //Displays Poster of Movie
   document.getElementById("ticketCardIMG").style.height = "22rem";
   document.getElementById("ticketCardIMG").src=ticketInfoArray[6];
   document.getElementById("ticketCardIMG").style.height = "auto";

   //Displays Age Rating of Movie
   document.getElementById("ticketCardAGE").src = ticketInfoArray[7];
   document.getElementById("ticketCardAGE").style.opacity = 1;

   //Displays RunTime of Movie
   document.getElementById("ticketCardRUNTIME").innerHTML = "RunTime: <text>"+ticketInfoArray[8]+"mins</text>";
   document.getElementById("ticketCardRUNTIME").style.opacity = 1;

   //Displays Director of Movie
   document.getElementById("ticketCardDIRECT").innerHTML = "Director: <text>"+ticketInfoArray[9]+"</text>";
   document.getElementById("ticketCardDIRECT").style.opacity = 1;

   //Displays Language of Movie
   document.getElementById("ticketCardLANG").innerHTML = "Language: <text>"+ticketInfoArray[10]+"</text>";
   document.getElementById("ticketCardLANG").style.opacity = 1;

   //Displays Genre of Movie
   document.getElementById("ticketCardGENRE").innerHTML = "Genre: <text>"+ticketInfoArray[11]+"</text>";
   document.getElementById("ticketCardGENRE").style.opacity = 1;

   //Displays Shoing Time of Movie
   document.getElementById("ticketCardTIME").innerHTML = "Time: <text>"+ticketInfoArray[12]+"</text>";
   document.getElementById("ticketCardTIME").style.opacity = 1;

 }
