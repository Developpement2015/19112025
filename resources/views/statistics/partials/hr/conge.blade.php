<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Congés - Statistiques Détaillées</h5>
            </div>
            <div class="card-body">
                <!-- Leave Rate -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Taux de congé (tous cadres)</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h3 class="mb-0">{{ number_format($hrStats['conge']['leave_rate'] ?? 0, 2) }}%</h3>
                                        <p class="text-muted">Total jours de congé: {{ $hrStats['conge']['leave_days'] ?? 0 }}</p>
                                        <p class="text-muted small">Données réelles de la base de données</p>
                                    </div>
                                    <div class="chart-container" style="position: relative; height:150px; width:150px">
                                        <canvas id="leaveRateChart"></canvas>
                                    </div>
                                </div>
                                <p class="text-muted small">Formule: (Nombre total de jours de congé pris / Nombre total de jours ouvrables disponibles) × 100</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Taux de congé par catégorie de cadre</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:200px;">
                                    <canvas id="leaveByCadreChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Leave Types -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Répartition par type de congé</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="leaveTypeChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Durée moyenne par type de congé</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="leaveAverageDurationChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Leave Trends -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Évolution des congés</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="leaveTrendsChart"></canvas>
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
        // Leave Rate Chart
        new Chart(document.getElementById('leaveRateChart'), {
            type: 'doughnut',
            data: {
                labels: ['Jours de congé', 'Jours travaillés'],
                datasets: [{
                    data: [
                        {{ $hrStats['conge']['leave_rate'] ?? 0 }},
                        {{ 100 - ($hrStats['conge']['leave_rate'] ?? 0) }}
                    ],
                    backgroundColor: ['#4BC0C0', '#36A2EB']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%'
            }
        });

        // Leave by Cadre Chart
        new Chart(document.getElementById('leaveByCadreChart'), {
            type: 'bar',
            data: {
                labels: ['Cadre Médical', 'Infirmier/Technicien Santé', 'Cadre Administratif'],
                datasets: [{
                    label: 'Taux de congé (%)',
                    data: [
                        {{ $hrStats['conge_par_cadre']['medical']['leave_rate'] ?? 0 }},
                        {{ $hrStats['conge_par_cadre']['nursing']['leave_rate'] ?? 0 }},
                        {{ $hrStats['conge_par_cadre']['admin']['leave_rate'] ?? 0 }}
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

        // Leave Type Chart
        new Chart(document.getElementById('leaveTypeChart'), {
            type: 'pie',
            data: {
                labels: [
                    @foreach($hrStats['conge']['type_distribution']['labels'] ?? [] as $label)
                        '{{ $label }}',
                    @endforeach
                ],
                datasets: [{
                    data: [
                        @foreach($hrStats['conge']['type_distribution']['data'] ?? [] as $count)
                            {{ $count }},
                        @endforeach
                    ],
                    backgroundColor: [
                        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0',
                        '#9966FF', '#FF9F40', '#C9CBCF', '#8AC249'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Leave Average Duration Chart
        new Chart(document.getElementById('leaveAverageDurationChart'), {
            type: 'bar',
            data: {
                labels: [
                    @foreach($hrStats['conge']['average_duration']['labels'] ?? [] as $label)
                        '{{ $label }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Durée moyenne (jours)',
                    data: [
                        @foreach($hrStats['conge']['average_duration']['data'] ?? [] as $duration)
                            {{ number_format($duration, 1) }},
                        @endforeach
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
                            text: 'Jours'
                        }
                    }
                }
            }
        });

        // Leave Trends Chart
        new Chart(document.getElementById('leaveTrendsChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [
                    {
                        label: 'Nombre de demandes de congé',
                        data: [
                            {{ $hrStats['conge']['monthly_trends']['requests'][0] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['requests'][1] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['requests'][2] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['requests'][3] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['requests'][4] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['requests'][5] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['requests'][6] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['requests'][7] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['requests'][8] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['requests'][9] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['requests'][10] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['requests'][11] ?? 0 }}
                        ],
                        borderColor: '#4BC0C0',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.1
                    },
                    {
                        label: 'Jours de congé pris',
                        data: [
                            {{ $hrStats['conge']['monthly_trends']['days'][0] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['days'][1] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['days'][2] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['days'][3] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['days'][4] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['days'][5] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['days'][6] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['days'][7] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['days'][8] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['days'][9] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['days'][10] ?? 0 }},
                            {{ $hrStats['conge']['monthly_trends']['days'][11] ?? 0 }}
                        ],
                        borderColor: '#FF6384',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
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
