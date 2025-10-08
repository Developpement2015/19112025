<!-- ajouter mutation - modal-->
<div class="modal fade" id="addmutation">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Ajouter mutation</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="{{ route('historique-mutation.add') }}" method="post" class="mtaddform"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="fonctionnaire_id" value="{{ $fonctionnaire->id }}" />
                            <style>
                                .mtaddform label {
                                    color: white;
                                    font-weight: 700;
                                }
                            </style>
                            <div class="row"
                                style="background: rgba(139, 0, 139, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="typemutation">Type de mutation</label>
                                        @php
                                            $lastMutation = \App\Models\HistoriqueMutation::where(
                                                'fonctionnaire_id',
                                                $fonctionnaire->id,
                                            )->latest()->first();
                                            $old_type_mutation_id = $lastMutation ? $lastMutation->type_mutation_id : $fonctionnaire->type_mutation;
                                        @endphp
                                        <select name="type_mutation_id" id="typemutation"
                                            class="form-select searchable-select">
                                            <option value="" disabled selected>Choisir un type de mutation
                                            </option>
                                            @foreach (\App\Models\TypeMutation::all() as $item)
                                                <option {{ $item->id == $old_type_mutation_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }} /
                                                    {{ $item->nom_arabe }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_mutation">Date de mutation</label>
                                        @php
                                            $lastMutationDate = \App\Models\HistoriqueMutation::where(
                                                'fonctionnaire_id',
                                                $fonctionnaire->id,
                                            )->latest()->first();
                                            $old_type_mutation_date = $lastMutationDate ? $lastMutationDate->date_mutation : $fonctionnaire->date_mutation;
                                        @endphp
                                        <input type="date" name="date_mutation" id="date_mutation"
                                            class="form-control"
                                            value="{{ \Carbon\Carbon::parse($old_type_mutation_date)->format('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row"
                                style="background: rgba(0, 137, 139, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_note">Date de note</label>
                                        <input type="date" name="date_note" id="date_note"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ref_note">Référence de la note</label>
                                        <input type="text" name="ref_note" id="ref_note" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row"
                                style="background: rgba(139, 23, 0, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="fichiers_notes">Fichier de la note</label>
                                        <input type="file" name="fichiers_notes" id="fichiers_notes"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formation_sanitaire_origine_id">Formation
                                            sanitaire d'origine</label>
                                        @php
                                            $last_mutation = \App\Models\HistoriqueMutation::where(
                                                'fonctionnaire_id',
                                                $fonctionnaire->id,
                                            )
                                                ->orderBy('created_at', 'desc')
                                                ->first();
                                            $old_type_mutation_nomformation = $last_mutation
                                                ? $last_mutation->formation_sanitaire_destination_id
                                                : $fonctionnaire->nom_formation_sanitaire_id;
                                            $old_type_mutation_nomformation =
                                                $fonctionnaire->nom_formation_sanitaire_id;
                                        @endphp

                                        <input type="hidden" name="formation_sanitaire_origine_id"
                                            value="{{ $old_type_mutation_nomformation }}">

                                        <select class="form-select " disabled>
                                            <option value="" disabled selected>Choisir...</option>
                                            @foreach (\App\Models\NomFormationSanitaire::all() as $item)
                                                @php
                                                    $villeName = optional(optional($item->arrondissement_commune)->ville)->nom ?? '';
                                                @endphp
                                                <option
                                                    {{ $item->id == $old_type_mutation_nomformation ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom ?? '' }} / {{ $villeName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row"
                                style="background: rgba(19, 139, 0, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formation_sanitaire_destination_id">Formation
                                            sanitaire de destination</label>
                                        <select name="formation_sanitaire_destination_id"
                                            class="form-select searchable-select">
                                            <option value="" disabled selected>Choisir...</option>
                                            @foreach (\App\Models\NomFormationSanitaire::all() as $item)
                                                @php $villeName = optional(optional($item->arrondissement_commune)->ville)->nom ?? ''; @endphp
                                                <option value="{{ $item->id }}">{{ $item->nom ?? '' }} / {{ $villeName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="remarque">Remarque</label>
                                        <textarea name="remarque" id="remarque" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row"
                                style="background: rgba(139, 0, 139, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_prise_en_service">Date de prise en
                                            service</label>
                                        <input type="date" name="date_prise_en_service" id="date_prise_en_service"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_cessation_service">Date de cessation de
                                            service</label>
                                        <input type="date" name="date_cessation_service"
                                            id="date_cessation_service" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row"
                                style="background: rgba(139, 97, 0, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ancien_service_id">Ancien service</label>
                                        @php
                                            $lastMutationService = \App\Models\HistoriqueMutation::where(
                                                'fonctionnaire_id',
                                                $fonctionnaire->id,
                                            )->latest()->first();
                                            $old_type_mutation_service = $lastMutationService ? $lastMutationService->nouveau_service_id : $fonctionnaire->service_id;
                                            $old_type_mutation_service = $fonctionnaire->service_id;
                                        @endphp
                                        <input type="hidden" name="ancien_service_id"
                                            value="{{ $old_type_mutation_service }}">
                                        <select class="form-select searchable-select" disabled>
                                            <option value="" disabled selected>Choisir...</option>
                                            @foreach (\App\Models\Service::all() as $item)
                                                <option {{ $item->id == $old_type_mutation_service ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nouveau_service_id">Nouveau service</label>
                                        <select name="nouveau_service_id" class="form-select searchable-select">
                                            <option value="" disabled selected>Choisir...</option>
                                            @foreach (\App\Models\Service::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row"
                                style="background: rgba(2, 0, 139, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ancien_fonction_id">Ancienne fonction</label>
                                        @php
                                            $lastMutationFonction = \App\Models\HistoriqueMutation::where(
                                                'fonctionnaire_id',
                                                $fonctionnaire->id,
                                            )->latest()->first();
                                            $old_type_mutation_fonction = $lastMutationFonction ? $lastMutationFonction->nouveau_fonction_id : $fonctionnaire->fonction_id;
                                            $old_type_mutation_fonction = $fonctionnaire->fonction_id;
                                        @endphp
                                        <input type="hidden" name="ancien_fonction_id"
                                            value="{{ $old_type_mutation_fonction }}">
                                        <select disabled class="form-select searchable-select" readonly>
                                            <option value="" disabled selected>Choisir...</option>
                                            @foreach (\App\Models\Fonction::all() as $item)
                                                <option
                                                    {{ $item->id == $old_type_mutation_fonction ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nouveau_fonction_id">Nouvelle fonction</label>

                                        <select name="nouveau_fonction_id" class="form-select searchable-select">
                                            <option value="" disabled selected>Choisir...</option>
                                            @foreach (\App\Models\Fonction::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row"
                                style="background: rgba(139, 0, 95, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ancien_specialite_id">Ancienne
                                            Spécialité</label>
                                        @php
                                            $lastMutationSpecialite = \App\Models\HistoriqueMutation::where(
                                                'fonctionnaire_id',
                                                $fonctionnaire->id,
                                            )->latest()->first();
                                            $old_type_mutation_specialite = $lastMutationSpecialite ? $lastMutationSpecialite->nouveau_specialite_id : $fonctionnaire->specialite_grade_id;
                                            $old_type_mutation_specialite = $fonctionnaire->specialite_grade_id;
                                        @endphp
                                        <input type="hidden" name="ancien_specialite_id"
                                            value="{{ $old_type_mutation_specialite }}">
                                        <select disabled class="form-select searchable-select" readonly>
                                            <option value="" disabled selected>Choisir...</option>
                                            @foreach (\App\Models\SpecialiteGrade::all() as $item)
                                                <option
                                                    {{ $item->id == $old_type_mutation_specialite ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nouveau_specialite_id">Nouvelle
                                            Spécialité</label>
                                        <select name="nouveau_specialite_id" class="form-select searchable-select">
                                            <option value="" disabled selected>Choisir...</option>
                                            @foreach (\App\Models\SpecialiteGrade::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-submit">Ajouter</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ajouter mutation - modal-->
