let myForm= document.getElementById('myForm')

myForm.addEventListener('submit', function(e){
  let libelle=document.getElementById('libelle');
  let description=document.getElementById('description');
  let prix=document.getElementById('prix');
  let categorie=document.getElementById('categorie');
  let nomRegex =  /^[A-Za-z]+$/;
  let image = document.getElementById('imgPlats');
  var error;
  
  if(image.value.length==0)
  {

    error="Veuillez insérer une image";

  }

  if(!libelle.value.match(nomRegex))
  {

    error="Vous pouvez insérer que des lettres";

  }

  if (libelle.value.trim() =="")
  {
    error="Veuillez saisir le nom du plats !";

  }
  if (description.value.trim() =="")
  {
    error="Veuillez saisir une description!";

  }
  if (prix.value.trim() =="")
  {
    error="Veuillez saisir le prix!";

  }
  

  if (categorie.value.trim() =="")
  {
    error="Veuillez saisir la categorie!";

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
