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
                                    class="futureSelect"
                                    disabled
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
                                    value="{{
                                        optional($value->pieces->first())->numero
                                        ?? 'Non renseigné'
                                    }}"
                                    readonly
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
                                    type="text"
                                    value="{{
                                        optional($value->pieces->first())->date_expiration

                                        ? \Carbon\Carbon::parse(
                                            $value->pieces->first()->date_expiration
                                        )->format('d/m/Y')

                                        : 'Non renseignée'
                                    }}"
                                    readonly
                                >

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         DOCUMENT
                    ================================================== --}}

                    <div class="col-md-12 inter-input">

                        <div class="futureField">

                            <label>

                                <i class="fa fa-file-alt"></i>

                                Document d'identité

                            </label>


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
                                                    height:500px;
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
                                                    min-height:400px;
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
                                                        max-height:500px;
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


                            @else

                                {{-- =================================================
                                     AUCUN DOCUMENT
                                ================================================== --}}

                                <div class="futureFile">

                                    <div
                                        class="futureFileBox"
                                        style="
                                            min-height:220px;
                                            cursor:default;
                                        "
                                    >

                                        <div class="futureFileIcon">

                                            <i class="fa fa-file"></i>

                                        </div>


                                        <div class="futureFileTitle">

                                            Aucun document

                                        </div>


                                        <p class="futureFileSubTitle">

                                            Aucun document d'identité
                                            n'est associé à cet utilisateur.

                                        </p>

                                    </div>

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- =================================================
                         INFORMATION
                    ================================================== --}}

                    <div class="col-md-12">

                        <div class="futureFinal">

                            <h3>

                                Document d'identité

                            </h3>


                            <p>

                                Les informations et le document d'identité
                                associés à cet utilisateur sont présentés
                                en consultation uniquement.

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
