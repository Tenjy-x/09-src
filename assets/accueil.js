
    window.addEventListener("load", function() {
      function sendpublication() {
        var xhr = new XMLHttpRequest();
        var formData = new FormData(form);
        xhr.onreadystatechange = function() {
          // console.log(xhr.readyState);
          if(xhr.readyState == 4) {
            if(xhr.status == 200) {
              var reponse = JSON.parse(xhr.responseText);
              var pubs = document.getElementById("pubs");
                var pub = document.createElement("div");
                var name = document.createElement("p");
                console.log(reponse[reponse.length - 1]['Nom']);
                name.innerText = reponse[reponse.length - 1]['Nom'];
                var texte = document.createElement("p");
                texte.innerText = reponse[reponse.length - 1]['texte'];
                pub.appendChild(name);
                pub.appendChild(texte);
                var id = reponse[reponse.length - 1]['id_pub'];
                // var comments = document.createElement("a");
                // comments.setAttribute("href" , "commentaire.php?id=" + id)
                pubs.appendChild(pub);
              
              var commentsForm = document.createElement("form");
              commentsForm.innerHTML = '<input type="text" name="comment" placeholder="Ajouter un commentaire"><input type="submit" value="Commenter">';
              commentsForm.addEventListener("submit", function(event) {
                event.preventDefault();
                var commentXhr = new XMLHttpRequest();
                var commentFormData = new FormData(commentsForm);
                commentXhr.onreadystatechange = function() {
                  if(commentXhr.readyState == 4) {
                    if(commentXhr.status == 200) {
                      var reponseComs = JSON.parse(commentXhr.responseText);
                      var commentsList = document.createElement("div");
                      commentsList.innerHTML = "";
                        var name = document.createElement("p");
                        var commentItem = document.createElement("p");
                        name.innerText = reponseComs[reponseComs.length - 1]['Nom']
                        commentItem.innerText = reponseComs[reponseComs.length - 1]['coms'];
                        commentsList.appendChild(name);
                        commentsList.appendChild(commentItem);
                  
                      pub.appendChild(commentsList);
                    } else {
                      alert('Erreur lors de l\'ajout du commentaire');
                    }
                  }
                };
                commentXhr.open("POST", "../pages/traitementComments.php?id=" + id);
                commentXhr.send(commentFormData);
            });
            pub.appendChild(commentsForm);
            } else {
              alert('Erreur lors de la publication');
            }
          }
        }
        xhr.addEventListener("error", function(event) {
          alert('Oups! Quelque chose s\'est mal passé.');
        });
        xhr.open("POST", "traitementPublication.php");
        xhr.send(formData);
      }

      var form = document.getElementById("FormPublication");
      form.addEventListener("submit", function (event) {
        event.preventDefault();
        sendpublication();
    });
  });
