<!-- ajouter position - modal-->
<div class="modal fade" id="addrelicat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Ajouter Reliquat</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="{{ route('reliquat.add') }}" method="post" class="reliquataddform"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="fonctionnaire_id" value="{{ $fonctionnaire->id }}" />
                            <style>
                                .positionaddform label {
                                    color: white;
                                    font-weight: 700;
                                }
                                .info-box {
                                    background-color: #f8f9fa;
                                    border-left: 4px solid #17a2b8;
                                    padding: 10px;
                                    margin-bottom: 15px;
                                    border-radius: 4px;
                                }
                            </style>

                            <div class="row">
                                <div class="col-md-6" id="conge-select">
                                    <div class="mb-3">
                                        <label class="form-label" for="type_conge_id">Type de congé</label>
                                        <select name="type_conge_id" id="type_conge_id" class="form-select searchable-select">
                                            <option value="" disabled selected>Choisir un type de congé</option>
                                            @foreach (\App\Models\TypeConge::all() as $item)
                                                @php
                                                    // Calculate remaining days for this type of leave
                                                    $joursTotalParAn = $item->jours;
                                                    $currentYear = date('Y');

                                                    // Get days already used this year
                                                    $joursDejaUtilises = 0;
                                                    foreach ($fonctionnaire->relicats as $relicat) {
                                                        if ($relicat->type_conge_id == $item->id) {
                                                            // Check if the relicat is from the current year
                                                            $relicatYear = $relicat->date_conge
                                                                ? \Carbon\Carbon::parse($relicat->date_conge)->year
                                                                : null;

                                                            // Count relicats with no date or from the current year
                                                            if (!$relicatYear || $relicatYear == $currentYear) {
                                                                $joursDejaUtilises += $relicat->nbr_jours_disponibles;
                                                            }
                                                        }
                                                    }

                                                    // Calculate remaining days
                                                    $joursRestants = $joursTotalParAn - $joursDejaUtilises;
                                                @endphp
                                                <option value="{{ $item->id }}" data-jours="{{ $item->jours }}" data-jours-restants="{{ $joursRestants }}">
                                                    {{ $item->nom }} ({{ $joursRestants }} jours restants)
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_depot">Date de dépôt / solde</label>
                                        <input type="date" name="date_depot" id="date_depot" class="form-control" value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" id="nbr_jours_disponibles_container">
                                    <div class="mb-3">
                                        <label class="form-label" for="nbr_jours_disponibles" id="nbr_label">Nombre solde crédit (jours)</label>
                                        <input type="number" name="nbr_jours_disponibles" id="nbr_jours_disponibles"
                                            placeholder="Nombre de jours" class="form-control" min="0" value="0" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="is_additif"
                                            name="is_additif">
                                        <label class="form-check-label" for="is_additif">
                                            Congé additif (ajoute au cumul)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="annee">Année (optionnelle)</label>
                                        <input type="number" name="annee" id="annee" class="form-control" placeholder="YYYY" min="2000" max="2100">
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="document">Document justificatif (pdf, max 5MB)</label>
                                        <input type="file" name="document" id="document" class="form-control" accept="application/pdf,image/*">
                                    </div>
                                </div>
                            </div>

                            <div class="info-box" id="leave-info" style="display: none;">
                                <div><strong>Type de congé:</strong> <span id="conge-type-name"></span></div>
                                <div><strong>Jours par an:</strong> <span id="conge-jours-total"></span></div>
                                <div><strong>Jours déjà pris:</strong> <span id="conge-jours-pris"></span></div>
                                <div><strong>Jours restants:</strong> <span id="conge-jours-restants"></span></div>
                            </div>

                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-submit">Ajouter</button>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const typeCongeSelect = document.getElementById('type_conge_id');
                                    const joursDisponiblesInput = document.getElementById('nbr_jours_disponibles');
                                    const joursDisponiblesContainer = document.getElementById('nbr_jours_disponibles_container');
                                    const nbrLabel = document.getElementById('nbr_label');
                                    const dateDepotInput = document.getElementById('date_depot');
                                    const leaveInfoBox = document.getElementById('leave-info');
                                    const congeTypeName = document.getElementById('conge-type-name');
                                    const congeJoursTotal = document.getElementById('conge-jours-total');
                                    const congeJoursPris = document.getElementById('conge-jours-pris');
                                    const congeJoursRestants = document.getElementById('conge-jours-restants');
                                    const isAdditifCheckbox = document.getElementById('is_additif');

                                    // Get existing relicats for this fonctionnaire
                                    const fonctionnaireRelicats = @json($fonctionnaire->relicats);

                                    function toggleInputsForAdditif() {
                                        const isAdditif = isAdditifCheckbox.checked;
                                        if (isAdditif) {
                                            // Label and placeholder adapt for additif (solde crédit)
                                            nbrLabel.textContent = 'Nombre solde crédit (jours)';
                                            joursDisponiblesInput.placeholder = 'Nombre de jours crédités';
                                            if (!joursDisponiblesInput.value) joursDisponiblesInput.value = 1;
                                        } else {
                                            // Treat the same single field as 'jours pris' when not additif
                                            nbrLabel.textContent = 'Nombre de jours pris';
                                            joursDisponiblesInput.placeholder = 'Nombre de jours pris';
                                            if (!joursDisponiblesInput.value) joursDisponiblesInput.value = '';
                                        }
                                    }

                                    function calculateRemainingDays() {
                                        if (!typeCongeSelect.value) return;

                                        const selectedOption = typeCongeSelect.options[typeCongeSelect.selectedIndex];
                                        const typeCongeId = parseInt(typeCongeSelect.value);
                                        const joursTotalParAn = parseInt(selectedOption.dataset.jours) || 0;
                                        const isAdditif = isAdditifCheckbox.checked;

                                        // Use date_depot as the date source; fallback to today if empty
                                        const sourceDateStr = (dateDepotInput && dateDepotInput.value) ? dateDepotInput.value : '';
                                        const selectedDate = sourceDateStr ? new Date(sourceDateStr) : new Date();
                                        const selectedYear = selectedDate.getFullYear();

                                        // Compute sum of existing additifs and prises for the selected year and type
                                        let sumAdditifsExistants = 0;
                                        let sumPrisExistants = 0;
                                        fonctionnaireRelicats.forEach(relicat => {
                                            if (parseInt(relicat.type_conge_id) === typeCongeId) {
                                                const relicatDateValue = relicat.date_depot || relicat.date_conge || null;
                                                const relicatDate = relicatDateValue ? new Date(relicatDateValue) : null;
                                                const relicatYear = relicatDate ? relicatDate.getFullYear() : null;
                                                if (!relicatDate || relicatYear === selectedYear) {
                                                    if (relicat.is_additif) {
                                                        sumAdditifsExistants += parseInt(relicat.nbr_jours_disponibles) || 0;
                                                    } else {
                                                        sumPrisExistants += parseInt(relicat.nbr_jours_disponibles) || 0;
                                                    }
                                                }
                                            }
                                        });

                                        const currentValue = parseInt(joursDisponiblesInput.value) || 0;

                                        // For display: remaining before adding current action
                                        const remainingBefore = joursTotalParAn + sumAdditifsExistants - sumPrisExistants;
                                        // Remaining after applying current action
                                        let remainingAfter;
                                        if (isAdditif) {
                                            remainingAfter = remainingBefore + currentValue;
                                        } else {
                                            remainingAfter = remainingBefore - currentValue;
                                        }

                                        // nbr_jours_disponibles already holds the proper value (used for both additif and prise)
                                        // ensure it's at least 0
                                        if (!joursDisponiblesInput.value) joursDisponiblesInput.value = 0;

                                        // Update info box: show totals and remaining before/after
                                        congeTypeName.textContent = selectedOption.textContent;
                                        congeJoursTotal.textContent = joursTotalParAn;
                                        congeJoursPris.textContent = sumPrisExistants + ' (déjà)';
                                        congeJoursRestants.textContent = remainingBefore + ' -> ' + remainingAfter;
                                        leaveInfoBox.style.display = 'block';

                                        // Disable the form submission if there are not enough days remaining and it's not an additif
                                        const submitButton = document.querySelector('.btn-submit');
                                        if (remainingWithoutAdditif < 0 && !isAdditif) {
                                            submitButton.disabled = true;
                                            submitButton.title = 'Pas assez de jours disponibles';
                                            leaveInfoBox.classList.add('bg-danger', 'text-white');
                                            leaveInfoBox.classList.remove('bg-light');
                                        } else {
                                            submitButton.disabled = false;
                                            submitButton.title = '';
                                            leaveInfoBox.classList.remove('bg-danger', 'text-white');
                                            leaveInfoBox.classList.add('bg-light');
                                        }
                                    }

                                    // Initialize UI state
                                    toggleInputsForAdditif();
                                    calculateRemainingDays();

                                    // Add event listeners
                                    typeCongeSelect.addEventListener('change', calculateRemainingDays);
                                    joursDisponiblesInput.addEventListener('input', calculateRemainingDays);
                                    dateDepotInput.addEventListener('change', calculateRemainingDays);
                                    isAdditifCheckbox.addEventListener('change', function() {
                                        toggleInputsForAdditif();
                                        calculateRemainingDays();
                                    });
                                });
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ajouter position - modal -->
