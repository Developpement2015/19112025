<x-head titre="Statistiques RH" />
<x-header />
<x-sidebar />

<!-- Block Principal -->
<div class="page-wrapper">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Statistiques RH</h4>
                    <h6 class="text-capitalize text-muted">Indicateurs de performance RH</h6>
                </div>
            </div>
        </div>

        <!-- Date Range Filter -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('statistics.hr') }}" id="dateRangeForm">
                    <div class="row align-items-end">
                        <div class="col-md-4">
                            <label for="date_debut" class="form-label">Date de début</label>
                            <input type="date" class="form-control" id="date_debut" name="date_debut"
                                   value="{{ request('date_debut', now()->subYear()->format('Y-m-d')) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="date_fin" class="form-label">Date de fin</label>
                            <input type="date" class="form-control" id="date_fin" name="date_fin"
                                   value="{{ request('date_fin', now()->format('Y-m-d')) }}">
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-filter"></i> Filtrer
                                </button>
                                <button type="button" class="btn btn-secondary" id="resetFilter">
                                    <i class="fas fa-undo"></i> Réinitialiser
                                </button>
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="presetDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-calendar-alt"></i> Périodes prédéfinies
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="presetDropdown">
                                        <li><a class="dropdown-item" href="#" data-preset="current-month">Mois actuel</a></li>
                                        <li><a class="dropdown-item" href="#" data-preset="last-month">Mois dernier</a></li>
                                        <li><a class="dropdown-item" href="#" data-preset="current-quarter">Trimestre actuel</a></li>
                                        <li><a class="dropdown-item" href="#" data-preset="last-quarter">Trimestre dernier</a></li>
                                        <li><a class="dropdown-item" href="#" data-preset="current-year">Année actuelle</a></li>
                                        <li><a class="dropdown-item" href="#" data-preset="last-year">Année dernière</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i>
                                <strong>Période sélectionnée:</strong>
                                Du {{ \Carbon\Carbon::parse(request('date_debut', now()->subYear()->format('Y-m-d')))->format('d/m/Y') }}
                                au {{ \Carbon\Carbon::parse(request('date_fin', now()->format('Y-m-d')))->format('d/m/Y') }}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Statistics Matrix -->
        <div class="card table-list-card">
            <div class="card-body">
                <!-- Tabs for different statistics views -->
                <ul class="nav nav-tabs" id="statisticsTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="absence-tab" data-bs-toggle="tab" data-bs-target="#absence" type="button" role="tab" aria-controls="absence" aria-selected="true">Taux d'Absence</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rotation-tab" data-bs-toggle="tab" data-bs-target="#rotation" type="button" role="tab" aria-controls="rotation" aria-selected="false">Rotation du Personnel</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="retraite-tab" data-bs-toggle="tab" data-bs-target="#retraite" type="button" role="tab" aria-controls="retraite" aria-selected="false">Départs à la Retraite</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="greve-tab" data-bs-toggle="tab" data-bs-target="#greve" type="button" role="tab" aria-controls="greve" aria-selected="false">Grèves</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="conge-tab" data-bs-toggle="tab" data-bs-target="#conge" type="button" role="tab" aria-controls="conge" aria-selected="false">Congés</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="mobilite-tab" data-bs-toggle="tab" data-bs-target="#mobilite" type="button" role="tab" aria-controls="mobilite" aria-selected="false">Mobilité</button>
                    </li>
                </ul>

                <div class="tab-content mt-4" id="statisticsTabsContent">
                    <!-- Absence Tab -->
                    <div class="tab-pane fade show active" id="absence" role="tabpanel" aria-labelledby="absence-tab">
                        @include('statistics.partials.hr.absence')
                    </div>

                    <!-- Rotation Tab -->
                    <div class="tab-pane fade" id="rotation" role="tabpanel" aria-labelledby="rotation-tab">
                        @include('statistics.partials.hr.rotation')
                    </div>

                    <!-- Retraite Tab -->
                    <div class="tab-pane fade" id="retraite" role="tabpanel" aria-labelledby="retraite-tab">
                        @include('statistics.partials.hr.retraite')
                    </div>

                    <!-- Greve Tab -->
                    <div class="tab-pane fade" id="greve" role="tabpanel" aria-labelledby="greve-tab">
                        @include('statistics.partials.hr.greve')
                    </div>

                    <!-- Conge Tab -->
                    <div class="tab-pane fade" id="conge" role="tabpanel" aria-labelledby="conge-tab">
                        @include('statistics.partials.hr.conge')
                    </div>

                    <!-- Mobilite Tab -->
                    <div class="tab-pane fade" id="mobilite" role="tabpanel" aria-labelledby="mobilite-tab">
                        @include('statistics.partials.hr.mobilite')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for handling tabs and date range filter -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Enable Bootstrap tabs
        var triggerTabList = [].slice.call(document.querySelectorAll('#statisticsTabs button'))
        triggerTabList.forEach(function (triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)
            triggerEl.addEventListener('click', function (event) {
                event.preventDefault()
                tabTrigger.show()
            })
        });

        // Date range preset handlers
        document.querySelectorAll('[data-preset]').forEach(function(element) {
            element.addEventListener('click', function(e) {
                e.preventDefault();
                const preset = this.getAttribute('data-preset');
                const today = new Date();
                let startDate, endDate;

                switch(preset) {
                    case 'current-month':
                        startDate = new Date(today.getFullYear(), today.getMonth(), 1);
                        endDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                        break;
                    case 'last-month':
                        startDate = new Date(today.getFullYear(), today.getMonth() - 1, 1);
                        endDate = new Date(today.getFullYear(), today.getMonth(), 0);
                        break;
                    case 'current-quarter':
                        const currentQuarter = Math.floor(today.getMonth() / 3);
                        startDate = new Date(today.getFullYear(), currentQuarter * 3, 1);
                        endDate = new Date(today.getFullYear(), (currentQuarter + 1) * 3, 0);
                        break;
                    case 'last-quarter':
                        const lastQuarter = Math.floor(today.getMonth() / 3) - 1;
                        const year = lastQuarter < 0 ? today.getFullYear() - 1 : today.getFullYear();
                        const quarter = lastQuarter < 0 ? 3 : lastQuarter;
                        startDate = new Date(year, quarter * 3, 1);
                        endDate = new Date(year, (quarter + 1) * 3, 0);
                        break;
                    case 'current-year':
                        startDate = new Date(today.getFullYear(), 0, 1);
                        endDate = new Date(today.getFullYear(), 11, 31);
                        break;
                    case 'last-year':
                        startDate = new Date(today.getFullYear() - 1, 0, 1);
                        endDate = new Date(today.getFullYear() - 1, 11, 31);
                        break;
                }

                // Format dates as YYYY-MM-DD
                document.getElementById('date_debut').value = startDate.toISOString().split('T')[0];
                document.getElementById('date_fin').value = endDate.toISOString().split('T')[0];

                // Submit form automatically
                document.getElementById('dateRangeForm').submit();
            });
        });

        // Reset filter handler
        document.getElementById('resetFilter').addEventListener('click', function() {
            const today = new Date();
            const lastYear = new Date(today.getFullYear() - 1, today.getMonth(), today.getDate());

            document.getElementById('date_debut').value = lastYear.toISOString().split('T')[0];
            document.getElementById('date_fin').value = today.toISOString().split('T')[0];

            document.getElementById('dateRangeForm').submit();
        });

        // Auto-submit on date change
        document.getElementById('date_debut').addEventListener('change', function() {
            document.getElementById('dateRangeForm').submit();
        });

        document.getElementById('date_fin').addEventListener('change', function() {
            document.getElementById('dateRangeForm').submit();
        });
    });
</script>

<x-foot />
