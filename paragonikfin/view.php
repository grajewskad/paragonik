<!DOCTYPE html>
<link rel="stylesheet" href="style.css"/>
<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<body> 


  <?php
  include 'viewscript.php';
 

  ?>
   <a href="code.php">
  <img style="height: 50px; width: 50px; float: left; margin-left: 10px; margin-top: -40px;" src="scan.png">
</a>
        <script>



          

  

        
     
function addElement (sklep, miejsce, cena, data, liczba, idd) { 
  var newDiv = document.createElement("div"); 
  var shop = document.createTextNode(sklep);
  var city = document.createTextNode(miejsce);
  var price = document.createTextNode(cena);
  var date = document.createTextNode(data);
  var prod = document.createTextNode(liczba);
  var xshop = document.createElement("SPAN");
  var xcity = document.createElement("SPAN");
  var xprice = document.createElement("SPAN");
  var xdate = document.createElement("SPAN");
  var xprod = document.createElement("SPAN");
  var xlinck = document.createElement("img");
  var xa = document.createElement("a");
  xlinck.setAttribute("src", "zoom.png");
  //xa.setAttribute("href", "shop.php");
  xa.classList.add("loop");
  xlinck.classList.add("loop");
  xlinck.classList.add("loops");
  xlinck.id=idd;
  xlinck.setAttribute("onclick", "findelement(this.id)");
  xshop.classList.add("headbox");
  xcity.classList.add("place");
  xprice.classList.add("price");
  xdate.classList.add("datebox");
  xprod.classList.add("numb");
  xshop.appendChild(shop);
  xcity.appendChild(city);
  xprice.appendChild(price);
  xdate.appendChild(date);
  xprod.appendChild(prod);
  newDiv.appendChild(xshop);

  newDiv.appendChild(document.createElement("br"));
  newDiv.appendChild(document.createElement("br"));
  newDiv.appendChild(xcity);
  newDiv.appendChild(xprice);

  newDiv.appendChild(document.createElement("br"));
  newDiv.appendChild(document.createElement("br"));
  newDiv.appendChild(xdate);
newDiv.appendChild(xa);
   xa.appendChild(xlinck);
  newDiv.appendChild(xprod);
  newDiv.classList.add("listbox");
  
    
   
    
    
    

  document.body.appendChild(newDiv); 
}
     

     function findelement(id){
   var x = document.getElementById(id);
   x.setAttribute("href", "shop.php?ajdik="+id);
   window.location.href="shop.php?ajdik="+id;



       
 
  }
   
        </script>

      <br/>
<span style="font-size:30px; font-style: bold;">Ostatnie zakupy</span>



<script> for(var i=0; i < <?php echo sizeof($contents);?>; i++){

 var contents = <?php echo json_encode($contents); ?>;
 
    
    var d = new Date( contents[0]["payment_date"] );
    datestring = d.getFullYear() + '-' + (d.getMonth()+1) + '-' + d.getDate();


addElement(contents[i]["store"]["city"], contents[i]["store"]["name"],contents[i]["payment_amount"]+" zł","data zakupu: " + datestring, "Produktów: " + (contents[i]["receipt_items"]).length, contents[i]["id"] ); 

}
</script>





	</body>