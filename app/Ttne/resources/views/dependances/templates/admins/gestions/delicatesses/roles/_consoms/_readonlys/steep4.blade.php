{{-- ============================================================
STEP 4 DEBUT — READ ONLY
============================================================ --}}

<section class="steep-4">

<div class="steep-04">

    <div class="row g-4 p-2">

        {{-- ==================================================
            DATE DE DÉBUT
        =================================================== --}}

        <div class="col-md-6">

            <div class="futureField">

                <label>
                    <i class="fa fa-calendar-check"></i>
                    Date de début
                </label>

                <div class="futureInput">

                    <i class="fa fa-calendar-check inputIcon"></i>

                    <input
                        type="date"
                        name="date_debut"
                        class="form-control"
                        value="{{ old('date_debut', $value->date_debut) }}"
                        required
                        readonly
                        data-review="date_debut"
                    >

                </div>

            </div>

        </div>

        {{-- ==================================================
            DATE DE FIN ESTIMÉE
        =================================================== --}}

        <div class="col-md-6">

            <div class="futureField">

                <label>
                    <i class="fa fa-calendar-xmark"></i>
                    Date de fin estimée
                </label>

                <div class="futureInput">

                    <i class="fa fa-calendar-xmark inputIcon"></i>

                    <input
                        type="date"
                        name="date_fin_estimee"
                        class="form-control"
                        value="{{ old('date_fin_estimee', $value->date_fin_estimee) }}"
                        readonly
                        data-review="date_fin_estimee"
                    >

                </div>

            </div>

        </div>

        {{-- ==================================================
            CRÉATEUR DU GROUPE
        =================================================== --}}

        <div class="col-md-6">

            <div class="futureField">

                <label>
                    <i class="fa fa-user-plus"></i>
                    Créateur du groupe
                </label>

                <div class="futureInput">

                    <i class="fa fa-user-plus inputIcon"></i>

                    <select
                        name="createur_id"
                        class="futureSelect"
                        required
                        disabled
                        data-review="createur_id"
                    >

                        <option value="">
                            Sélectionner le créateur
                        </option>

                        @foreach($users ?? [] as $user)

                            <option
                                value="{{ $user->id }}"
                                {{
                                    old(
                                        'createur_id',
                                        $value->createur_id
                                    ) == $user->id
                                        ? 'selected'
                                        : ''
                                }}
                            >
                                {{ $user->name }} {{ $user->prenom }}
                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

        </div>

        {{-- ==================================================
            STATUT DU GROUPE
        =================================================== --}}

        <div class="col-md-6">

            <div class="futureField">

                <label>
                    <i class="fa fa-circle-check"></i>
                    Statut du groupe
                </label>

                <div class="futureInput">

                    <i class="fa fa-circle-check inputIcon"></i>

                    <select
                        name="statut_id"
                        class="futureSelect"
                        required
                        disabled
                        data-review="statut_id"
                    >

                        <option value="">
                            Sélectionner le statut
                        </option>

                        @foreach($statutsGroupe ?? [] as $statut)

                            <option
                                value="{{ $statut->id }}"
                                {{
                                    old(
                                        'statut_id',
                                        $value->statut_id
                                    ) == $statut->id
                                        ? 'selected'
                                        : ''
                                }}
                            >
                                {{ $statut->libelle }}
                            </option>

                        @endforeach

                    </select>

                </div>

            </div>

        </div>

        {{-- ==================================================
            INFORMATIONS COMPLÉMENTAIRES
        =================================================== --}}

        <div class="col-md-12">

            <div class="futureFinal">

                <i class="fa fa-calendar-days"></i>

                <h3>
                    Période et administration
                </h3>

                <p>
                    Définissez la période de fonctionnement du groupe,
                    son créateur ainsi que son statut initial.
                </p>

            </div>

        </div>

    </div>

</div>


</section>

{{-- ============================================================
STEP 4 FIN — READ ONLY
============================================================ --}}
