{{-- STEEP 4 DEBUT --}}
<section class="steep-4">
    <div class="steep-04">
        <div class="row g-4">
            <!-- MOT DE PASSE -->
            <div class="col-md-6">
                <div class="futureField">
                    <label>
                        <i class="fa fa-lock"></i>
                        Mot de passe
                    </label>
                    <div class="futureInput">
                        <i class="fa fa-lock inputIcon"></i>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Entrer le mot de passe" data-review="password" required>
                        <button type="button" class="passwordToggle"  data-target="#password"  aria-label="Afficher le mot de passe">  <i class="fa fa-eye"></i></button>
                    </div>
                </div>
            </div>
            <!-- CONFIRMATION -->
            <div class="col-md-6">
                <div class="futureField">

                    <label>
                        <i class="fa fa-lock"></i>
                        Confirmation du mot de passe
                    </label>
                    <div class="futureInput">
                        <i class="fa fa-lock inputIcon"></i>

                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmer le mot de passe" required>
                        <button type="button" class="passwordToggle" data-target="#password_confirmation" aria-label="Afficher la confirmation du mot de passe">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                    <div class="passwordError">
                        <i class="fa fa-circle-exclamation"></i>
                        Les mots de passe ne correspondent pas.
                    </div>





                </div>



            </div>
            <!-- INFORMATIONS COMPLÉMENTAIRES -->
             <div class="col-md-12">
                <div class="futureFinal">
                    <i class="fa fa-shield-halved"></i>
                    <h3>
                        Sécurité du compte
                    </h3>
                    <p>
                        Le mot de passe sera sécurisé avant
                        l'enregistrement du compte.
                    </p>
                </div>
            </div>
        </div>
    </div>

</section>
{{-- STEEP 4 FIN --}}
