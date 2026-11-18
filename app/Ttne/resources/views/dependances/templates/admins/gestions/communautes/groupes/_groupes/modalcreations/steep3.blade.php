{{-- DEBUT --}}
<section class="steep-3">
    <div class="steep-03">

        <div class="container-fluid">
            <div class="row g-4 p-2">

                {{-- MONTANT --}}
                <div class="col-md-6">
                    <div class="futureField">
                        <label>
                            <i class="fa fa-money"></i>
                            Montant de la cotisation
                        </label>

                        <div class="futureInput">
                            <i class="fa fa-money inputIcon"></i>

                            <input type="number"
                                   name="montant_cotisation"
                                   class="form-control"
                                   min="1"
                                   step="1"
                                   placeholder="Ex : 50000"
                                   required
                                   data-review="montant_cotisation">
                        </div>
                    </div>
                </div>

                {{-- PERIODICITE --}}
                <div class="col-md-6">
                    <div class="futureField">
                        <label>
                            <i class="fa fa-calendar"></i>
                            Périodicité
                        </label>

                        <div class="futureInput">
                            <i class="fa fa-refresh inputIcon"></i>

                            <select name="periodicite_id"
                                    class="futureSelect"
                                    required
                                    data-review="periodicite_id">

                                <option value="">
                                    Choisir une périodicité
                                </option>

                                @foreach($periodicites ?? [] as $periodicite)
                                    <option value="{{ $periodicite->id }}">
                                        {{ $periodicite->libelle }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

                {{-- DATE DE DEBUT --}}
                <div class="col-md-6">
                    <div class="futureField">
                        <label>
                            <i class="fa fa-calendar-plus-o"></i>
                            Date de début
                        </label>

                        <div class="futureInput">
                            <i class="fa fa-calendar inputIcon"></i>

                            <input type="date"
                                   name="date_debut"
                                   class="form-control"
                                   required
                                   data-review="date_debut">
                        </div>
                    </div>
                </div>

                {{-- DATE DE FIN --}}
                <div class="col-md-6">
                    <div class="futureField">
                        <label>
                            <i class="fa fa-calendar-times-o"></i>
                            Fin estimée
                        </label>

                        <div class="futureInput">
                            <i class="fa fa-calendar inputIcon"></i>

                            <input type="date"
                                   name="date_fin_estimee"
                                   class="form-control"
                                   data-review="date_fin_estimee">
                        </div>
                    </div>
                </div>

                {{-- INFORMATIONS --}}
                {{-- <div class="col-md-12">
                    <div class="futureFinal">
                        <i class="fa fa-info-circle"></i>

                        <h3>Organisation des cotisations</h3>

                        <p>
                            Définissez le montant et la fréquence auxquels
                            les membres devront cotiser. Ces paramètres
                            permettront d'établir le rythme financier
                            de votre communauté.
                        </p>
                    </div>
                </div> --}}

            </div>
        </div>

    </div>
</section>
{{-- FIN --}}
