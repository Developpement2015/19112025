<!-- ajouter position - modal-->
<div class="modal fade" id="addposition" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Ajouter position</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="{{ route('historique-position.add') }}" method="post" class="positionaddform"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="fonctionnaire_id" value="{{ $fonctionnaire->id }}" />
                            <style>
                                .positionaddform label {
                                    color: white;
                                    font-weight: 700;
                                }
                            </style>

                            <div class="row" style="background: rgba(139, 0, 139, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ancien_position_id">Ancienne position</label>
                                        @php
                                            $old_position_id = $fonctionnaire->position_id ?? null;
                                        @endphp
                                        <input type="hidden" name="ancien_position_id" value="{{ $old_position_id }}">
                                        <select class="form-select searchable-select" disabled>
                                            <option value="" disabled selected>Choisir une position</option>
                                            @foreach (\App\Models\Position::all() as $item)
                                                <option {{ $item->id == $old_position_id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nouveaux_position_id">Nouvelle position</label>
                                        <select name="nouveaux_position_id" class="form-select searchable-select">
                                            <option value="" disabled selected>Choisir une position</option>
                                            @foreach (\App\Models\Position::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="background: rgba(0, 137, 139, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    @php
                                        $date_cessation_service = \App\Models\PositionHistorique::where('fonctionnaire_id', $fonctionnaire->id)->latest()->first()->date_cessation_service ?? null;
                                    @endphp
                                    <div class="mb-3">
                                        <label class="form-label" for="date_cessation_service">Date de cessation de service</label>
                                        <input type="date" name="date_cessation_service" id="date_cessation_service"
                                            class="form-control" value="{{ \Carbon\Carbon::parse($date_cessation_service)->format('Y-m-d') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_prise_en_service">Date de prise en service</label>
                                        <input type="date" name="date_prise_en_service" id="date_prise_en_service"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="background: rgba(139, 23, 0, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_note">Date de note</label>
                                        <input type="date" name="date_note" id="date_note" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="ref_note">Référence de la note</label>
                                        <input type="text" name="ref_note" id="ref_note" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="background: rgba(19, 139, 0, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="type">Choisir le type (si non renseigné, ajouter un nouveau type)</label>
                                        <input type="text" list="types" name="type" id="type" class="form-control">
                                        <datalist id="types">
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
                                        <label class="form-label" for="remarque">Remarque</label>
                                        <textarea name="remarque" id="remarque" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="background: rgba(139, 97, 0, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6" id="certificate-select" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label" for="type_certificate_id">Type de certificat</label>
                                        <select name="type_certificate_id" id="type_certificate_id" class="form-select searchable-select">
                                            <option value="" disabled selected>Choisir un certificat</option>
                                            @foreach (\App\Models\TypeCertificate::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" id="conge-select" style="display: none;">
                                    <div class="mb-3">
                                        <label class="form-label" for="type_conge_id">Type de congé</label>
                                        <select name="type_conge_id" id="type_conge_id" class="form-select searchable-select">
                                            <option value="" disabled selected>Choisir un type de congé</option>
                                            @foreach (\App\Models\TypeConge::all() as $item)
                                                @php
                                                    // Get availability data from the service
                                                    $congeAvailabilityService = app(\App\Services\CongeAvailabilityService::class);
                                                    $currentYear = date('Y');

                                                    // Get or create availability record for this year
                                                    $availability = \App\Models\CongeAvailability::where('fonctionnaire_id', $fonctionnaire->id)
                                                        ->where('type_conge_id', $item->id)
                                                        ->where('year', $currentYear)
                                                        ->first();

                                                    if (!$availability) {
                                                        // If no availability record exists, create one
                                                        $congeAvailabilityService->updateAvailability($fonctionnaire->id, $item->id, $currentYear);
                                                        $availability = \App\Models\CongeAvailability::where('fonctionnaire_id', $fonctionnaire->id)
                                                            ->where('type_conge_id', $item->id)
                                                            ->where('year', $currentYear)
                                                            ->first();
                                                    }

                                                    // Get remaining days
                                                    $joursRestants = $availability ? $availability->jours_restants : $item->jours;
                                                @endphp
                                                <option value="{{ $item->id }}" data-jours="{{ $item->jours }}" data-jours-restants="{{ $joursRestants }}">
                                                    {{ $item->nom }} ({{ $joursRestants }} jours restants)
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Congé days section - will be shown only when congé type is selected -->
                            <div id="conge-days-section" style="display: none; margin-top: 15px;">
                                <div class="row" style="background: rgba(0, 139, 139, 0.727);padding: 10px;border-radius: 6px">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="conge_jours">Nombre de jours de congé</label>
                                            <input type="number" id="conge_jours" name="conge_jours" class="form-control" min="1" value="1">
                                            <small class="text-white">Nombre de jours que vous souhaitez prendre</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-box" id="conge-info-box" style="background-color: #f8f9fa; border-left: 4px solid #17a2b8; padding: 10px; border-radius: 4px; margin-top: 10px;">
                                            <div><strong>Type de congé:</strong> <span id="conge-type-name">-</span></div>
                                            <div><strong>Jours par an:</strong> <span id="conge-jours-total">-</span></div>
                                            <div><strong>Jours déjà pris:</strong> <span id="conge-jours-pris">-</span></div>
                                            <div><strong>Jours restants:</strong> <span id="conge-jours-restants">-</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="background: rgba(139, 97, 0, 0.727);padding: 10px;border-radius: 6px">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="fichiers_notes">Fichier de la note</label>
                                        <input type="file" name="fichiers_notes" id="fichiers_notes" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-submit">Ajouter</button>
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
        const typeInput = document.getElementById('type');
        const certificateSelect = document.getElementById('certificate-select');
        const congeSelect = document.getElementById('conge-select');
        const congeDaysSection = document.getElementById('conge-days-section');
        let greveSection = document.getElementById('greve-section');
        if (!greveSection) {
            greveSection = document.createElement('div');
            greveSection.id = 'greve-section';
            greveSection.style.display = 'none';
            greveSection.innerHTML = `
                <div class="row" style="background: rgba(200, 0, 0, 0.1);padding: 10px;border-radius: 6px">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="greve_date_debut">Date début grève</label>
                            <input type="date" name="greve_date_debut" id="greve_date_debut" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="greve_date_fin">Date fin grève</label>
                            <input type="date" name="greve_date_fin" id="greve_date_fin" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="greve_remarque">Remarque grève</label>
                            <textarea name="greve_remarque" id="greve_remarque" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            `;
            const modalFooter = document.querySelector('.modal-footer-btn');
            modalFooter.parentNode.insertBefore(greveSection, modalFooter);
        }
        const typeCongeSelect = document.getElementById('type_conge_id');
        const congeJoursInput = document.getElementById('conge_jours');
        const congeTypeName = document.getElementById('conge-type-name');
        const congeJoursTotal = document.getElementById('conge-jours-total');
        const congeJoursPris = document.getElementById('conge-jours-pris');
        const congeJoursRestants = document.getElementById('conge-jours-restants');
        const congeInfoBox = document.getElementById('conge-info-box');
        const submitButton = document.querySelector('.btn-submit');

        // Get existing relicats for this fonctionnaire
        const fonctionnaireRelicats = @json($fonctionnaire->relicats);

        typeInput.addEventListener('input', function () {
            const selectedType = typeInput.value.toLowerCase();

            if (selectedType === 'certificat') {
                certificateSelect.style.display = 'block';
                congeSelect.style.display = 'none';
                congeDaysSection.style.display = 'none';
            } else if (selectedType === 'conge') {
                certificateSelect.style.display = 'none';
                congeSelect.style.display = 'block';
                congeDaysSection.style.display = 'block';

                // If a type of congé is already selected, update the info
                if (typeCongeSelect.value) {
                    updateCongeInfo();
                }
            } else if (selectedType === 'greve') {
                certificateSelect.style.display = 'none';
                congeSelect.style.display = 'none';
                congeDaysSection.style.display = 'none';
                greveSection.style.display = 'block';
            } else {
                certificateSelect.style.display = 'none';
                congeSelect.style.display = 'none';
                congeDaysSection.style.display = 'none';
            }
        });

        // Function to calculate and update congé information
        function updateCongeInfo() {
            if (!typeCongeSelect.value) return;

            const selectedOption = typeCongeSelect.options[typeCongeSelect.selectedIndex];
            const typeCongeId = parseInt(typeCongeSelect.value);
            const joursTotalParAn = parseInt(selectedOption.dataset.jours);
            const joursRestantsInitial = parseInt(selectedOption.dataset.joursRestants);
            const joursPris = parseInt(congeJoursInput.value) || 0;

            // Get the selected date from the date_cessation_service field
            const dateCessationService = document.getElementById('date_cessation_service').value;
            const selectedDate = new Date(dateCessationService);
            const selectedYear = selectedDate.getFullYear();
            const currentYear = new Date().getFullYear();

            // Make an AJAX request to get the availability data for the selected year
            fetch(`/api/conge-availability/${fonctionnaireId}/${typeCongeId}/${selectedYear}`)
                .then(response => response.json())
                .then(data => {
                    // Use the availability data from the API
                    const joursRestants = data.jours_restants - joursPris;
                    updateInfoBox(data, joursRestants, joursPris);
                })
                .catch(error => {
                    console.error('Error fetching availability data:', error);
                    // Fallback to client-side calculation if API fails
                    let joursDejaUtilises = 0;
                    fonctionnaireRelicats.forEach(relicat => {
                        if (parseInt(relicat.type_conge_id) === typeCongeId) {
                            // Check if the relicat is from the selected year
                            const relicatDate = relicat.date_conge ? new Date(relicat.date_conge) : null;
                            const relicatYear = relicatDate ? relicatDate.getFullYear() : null;

                            // Only count relicats from the selected year
                            if (!relicatDate || relicatYear === selectedYear) {
                                joursDejaUtilises += parseInt(relicat.nbr_jours_disponibles);
                            }
                        }
                    });

                    // Calculate remaining days
                    const joursRestants = joursTotalParAn - joursDejaUtilises - joursPris;

                    // Update the info box with the calculated data
                    updateInfoBox({
                        jours_total: joursTotalParAn,
                        jours_utilises: joursDejaUtilises,
                        jours_restants: joursRestants + joursPris
                    }, joursRestants, joursPris);
                });

            // Function to update the info box with availability data
            function updateInfoBox(data, joursRestants, joursPris) {
                congeTypeName.textContent = selectedOption.textContent.split('(')[0].trim();
                congeJoursTotal.textContent = data.jours_total;
                congeJoursPris.textContent = data.jours_utilises;
                congeJoursRestants.textContent = joursRestants;

                // Validate if there are enough days available
                if (joursRestants < 0) {
                    submitButton.disabled = true;
                    submitButton.title = 'Pas assez de jours disponibles';
                    congeInfoBox.style.backgroundColor = '#f8d7da';
                    congeInfoBox.style.borderLeftColor = '#dc3545';
                    congeJoursRestants.style.color = '#dc3545';
                    congeJoursRestants.style.fontWeight = 'bold';
                } else {
                    submitButton.disabled = false;
                    submitButton.title = '';
                    congeInfoBox.style.backgroundColor = '#f8f9fa';
                    congeInfoBox.style.borderLeftColor = '#17a2b8';
                    congeJoursRestants.style.color = '';
                    congeJoursRestants.style.fontWeight = '';
                }
            }

            // Create a relicat automatically when adding a congé
            // We'll add a hidden field to the form with the relicat data
            const relicatDataInput = document.getElementById('relicat_data') || document.createElement('input');
            relicatDataInput.type = 'hidden';
            relicatDataInput.name = 'relicat_data';
            relicatDataInput.id = 'relicat_data';
            relicatDataInput.value = JSON.stringify({
                fonctionnaire_id: {{ $fonctionnaire->id }},
                type_conge_id: typeCongeId,
                nbr_jours_disponibles: joursPris,
                date_conge: dateCessationService
            });

            // Add the hidden field to the form if it doesn't exist
            if (!document.getElementById('relicat_data')) {
                document.querySelector('.positionaddform').appendChild(relicatDataInput);
            }
        }

        // Add event listeners for congé-related fields
        typeCongeSelect.addEventListener('change', updateCongeInfo);
        congeJoursInput.addEventListener('input', updateCongeInfo);
        document.getElementById('date_cessation_service').addEventListener('change', function() {
            if (typeInput.value.toLowerCase() === 'conge') {
                updateCongeInfo();
            }
        });
    });
</script>
<!-- ajouter position - modal -->
