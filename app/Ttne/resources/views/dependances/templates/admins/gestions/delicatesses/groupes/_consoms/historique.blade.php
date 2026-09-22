@if($historiques->count() > 0)

    @foreach($historiques as $historique)

        @php

            $action = strtolower($historique->action);

            $actionClass = match($action){

                'create' => 'futureHistoryCreate',
                'update' => 'futureHistoryUpdate',
                'delete' => 'futureHistoryDelete',
                'restore' => 'futureHistoryRestore',

                default => 'futureHistoryDefault'

            };

            $actionIcon = match($action){

                'create' => 'fa-plus',
                'update' => 'fa-edit',
                'delete' => 'fa-trash',
                'restore' => 'fa-undo',

                default => 'fa-history'

            };

        @endphp

        <div class="futureHistoryItem">

            <div class="futureHistoryItemIcon {{ $actionClass }}">

                <i class="fa {{ $actionIcon }}"></i>

            </div>

            <div class="futureHistoryContent">

                <div class="futureHistoryTop">

                    <div class="futureHistoryAction">

                        {{ ucfirst($historique->action) }}

                    </div>

                    <div class="futureHistoryDate">

                        {{ $historique->created_at->diffForHumans() }}

                    </div>

                </div>

                <div class="futureHistoryText">

                    <strong>

                        {{ $historique->record_name ?? 'Enregistrement' }}

                    </strong>

                    a subi une action de type

                    <strong>

                        {{ ucfirst($historique->action) }}

                    </strong>

                </div>

                <div class="futureHistoryUser">

                    <i class="fa fa-user-circle"></i>

                    {{ $historique->user->name ?? 'Système' }}

                </div>

            </div>

        </div>

    @endforeach

@else

    <div class="futureHistoryEmpty">

        <i class="fa fa-history"></i>

        <h5>

            Aucun historique disponible

        </h5>

        <p>

            Aucun événement n’a encore été enregistré.

        </p>

    </div>

@endif