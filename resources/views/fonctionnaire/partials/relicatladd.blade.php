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
                                        <label class="form-label" for="date_conge">Date de prise de congé</label>
                                        <input type="date" name="date_conge" id="date_conge" class="form-control" value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="jours_pris">Nombre de jours pris</label>
                                        <input type="number" id="jours_pris" placeholder="Nombre de jours pris"
                                            class="form-control" min="1" value="1">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nbr_jours_disponibles">Nombre jours disponibles</label>
                                        <input type="number" name="nbr_jours_disponibles" id="nbr_jours_disponibles"
                                            placeholder="Nombre de jours disponibles" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="annee">Année du reliquat</label>
                                        <input type="number" name="annee" id="annee" class="form-control" value="{{ date('Y') }}">
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-items-center">
                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" name="is_additif" value="1" id="is_additif">
                                        <label class="form-check-label" for="is_additif">Conge additif</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="document">Note / Fichier (optionnel)</label>
                                        <input type="file" name="document" id="document" class="form-control" accept=".pdf,.jpg,.png,.doc,.docx">
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
                                    const joursPrisInput = document.getElementById('jours_pris');
                                    const joursDisponiblesInput = document.getElementById('nbr_jours_disponibles');
                                    const dateCongeInput = document.getElementById('date_conge');
                                    const leaveInfoBox = document.getElementById('leave-info');
                                    const congeTypeName = document.getElementById('conge-type-name');
                                    const congeJoursTotal = document.getElementById('conge-jours-total');
                                    const congeJoursPris = document.getElementById('conge-jours-pris');
                                    const congeJoursRestants = document.getElementById('conge-jours-restants');

                                    // Get existing relicats for this fonctionnaire
                                    const fonctionnaireRelicats = @json($fonctionnaire->relicats);

                                    function calculateRemainingDays() {
                                        if (!typeCongeSelect.value) return;

                                        const selectedOption = typeCongeSelect.options[typeCongeSelect.selectedIndex];
                                        const typeCongeId = parseInt(typeCongeSelect.value);
                                        const joursTotalParAn = parseInt(selectedOption.dataset.jours);
                                        const joursPris = parseInt(joursPrisInput.value) || 0;

                                        // Get the selected date and extract the year
                                        const selectedDate = new Date(dateCongeInput.value);
                                        const selectedYear = selectedDate.getFullYear();
                                        const currentYear = new Date().getFullYear();

                                        // If the selected year is different from the current year,
                                        // we need to recalculate the remaining days
                                        let joursRestants;

                                        if (selectedYear === currentYear) {
                                            // Use the pre-calculated remaining days from the option
                                            joursRestants = parseInt(selectedOption.dataset.joursRestants) - joursPris;
                                        } else {
                                            // For future years, start with the full allocation
                                            // For past years, we need to calculate based on that year's usage

                                            // Find existing relicats for this type of leave in the selected year
                                            let joursDejaUtilises = 0;
                                            fonctionnaireRelicats.forEach(relicat => {
                                                // Check if the relicat is for the same type of leave
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

                                            // Calculate remaining days for the selected year
                                            joursRestants = joursTotalParAn - joursDejaUtilises - joursPris;
                                        }

                                        // Update the form - automatically set the number of days available to the days taken
                                        joursDisponiblesInput.value = joursPris;

                                        // Update the select option text to show the correct remaining days for the selected year
                                        if (selectedYear !== currentYear) {
                                            // For a different year, update the option text
                                            const originalText = selectedOption.textContent.split('(')[0].trim();
                                            selectedOption.textContent = `${originalText} (${joursRestants + joursPris} jours restants)`;
                                        }

                                        // Update info box
                                        congeTypeName.textContent = selectedOption.textContent;
                                        congeJoursTotal.textContent = joursTotalParAn;
                                        congeJoursPris.textContent = joursDejaUtilises;
                                        congeJoursRestants.textContent = joursRestants;
                                        leaveInfoBox.style.display = 'block';

                                        // Disable the form submission if there are not enough days remaining
                                        const submitButton = document.querySelector('.btn-submit');
                                        if (joursRestants < 0) {
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

                                    // Add event listeners
                                    typeCongeSelect.addEventListener('change', calculateRemainingDays);
                                    joursPrisInput.addEventListener('input', calculateRemainingDays);
                                    dateCongeInput.addEventListener('change', calculateRemainingDays);
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
