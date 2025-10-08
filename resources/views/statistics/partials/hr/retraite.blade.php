<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Départs à la Retraite - Statistiques Détaillées</h5>
            </div>
            <div class="card-body">
                <!-- Retirement Rate -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Taux de départ à la retraite limite d'âge</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h3 class="mb-0">{{ number_format($hrStats['retraite']['retirement_by_age_rate'] ?? 0, 2) }}%</h3>
                                        <p class="text-muted">Nombre de départs: {{ $hrStats['retraite']['retirement_by_age_count'] ?? 0 }}</p>
                                        <p class="text-muted small">Données réelles de la base de données</p>
                                    </div>
                                    <div class="chart-container" style="position: relative; height:150px; width:150px">
                                        <canvas id="retirementRateChart"></canvas>
                                    </div>
                                </div>
                                <p class="text-muted small">Formule: (Nombre de départs à la retraite limite d'âge / Effectif total) × 100</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Taux de départ à la retraite anticipée</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h3 class="mb-0">{{ number_format($hrStats['retraite']['early_retirement_rate'] ?? 0, 2) }}%</h3>
                                        <p class="text-muted">Nombre de départs: {{ $hrStats['retraite']['early_retirement_count'] ?? 0 }}</p>
                                    </div>
                                    <div class="chart-container" style="position: relative; height:150px; width:150px">
                                        <canvas id="earlyRetirementRateChart"></canvas>
                                    </div>
                                </div>
                                <p class="text-muted small">Formule: (Nombre de départs à la retraite anticipée / Effectif total) × 100</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Retirement by Cadre Category -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Départs à la retraite limite d'âge par catégorie</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="retirementByCadreChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Départs à la retraite anticipée par catégorie</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="earlyRetirementByCadreChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Retirement Trends -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Évolution des départs à la retraite</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="retirementTrendsChart"></canvas>
                                </div>
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
        // Retirement Rate Chart
        new Chart(document.getElementById('retirementRateChart'), {
            type: 'doughnut',
            data: {
                labels: ['Départs à la retraite', 'Personnel restant'],
                datasets: [{
                    data: [
                        {{ $hrStats['retraite']['retirement_by_age_rate'] ?? 0 }},
                        {{ 100 - ($hrStats['retraite']['retirement_by_age_rate'] ?? 0) }}
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

        // Early Retirement Rate Chart
        new Chart(document.getElementById('earlyRetirementRateChart'), {
            type: 'doughnut',
            data: {
                labels: ['Départs anticipés', 'Personnel restant'],
                datasets: [{
                    data: [
                        {{ $hrStats['retraite']['early_retirement_rate'] ?? 0 }},
                        {{ 100 - ($hrStats['retraite']['early_retirement_rate'] ?? 0) }}
                    ],
                    backgroundColor: ['#FFCE56', '#36A2EB']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%'
            }
        });

        // Retirement by Cadre Chart
        new Chart(document.getElementById('retirementByCadreChart'), {
            type: 'bar',
            data: {
                labels: ['Cadre Médical', 'Infirmier/Technicien Santé', 'Cadre Administratif'],
                datasets: [{
                    label: 'Taux de départ à la retraite (%)',
                    data: [
                        {{ $hrStats['retraite_par_cadre']['medical']['retirement_by_age_rate'] ?? 0 }},
                        {{ $hrStats['retraite_par_cadre']['nursing']['retirement_by_age_rate'] ?? 0 }},
                        {{ $hrStats['retraite_par_cadre']['admin']['retirement_by_age_rate'] ?? 0 }}
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

        // Early Retirement by Cadre Chart
        new Chart(document.getElementById('earlyRetirementByCadreChart'), {
            type: 'bar',
            data: {
                labels: ['Cadre Médical', 'Infirmier/Technicien Santé', 'Cadre Administratif'],
                datasets: [{
                    label: 'Taux de départ anticipé (%)',
                    data: [
                        {{ $hrStats['retraite_par_cadre']['medical']['early_retirement_rate'] ?? 0 }},
                        {{ $hrStats['retraite_par_cadre']['nursing']['early_retirement_rate'] ?? 0 }},
                        {{ $hrStats['retraite_par_cadre']['admin']['early_retirement_rate'] ?? 0 }}
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

        // Retirement Trends Chart
        new Chart(document.getElementById('retirementTrendsChart'), {
            type: 'line',
            data: {
                labels: [
                    @foreach($hrStats['retraite']['trends']['years'] ?? [] as $year)
                        '{{ $year }}',
                    @endforeach
                ],
                datasets: [
                    {
                        label: 'Retraite limite d\'âge',
                        data: [
                            @foreach($hrStats['retraite']['trends']['retirement_by_age_data'] ?? [] as $rate)
                                {{ number_format($rate, 1) }},
                            @endforeach
                        ],
                        borderColor: '#FF6384',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        tension: 0.1
                    },
                    {
                        label: 'Retraite anticipée',
                        data: [
                            @foreach($hrStats['retraite']['trends']['early_retirement_data'] ?? [] as $rate)
                                {{ number_format($rate, 1) }},
                            @endforeach
                        ],
                        borderColor: '#FFCE56',
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        tension: 0.1
                    }
                ]
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
    });
</script>
