<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Affectation du Personnel - Statistiques Détaillées</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="input-group">
                        <input type="text" id="personnelSearch" class="form-control" placeholder="Rechercher par formation sanitaire...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="personnelTable">
                        <thead class="bg-light">
                            <tr>
                                <th>Formation Sanitaire</th>
                                <th>Nombre d'Affectations</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stats['affectations'] ?? [] as $formationId => $affectationStats)
                                <tr class="formation-row" data-formation-id="{{ $formationId }}">
                                    <td>{{ $affectationStats['formation_name'] }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-primary px-3 py-2">
                                            {{ $affectationStats['count'] }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-info toggle-formation" data-formation-id="{{ $formationId }}">
                                            <i class="fas fa-plus-circle"></i> Détails des Affectations
                                        </button>
                                    </td>
                                </tr>

                                <!-- Affectation details (initially hidden) -->
                                <tr class="formation-details formation-{{ $formationId }}-detail" style="display: none;">
                                    <td colspan="3" class="p-0">
                                        <div class="p-3 bg-light">
                                            <h6 class="border-bottom pb-2 mb-3">Détails des affectations pour {{ $affectationStats['formation_name'] }}</h6>
                                            <div class="table-responsive">
                                                <table class="table table-sm table-bordered">
                                                    <thead>
                                                        <tr class="bg-secondary text-white">
                                                            <th>Fonctionnaire</th>
                                                            <th>Date d'Affectation</th>
                                                            <th>Service</th>
                                                            <th>Fonction</th>
                                                            <th>Catégorie Formation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($affectationStats['details'] as $detail)
                                                            <tr>
                                                                <td>{{ $detail['fonctionnaire'] }}</td>
                                                                <td>{{ $detail['date_affectation'] }}</td>
                                                                <td>{{ $detail['service'] }}</td>
                                                                <td>{{ $detail['fonction'] }}</td>
                                                                <td>{{ $detail['categorie_formation'] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if(empty($stats['affectations']))
                    <div class="alert alert-info mt-3">
                        <i class="fas fa-info-circle me-2"></i> Aucune affectation trouvée.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle formation details
        document.querySelectorAll('.toggle-formation').forEach(function(button) {
            button.addEventListener('click', function() {
                const formationId = this.getAttribute('data-formation-id');
                const detailRows = document.querySelectorAll(`.formation-${formationId}-detail`);

                detailRows.forEach(function(row) {
                    if (row.style.display === 'none') {
                        row.style.display = 'table-row';
                        button.innerHTML = '<i class="fas fa-minus-circle"></i> Masquer les Détails';
                    } else {
                        row.style.display = 'none';
                        button.innerHTML = '<i class="fas fa-plus-circle"></i> Détails des Affectations';
                    }
                });
            });
        });

        // Search functionality
        document.getElementById('personnelSearch').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#personnelTable tbody tr.formation-row');

            rows.forEach(function(row) {
                const formationId = row.getAttribute('data-formation-id');
                const formationName = row.querySelector('td:first-child').textContent.toLowerCase();
                const detailRows = document.querySelectorAll(`.formation-${formationId}-detail`);

                if (formationName.includes(searchValue)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                    // Hide any open details
                    detailRows.forEach(function(detailRow) {
                        detailRow.style.display = 'none';
                    });
                    // Reset button text
                    const button = row.querySelector('.toggle-formation');
                    if (button) {
                        button.innerHTML = '<i class="fas fa-plus-circle"></i> Détails des Affectations';
                    }
                }
            });
        });
    });
</script>
