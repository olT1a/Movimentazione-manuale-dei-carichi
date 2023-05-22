document.getElementById('pesoSollevato').addEventListener('change'), ()  => {
    var value = document.getElementById("pesoSollevato").value;
    if(value > 30){
        alert("il valore massimo è 30");
    }
      
  }