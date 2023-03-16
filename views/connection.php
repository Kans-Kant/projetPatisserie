
<main>
      <!-- debut formulaire connexion -->

      <section class="connectForm">
        <form method="POST" id="formUser">
          <legend>Connexion</legend>        
          <input 
                required
                type="email" 
                name="email" 
                id="email" 
                value="<?= htmlentities($email ?? '') ?>" 
                class="email" 
                placeholder="Votre E-mail*" 
            >
            <small id="emailError" class="form-text error"><?= $error['email'] ?? '' ?></small>
            <!-- <div class="errorMessage"></div>  -->
          <input 
                required 
                type="password" 
                name="password" 
                id="password" 
                value="<?= htmlentities($password ?? '') ?>" 
                class="pass" 
                placeholder="Votre mot de passe*" 
            >
                <small id="passwordHelp" class="form-text error"><?= $error['password'] ?? '' ?></small>               
          <div class="errorMessage"></div>
          
           <button type="submit">Connexion</button>
          <a href="/controllers/registrationCtrl.php">Pas de compte ?</a>
          <a href="#">Mot de Passe oublié?></a>
        </form>
      </section>
    </main>