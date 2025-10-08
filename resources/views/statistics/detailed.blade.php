<x-head titre="Statistiques Détaillées" />
<x-header />
<x-sidebar />

<!-- Block Principal -->
<div class="page-wrapper">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Statistiques Détaillées</h4>
                    <h6 class="text-capitalize text-muted">Matrice complexe des relations hiérarchiques</h6>
                </div>
            </div>
        </div>

        <!-- Statistics Matrix -->
        <div class="card table-list-card">
            <div class="card-body">
                <!-- Tabs for different statistics views -->
                <ul class="nav nav-tabs" id="statisticsTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="geographic-tab" data-bs-toggle="tab" data-bs-target="#geographic" type="button" role="tab" aria-controls="geographic" aria-selected="true">Hiérarchie Géographique</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="healthcare-tab" data-bs-toggle="tab" data-bs-target="#healthcare" type="button" role="tab" aria-controls="healthcare" aria-selected="false">Formations Sanitaires</button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="personnel-tab" data-bs-toggle="tab" data-bs-target="#personnel" type="button" role="tab" aria-controls="personnel" aria-selected="false">Affectation du Personnel</button>
                    </li> --}}
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="cadre-tab" data-bs-toggle="tab" data-bs-target="#cadre" type="button" role="tab" aria-controls="cadre" aria-selected="false">Relations Cadres</button>
                    </li>
                </ul>

                <div class="tab-content mt-4" id="statisticsTabsContent">
                    <!-- Geographic Hierarchy Tab -->
                    <div class="tab-pane fade show active" id="geographic" role="tabpanel" aria-labelledby="geographic-tab">
                        @include('statistics.partials.geographic')
                    </div>

                    <!-- Healthcare Formations Tab -->
                    <div class="tab-pane fade" id="healthcare" role="tabpanel" aria-labelledby="healthcare-tab">
                        @include('statistics.partials.healthcare')
                    </div>

                    <!-- Personnel Assignment Tab -->
                    <div class="tab-pane fade" id="personnel" role="tabpanel" aria-labelledby="personnel-tab">
                        @include('statistics.partials.personnel')
                    </div>

                    <!-- Cadre Relationships Tab -->
                    <div class="tab-pane fade" id="cadre" role="tabpanel" aria-labelledby="cadre-tab">
                        @include('statistics.partials.cadre')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for handling tabs -->
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

        // If URL hash or query param requests a specific tab, activate it.
        function activateTabById(tabId) {
            if (!tabId) return;
            var btn = document.querySelector('#statisticsTabs button[data-bs-target="#' + tabId + '"]');
            if (btn) {
                var tab = new bootstrap.Tab(btn);
                tab.show();
            }
        }

        // Check hash first (e.g. /statistics/detailed#healthcare)
        var hash = window.location.hash ? window.location.hash.replace('#', '') : null;
        if (hash) {
            activateTabById(hash);
            return;
        }

        // Check query param 'tab' (e.g. /statistics/detailed?tab=healthcare)
        try {
            var params = new URLSearchParams(window.location.search);
            var tabParam = params.get('tab');
            if (tabParam) {
                activateTabById(tabParam);
                return;
            }
        } catch (e) {
            // ignore
        }

        // Default behavior: activate 'healthcare' tab (Formations Sanitaires)
        activateTabById('healthcare');
    });
</script>

<x-foot />

