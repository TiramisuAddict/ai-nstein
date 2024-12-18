function validateForm() {
    console.log("validateForm called");
      var titre = document.getElementById("titre").value;
      var description = document.getElementById("description").value;
      var difficulte = document.getElementById("difficulte").value;
      var textQuestion = document.getElementById("textQuestion").value;
      var textReponse = document.getElementById("textReponse").value;
    
      var titreerror = document.getElementById("titreerror");
      var descriptionerror = document.getElementById("descriptionerror");
      var difficulteerror = document.getElementById("difficulteerror");
      var textQerror = document.getElementById("textQerror");
      var textRerror = document.getElementById("textRerror");
      


    
      var isValid = true;
    
        if(titre.trim() === "")
        {
          titreerror.innerHTML = "Titre est requis";
            isValid = false;
        } else if(!/[A-Z]/.test(titre))
        {
          titreerror.innerHTML = "Titre doit contenir une lettre majuscule";
            isValid = false;
        } else if(titre.length < 5)
        {
          titreerror.innerHTML = "Titre doit contenir au moins 5 caractères";
            isValid = false;
        } else 
        {
          titreerror.innerHTML="";
        }



         if(description.length < 20)
          {
            descriptionerror.innerHTML = "description doit contenir au moins 20 caractères";
              isValid = false;
          } else 
          {
            descriptionerror.innerHTML="";
          }


      if (difficulte.trim() === "") {
        difficulteerror.innerHTML = "Difficulte est requis";
        isValid = false;
      } else if(difficulte.length < 5)
      {
        difficulteerror.innerHTML = "Difficulte doit contenir au moins 5 caractères";
        isValid = false;
      }

      if(textQuestion.trim() === "") 
        {
          textQerror.innerHTML = "Question est requise";
            isValid = false;
        } else if(textQerror.length <10)
          {
            textQerror.innerHTML = "Question doit contenir au moins 10 caractères";
            isValid = false;
          } else 
          {
            textQerror.innerHTML = "";
          }



          if(textReponse.trim() === "") 
            {
              textRerror.innerHTML = "Reponse est requise";
                isValid = false;
            } else if(textQerror.length <10)
              {
                textRerror.innerHTML = "Reponse doit contenir au moins 10 caractères";
                isValid = false;
              } else 
              {
                textRerror.innerHTML = "";
              }


      return isValid;    //// true
    }
    