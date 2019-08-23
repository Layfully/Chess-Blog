  window.onload = function () {
    setInterval(function(){
      let xhttp = new XMLHttpRequest();
    
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("slider").innerHTML = this.responseText;
          }
      };
    
      xhttp.open("GET", "https://ux.up.krakow.pl/~gabadr/WitrynaZaliczeniowa/?task=gallery&action=slider", true);
      xhttp.send();
    }, 7000);
    setInterval(function(){
      let xhttp = new XMLHttpRequest();
    
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("citation").innerHTML = this.responseText;
          }
      };
    
      xhttp.open("GET", "https://ux.up.krakow.pl/~gabadr/WitrynaZaliczeniowa/?task=citations&action=index", true);
      xhttp.send();
    }, 5000);
  
  }
  