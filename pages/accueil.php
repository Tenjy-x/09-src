<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type = "text/css" href="../assets/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script>
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
                pub.innerText = reponse[reponse.length - 1]['texte'];
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
                        var commentItem = document.createElement("p");
                        commentItem.innerText = reponseComs[reponseComs.length - 1]['coms'];
                        commentsList.appendChild(commentItem);
                  
                      pub.appendChild(commentsList);
                    } else {
                      alert('Erreur lors de l\'ajout du commentaire');
                    }
                  }
                };
                commentXhr.open("POST", "traitementComments.php?id=" + id);
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
  </script>
</head>
<body>
  <form id="FormPublication">
    <label for="publication"> </label>
    <textarea name="content" id="publication"></textarea>
    <input type="submit" value="Publier">
  </form>

  <div id = "pubs" class="publication"></div>
</body>
</html>