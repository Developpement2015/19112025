<!-- modifier mutation - modal-->
<div class="modal fade" id="editmutation-{{ $mutation->id }}">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Modifier mutation - {{ $mutation->ref_note }}</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="{{ route('historique-mutation.update', $mutation->id) }}" method="post" class="mteditform"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="fonctionnaire_id" value="{{ $fonctionnaire->id }}" />
                            <style>
                                .mteditform label {
                                    color: white;
                                    font-weight: 700;
                                }
                            </style>
                            <div class="row"
                                style="background: rgba(139, 0, 139, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="typemutation_edit_{{ $mutation->id }}">Type de mutation</label>
                                        <select name="type_mutation_id" id="typemutation_edit_{{ $mutation->id }}"
                                            class="form-select searchable-select">
                                            <option value="" disabled>Choisir un type de mutation</option>
                                            @foreach (\App\Models\TypeMutation::all() as $item)
                                                <option {{ $item->id == $mutation->type_mutation_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }} /
                                                    {{ $item->nom_arabe }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_mutation_edit_{{ $mutation->id }}">Date de mutation</label>
                                        <input type="date" name="date_mutation" id="date_mutation_edit_{{ $mutation->id }}"
                                            class="form-control"
                                            value="{{ \Carbon\Carbon::parse($mutation->date_mutation)->format('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row"
                                style="background: rgba(0, 137, 139, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_note_edit_{{ $mutation->id }}">Date de note</label>
                                        <input type="date" name="date_note" id="date_note_edit_{{ $mutation->id }}"
                                            class="form-control" value="{{ \Carbon\Carbon::parse($mutation->date_note)->format('Y-m-d') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ref_note_edit_{{ $mutation->id }}">Référence de la note</label>
                                        <input type="text" name="ref_note" id="ref_note_edit_{{ $mutation->id }}" class="form-control"
                                            value="{{ $mutation->ref_note }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row"
                                style="background: rgba(139, 23, 0, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="fichiers_notes_edit_{{ $mutation->id }}">Fichier de la note</label>
                                        <input type="file" name="fichiers_notes" id="fichiers_notes_edit_{{ $mutation->id }}"
                                            class="form-control">
                                        @if($mutation->fichiers_notes && file_exists(storage_path('app/public/' . $mutation->fichiers_notes)))
                                            <small class="text-white">Fichier actuel: <a href="{{ route('files.notes', $mutation->fichiers_notes) }}" target="_blank" class="text-warning">Voir le fichier</a></small>
                                        @elseif($mutation->fichiers_notes)
                                            <small class="text-white text-muted">Fichier introuvable: {{ $mutation->fichiers_notes }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="formation_sanitaire_origine_id_edit_{{ $mutation->id }}">Formation
                                            sanitaire d'origine</label>
                                        <select name="formation_sanitaire_origine_id" id="formation_sanitaire_origine_id_edit_{{ $mutation->id }}"
                                            class="form-select searchable-select">
                                            <option value="" disabled>Choisir...</option>
                                            @foreach (\App\Models\NomFormationSanitaire::all() as $item)
                                                @php $villeName = optional(optional($item->arrondissement_commune)->ville)->nom ?? ''; @endphp
                                                <option
                                                    {{ $item->id == $mutation->formation_sanitaire_origine_id ? 'selected' : '' }}
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
                                        <label class="form-label" for="formation_sanitaire_destination_id_edit_{{ $mutation->id }}">Formation
                                            sanitaire de destination</label>
                                        <select name="formation_sanitaire_destination_id" id="formation_sanitaire_destination_id_edit_{{ $mutation->id }}"
                                            class="form-select searchable-select">
                                            <option value="" disabled>Choisir...</option>
                                            @foreach (\App\Models\NomFormationSanitaire::all() as $item)
                                                @php $villeName = optional(optional($item->arrondissement_commune)->ville)->nom ?? ''; @endphp
                                                <option {{ $item->id == $mutation->formation_sanitaire_destination_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom ?? '' }} / {{ $villeName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="remarque_edit_{{ $mutation->id }}">Remarque</label>
                                        <textarea name="remarque" id="remarque_edit_{{ $mutation->id }}" class="form-control">{{ $mutation->remarque }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row"
                                style="background: rgba(139, 0, 139, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_prise_en_service_edit_{{ $mutation->id }}">Date de prise en
                                            service</label>
                                        <input type="date" name="date_prise_en_service" id="date_prise_en_service_edit_{{ $mutation->id }}"
                                            class="form-control" value="{{ \Carbon\Carbon::parse($mutation->date_prise_en_service)->format('Y-m-d') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_cessation_service_edit_{{ $mutation->id }}">Date de cessation de
                                            service</label>
                                        <input type="date" name="date_cessation_service"
                                            id="date_cessation_service_edit_{{ $mutation->id }}" class="form-control"
                                            value="{{ \Carbon\Carbon::parse($mutation->date_cessation_service)->format('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row"
                                style="background: rgba(139, 97, 0, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ancien_service_id_edit_{{ $mutation->id }}">Ancien service</label>
                                        <select name="ancien_service_id" id="ancien_service_id_edit_{{ $mutation->id }}"
                                            class="form-select searchable-select">
                                            <option value="" disabled>Choisir...</option>
                                            @foreach (\App\Models\Service::all() as $item)
                                                <option {{ $item->id == $mutation->ancien_service_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nouveau_service_id_edit_{{ $mutation->id }}">Nouveau service</label>
                                        <select name="nouveau_service_id" id="nouveau_service_id_edit_{{ $mutation->id }}"
                                            class="form-select searchable-select">
                                            <option value="" disabled>Choisir...</option>
                                            @foreach (\App\Models\Service::all() as $item)
                                                <option {{ $item->id == $mutation->nouveau_service_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row"
                                style="background: rgba(2, 0, 139, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ancien_fonction_id_edit_{{ $mutation->id }}">Ancienne fonction</label>
                                        <select name="ancien_fonction_id" id="ancien_fonction_id_edit_{{ $mutation->id }}"
                                            class="form-select searchable-select">
                                            <option value="" disabled>Choisir...</option>
                                            @foreach (\App\Models\Fonction::all() as $item)
                                                <option
                                                    {{ $item->id == $mutation->ancien_fonction_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nouveau_fonction_id_edit_{{ $mutation->id }}">Nouvelle fonction</label>
                                        <select name="nouveau_fonction_id" id="nouveau_fonction_id_edit_{{ $mutation->id }}"
                                            class="form-select searchable-select">
                                            <option value="" disabled>Choisir...</option>
                                            @foreach (\App\Models\Fonction::all() as $item)
                                                <option {{ $item->id == $mutation->nouveau_fonction_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row"
                                style="background: rgba(139, 0, 95, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ancien_specialite_id_edit_{{ $mutation->id }}">Ancienne
                                            Spécialité</label>
                                        <select name="ancien_specialite_id" id="ancien_specialite_id_edit_{{ $mutation->id }}"
                                            class="form-select searchable-select">
                                            <option value="" disabled>Choisir...</option>
                                            @foreach (\App\Models\SpecialiteGrade::all() as $item)
                                                <option
                                                    {{ $item->id == $mutation->ancien_specialite_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nouveau_specialite_id_edit_{{ $mutation->id }}">Nouvelle
                                            Spécialité</label>
                                        <select name="nouveau_specialite_id" id="nouveau_specialite_id_edit_{{ $mutation->id }}"
                                            class="form-select searchable-select">
                                            <option value="" disabled>Choisir...</option>
                                            @foreach (\App\Models\SpecialiteGrade::all() as $item)
                                                <option {{ $item->id == $mutation->nouveau_specialite_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-submit">Modifier</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modifier mutation - modal-->
