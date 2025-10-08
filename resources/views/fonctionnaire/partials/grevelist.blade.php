<div>
    <h4>Liste des grèves de {{ $fonctionnaire->nom }} {{ $fonctionnaire->prenom }}</h4>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addGreveModal">
        Ajouter une grève
    </button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Nombre de jours</th>
                <th>Remarque</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fonctionnaire->greves as $greve)
                <tr>
                    <td>{{ $greve->date_debut }}</td>
                    <td>{{ $greve->date_fin }}</td>
                    <td>
                        @if($greve->date_debut && $greve->date_fin)
                            <span class="badge bg-info">
                                {{ \Carbon\Carbon::parse($greve->date_debut)->diffInDays(\Carbon\Carbon::parse($greve->date_fin)) + 1 }} jours
                            </span>
                        @else
                            <span class="badge bg-secondary">-</span>
                        @endif
                    </td>
                    <td>{{ $greve->remarque }}</td>
                    <td>
                        <!-- Show Modal Button -->
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showGreveModal{{ $greve->id }}">Voir</button>
                        <!-- Edit Modal Button -->
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editGreveModal{{ $greve->id }}">Modifier</button>
                        <!-- Delete Form -->
                        <form action="{{ route('greves.destroy', $greve) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette grève ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>

                <!-- Show Modal -->
                <div class="modal fade" id="showGreveModal{{ $greve->id }}" tabindex="-1" aria-labelledby="showGreveModalLabel{{ $greve->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showGreveModalLabel{{ $greve->id }}">Détail de la grève</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                            </div>
                            <div class="modal-body">
                                <div><strong>Date début:</strong> {{ $greve->date_debut }}</div>
                                <div><strong>Date fin:</strong> {{ $greve->date_fin }}</div>
                                <div><strong>Nombre de jours:</strong>
                                    @if($greve->date_debut && $greve->date_fin)
                                        <span class="badge bg-info">
                                            {{ \Carbon\Carbon::parse($greve->date_debut)->diffInDays(\Carbon\Carbon::parse($greve->date_fin)) + 1 }} jours
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">Non calculé</span>
                                    @endif
                                </div>
                                <div><strong>Remarque:</strong> {{ $greve->remarque }}</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editGreveModal{{ $greve->id }}" tabindex="-1" aria-labelledby="editGreveModalLabel{{ $greve->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('greves.update', $greve) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editGreveModalLabel{{ $greve->id }}">Modifier la grève</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="fonctionnaire_id" value="{{ $fonctionnaire->id }}">
                                    <div class="mb-3">
                                        <label for="date_debut_{{ $greve->id }}" class="form-label">Date début</label>
                                        <input type="date" name="date_debut" id="date_debut_{{ $greve->id }}" class="form-control date-debut-edit" value="{{ $greve->date_debut }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date_fin_{{ $greve->id }}" class="form-label">Date fin</label>
                                        <input type="date" name="date_fin" id="date_fin_{{ $greve->id }}" class="form-control date-fin-edit" value="{{ $greve->date_fin }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre_jours_display_{{ $greve->id }}" class="form-label">Nombre de jours</label>
                                        <input type="text" id="nombre_jours_display_{{ $greve->id }}" class="form-control" readonly
                                               value="{{ $greve->date_debut && $greve->date_fin ? \Carbon\Carbon::parse($greve->date_debut)->diffInDays(\Carbon\Carbon::parse($greve->date_fin)) + 1 . ' jours' : '' }}">
                                        <input type="hidden" name="nombre_jours" id="nombre_jours_{{ $greve->id }}"
                                               value="{{ $greve->date_debut && $greve->date_fin ? \Carbon\Carbon::parse($greve->date_debut)->diffInDays(\Carbon\Carbon::parse($greve->date_fin)) + 1 : '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="remarque_{{ $greve->id }}" class="form-label">Remarque</label>
                                        <textarea name="remarque" id="remarque_{{ $greve->id }}" class="form-control">{{ $greve->remarque }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Greve Modal -->
<div class="modal fade" id="addGreveModal" tabindex="-1" aria-labelledby="addGreveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('greves.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGreveModalLabel">Ajouter une grève</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="fonctionnaire_id" value="{{ $fonctionnaire->id }}">
                    <div class="mb-3">
                        <label for="date_debut" class="form-label">Date début</label>
                        <input type="date" name="date_debut" id="date_debut_add" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_fin" class="form-label">Date fin</label>
                        <input type="date" name="date_fin" id="date_fin_add" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nombre_jours_display" class="form-label">Nombre de jours</label>
                        <input type="text" id="nombre_jours_display" class="form-control" readonly placeholder="Calculé automatiquement">
                        <input type="hidden" name="nombre_jours" id="nombre_jours_add">
                    </div>
                    <div class="mb-3">
                        <label for="remarque" class="form-label">Remarque</label>
                        <textarea name="remarque" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to calculate days between two dates
    function calculateDays(startDate, endDate) {
        if (startDate && endDate) {
            const start = new Date(startDate);
            const end = new Date(endDate);
            const diffTime = Math.abs(end - start);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // +1 to include both dates
            return diffDays;
        }
        return 0;
    }

    // Function to update display
    function updateDaysDisplay(startInput, endInput, displayInput, hiddenInput) {
        const days = calculateDays(startInput.value, endInput.value);
        if (days > 0) {
            displayInput.value = days + ' jours';
            hiddenInput.value = days;
        } else {
            displayInput.value = '';
            hiddenInput.value = '';
        }
    }

    // For add form
    const dateDebutAdd = document.getElementById('date_debut_add');
    const dateFinAdd = document.getElementById('date_fin_add');
    const nombreJoursDisplayAdd = document.getElementById('nombre_jours_display');
    const nombreJoursAdd = document.getElementById('nombre_jours_add');

    if (dateDebutAdd && dateFinAdd) {
        dateDebutAdd.addEventListener('change', function() {
            updateDaysDisplay(dateDebutAdd, dateFinAdd, nombreJoursDisplayAdd, nombreJoursAdd);
        });

        dateFinAdd.addEventListener('change', function() {
            updateDaysDisplay(dateDebutAdd, dateFinAdd, nombreJoursDisplayAdd, nombreJoursAdd);
        });
    }

    // For edit forms
    document.querySelectorAll('.date-debut-edit').forEach(function(startInput) {
        const greveId = startInput.id.split('_').pop();
        const endInput = document.getElementById('date_fin_' + greveId);
        const displayInput = document.getElementById('nombre_jours_display_' + greveId);
        const hiddenInput = document.getElementById('nombre_jours_' + greveId);

        if (endInput && displayInput && hiddenInput) {
            startInput.addEventListener('change', function() {
                updateDaysDisplay(startInput, endInput, displayInput, hiddenInput);
            });

            endInput.addEventListener('change', function() {
                updateDaysDisplay(startInput, endInput, displayInput, hiddenInput);
            });
        }
    });
});
</script>
