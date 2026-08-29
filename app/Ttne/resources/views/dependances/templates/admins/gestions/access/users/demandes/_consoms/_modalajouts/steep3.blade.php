{{-- STEEP 3 DEBUT --}}
    <section class="steep-3">
        <div class="steep-03">
            <div class="container-fluid">
                <div class="row g-4 p-2">
                    <!-- TYPE DE PIÈCE -->
                    <div class="col-md-4">
                        <div class="futureField">
                            <label>
                                <i class="fa fa-id-card"></i>
                                Type de pièce
                            </label>
                            <div class="futureInput">
                                <i class="fa fa-ticket-alt inputIcon"></i>
                                {{-- <i class="fa fa-card "></i> --}}
                                <select name="type_piece_id" class="futureSelect" required>
                                    <option value="">
                                        Sélectionner le type de pièce
                                    </option>
                                    @foreach($typesPieces ?? [] as $typePiece)
                                        <option value="{{ $typePiece->id }}">
                                            {{ $typePiece->libelle }}
                                       </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- NUMÉRO -->
                    <div class="col-md-4">
                        <div class="futureField">
                            <label>
                                <i class="fa fa-hashtag"></i>
                                Numéro de la pièce
                                </label>
                                <div class="futureInput">
                                    <i class="fa fa-hashtag inputIcon"></i>
                                    <input type="text" name="numero" class="form-control" placeholder="Entrer le numéro de la pièce"  required>

                                </div>

                        </div>

                    </div>
                    <!-- DATE D'EXPIRATION -->
                    <div class="col-md-4">
                        <div class="futureField">
                            <label>
                                <i class="fa fa-calendar-times"></i>
                                    Date d'expiration
                            </label>
                            <div class="futureInput">
                                <i class="fa fa-calendar-times inputIcon"></i>

                                <input type="date" name="date_expiration" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- FICHIER -->
                    <div class="col-md-12 inter-input">
                        <div class="futureField">
                            <label>
                                <i class="fa fa-file-alt"></i>
                                    Document d'identité
                            </label>
                             <div class="futureFile">
                                <input type="file" name="fichier" class="futureFileInput"  accept=".pdf,image/png,image/jpeg,image/jpg,image/webp" required>
                                <div class="futureFileBox">
                                    <div class="futureFileIcon">
                                              <i class="fa fa-cloud-upload"></i>
                                    </div>
                                     <div class="futureFileTitle">
                                         Sélectionner le document
                                    </div>
                                    <p class="futureFileSubTitle">
                                        PDF, PNG, JPG, WEBP...
                                    </p>

                                    <div class="futureFileName"></div>

                                </div>

                            </div>






                        </div>





                    </div>
                    <!-- INFORMATION -->
                    <div class="col-md-12">
                        <div class="futureFinal">
                            {{-- <i class="fa fa-shield"></i> --}}
                            <h3>

                                Document d'identité
                            </h3>
                            <p>
                                Veuillez fournir une pièce d'identité
                                valide afin de permettre la vérification
                                du compte utilisateur.
                            </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{-- STEEP 3 FIN --}}
