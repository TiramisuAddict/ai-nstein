function validateFormR() {
    console.log("validateForm called");

      var textReponse = document.getElementById("textReponse").value;
     
      var textRerror = document.getElementById("textRerror");

    
      var isValid = true;
    

          if(textReponse.trim() === "") 
            {
              textRerror.innerHTML = "Reponse est requise";
                isValid = false;
            } else if(textReponse.length <10)
              {
                textRerror.innerHTML = "Reponse doit contenir au moins 10 caractères";
                isValid = false;
              } else 
              {
                textRerror.innerHTML = "";
              }


      return isValid;    //// true
    }
    