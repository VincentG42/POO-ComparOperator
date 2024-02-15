function addComment() {
    var pseudoInput = document.getElementById("pseudo-input");
    var commentInput = document.getElementById("comment-input");
    var pseudo = pseudoInput.value.trim();
    var commentText = commentInput.value.trim();
  
    if (pseudo === "" || commentText === "") {
      alert("Veuillez entrer un pseudo et un commentaire.");
      return;
    }
  
    var existingComment = document.querySelector(".comment[data-pseudo='" + pseudo + "']");
    if (existingComment) {
      alert("Vous avez déjà laissé un commentaire.");
      return;
    }
  
    var commentDiv = document.createElement("div");
    commentDiv.classList.add("comment");
    commentDiv.setAttribute("data-pseudo", pseudo);
    commentDiv.textContent = pseudo + ": " + commentText;
    document.getElementById("comments").appendChild(commentDiv);
  
    // Réinitialiser les champs
    pseudoInput.value = "";
    commentInput.value = "";
  }
  
  function setPrice(price) {
    document.getElementById("price").textContent = price;
  }