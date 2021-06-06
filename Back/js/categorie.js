let myForm= document.getElementById('myForm')

myForm.addEventListener('submit', function(e){
  let nom=document.getElementById('nom')
  let image=document.getElementById('image');
  let nomRegex =  /^[A-Za-z]+$/;
  var error;
  
  

   if(image.value.length==0)
  {

    error="Veuillez insérer une image";

  }

  if(!nom.value.match(nomRegex))
  {

    error="Vous pouvez insérer que des lettres";

  }
if (nom.value.trim() =="")
  {
    error="Veuillez saisir le nom de la categorie !";

  }


if(error)
{
    e.preventDefault();
    let myError = document.getElementById('error');
    myError.innerHTML =error;
    myError.style.color="red";
    return false;
}

else
{
    alert("Ajout avec succés !")
}
 

});
