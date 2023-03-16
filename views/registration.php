<section class="inscriptionForm">
        <form method="POST" action="">
          <legend>Inscription</legend>
          <input type="text" name="lastname" placeholder="Nom*" value=""  required="" pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$"/>
          <div class="errorMessage"></div>
          <input
            type="text"
            name="firstname"
            placeholder="Prénom*"
            value=""
            required=""
            pattern="^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$"/>
          <div class="errorMessage"></div>
          <input
            type="email"
            name="email"
            placeholder="Adresse mail*"
            value=""
            required=""
            pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z-]+\.[a-zA-Z-.]+$"
          />
          <div class="errorMessage"></div>
          <input
            type="phone"
            name="phone"
            placeholder="Numéro de téléphone*"
            value=""
            required=""
          />
          <!--pattern="^[0][1-9]-?[0-9]{2}-?[0-9]{2}-?[0-9]{2}-?[0-9]{2}$"-->
          <div class="errorMessage"></div>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Mot de passe*"
            required=""
            pattern="(?=.*[A-Z])(?=.*\d)(?=.*[!@#$&amp;*])[A-Za-z\d!@#$&amp;*]{8,}"
            value=""
          />
          <div class="errorMessage"></div>
          <input
            type="password"
            id="confirmPassword"
            name="confirmPassword"
            placeholder="Confirmation*"
            required=""
            pattern="(?=.*[A-Z])(?=.*\d)(?=.*[!@#$&amp;*])[A-Za-z\d!@#$&amp;*]{8,}"
            value=""
          />
          <div class="errorMessage"></div>
          <fieldset>
            <input type="checkbox" name="cgu" class="checkbox" value="1" />
            <label><a href="">CGU*</a></label>
          </fieldset>
          <div class="errorMessage"></div>
          <fieldset>
            <input
              type="checkbox"
              name="newsletter"
              class="checkbox"
              value="1"
            />
            <!-- la redirection vers une notre page -->
            <label><a href="">Recevoir notre newsletter*</a></label>
          </fieldset>
          <div class="errorMessage"></div>
          <button type="submit">Inscription</button>
          <a href="/views/connectionCtrl.php">Déjà inscrit ?</a>
        </form>

        <!-- Message d'erreur si le mot de passe ne correspond pas aux prérequis  -->
        <div class="passwordRequires">
          <div class="passwordLength">8 caractères minimum</div>
          <div class="passwordUpper">1 majuscule</div>
          <div class="passwordNumber">1 chiffre</div>
          <div class="passwordSpecial">1 caractère spécial</div>
        </div>
      </section>
    </main>