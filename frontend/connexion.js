document.getElementById("login-form").addEventListener("submit", function(e) {
  e.preventDefault();

  const pseudo = document.getElementById("pseudo").value.trim();
  const password = document.getElementById("password").value.trim();

  if (pseudo.length < 2 || password.length < 2) {
    alert("Informations invalides.");
    return;
  }

  // Simule la connexion (à remplacer par un vrai backend plus tard)
  localStorage.setItem("logged", "true");
  localStorage.setItem("pseudo", pseudo);

  window.location.href = "index.html";
});
