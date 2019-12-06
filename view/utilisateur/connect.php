
<h1>Bienvenue sur Devialet</h1>
<h4>Pas encore de compte ? <a href="./index.php?controller=utilisateur&action=create">S'inscrire!</a></h4>

<form method = "post" action="?controller=utilisateur&action=connected">
    <p class = "p_column">
    <label for = "login_id">Login</label>
    <input type = "text" name="login" id="login_id" required/>
    </textarea>
    </p>
    <p class = "p_column">
    <label for = "mdp_id">Mot de passe</label>
    <input type="password" name="password" id="mdp_id" />
    </textarea>
    </p>
    <p>
    </p>
    <p>
    <button type="submit" class="mdc-button mdc-button--raised">  <span class="mdc-button__ripple"></span>Connexion</button>
    </p>
    </form>