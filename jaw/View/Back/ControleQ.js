function validateFormQ() {
    console.log("validateForm called");

      var textQuestion = document.getElementById("textQuestion").value;
    

      var textQerror = document.getElementById("textQerror");
      

      var isValid = true;
    
       
      if(textQuestion.trim() === "") 
        {
          textQerror.innerHTML = "Question est requise";
            isValid = false;
        } else if(textQuestion.length <10)
          {
            textQerror.innerHTML = "Question doit contenir au moins 10 caractères";
            isValid = false;
          } else 
          {
            textQerror.innerHTML = "";
          }


      return isValid;    //// true
    }
    