{{-- TABLEAU NORMAL DEBUT --}}
    <section>
        <div>
             <div class="futureTableResponsive">

                            <table
                                class="futureTable"
                                data-table="future"
                            >

                                {{-- TABLE HEAD --}}
                                <thead>

                                    <tr>

                                        {{-- CHECKBOX --}}
                                        <th
                                            width="50"
                                            data-export="false"
                                            data-sort="false"
                                        >

                                            <input
                                                type="checkbox"
                                                id="selectAll"
                                                class="futureCheckbox"
                                                data-select-all="future"
                                            >

                                        </th>



                                        {{-- INDEX --}}
                                        <th>

                                            #

                                        </th>



                                        {{-- CODE --}}
                                        <th>

                                            SLUG

                                        </th>



                                        {{-- LIBELLE --}}
                                        <th>

                                            TYPE

                                        </th>



                                        {{-- DESCRIPTION --}}
                                        <th>

                                            RESPONSABLE

                                        </th>



                                        {{-- ACTIONS --}}
                                        <th
                                            width="170"
                                            data-export="false"
                                            data-sort="false"
                                        >

                                            ACTIONS

                                        </th>

                                    </tr>

                                </thead>



                                {{-- TABLE BODY --}}
                                <tbody id="futureTableBody">

                                    @forelse($corbeilles as $key => $value)

                                    <tr
                                        class="futureRow"
                                        data-row="{{ $value->id }}"
                                    >

                                        {{-- CHECKBOX --}}
                                        <td>

                                            <input
                                                type="checkbox"
                                                class="futureCheckbox rowCheckbox"
                                                data-row="{{ $value->id }}"
                                            >

                                        </td>



                                        {{-- INDEX --}}
                                        <td>

                                            {{ $key + 1 }}

                                        </td>



                                        {{-- CODE --}}
                                        <td>

                                            <span class="futureCode">

                                                {{ $value->slug }}

                                            </span>

                                        </td>



                                        {{-- LIBELLE --}}
                                        <td>

                                            {{ $value->type }}

                                        </td>



                                        {{-- DESCRIPTION --}}
                                        <td>

                                            @if($value->deleted_by && $value->user)

                                                {{ $value->user->name }} {{ $value->user->prenom }}

                                            @else

                                                <span class="futureEmptyText">
                                                    L'auteur n'était pas connecté
                                                </span>

                                            @endif

                                        </td>



                                        {{-- ACTIONS --}}
                                        <td>

                                            <div class="futureActions">

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
                                               <i class="fa fa-reply"></i>



                                                </button>



                                                {{-- DELETE --}}
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

                                        </td>

                                    </tr>

                                    @empty

                                    {{-- EMPTY --}}
                                    <tr>

                                        <td colspan="6">

                                            <div class="futureEmpty">

                                                <i class="fa fa-database mb-3"></i>

                                                <h5>

                                                    Aucune donnée trouvée

                                                </h5>

                                            </div>

                                        </td>

                                    </tr>

                                    @endforelse

                                </tbody>

                            </table>

                        </div>
        </div>
    </section>
{{-- TABLEAU NORMAL FIN --}}
