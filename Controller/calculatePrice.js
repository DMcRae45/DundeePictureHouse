function CalculateItemsValue() {
    var total = 0;
    var total_items = 2;
    for (i=1; i<=total_items; i++) {

        itemID = document.getElementById("ticketType_"+i);
        if (typeof itemID === 'undefined' || itemID === null) {
            alert("No such item - " + "qnt_"+i);
        } else {
            total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
        }

    }
    document.getElementById("TicketTotal").innerHTML = "Total Price £" + total;
}

function CalculateAdult() {
    var total = 0;
    var total_items = 1;
    for (i=1; i<=total_items; i++) {

        itemID = document.getElementById("ticketType_1");
        if (typeof itemID === 'undefined' || itemID === null) {
            alert("No such item - " + "qnt_1");
        } else {
            total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
        }

    }
    document.getElementById("inputGroupAppend1").innerHTML = "£" + total;
}

function CalculatePremium() {
    var total = 0;
    var total_items = 1;
    for (i=1; i<=total_items; i++) {

        itemID = document.getElementById("ticketType_2");
        if (typeof itemID === 'undefined' || itemID === null) {
            alert("No such item - " + "qnt_2");
        } else {
            total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
        }

    }
    document.getElementById("inputGroupAppend2").innerHTML = "£" + total;
}

//function CalculateU16() {
//    var total = 0;
//    var total_items = 1;
//    for (i=1; i<=total_items; i++) {
//
//        itemID = document.getElementById("ticketType_3");
//        if (typeof itemID === 'undefined' || itemID === null) {
//            alert("No such item - " + "qnt_3");
//        } else {
//            total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
//        }
//
//    }
//    document.getElementById("inputGroupAppend3").innerHTML = "£" + total;
//    console.log(total);
//
//}
//
//function CalculateU16Premium() {
//    var total = 0;
//    var total_items = 1;
//    for (i=1; i<=total_items; i++) {
//
//        itemID = document.getElementById("ticketType_4");
//        if (typeof itemID === 'undefined' || itemID === null) {
//            alert("No such item - " + "qnt_4");
//        } else {
//            total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
//        }
//
//    }
//    document.getElementById("inputGroupAppend4").innerHTML = "£" + total;
//    console.log(total);
//
//}
//
//function CalculateConcession() {
//    var total = 0;
//    var total_items = 1;
//    for (i=1; i<=total_items; i++) {
//
//        itemID = document.getElementById("ticketType_5");
//        if (typeof itemID === 'undefined' || itemID === null) {
//            alert("No such item - " + "qnt_5");
//        } else {
//            total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
//        }
//
//    }
//    document.getElementById("inputGroupAppend5").innerHTML = "£" + total;
//    console.log(total);
//
//}
//
//function CalculateStudent() {
//    var total = 0;
//    var total_items = 1;
//    for (i=1; i<=total_items; i++) {
//
//        itemID = document.getElementById("ticketType_6");
//        if (typeof itemID === 'undefined' || itemID === null) {
//            alert("No such item - " + "ticketType_6");
//        } else {
//            total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
//        }
//
//    }
//    document.getElementById("inputGroupAppend6").innerHTML = "£" + total;
//    console.log(total);
//}
