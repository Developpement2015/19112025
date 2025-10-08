<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Mobilité - Statistiques Détaillées</h5>
            </div>
            <div class="card-body">
                <!-- Mobility Rate -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Taux de mobilité (tous cadres)</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h3 class="mb-0">{{ number_format($hrStats['mobilite']['mobility_rate'] ?? 0, 2) }}%</h3>
                                        <p class="text-muted">Total mouvements: {{ $hrStats['mobilite']['total_movements'] ?? 0 }}</p>
                                        <p class="text-muted small">Données réelles de la base de données</p>
                                    </div>
                                    <div class="chart-container" style="position: relative; height:150px; width:150px">
                                        <canvas id="mobilityRateChart"></canvas>
                                    </div>
                                </div>
                                <p class="text-muted small">Formule: (Nombre total de mouvements internes et externes / Effectif moyen) × 100</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Taux de mobilité par catégorie de cadre</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:200px;">
                                    <canvas id="mobilityByCadreChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobility Types -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Répartition par type de mobilité</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="mobilityTypeChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Mobilité interne vs externe</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="internalExternalMobilityChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cadre Distribution -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Ratio de catégorie de cadre par centre</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:300px;">
                                    <canvas id="cadreDistributionChart"></canvas>
                                </div>
                                <p class="text-muted small mt-2">Formule: Nombre de cadres médicaux dans ce centre / Nombre de cadres médicaux dans tous les centres</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobility Rate Chart
        new Chart(document.getElementById('mobilityRateChart'), {
            type: 'doughnut',
            data: {
                labels: ['Taux de mobilité', 'Personnel stable'],
                datasets: [{
                    data: [
                        {{ $hrStats['mobilite']['mobility_rate'] ?? 0 }},
                        {{ 100 - ($hrStats['mobilite']['mobility_rate'] ?? 0) }}
                    ],
                    backgroundColor: ['#FF6384', '#36A2EB']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%'
            }
        });

        // Mobility by Cadre Chart
        new Chart(document.getElementById('mobilityByCadreChart'), {
            type: 'bar',
            data: {
                labels: ['Cadre Médical', 'Infirmier/Technicien Santé', 'Cadre Administratif'],
                datasets: [{
                    label: 'Taux de mobilité (%)',
                    data: [
                        {{ $hrStats['mobilite_par_cadre']['medical']['mobility_rate'] ?? 0 }},
                        {{ $hrStats['mobilite_par_cadre']['nursing']['mobility_rate'] ?? 0 }},
                        {{ $hrStats['mobilite_par_cadre']['admin']['mobility_rate'] ?? 0 }}
                    ],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Pourcentage (%)'
                        }
                    }
                }
            }
        });

        // Mobility Type Chart
        new Chart(document.getElementById('mobilityTypeChart'), {
            type: 'pie',
            data: {
                labels: ['Mutations internes', 'Mutations externes', 'Détachements', 'Mises à disposition', 'Recrutements', 'Départs'],
                datasets: [{
                    data: [
                        {{ $hrStats['mobilite']['internal_movements'] ?? 0 }},
                        {{ $hrStats['mobilite']['external_movements'] ?? 0 }},
                        {{ $hrStats['mobilite']['detachements'] ?? 0 }},
                        {{ $hrStats['mobilite']['mises_a_disposition'] ?? 0 }},
                        {{ $hrStats['mobilite']['recrutements'] ?? 0 }},
                        {{ $hrStats['mobilite']['departs'] ?? 0 }}
                    ],
                    backgroundColor: [
                        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0',
                        '#9966FF', '#FF9F40'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Internal vs External Mobility Chart
        new Chart(document.getElementById('internalExternalMobilityChart'), {
            type: 'bar',
            data: {
                labels: ['Mobilité interne', 'Mobilité externe'],
                datasets: [{
                    label: 'Pourcentage',
                    data: [
                        {{ $hrStats['mobilite']['total_movements'] > 0 ? ($hrStats['mobilite']['internal_movements'] / $hrStats['mobilite']['total_movements'] * 100) : 0 }},
                        {{ $hrStats['mobilite']['total_movements'] > 0 ? (($hrStats['mobilite']['external_movements'] + $hrStats['mobilite']['other_movements']) / $hrStats['mobilite']['total_movements'] * 100) : 0 }}
                    ],
                    backgroundColor: ['#36A2EB', '#FF6384']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Pourcentage (%)'
                        }
                    }
                }
            }
        });

        // Cadre Distribution Chart
        new Chart(document.getElementById('cadreDistributionChart'), {
            type: 'bar',
            data: {
                labels: [
                    @foreach($hrStats['mobilite']['cadre_distribution']['formation_names'] ?? [] as $name)
                        '{{ $name }}',
                    @endforeach
                ],
                datasets: [
                    {
                        label: 'Cadre Médical',
                        data: [
                            @foreach($hrStats['mobilite']['cadre_distribution']['medical_data'] ?? [] as $percentage)
                                {{ number_format($percentage, 1) }},
                            @endforeach
                        ],
                        backgroundColor: '#FF6384'
                    },
                    {
                        label: 'Infirmier/Technicien Santé',
                        data: [
                            @foreach($hrStats['mobilite']['cadre_distribution']['nursing_data'] ?? [] as $percentage)
                                {{ number_format($percentage, 1) }},
                            @endforeach
                        ],
                        backgroundColor: '#36A2EB'
                    },
                    {
                        label: 'Cadre Administratif',
                        data: [
                            @foreach($hrStats['mobilite']['cadre_distribution']['admin_data'] ?? [] as $percentage)
                                {{ number_format($percentage, 1) }},
                            @endforeach
                        ],
                        backgroundColor: '#FFCE56'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Pourcentage (%)'
                        }
                    }
                }
            }
        });
    });
</script>
