/*
    Description: javascript to display the next showing for a user

    Author: Brad Mair
 */

 function DisplayTicket()
 {
   var ticketInfoArray = Array.from(arguments);
   var ticketInfoDisplayArray = ["Title","Code","Type","Screen","PayPal","Date","Img","Age","RunTime","Director","Language","Genre","Time"];

   for (i=0; i < (ticketInfoArray.length); i++)
   {
     var genericTicketInfo = true;
     if (i == 0)
     {
       var ticketInfo = "<text>"+ticketInfoArray[i]+"</text>";
     }
     else if (i == 1)
     {
      var ticketInfo = ticketInfoDisplayArray[i]+": <text>"+ticketInfoArray[i].toUpperCase()+"</text>";
     }
     else if (i == 2)
     {
       if (ticketInfoArray[2] == "0")
       {
         var ticketType = "Standard Seating";
       }
       else
       {
         var ticketType = "Premium Seating";
       }
       var ticketInfo = "Ticket "+ticketInfoDisplayArray[i]+": <text>"+ticketType+"</text>";
     }
     else if (i == 3)
     {
       var ticketInfo = ticketInfoDisplayArray[i]+": <text>0"+ticketInfoArray[i]+"</text>";
     }
     else if (i == 6)
     {
       document.getElementById("ticketCard"+(ticketInfoDisplayArray[i].toUpperCase())).style.height = "22rem";
       document.getElementById("ticketCard"+(ticketInfoDisplayArray[i].toUpperCase())).src=ticketInfoArray[i];
       document.getElementById("ticketCard"+(ticketInfoDisplayArray[i].toUpperCase())).style.height = "auto";
       var genericTicketInfo = false;
     }
     else if (i == 7)
     {
       document.getElementById("ticketCard"+(ticketInfoDisplayArray[i].toUpperCase())).src = ticketInfoArray[i];
       document.getElementById("ticketCard"+(ticketInfoDisplayArray[i].toUpperCase())).style.opacity = 1;
       var genericTicketInfo = false;
     }
     else
     {
       var ticketInfo = ticketInfoDisplayArray[i]+": <text>"+ticketInfoArray[i]+"</text>";
     }

     if (genericTicketInfo == true)
     {
       document.getElementById("ticketCard"+(ticketInfoDisplayArray[i].toUpperCase())).innerHTML = ticketInfo;
       document.getElementById("ticketCard"+(ticketInfoDisplayArray[i].toUpperCase())).style.opacity = 1;
     }
   }
 }
