{{-- =========================================================
     STEP 3
     IDENTITÉ / PIÈCE D'IDENTITÉ
========================================================= --}}

<div class="stepContent" data-content="3">

    <section class="steep-3">

        <div class="steep-03">

            <div class="container-fluid">

                <div class="row g-4 p-2">


                    {{-- =================================================
                         TYPE DE PIÈCE
                    ================================================== --}}

                    <div class="col-md-4">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-id-card"></i>

                                Type de pièce

                            </label>


                            <div class="futureInput">

                                <i class="fa fa-ticket-alt inputIcon"></i>


                                <select
                                    name="type_piece_id"
                                    class="futureSelect"
                                    required
                                >

                                    <option value="">

                                        Sélectionner le type de pièce

                                    </option>


                                    @foreach($typesPieces ?? [] as $typePiece)

                                        <option
                                            value="{{ $typePiece->id }}"

                                            @if(
                                                isset($value->pieces) &&
                                                $value->pieces->first() &&
                                                $value->pieces->first()->type_piece_id == $typePiece->id
                                            )
                                                selected
                                            @endif
                                        >

                                            {{ $typePiece->libelle }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         NUMÉRO DE LA PIÈCE
                    ================================================== --}}

                    <div class="col-md-4">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-hashtag"></i>

                                Numéro de la pièce

                            </label>


                            <div class="futureInput">

                                <i class="fa fa-hashtag inputIcon"></i>


                                <input
                                    type="text"
                                    name="numero"
                                    class="form-control"
                                    value="{{ optional($value->pieces->first())->numero ?? '' }}"
                                    placeholder="Entrer le numéro de la pièce"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         DATE D'EXPIRATION
                    ================================================== --}}

                    <div class="col-md-4">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-calendar-times"></i>

                                Date d'expiration

                            </label>


                            <div class="futureInput">

                                <i class="fa fa-calendar-times inputIcon"></i>


                                <input
                                    type="date"
                                    name="date_expiration"
                                    class="form-control"

                                    value="{{
                                        optional($value->pieces->first())->date_expiration
                                        ? \Carbon\Carbon::parse(
                                            $value->pieces->first()->date_expiration
                                        )->format('Y-m-d')
                                        : ''
                                    }}"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         DOCUMENT ACTUEL
                    ================================================== --}}

                    @php

                        $piece = $value->pieces->first();

                    @endphp


                    @if($piece && $piece->fichier)

                        @php

                            $extension = strtolower(
                                pathinfo(
                                    $piece->fichier,
                                    PATHINFO_EXTENSION
                                )
                            );

                            $documentUrl = asset(
                                'storage/' . $piece->fichier
                            );

                        @endphp


                        {{-- =================================================
                             APERÇU DU DOCUMENT ACTUEL
                        ================================================== --}}

                        <div class="col-md-12 inter-input">

                            <div class="futureField">

                                <label>

                                    <i class="fa fa-file-alt"></i>

                                    Document actuel

                                </label>


                                <div class="futureFile">

                                    <div
                                        class="futureFileBox"
                                        style="
                                            min-height:220px;
                                            cursor:default;
                                        "
                                    >


                                        {{-- =================================================
                                             PDF
                                        ================================================== --}}

                                        @if($extension === 'pdf')

                                            <div
                                                style="
                                                    width:100%;
                                                    height:400px;
                                                    overflow:hidden;
                                                    border-radius:12px;
                                                    background:rgba(0,0,0,.25);
                                                    border:1px solid rgba(255,255,255,.08);
                                                "
                                            >

                                                <iframe
                                                    src="{{ $documentUrl }}"
                                                    title="Document PDF"
                                                    style="
                                                        width:100%;
                                                        height:100%;
                                                        border:none;
                                                    "
                                                ></iframe>

                                            </div>


                                        {{-- =================================================
                                             IMAGE
                                        ================================================== --}}

                                        @elseif(
                                            in_array(
                                                $extension,
                                                [
                                                    'jpg',
                                                    'jpeg',
                                                    'png',
                                                    'webp',
                                                    'jfif'
                                                ]
                                            )
                                        )

                                            <div
                                                style="
                                                    width:100%;
                                                    min-height:350px;
                                                    display:flex;
                                                    align-items:center;
                                                    justify-content:center;
                                                    overflow:auto;
                                                    border-radius:12px;
                                                    background:rgba(0,0,0,.25);
                                                    border:1px solid rgba(255,255,255,.08);
                                                    padding:20px;
                                                "
                                            >

                                                <img
                                                    src="{{ $documentUrl }}"
                                                    alt="Document d'identité"
                                                    style="
                                                        max-width:100%;
                                                        max-height:450px;
                                                        object-fit:contain;
                                                        border-radius:8px;
                                                    "
                                                >

                                            </div>


                                        {{-- =================================================
                                             AUTRE FORMAT
                                        ================================================== --}}

                                        @else

                                            <div class="futureEmpty">

                                                <i class="fa fa-file fa-3x mb-3"></i>

                                                <h5>

                                                    Aperçu indisponible

                                                </h5>

                                                <p>

                                                    Ce type de fichier ne peut pas
                                                    être affiché directement.

                                                </p>

                                            </div>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endif


                    {{-- =================================================
                         REMPLACER LE DOCUMENT
                    ================================================== --}}

                    <div class="col-md-12">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-file-upload"></i>

                                {{ $piece && $piece->fichier
                                    ? 'Remplacer le document'
                                    : 'Document d\'identité'
                                }}

                            </label>


                            <div class="futureFile">

                                <input
                                    type="file"
                                    name="fichier"
                                    class="futureFileInput"
                                    accept=".pdf,image/png,image/jpeg,image/jpg,image/webp"
                                >


                                <div class="futureFileBox">

                                    <div class="futureFileIcon">

                                        <i class="fa fa-cloud-upload"></i>

                                    </div>


                                    <div class="futureFileTitle">

                                        {{ $piece && $piece->fichier
                                            ? 'Sélectionner un nouveau document'
                                            : 'Sélectionner le document'
                                        }}

                                    </div>


                                    <p class="futureFileSubTitle">

                                        PDF, PNG, JPG, WEBP...

                                    </p>


                                    <div class="futureFileName"></div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         INFORMATION
                    ================================================== --}}

                    <div class="col-md-12">

                        <div class="futureFinal">

                            <i class="fa fa-id-card"></i>

                            <h3>

                                Document d'identité

                            </h3>


                            <p>

                                Vous pouvez modifier les informations
                                de la pièce d'identité ou remplacer
                                le document actuellement enregistré.

                            </p>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </section>

</div>

{{-- =========================================================
     STEP 3 FIN
========================================================= --}}
