function fill(index)
                      {
                        var table = document.getElementById("tblCustomers");

                           row = table.rows[index];
                           for(i=0;i<table.rows.length;i++)
                            table.rows[i].className="";
                          row.className="thActif";
                        alert("hello");

                          
                           document.getElementById("id").value= row.cells[0].innerText;
                           document.getElementById("nbrePersonnes").value= row.cells[1].innerText;
                           document.getElementById("dateR").value= row.cells[2].innerText;
                          document.getElementById("resto").options[i].innerText
                        for (var i = 1; i < document.getElementById("resto").options.length; i++) {
                          if(document.getElementById("resto").options[i].innerText== row.cells[4].innerText){
                            document.getElementById("resto").options[i].selected=true;
                            var idResto = document.getElementById("resto").options[i].value;
                          }
                        }

                        document.querySelectorAll("div.tables").forEach(element=>{
                          element.style.display="none";
                          element.getElementsByTagName("select")[0].setAttribute("name","hey");
                        });
                        alert("hello");


                        document.getElementById(idResto).style.display="block";
                        document.getElementById(idResto).getElementsByTagName("select")[0].setAttribute("name","num");



                        for (var i = 1; i < document.getElementById("num").options.length; i++) {
                          if(document.getElementById("num").options[i].innerText== row.cells[3].innerText){
                            document.getElementById("num").options[i].selected=true;
                          }
                        }
                        alert("hello");


                       }