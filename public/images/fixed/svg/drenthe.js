
document.addEventListener("mouseover", function(e) {  //bind event to the svg
    var targ = e.target;  //get element that was clicked on
    var id = targ.id;  //grab the id of the element
    var textElement = document.getElementById('display-text');
    if (["Noordenveld","Tynaarlo", "Assen", "Midden-Drenthe", "Aa en Hunze"].indexOf(id)!==-1){ //see if it is one of the ids
        textElement.innerHTML = id;
    }else{
        textElement.innerHTML = "";
    }
 }, false);