<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
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
                var comments = document.createElement("a");
                comments.setAttribute("href" , "commentaire.php?id=<?php$reponse[]?>")
                comments.innerText = "Commentaires";
                var pub = document.createElement("div");
                pub.innerText = reponse[reponse.length - 1]['texte'];
                pubs.appendChild(pub);
                pub.appendChild(comments);
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