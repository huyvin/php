    
    <footer class="footer" style="background-color: #152f59;">
      <div class="container">
        <p>
          &copy; huyvin
        </p>
      </div>
    
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="card-header" style="background-color: #152f59;">
            <div class="modal-header">
              <h5 class="modal-title text-light" id="loginModalTitle">Connexion</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        </div>
          
          <div class="modal-body">
            <form>
              <input type="hidden" id="loginActive" name="loginActive" value="1">
              <div class="form-group">
                <label for="email">Adresse Mail</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entrez votre adresse mail">
              </div>
              <div class="form-group">
                <label for="password">Mot De Passe</label>
                <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <a id="toggleLogin">S'enregistrer</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="button" id="loginSignupButton" class="btn btn-primary" >Se Connecter</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      $("#toggleLogin").click(function() {
        
        if ($("#loginActive").val() == "1") {
            
            $("#loginActive").val("0");
            $("#loginModalTitle").html("S'enregistrer");
            $("#loginSignupButton").html("S'enregistrer");
            $("#toggleLogin").html("Se Connecter");
            
            
        } else {
            
            $("#loginActive").val("1");
            $("#loginModalTitle").html("Se Connecter");
            $("#loginSignupButton").html("Se Connecter");
            $("#toggleLogin").html("S'enregistrer");
            
        }
      });

      $("#loginSignupButton").click(function() {
        
        $.ajax({
            type: "POST",
            url: "actions.php?action=loginSignup",
            data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),
            success: function(result) {
              if (result == "1") {
                windows.location.assign("/twitclone");

              } else {

              }
            }
            
        })
        
      })

    </script>


  </body>
</html>