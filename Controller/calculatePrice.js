/*
    Description: javascript to calculate prices for booking form

    Author: David McRae, Brad Mair
 */
function CalculateTotalCost()
{
  var totalCost = 0;
  var ticketTypeArray = Array.from(arguments);

  for (var i=0; i < (ticketTypeArray.length); i++)
  {
    var movieType = document.getElementById(ticketTypeArray[i] + "MovieType").value;// gets value standard or premuim
    var quantity = document.getElementById(ticketTypeArray[i] + "Quantity").value; // gets value from 0 to 10

    if (movieType == "Standard")
    {
      var movieTypeDiv = document.getElementById(ticketTypeArray[i] + "MovieType");
      var price = movieTypeDiv.getAttribute('standardPrice');
    }
    else if (movieType == "Premium")
    {
      var movieTypeDiv = document.getElementById(ticketTypeArray[i] + "MovieType");
      var price = movieTypeDiv.getAttribute('premiumPrice');
    }
    document.getElementById(ticketTypeArray[i] + "ticketPrice").innerHTML = "£"+price;
    var cost = price * quantity;
    var totalCost = totalCost + cost;
    var total = "£" + String(totalCost);
    document.getElementById("totalCost").innerHTML = total;
  }
}
