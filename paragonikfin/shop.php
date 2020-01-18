<!DOCTYPE html>
<head>


<!-- Latest compiled and minified JavaScript -->




<link rel="stylesheet" href="style.css"/>
<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
</head>
	<body> 

     <?php
  include 'viewscript.php';

  if (isset($_GET['ajdik'])) {
    $_SESSION["table"]=$_GET['ajdik'];
    
  }
 



  
  
  ?>

        <script>
        
     function addHeader(sklep, data) {
  var newDivhead = document.createElement("div"); 
  var shop = document.createTextNode(sklep);
  var date = document.createTextNode(data);
   var xshop = document.createElement("h3");
 var xdate = document.createElement("h3");
  xshop.classList.add("headboxmap");
 xdate.classList.add("dateboxmap");
 xshop.appendChild(shop);
 xdate.appendChild(date);
newDivhead.appendChild(xshop);
newDivhead.appendChild(xdate);

var currentDiv = document.getElementById("div2"); 
  document.body.insertBefore(newDivhead, currentDiv); 
}
window.indeksik;
function addElement (cena, sztuki, produkt, id) { 






  // create a new div element 
  var newDiv = document.createElement("div"); 
  // and give it some content 
 

  var price = document.createTextNode("$"+cena);
 
  var prod = document.createTextNode(sztuki + " szt.");
  var device = document.createTextNode(produkt);
  

  var xprice = document.createElement("SPAN");
 
  var xprod = document.createElement("SPAN");
  var xdevice = document.createElement("SPAN");
 
 
  xprice.classList.add("pricemap");
 
  xprod.classList.add("numbmap");
  newDiv.classList.add("headmap");
  xdevice.classList.add("devicemap");
  
 
  xprice.appendChild(price);
 
  xprod.appendChild(prod);
  xdevice.appendChild(device);
  
  newDiv.appendChild(xdevice);
 newDiv.appendChild(xprod);

  newDiv.appendChild(document.createElement("br"));
  newDiv.appendChild(document.createElement("br"));
  
  
  
  newDiv.classList.add("listbox");
  
    
    var image = document.createElement("img");
    var image2 = document.createElement("img");

image.id = id;
image.className = "mapimg";
image.src = "pin.png";            // image.src = "IMAGE URL/PATH"
newDiv.appendChild(image);

image2.id = id;
image2.className = "mapimg2";
image2.src = "cont.png";            // image.src = "IMAGE URL/PATH"
newDiv.appendChild(image2);

image.setAttribute("onclick", "findelement(this.id)");
image2.setAttribute("onclick", "findelementgwar(this.id)");
    
    newDiv.appendChild(xprice);
    
  var currentDiv = document.getElementById("div1"); 
  document.body.insertBefore(newDiv, currentDiv); 
}

    function findelement(id){
   var x = document.getElementById(id);
   x.setAttribute("href", "maps.php?ajdikmap="+id);
   window.location.href="maps.php?ajdikmap="+id;



       
 
  }

   function findelementgwar(id){
   var x = document.getElementById(id);
   x.setAttribute("href", "guarant.php?ajdikmap="+id);
   window.location.href="guarant.php?ajdikmap="+id;



       
 
  }


        
        </script>


<script> 
var contents = <?php echo json_encode($contents); ?>;


 
 for(var i=0; i<contents.length; i++){
 if(contents[i]["id"]=="<?php echo $_SESSION["table"]?>"){
     indeksik = i;
    i=contents.length+1;
    console.log(indeksik);
      

    }
}

var d = new Date( contents[indeksik]["payment_date"] );
    datestring = d.getFullYear() + '-' + (d.getMonth()+1) + '-' + d.getDate();
addHeader(contents[indeksik]["store"]["name"],datestring);


for( var i=0; i<contents[indeksik]["receipt_items"].length; i++){
addElement(contents[indeksik]["receipt_items"][i]["price"], contents[indeksik]["receipt_items"][i]["quantity"],contents[indeksik]["receipt_items"][i]["name"], contents[indeksik]["receipt_items"][i]["id"]);  
}


</script>



	</body>