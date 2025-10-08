<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">Grèves - Statistiques Détaillées</h5>
            </div>
            <div class="card-body">
                <!-- Strike Rate -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Taux de grève (tous cadres)</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h3 class="mb-0">{{ number_format($hrStats['greve']['strike_rate'] ?? 0, 2) }}%</h3>
                                        <p class="text-muted">Nombre de grévistes: {{ $hrStats['greve']['strike_count'] ?? 0 }}</p>
                                        <p class="text-muted small">Données réelles de la base de données</p>
                                    </div>
                                    <div class="chart-container" style="position: relative; height:150px; width:150px">
                                        <canvas id="strikeRateChart"></canvas>
                                    </div>
                                </div>
                                <p class="text-muted small">Formule: (Nombre de grévistes / Effectif total) × 100</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Taux de grève par catégorie de cadre</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:200px;">
                                    <canvas id="strikeByCadreChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Strike Duration -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Durée moyenne des grèves</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h3 class="mb-0">{{ $hrStats['greve']['strike_count'] > 0 ? number_format($hrStats['greve']['strike_days'] / $hrStats['greve']['strike_count'], 1) : 0 }} jours</h3>
                                        <p class="text-muted">Total jours de grève: {{ $hrStats['greve']['strike_days'] ?? 0 }}</p>
                                    </div>
                                    <div class="chart-container" style="position: relative; height:150px; width:150px">
                                        <canvas id="strikeDurationChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Répartition des grèves par durée</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:200px;">
                                    <canvas id="strikeDurationDistributionChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Strike Trends -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Évolution des grèves</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="strikeTrendsChart"></canvas>
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
        // Strike Rate Chart
        new Chart(document.getElementById('strikeRateChart'), {
            type: 'doughnut',
            data: {
                labels: ['Grévistes', 'Non-grévistes'],
                datasets: [{
                    data: [
                        {{ $hrStats['greve']['strike_rate'] ?? 0 }},
                        {{ 100 - ($hrStats['greve']['strike_rate'] ?? 0) }}
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

        // Strike by Cadre Chart
        new Chart(document.getElementById('strikeByCadreChart'), {
            type: 'bar',
            data: {
                labels: ['Cadre Médical', 'Infirmier/Technicien Santé', 'Cadre Administratif'],
                datasets: [{
                    label: 'Taux de grève (%)',
                    data: [
                        {{ $hrStats['greve_par_cadre']['medical']['strike_rate'] ?? 0 }},
                        {{ $hrStats['greve_par_cadre']['nursing']['strike_rate'] ?? 0 }},
                        {{ $hrStats['greve_par_cadre']['admin']['strike_rate'] ?? 0 }}
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

        // Strike Duration Chart
        new Chart(document.getElementById('strikeDurationChart'), {
            type: 'doughnut',
            data: {
                labels: ['1 jour', '2-3 jours', '4+ jours'],
                datasets: [{
                    data: [
                        {{ $hrStats['greve']['duration_distribution']['grouped']['1_day'] ?? 0 }},
                        {{ $hrStats['greve']['duration_distribution']['grouped']['2_3_days'] ?? 0 }},
                        {{ $hrStats['greve']['duration_distribution']['grouped']['4_plus_days'] ?? 0 }}
                    ],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%'
            }
        });

        // Strike Duration Distribution Chart
        new Chart(document.getElementById('strikeDurationDistributionChart'), {
            type: 'bar',
            data: {
                labels: ['1 jour', '2 jours', '3 jours', '4 jours', '5+ jours'],
                datasets: [{
                    label: 'Nombre de grèves',
                    data: [
                        {{ $hrStats['greve']['duration_distribution']['detailed']['1_day'] ?? 0 }},
                        {{ $hrStats['greve']['duration_distribution']['detailed']['2_days'] ?? 0 }},
                        {{ $hrStats['greve']['duration_distribution']['detailed']['3_days'] ?? 0 }},
                        {{ $hrStats['greve']['duration_distribution']['detailed']['4_days'] ?? 0 }},
                        {{ $hrStats['greve']['duration_distribution']['detailed']['5_plus_days'] ?? 0 }}
                    ],
                    backgroundColor: '#36A2EB'
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
                            text: 'Nombre'
                        }
                    }
                }
            }
        });

        // Strike Trends Chart
        new Chart(document.getElementById('strikeTrendsChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [
                    {
                        label: 'Nombre de grévistes',
                        data: [
                            {{ $hrStats['greve']['monthly_trends']['strikers'][0] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strikers'][1] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strikers'][2] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strikers'][3] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strikers'][4] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strikers'][5] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strikers'][6] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strikers'][7] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strikers'][8] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strikers'][9] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strikers'][10] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strikers'][11] ?? 0 }}
                        ],
                        borderColor: '#FF6384',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        tension: 0.1
                    },
                    {
                        label: 'Jours de grève',
                        data: [
                            {{ $hrStats['greve']['monthly_trends']['strike_days'][0] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strike_days'][1] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strike_days'][2] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strike_days'][3] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strike_days'][4] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strike_days'][5] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strike_days'][6] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strike_days'][7] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strike_days'][8] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strike_days'][9] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strike_days'][10] ?? 0 }},
                            {{ $hrStats['greve']['monthly_trends']['strike_days'][11] ?? 0 }}
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
                            text: 'Nombre'
                        }
                    }
                }
            }
        });
    });
</script>
