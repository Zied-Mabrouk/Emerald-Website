function checkform()
  {
    var table = document.getElementById("tblCustomers");
    var nbre = document.getElementById("nbrePersonnes");
    var error = document.getElementById("error");
    var num = document.getElementById("num");
    var resto = document.getElementById("resto");
    var id = document.getElementById("id");

    if(id.value==='')
    {
      error.innerHTML="Veuillez cliquer sur l'un des boutons modifier du tableau";
      return false;
    }

    if(nbre.value==='')
    {
      nbre.style.border="2px dashed red";
      error.innerHTML="L'une des cases est vide";
      return false;
    }

    var uname= nbre.value.trim().toUpperCase();
    let isnum = /^\d+$/.test(uname);
    if(isnum==false)
    {
      nbre.style.border="2px dashed red";
      error.innerHTML="Le nombre de personnes doit être un nombre";
      return false;
    }

    for (var i = 1, row;row=table.rows[i]; i++) {
      if(row.cells[1].innerText== num.value && row.cells[2].innerText==resto.options[resto.selectedIndex].text && (idTable.value!=row.cells[0].innerText)){
        error.innerHTML="Cette table existe déja !";
        ResetBackgroundColor(table);
        row.style.backgroundColor="rgb(255 8 8 / 82%)";
        row.scrollIntoView({ behavior: 'smooth', block: 'end'});
      return false;
      }
    }
    return true;

  }

  function ResetBackgroundColor(table)
  {
      for (var i = 1, row;row=table.rows[i]; i++) {
        if(row.className!="thActif")
        {
          row.style.backgroundColor="white";
        }
      }
  }

  function Reset()
  {
    document.getElementById("idTableHidden").value="";
  }