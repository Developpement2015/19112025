<!-- modifier position - modal-->
<div class="modal fade" id="editposition-{{ $position->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Modifier position - {{ $position->ref_note }}</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="{{ route('historique-position.update', $position->id) }}" method="post" class="positioneditform-{{ $position->id }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="fonctionnaire_id" value="{{ $fonctionnaire->id }}" />
                            <style>
                                .positioneditform-{{ $position->id }} label {
                                    color: white;
                                    font-weight: 700;
                                }
                            </style>

                            <div class="row" style="background: rgba(139, 0, 139, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ancien_position_id_edit_{{ $position->id }}">Ancienne position</label>
                                        <select name="ancien_position_id" id="ancien_position_id_edit_{{ $position->id }}" class="form-select searchable-select">
                                            <option value="" disabled>Choisir une position</option>
                                            @foreach (\App\Models\Position::all() as $item)
                                                <option {{ $item->id == $position->ancien_position_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nouveaux_position_id_edit_{{ $position->id }}">Nouvelle position</label>
                                        <select name="nouveaux_position_id" id="nouveaux_position_id_edit_{{ $position->id }}" class="form-select searchable-select">
                                            <option value="" disabled>Choisir une position</option>
                                            @foreach (\App\Models\Position::all() as $item)
                                                <option {{ $item->id == $position->nouveaux_position_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="background: rgba(0, 137, 139, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_cessation_service_edit_{{ $position->id }}">Date de cessation de service</label>
                                        <input type="date" name="date_cessation_service" id="date_cessation_service_edit_{{ $position->id }}"
                                            class="form-control" value="{{ $position->date_cessation_service ? \Carbon\Carbon::parse($position->date_cessation_service)->format('Y-m-d') : '' }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_prise_en_service_edit_{{ $position->id }}">Date de prise en service</label>
                                        <input type="date" name="date_prise_en_service" id="date_prise_en_service_edit_{{ $position->id }}"
                                            class="form-control" value="{{ $position->date_prise_en_service ? \Carbon\Carbon::parse($position->date_prise_en_service)->format('Y-m-d') : '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="background: rgba(139, 23, 0, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_note_edit_{{ $position->id }}">Date de note</label>
                                        <input type="date" name="date_note" id="date_note_edit_{{ $position->id }}" class="form-control"
                                            value="{{ $position->date_note ? \Carbon\Carbon::parse($position->date_note)->format('Y-m-d') : '' }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ref_note_edit_{{ $position->id }}">Référence de la note</label>
                                        <input type="text" name="ref_note" id="ref_note_edit_{{ $position->id }}" class="form-control"
                                            value="{{ $position->ref_note }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="background: rgba(19, 139, 0, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="type_edit_{{ $position->id }}">Choisir le type</label>
                                        <input type="text" list="types_edit_{{ $position->id }}" name="type" id="type_edit_{{ $position->id }}" class="form-control"
                                            value="{{ $position->type }}">
                                        <datalist id="types_edit_{{ $position->id }}">
                                            <option value="conge">Congé</option>
                                            <option value="greve">Gréve</option>
                                            <option value="mise_en_disponibilite">Mise en disponibilité</option>
                                            <option value="certificat">Certificat</option>
                                            <option value="conseildisciplinaire">Conseil Disciplinaire</option>
                                            @foreach (\App\Models\PositionHistorique::whereNotIn('type', ['conge', 'greve', 'mise_en_disponibilite', 'certificat', 'conseildisciplinaire'])->distinct()->get() as $item)
                                                <option value="{{ $item->type }}">{{ ucfirst(str_replace('_', ' ', $item->type)) }}</option>
                                            @endforeach
                                        </datalist>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="remarque_edit_{{ $position->id }}">Remarque</label>
                                        <textarea name="remarque" id="remarque_edit_{{ $position->id }}" class="form-control">{{ $position->remarque }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="background: rgba(139, 97, 0, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6" id="certificate-select-edit-{{ $position->id }}" style="display: {{ $position->type == 'certificat' ? 'block' : 'none' }};">
                                    <div class="mb-3">
                                        <label class="form-label" for="type_certificate_id_edit_{{ $position->id }}">Type de certificat</label>
                                        <select name="type_certificate_id" id="type_certificate_id_edit_{{ $position->id }}" class="form-select searchable-select">
                                            <option value="" disabled>Choisir un certificat</option>
                                            @foreach (\App\Models\TypeCertificate::all() as $item)
                                                <option {{ $item->id == $position->type_certificate_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" id="conge-select-edit-{{ $position->id }}" style="display: {{ $position->type == 'conge' ? 'block' : 'none' }};">
                                    <div class="mb-3">
                                        <label class="form-label" for="type_conge_id_edit_{{ $position->id }}">Type de congé</label>
                                        <select name="type_conge_id" id="type_conge_id_edit_{{ $position->id }}" class="form-select searchable-select">
                                            <option value="" disabled>Choisir un type de congé</option>
                                            @foreach (\App\Models\TypeConge::all() as $item)
                                                <option {{ $item->id == $position->type_conge_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}" data-jours="{{ $item->jours }}">
                                                    {{ $item->nom }} ({{ $item->jours }} jours)
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Congé days section - will be shown only when congé type is selected -->
                            <div id="conge-days-section-edit-{{ $position->id }}" style="display: {{ $position->type == 'conge' ? 'block' : 'none' }}; margin-top: 15px;">
                                <div class="row" style="background: rgba(0, 139, 139, 0.727);padding: 10px;border-radius: 6px">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="conge_jours_edit_{{ $position->id }}">Nombre de jours de congé</label>
                                            <input type="number" id="conge_jours_edit_{{ $position->id }}" name="conge_jours" class="form-control" min="1" value="1">
                                            <small class="text-white">Nombre de jours que vous souhaitez prendre</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-box" id="conge-info-box-edit-{{ $position->id }}" style="background-color: #f8f9fa; border-left: 4px solid #17a2b8; padding: 10px; border-radius: 4px; margin-top: 10px;">
                                            <div><strong>Type de congé:</strong> <span id="conge-type-name-edit-{{ $position->id }}">-</span></div>
                                            <div><strong>Jours par an:</strong> <span id="conge-jours-total-edit-{{ $position->id }}">-</span></div>
                                            <div><strong>Jours déjà pris:</strong> <span id="conge-jours-pris-edit-{{ $position->id }}">-</span></div>
                                            <div><strong>Jours restants:</strong> <span id="conge-jours-restants-edit-{{ $position->id }}">-</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="background: rgba(139, 97, 0, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="fichiers_notes_edit_{{ $position->id }}">Fichier de la note</label>
                                        <input type="file" name="fichiers_notes" id="fichiers_notes_edit_{{ $position->id }}" class="form-control">
                                        @if($position->fichiers_notes && file_exists(storage_path('app/public/' . $position->fichiers_notes)))
                                            <small class="text-white">Fichier actuel: <a href="{{ route('files.notes', $position->fichiers_notes) }}" target="_blank" class="text-warning">Voir le fichier</a></small>
                                        @elseif($position->fichiers_notes)
                                            <small class="text-white text-muted">Fichier introuvable: {{ $position->fichiers_notes }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-submit">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const typeInput_{{ $position->id }} = document.getElementById('type_edit_{{ $position->id }}');
        const certificateSelect_{{ $position->id }} = document.getElementById('certificate-select-edit-{{ $position->id }}');
        const congeSelect_{{ $position->id }} = document.getElementById('conge-select-edit-{{ $position->id }}');
        const congeDaysSection_{{ $position->id }} = document.getElementById('conge-days-section-edit-{{ $position->id }}');

        // Create greve section if it doesn't exist
        let greveSection_{{ $position->id }} = document.getElementById('greve-section-edit-{{ $position->id }}');
        if (!greveSection_{{ $position->id }}) {
            greveSection_{{ $position->id }} = document.createElement('div');
            greveSection_{{ $position->id }}.id = 'greve-section-edit-{{ $position->id }}';
            greveSection_{{ $position->id }}.style.display = '{{ $position->type == "greve" ? "block" : "none" }}';
            greveSection_{{ $position->id }}.innerHTML = `
                <div class="row" style="background: rgba(200, 0, 0, 0.1);padding: 10px;border-radius: 6px">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="greve_date_debut_edit_{{ $position->id }}">Date début grève</label>
                            <input type="date" name="greve_date_debut" id="greve_date_debut_edit_{{ $position->id }}" class="form-control" value="{{ $position->greve_date_debut ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="greve_date_fin_edit_{{ $position->id }}">Date fin grève</label>
                            <input type="date" name="greve_date_fin" id="greve_date_fin_edit_{{ $position->id }}" class="form-control" value="{{ $position->greve_date_fin ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="greve_remarque_edit_{{ $position->id }}">Remarque grève</label>
                            <textarea name="greve_remarque" id="greve_remarque_edit_{{ $position->id }}" class="form-control">{{ $position->greve_remarque ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            `;
            const modalFooter = document.querySelector('#editposition-{{ $position->id }} .modal-footer-btn');
            modalFooter.parentNode.insertBefore(greveSection_{{ $position->id }}, modalFooter);
        }

        typeInput_{{ $position->id }}.addEventListener('input', function () {
            const selectedType = typeInput_{{ $position->id }}.value.toLowerCase();

            if (selectedType === 'certificat') {
                certificateSelect_{{ $position->id }}.style.display = 'block';
                congeSelect_{{ $position->id }}.style.display = 'none';
                congeDaysSection_{{ $position->id }}.style.display = 'none';
                greveSection_{{ $position->id }}.style.display = 'none';
            } else if (selectedType === 'conge') {
                certificateSelect_{{ $position->id }}.style.display = 'none';
                congeSelect_{{ $position->id }}.style.display = 'block';
                congeDaysSection_{{ $position->id }}.style.display = 'block';
                greveSection_{{ $position->id }}.style.display = 'none';
            } else if (selectedType === 'greve') {
                certificateSelect_{{ $position->id }}.style.display = 'none';
                congeSelect_{{ $position->id }}.style.display = 'none';
                congeDaysSection_{{ $position->id }}.style.display = 'none';
                greveSection_{{ $position->id }}.style.display = 'block';
            } else {
                certificateSelect_{{ $position->id }}.style.display = 'none';
                congeSelect_{{ $position->id }}.style.display = 'none';
                congeDaysSection_{{ $position->id }}.style.display = 'none';
                greveSection_{{ $position->id }}.style.display = 'none';
            }
        });
    });
</script>
<!-- modifier position - modal -->
