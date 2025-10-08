<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Hiérarchie Géographique - Statistiques Détaillées</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th>Région</th>
                                <th>Villes</th>
                                <th>Arrondissements et Communes</th>
                                <th>Formations Sanitaires</th>
                                <th>Fonctionnaires</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($regions as $region)
                                @php
                                    $regionStats = $stats['regions'][$region->id] ?? null;
                                @endphp
                                <tr class="region-row" data-region-id="{{ $region->id }}">
                                    <td class="fw-bold">{{ $region->nom }}</td>
                                    <td class="text-center">{{ $regionStats ? $regionStats['villes_count'] : 0 }}</td>
                                    <td class="text-center">{{ $regionStats ? $regionStats['arrondissements_count'] : 0 }}</td>
                                    <td class="text-center">{{ $regionStats ? $regionStats['formations_count'] : 0 }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-success px-3 py-2">
                                            {{ $regionStats ? $regionStats['fonctionnaires_count'] : 0 }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-primary toggle-region" data-region-id="{{ $region->id }}">
                                            <i class="fas fa-plus-circle"></i> Détails
                                        </button>
                                    </td>
                                </tr>

                                <!-- Villes for this region (initially hidden) -->
                                @if($regionStats && !empty($regionStats['villes']))
                                    @foreach($regionStats['villes'] as $villeId => $villeStats)
                                        <tr class="ville-row region-{{ $region->id }}-detail" style="display: none; background-color: #f8f9fa;">
                                            <td class="ps-4">↳ {{ $villeStats['name'] }}</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">{{ $villeStats['arrondissements_count'] }}</td>
                                            <td class="text-center">{{ $villeStats['formations_count'] }}</td>
                                            <td class="text-center">
                                                <span class="badge bg-info px-3 py-2">
                                                    {{ $villeStats['fonctionnaires_count'] }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-outline-info toggle-ville" data-ville-id="{{ $villeId }}" data-region-id="{{ $region->id }}">
                                                    <i class="fas fa-plus-circle"></i> Détails
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Arrondissements for this ville (initially hidden) -->
                                        @if(!empty($villeStats['arrondissements']))
                                            @foreach($villeStats['arrondissements'] as $arrondissementId => $arrondissementStats)
                                                <tr class="arrondissement-row ville-{{ $villeId }}-detail" style="display: none; background-color: #ffffff;">
                                                    <td class="ps-5">↳ {{ $arrondissementStats['name'] }}</td>
                                                    <td class="text-center">-</td>
                                                    <td class="text-center">-</td>
                                                    <td class="text-center">{{ $arrondissementStats['formations_count'] }}</td>
                                                    <td class="text-center">
                                                        <span class="badge bg-secondary px-3 py-2">
                                                            {{ $arrondissementStats['fonctionnaires_count'] }}
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        {{-- <a href="{{ route('nom-formation-sanitaires.index', ['arrondissement_commune_id' => $arrondissementId]) }}" class="btn btn-sm btn-outline-secondary">
                                                            <i class="fas fa-eye"></i> Voir Formations
                                                        </a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot class="bg-dark text-white">
                            <tr>
                                <th>Total</th>
                                <th class="text-center">{{ is_countable($villes) ? $villes->count() : (is_array($villes) ? count($villes) : 0) }}</th>
                                <th class="text-center">{{ is_countable($arrondissementCommunes) ? $arrondissementCommunes->count() : (is_array($arrondissementCommunes) ? count($arrondissementCommunes) : 0) }}</th>
                                <th class="text-center">{{ is_countable($nomFormationSanitaires) ? $nomFormationSanitaires->count() : (is_array($nomFormationSanitaires) ? count($nomFormationSanitaires) : 0) }}</th>
                                <th class="text-center">{{ is_countable($fonctionnaires) ? $fonctionnaires->count() : (is_array($fonctionnaires) ? count($fonctionnaires) : 0) }}</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle region details
        document.querySelectorAll('.toggle-region').forEach(function(button) {
            button.addEventListener('click', function() {
                const regionId = this.getAttribute('data-region-id');
                const detailRows = document.querySelectorAll(`.region-${regionId}-detail`);

                detailRows.forEach(function(row) {
                    if (row.style.display === 'none') {
                        row.style.display = 'table-row';
                        button.innerHTML = '<i class="fas fa-minus-circle"></i> Masquer';
                    } else {
                        row.style.display = 'none';
                        button.innerHTML = '<i class="fas fa-plus-circle"></i> Détails';

                        // Also hide any ville details that might be open
                        document.querySelectorAll(`.ville-${row.getAttribute('data-ville-id')}-detail`).forEach(function(villeRow) {
                            villeRow.style.display = 'none';
                        });
                    }
                });
            });
        });

        // Toggle ville details
        document.querySelectorAll('.toggle-ville').forEach(function(button) {
            button.addEventListener('click', function() {
                const villeId = this.getAttribute('data-ville-id');
                const detailRows = document.querySelectorAll(`.ville-${villeId}-detail`);

                detailRows.forEach(function(row) {
                    if (row.style.display === 'none') {
                        row.style.display = 'table-row';
                        button.innerHTML = '<i class="fas fa-minus-circle"></i> Masquer';
                    } else {
                        row.style.display = 'none';
                        button.innerHTML = '<i class="fas fa-plus-circle"></i> Détails';
                    }
                });
            });
        });
    });
</script>
