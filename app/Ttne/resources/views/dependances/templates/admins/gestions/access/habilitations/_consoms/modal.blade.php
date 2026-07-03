<section>
    {{-- MODALS DEBUT --}}
        <div>
            {{-- AJOUTER DEBUT --}}
                <div id="Ajouter" class="modal modal-edu-general fade futuristicModal" tabindex="-1" role="dialog" aria-hidden="true">

                    <div class="modal-dialog modal-xl modal-dialog-centered">

                        <div class="modal-content futuristicContent">

                            {{-- BACK LIGHT --}}
                            <div class="modalLight"></div>

                            {{-- HEADER --}}
                            <div class="modal-header futuristicHeader">

                                <div class="headerLeft">

                                    <div class="headerIcon">
                                        <i class="fa fa-cogs"></i>
                                    </div>

                                    <div>

                                        <h4 class="modal-title futuristicTitle">

                                            Ajouter une Habilitation

                                        </h4>

                                        <p class="futuristicSubTitle">

                                            Configuration avancée du système fintech

                                        </p>

                                    </div>

                                </div>

                                <button type="button"
                                        class="close futuristicClose"
                                        data-dismiss="modal">

                                    <span>&times;</span>

                                </button>

                            </div>

                            {{-- FORM --}}
                            <form method="POST"
                                action="{{ route('AjouterTypeParametre') }}"
                                enctype="multipart/form-data">

                                @csrf

                                {{-- BODY --}}
                                <div class="modal-body futuristicBody">

                                    <div class="container-fluid">

                                        <div class="row ">

                                            {{-- CODE --}}
                                            <div class="col-12 col-md-6 mb-4 ">

                                                <div class="futureField">

                                                    <label>
                                                        <i class="fa fa-code"></i>
                                                        Code
                                                    </label>

                                                    <div class="futureInput">

                                                        <i class="fa fa-code inputIcon"></i>

                                                        <input type="text"
                                                            name="code"
                                                            placeholder="Entrer le code">

                                                    </div>

                                                </div>

                                            </div>

                                            {{-- LIBELLE --}}
                                            <div class="col-12 col-md-6 mb-4">

                                                <div class="futureField">

                                                    <label>
                                                        <i class="fa fa-crosshairs"></i>
                                                        Libellé
                                                    </label>

                                                    <div class="futureInput">

                                                        <i class="fa fa-pen inputIcon"></i>

                                                        <input type="text"
                                                            name="libelle"
                                                            placeholder="Entrer le libellé"
                                                            required>

                                                    </div>

                                                </div>

                                            </div>



                                        </div>
                                        <div class="row mt-4">

                                            {{-- DESCRIPTION --}}
                                            <div class="col-12 col-md-12 mb-4 ">

                                                <div class="futureField">

                                                    <label class="">
                                                        <i class="fa fa-comment"></i>
                                                        Description
                                                    </label>

                                                    <div class="futureTextarea">

                                                        <i class="fa fa-align-left inputIcon textareaIcon"></i>

                                                        <textarea name="description"
                                                                rows="6"
                                                                placeholder="Entrer la description"></textarea>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                {{-- FOOTER --}}
                                <div class="modal-footer futuristicFooter">

                                    <button type="button"
                                            data-dismiss="modal"
                                            class="futureBtn dangerBtn">

                                        <i class="fa fa-times"></i>

                                        Fermer

                                    </button>

                                    <button type="submit"
                                            class="futureBtn successBtn">

                                        <i class="fa fa-check"></i>

                                        Valider

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            {{-- AJOUTER FIN --}}
            {{-- TOUT METTRE EN CORBEILLE DEBUT --}}
                <div class="suprression-selection">
                    @include('dependances.templates.admins.gestions.access.habilitations._consoms.toutmettrecorbeille')
                </div>
            {{-- TOUT METTRE EN CORBEILLE FIN --}}

            {{-- AUTRES MODALS DEBUT --}}
                @foreach($habilitations as $key => $value)
                    {{-- CONSULTER DEBUT --}}
                        <div id="consulter{{$value->id}}" class="modal modal-edu-general fade futuristicModal" tabindex="-1" role="dialog" aria-hidden="true">

                            <div class="modal-dialog modal-xl modal-dialog-centered">

                                <div class="modal-content futuristicContent">

                                    {{-- BACK LIGHT --}}
                                    <div class="modalLight"></div>

                                    {{-- HEADER --}}
                                    <div class="modal-header futuristicHeader">

                                        <div class="headerLeft">

                                            <div class="headerIcon">
                                                <i class="fa fa-eye"></i>
                                            </div>

                                            <div>

                                                <h4 class="modal-title futuristicTitle">

                                                    Consultation de : {{$value->libelle}}

                                                </h4>

                                                <p class="futuristicSubTitle">

                                                    Info' avancée du système fintech

                                                </p>

                                            </div>

                                        </div>

                                        <button type="button"
                                                class="close futuristicClose"
                                                data-dismiss="modal">

                                            <span>&times;</span>

                                        </button>

                                    </div>

                                    {{-- FORM --}}
                                    <form method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                        @csrf

                                        {{-- BODY --}}
                                        <div class="modal-body futuristicBody">
                                            <div class="form">
                                                <div class="container-fluid">

                                                    <div class="row ">
                                                        {{-- CODE --}}
                                                        <div class="col-12 col-md-6 mb-4 ">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-code"></i>
                                                                    Code
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-code inputIcon"></i>
                                                                    <input type="text" name="code" value="{{$value->code}}" readonly id="consulter{{$value->id}}" placeholder="Entrer le code">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- LIBELLE --}}
                                                        <div class="col-12 col-md-6 mb-4">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-crosshairs"></i>
                                                                    Libellé
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-pencil inputIcon"></i>
                                                                    <input type="text" name="libelle" value="{{$value->libelle}}" readonly id="consulter{{$value->id}}" placeholder="Entrer le libellé" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        {{-- DESCRIPTION --}}
                                                        <div class="col-12 col-md-12 mb-4 ">
                                                            <div class="futureField">
                                                                <label class="">
                                                                    <i class="fa fa-comment"></i>
                                                                    Description
                                                                </label>
                                                                <div class="futureTextarea">
                                                                    <i class="fa fa-align-left inputIcon textareaIcon"></i>
                                                                    @if($value->description !=null)
                                                                        <textarea class="" disabled name="description" value="{{$value->description}}" placeholder="Entrer la description">{{$value->description}}</textarea>
                                                                    @else
                                                                        <textarea class="" disabled name="description" value="{{$value->description}}" placeholder="Entrer la description">Aucune Description</textarea>
                                                                    @endif
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- FOOTER --}}
                                        <div class="modal-footer futuristicFooter">

                                            <button type="button"
                                                    data-dismiss="modal"
                                                    class="futureBtn dangerBtn">

                                                <i class="fa fa-times"></i>

                                                Fermer

                                            </button>

                                            {{-- <button type="submit"
                                                    class="futureBtn successBtn">

                                                <i class="fa fa-check"></i>

                                                Valider

                                            </button> --}}

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>
                    {{-- CONSULTER FIN --}}
                    {{-- MODIFICATION DEBUT --}}
                        <div id="modifier{{$value->id}}" class="modal modal-edu-general fade futuristicModal" tabindex="-1" role="dialog" aria-hidden="true">

                            <div class="modal-dialog modal-xl modal-dialog-centered">

                                <div class="modal-content futuristicContent">

                                    {{-- BACK LIGHT --}}
                                    <div class="modalLight"></div>

                                    {{-- HEADER --}}
                                    <div class="modal-header futuristicHeader">

                                        <div class="headerLeft">

                                            <div class="headerIcon">
                                                <i class="fa fa-steam"></i>
                                            </div>

                                            <div>

                                                <h4 class="modal-title futuristicTitle">

                                                    Modification de : {{$value->libelle}}

                                                </h4>

                                                <p class="futuristicSubTitle">

                                                    Modification avancée du système fintech

                                                </p>

                                            </div>

                                        </div>

                                        <button type="button"
                                                class="close futuristicClose"
                                                data-dismiss="modal">

                                            <span>&times;</span>

                                        </button>

                                    </div>

                                    {{-- FORM --}}
                                    <form method="POST" action="{{route('ModifierTypeParametre')}}" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                        @csrf

                                        {{-- BODY --}}
                                        <div class="modal-body futuristicBody">
                                            <div class="form">
                                                <div class="container-fluid">

                                                    <div class="row ">
                                                        {{-- CODE --}}
                                                        <div class="col-12 col-md-6 mb-4 ">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-code"></i>
                                                                    Code
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-code inputIcon"></i>
                                                                    <input type="text" name="code" value="{{$value->code}}"  id="consulter{{$value->id}}" placeholder="Entrer le code">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- LIBELLE --}}
                                                        <div class="col-12 col-md-6 mb-4">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-crosshairs"></i>
                                                                    Libellé
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-pencil inputIcon"></i>
                                                                    <input type="text" name="libelle" value="{{$value->libelle}}"  id="consulter{{$value->id}}" placeholder="Entrer le libellé" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        {{-- DESCRIPTION --}}
                                                        <div class="col-12 col-md-12 mb-4 ">
                                                            <div class="futureField">
                                                                <label class="">
                                                                    <i class="fa fa-comment"></i>
                                                                    Description
                                                                </label>
                                                                <div class="futureTextarea">
                                                                    <i class="fa fa-align-left inputIcon textareaIcon"></i>
                                                                    @if($value->description !=null)
                                                                        <textarea class=""  name="description" value="{{$value->description}}" placeholder="Entrer la description">{{$value->description}}</textarea>
                                                                    @else
                                                                        <textarea class=""  name="description" value="{{$value->description}}" placeholder="Entrer la description">Aucune Description</textarea>
                                                                    @endif
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- FOOTER --}}
                                        <div class="modal-footer futuristicFooter">

                                            <button type="button"
                                                    data-dismiss="modal"
                                                    class="futureBtn dangerBtn">

                                                <i class="fa fa-times"></i>

                                                Fermer

                                            </button>

                                            <button type="submit"
                                                    class="futureBtn successBtn">

                                                <i class="fa fa-check"></i>

                                                Valider

                                            </button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>
                    {{-- MODIFICATION FIN --}}
                    {{-- CORBEILLE DEBUT --}}
                        <div id="corbeille{{$value->id}}" class="modal modal-edu-general fade futuristicModal" tabindex="-1" role="dialog" aria-hidden="true">

                            <div class="modal-dialog modal-xl modal-dialog-centered">

                                <div class="modal-content futuristicContent">

                                    {{-- BACK LIGHT --}}
                                    <div class="modalLight"></div>

                                    {{-- HEADER --}}
                                    <div class="modal-header futuristicHeader">

                                        <div class="headerLeft">

                                            <div class="headerIcon">
                                                <i class="fa fa-trash"></i>
                                            </div>

                                            <div>

                                                <h4 class="modal-title futuristicTitle">

                                                    Suppression de : {{$value->libelle}}

                                                </h4>

                                                <p class="futuristicSubTitle">

                                                    Suppression avancée du système fintech

                                                </p>

                                            </div>

                                        </div>

                                        <button type="button"
                                                class="close futuristicClose"
                                                data-dismiss="modal">

                                            <span>&times;</span>

                                        </button>

                                    </div>

                                    {{-- FORM --}}
                                    <form method="POST" action="{{route('CorbeilleTypeParametre')}}" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                        @csrf

                                        {{-- BODY --}}
                                        <div class="modal-body futuristicBody">
                                            <div class="form">
                                                <div class="container-fluid">

                                                    <div class="row ">
                                                        {{-- CODE --}}
                                                        <div class="col-12 col-md-6 mb-4 ">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-code"></i>
                                                                    Code
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-code inputIcon"></i>
                                                                    <input type="text" name="code" value="{{$value->code}}" readonly id="consulter{{$value->id}}" placeholder="Entrer le code">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- LIBELLE --}}
                                                        <div class="col-12 col-md-6 mb-4">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-crosshairs"></i>
                                                                    Libellé
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-pencil inputIcon"></i>
                                                                    <input type="text" name="libelle" value="{{$value->libelle}}" readonly id="consulter{{$value->id}}" placeholder="Entrer le libellé" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        {{-- DESCRIPTION --}}
                                                        <div class="col-12 col-md-12 mb-4 ">
                                                            <div class="futureField">
                                                                <label class="">
                                                                    <i class="fa fa-comment"></i>
                                                                    Description
                                                                </label>
                                                                <div class="futureTextarea">
                                                                    <i class="fa fa-align-left inputIcon textareaIcon"></i>
                                                                    @if($value->description !=null)
                                                                        <textarea class="" disabled name="description" value="{{$value->description}}" placeholder="Entrer la description">{{$value->description}}</textarea>
                                                                    @else
                                                                        <textarea class="" disabled name="description" value="{{$value->description}}" placeholder="Entrer la description">Aucune Description</textarea>
                                                                    @endif
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- FOOTER --}}
                                        <div class="modal-footer futuristicFooter">

                                            <button type="button"
                                                    data-dismiss="modal"
                                                    class="futureBtn dangerBtn">

                                                <i class="fa fa-times"></i>

                                                Fermer

                                            </button>

                                            <button type="submit"
                                                    class="futureBtn successBtn">

                                                <i class="fa fa-check"></i>

                                                Valider

                                            </button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>
                    {{-- CORBEILLE FIN --}}
                @endforeach
            {{-- AUTRES MODALS FIN --}}

                <!-- MODAL -->

    {{-- DEBUT --}}

            {{--  --}}
        </div>
    {{-- MODALS FIN --}}
</section>

