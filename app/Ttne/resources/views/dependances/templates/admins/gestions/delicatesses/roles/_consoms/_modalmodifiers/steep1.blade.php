
{{-- ============================================================
    STEP 1 DEBUT
============================================================ --}}

<section class="steep-1">

    <div class="steep-01">

        <div class="container-fluid mb-4">

            <div class="row g-4 p-2">

                {{-- ==================================================
                    NOM DU GROUPE
                =================================================== --}}

                <div class="col-md-6">

                    <div class="futureField">

                        <label>
                            <i class="fa fa-users"></i>
                            Nom du groupe
                        </label>

                        <div class="futureInput">

                            <i class="fa fa-users inputIcon"></i>

                            <input
                                type="text"
                                name="nom"
                                class="form-control"
                                placeholder="Entrer le nom du groupe"
                                value="{{ old('nom', $value->nom) }}"
                                maxlength="255"
                                required
                                data-review="nom"
                            >

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                    VISIBILITÉ
                =================================================== --}}

                <div class="col-md-6">

                    <div class="futureField">

                        <label>
                            <i class="fa fa-eye"></i>
                            Visibilité
                        </label>

                        <div class="futureInput">

                            <i class="fa fa-eye inputIcon"></i>

                            <select
                                name="visibilite_id"
                                class="futureSelect"
                                required
                                data-review="visibilite_id"
                            >

                                <option value="">
                                    Sélectionner une visibilité
                                </option>

                                @foreach($visibilites ?? [] as $visibilite)

                                    <option
                                        value="{{ $visibilite->id }}"
                                        {{
                                            old(
                                                'visibilite_id',
                                                $value->visibilite_id
                                            ) == $visibilite->id
                                                ? 'selected'
                                                : ''
                                        }}
                                    >
                                        {{ $visibilite->libelle }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================
            DESCRIPTION
        ========================================================= --}}

        <div class="container-fluid">

            <div class="row g-4 p-2">

                <div class="col-12 col-md-12 mb-4">

                    <div class="futureField">

                        <label>

                            <i class="fa fa-comment"></i>
                            Description

                        </label>

                        <div class="futureTextarea">

                            <i class="fa fa-align-left inputIcon textareaIcon"></i>

                            <textarea
                                name="description"
                                rows="6"
                                placeholder="Décrire le groupe..."
                                data-review="description"
                            >{{ old('description', $value->description) }}</textarea>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



