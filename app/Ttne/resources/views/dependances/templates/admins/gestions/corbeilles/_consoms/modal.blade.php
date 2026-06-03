<section>
    {{-- MODALS DEBUT --}}
        <div>
            {{-- TOUT SUPPRIMER DEBUT --}}
                <div class="suprression-selection">
                    @include('dependances.templates.admins.gestions.corbeilles._consoms.toutsupprimer')
                </div>
            {{-- TOUT SUPPRIMER FIN --}}
            {{-- TOUT RECUPERER DEBUT --}}
                <div class="restorer-selection">
                    @include('dependances.templates.admins.gestions.corbeilles._consoms.toutrestorer')
                </div>
            {{-- TOUT RECUPERER FIN --}}

            {{-- AUTRES MODALS DEBUT --}}
                @foreach($corbeilles as $key => $value)
                    {{-- CONSULTER DEBUT --}}
                        <div id="consulter{{$value->id}}" class="modal modal-edu-general fade futuristicModal" tabindex="-1" role="dialog" aria-hidden="true">

                            @php
                                $snapshot = $value->data_snapshot;
                            @endphp

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
                                                    <h4 class="modal-title futuristicTitle"> Consultation de : {{$value->slug}} </h4>
                                                    <p class="futuristicSubTitle">Info avancée du système</p>
                                                </div>
                                            </div>
                                            <button type="button" class="close futuristicClose" data-dismiss="modal">
                                                <span>&times;</span>
                                            </button>
                                        </div>

                                        {{-- BODY --}}
                                        <div class="modal-body futuristicBody">

                                            <div class="form">

                                                <div class="container-fluid mb-3">
                                                    <div class="row">
                                                        {{-- SLUG --}}
                                                        <div class="col-12 col-md-6 mb-4">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-code"></i>
                                                                    Slug
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-code inputIcon"></i>
                                                                    <input type="text" name="slug" value="{{$value->slug}}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 mb-4">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-hurricane"></i>
                                                                    Type
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-link inputIcon"></i>
                                                                    <input type="text" name="type" value="{{$value->type}}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="container-fluid">
                                                    <div>
                                                        <h4 class="modal-title futuristicTitle p-2"> Autres Info </h4>
                                                    </div>

                                                    <div class="row pt-2">

                                                        @foreach($snapshot as $key => $item)

                                                            <div class="col-12 col-md-6 ">

                                                                <div class="futureField">

                                                                    <label>

                                                                        <i class="fa fa-server"></i>

                                                                        {{ ucfirst(str_replace('_', ' ', $key)) }}

                                                                    </label>

                                                                    <div class="futureInput">

                                                                        <i class="fa fa-database inputIcon"></i>

                                                                        <input
                                                                            type="text"
                                                                            value="{{ is_array($item) ? json_encode($item) : $item }}"
                                                                            readonly
                                                                        >

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        @endforeach

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

                                        </div>

                                    </div>

                                </div>

                        </div>
                    {{-- CONSULTER FIN --}}
                    {{-- MODIFICATION DEBUT --}}
                        <div id="restorer{{$value->id}}" class="modal modal-edu-general fade futuristicModal" tabindex="-1" role="dialog" aria-hidden="true">

                            <div class="modal-dialog modal-xl modal-dialog-centered">

                                <div class="modal-content futuristicContent">

                                    {{-- BACK LIGHT --}}
                                    <div class="modalLight"></div>

                                    {{-- HEADER --}}
                                    <div class="modal-header futuristicHeader">

                                        <div class="headerLeft">

                                            <div class="headerIcon">
                                                <i class="fa fa-recycle"></i>
                                            </div>

                                            <div>

                                                <h4 class="modal-title futuristicTitle">

                                                    Restoration de : {{$value->slug}}

                                                </h4>

                                                <p class="futuristicSubTitle">

                                                    Restoration avancée du système fintech

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
                                    <form method="POST" action="{{route('RestorerCorbeille')}}" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                        @csrf

                                        {{-- BODY --}}
                                        <div class="modal-body futuristicBody">
                                            <div class="form">

                                                <div class="container-fluid mb-3">
                                                    <div class="row">
                                                        {{-- SLUG --}}
                                                        <div class="col-12 col-md-6 mb-4">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-code"></i>
                                                                    Slug
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-code inputIcon"></i>
                                                                    <input type="text" name="slug" value="{{$value->slug}}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 mb-4">
                                                            <div class="futureField">
                                                                <label>
                                                                    <i class="fa fa-hurricane"></i>
                                                                    Type
                                                                </label>
                                                                <div class="futureInput">
                                                                    <i class="fa fa-link inputIcon"></i>
                                                                    <input type="text" name="type" value="{{$value->type}}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="container-fluid">
                                                    <div>
                                                        <h4 class="modal-title futuristicTitle p-2"> Autres Info </h4>
                                                    </div>

                                                    <div class="row pt-2">

                                                        @foreach($snapshot as $key => $item)

                                                            <div class="col-12 col-md-6 ">

                                                                <div class="futureField">

                                                                    <label>

                                                                        <i class="fa fa-server"></i>

                                                                        {{ ucfirst(str_replace('_', ' ', $key)) }}

                                                                    </label>

                                                                    <div class="futureInput">

                                                                        <i class="fa fa-database inputIcon"></i>

                                                                        <input
                                                                            type="text"
                                                                            value="{{ is_array($item) ? json_encode($item) : $item }}"
                                                                            readonly
                                                                        >

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        @endforeach

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

                                               <i class="fa fa-recycle"></i>

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

                                                    Suppression de : {{$value->slug}}

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
                                    <form method="POST" action="{{route('SupprimerCorbeille')}}" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                        @csrf

                                        {{-- BODY --}}
                                        <div class="modal-body futuristicBody">
                                            <div class="">
                                                <div class="form">

                                                    <div class="container-fluid mb-3">
                                                        <div class="row">
                                                            {{-- SLUG --}}
                                                            <div class="col-12 col-md-6 mb-4">
                                                                <div class="futureField">
                                                                    <label>
                                                                        <i class="fa fa-code"></i>
                                                                        Slug
                                                                    </label>
                                                                    <div class="futureInput">
                                                                        <i class="fa fa-code inputIcon"></i>
                                                                        <input type="text" name="slug" value="{{$value->slug}}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 mb-4">
                                                                <div class="futureField">
                                                                    <label>
                                                                        <i class="fa fa-hurricane"></i>
                                                                        Type
                                                                    </label>
                                                                    <div class="futureInput">
                                                                        <i class="fa fa-link inputIcon"></i>
                                                                        <input type="text" name="type" value="{{$value->type}}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="container-fluid">
                                                        <div>
                                                            <h4 class="modal-title futuristicTitle p-2"> Autres Info </h4>
                                                        </div>

                                                        <div class="row pt-2">

                                                            @foreach($snapshot as $key => $item)

                                                                <div class="col-12 col-md-6 ">

                                                                    <div class="futureField">

                                                                        <label>

                                                                            <i class="fa fa-server"></i>

                                                                            {{ ucfirst(str_replace('_', ' ', $key)) }}

                                                                        </label>

                                                                        <div class="futureInput">

                                                                            <i class="fa fa-database inputIcon"></i>

                                                                            <input
                                                                                type="text"
                                                                                value="{{ is_array($item) ? json_encode($item) : $item }}"
                                                                                readonly
                                                                            >

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            @endforeach

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

