{{-- MOBILE TABLE DEBUT --}}
    <section>
        <div>
             <div class="futureMobileCards">

                                    @foreach($corbeilles as $key => $value)

                                    <div class="futureMobileCard"data-row="{{ $value->id }}" >

                                        {{-- TOP --}}
                                        <div class="futureMobileTop">

                                            <div>

                                                <h5>

                                                    {{ $value->slug }}

                                                </h5>

                                                <p>

                                                    {{ $value->type }}

                                                </p>

                                            </div>



                                            <input
                                                type="checkbox"
                                                class="futureCheckbox futureMobileCheckbox"
                                                data-row="{{ $value->id }}"
                                            >

                                        </div>



                                        {{-- BODY --}}
                                        <div class="futureMobileBody">

                                            <div class="futureMobileItem">

                                                <span>

                                                    #

                                                </span>

                                                <strong>

                                                    {{ $key + 1 }}

                                                </strong>

                                            </div>



                                            <div class="futureMobileItem">

                                                <span>

                                                    SLUG

                                                </span>

                                                <strong>

                                                    {{ $value->slug }}

                                                </strong>

                                            </div>



                                            <div class="futureMobileItem">

                                                <span>

                                                    TYPE

                                                </span>

                                                <strong>

                                                    {{ $value->type }}

                                                </strong>

                                            </div>



                                            <div class="futureMobileItem">

                                                <span>
                                                    RESPONSABLE
                                                </span>

                                                <strong>
                                                    @if($value->deleted_by && $value->user)
                                                        {{ $value->user->name }} {{ $value->user->prenom }}
                                                    @else
                                                        L'auteur n'était pas connecté
                                                    @endif
                                                </strong>

                                            </div>

                                        </div>



                                        {{-- MOBILE ACTIONS --}}
                                        <div class="futureMobileActions">

                                            {{-- CONSULTER --}}
                                            <button
                                                class="futureMiniBtn infoBtn"
                                                data-bs-toggle="tooltip"
                                                data-placement="bottom"
                                                data-toggle="modal"
                                                data-target="#consulter{{$value->id}}"
                                                title="Consulter"
                                                type="button"
                                            >

                                                <i class="fa fa-eye"></i>

                                            </button>



                                            {{-- MODIFIER --}}
                                            <button
                                                class="futureMiniBtn warningBtn"
                                                data-bs-toggle="tooltip"
                                                data-placement="bottom"
                                                data-toggle="modal"
                                                data-target="#restorer{{$value->id}}"
                                                title="Modifier"
                                                type="button"
                                            >

                                                <i class="fa fa-undo"></i>

                                            </button>



                                            {{-- CORBEILLE --}}
                                            <button
                                                class="futureMiniBtn dangerBtn"
                                                data-bs-toggle="tooltip"
                                                data-placement="bottom"
                                                data-toggle="modal"
                                                data-target="#corbeille{{$value->id}}"
                                                title="Supprimer"
                                                type="button"
                                            >

                                                <i class="fa fa-trash"></i>

                                            </button>

                                        </div>

                                    </div>

                                    @endforeach

                                </div>
        </div>
    </section>
{{-- MOBILE TABLE FIN --}}
