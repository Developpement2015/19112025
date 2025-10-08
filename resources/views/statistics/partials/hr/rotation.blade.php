<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Rotation du Personnel - Statistiques Détaillées</h5>
            </div>
            <div class="card-body">
                <!-- Overall Staff Rotation Rate -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Ratio de rotation du personnel (tous cadres)</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h3 class="mb-0">{{ number_format($hrStats['rotation_personnel']['rotation_rate'] ?? 0, 2) }}%</h3>
                                        <p class="text-muted">Effectif moyen: {{ $hrStats['rotation_personnel']['average_staff'] ?? 0 }} personnes</p>
                                        <p class="text-muted small">Données réelles de la base de données</p>
                                    </div>
                                    <div class="chart-container" style="position: relative; height:150px; width:150px">
                                        <canvas id="rotationRateChart"></canvas>
                                    </div>
                                </div>
                                <p class="text-muted small">Formule: [(Sortants + Entrants) / 2] / Effectif moyen × 100</p>
                                <p class="text-muted small">Sortants: retraites, mutations, démissions, mises à disposition, détachements, abandons de poste</p>
                                <p class="text-muted small">Entrants: recrutements, mutations entrantes, mises à disposition entrantes, détachements entrants</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Rotation par catégorie de cadre</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:200px;">
                                    <canvas id="rotationByCadreChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Staff Movement Details -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Détails des mouvements sortants</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="outgoingMovementsChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Détails des mouvements entrants</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="incomingMovementsChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Abandonment Rate -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Ratio d'abandon de poste par catégorie</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="abandonmentRateChart"></canvas>
                                </div>
                                <p class="text-muted small mt-2">Formule: (Nombre de fonctionnaires ayant abandonné leur poste / Effectif total) × 100</p>
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
        // Overall Rotation Rate Chart
        new Chart(document.getElementById('rotationRateChart'), {
            type: 'doughnut',
            data: {
                labels: ['Taux de rotation', 'Stabilité'],
                datasets: [{
                    data: [
                        {{ $hrStats['rotation_personnel']['rotation_rate'] ?? 0 }},
                        {{ 100 - ($hrStats['rotation_personnel']['rotation_rate'] ?? 0) }}
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

        // Rotation by Cadre Chart
        new Chart(document.getElementById('rotationByCadreChart'), {
            type: 'bar',
            data: {
                labels: ['Cadre Médical', 'Infirmier/Technicien Santé', 'Cadre Administratif'],
                datasets: [{
                    label: 'Taux de rotation (%)',
                    data: [
                        {{ $hrStats['rotation_par_cadre']['medical']['rotation_rate'] ?? 0 }},
                        {{ $hrStats['rotation_par_cadre']['nursing']['rotation_rate'] ?? 0 }},
                        {{ $hrStats['rotation_par_cadre']['admin']['rotation_rate'] ?? 0 }}
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

        // Outgoing Movements Chart
        new Chart(document.getElementById('outgoingMovementsChart'), {
            type: 'pie',
            data: {
                labels: ['Retraite limite d\'âge', 'Retraite anticipée', 'Mutations sortantes', 'Démissions', 'Mises à disposition', 'Détachements', 'Abandons de poste'],
                datasets: [{
                    data: [
                        {{ $hrStats['retraite']['retirement_by_age_count'] ?? 0 }},
                        {{ $hrStats['retraite']['early_retirement_count'] ?? 0 }},
                        {{ $hrStats['rotation_personnel']['outgoing_breakdown']['mutations_sortantes'] ?? 0 }},
                        {{ $hrStats['rotation_personnel']['outgoing_breakdown']['demissions'] ?? 0 }},
                        {{ $hrStats['rotation_personnel']['outgoing_breakdown']['mises_a_disposition'] ?? 0 }},
                        {{ $hrStats['rotation_personnel']['outgoing_breakdown']['detachements'] ?? 0 }},
                        {{ $hrStats['abandon_poste']['abandonment_count'] ?? 0 }}
                    ],
                    backgroundColor: [
                        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0',
                        '#9966FF', '#FF9F40', '#C9CBCF'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Incoming Movements Chart
        new Chart(document.getElementById('incomingMovementsChart'), {
            type: 'pie',
            data: {
                labels: ['Recrutements', 'Mutations entrantes', 'Mises à disposition entrantes', 'Détachements entrants', 'Formation résidant médecin'],
                datasets: [{
                    data: [
                        {{ $hrStats['rotation_personnel']['incoming_breakdown']['recrutements'] ?? 0 }},
                        {{ $hrStats['rotation_personnel']['incoming_breakdown']['mutations_entrantes'] ?? 0 }},
                        {{ $hrStats['rotation_personnel']['incoming_breakdown']['mises_a_disposition_entrantes'] ?? 0 }},
                        {{ $hrStats['rotation_personnel']['incoming_breakdown']['detachements_entrants'] ?? 0 }},
                        {{ $hrStats['rotation_personnel']['incoming_breakdown']['formation_residant_medecin'] ?? 0 }}
                    ],
                    backgroundColor: [
                        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Abandonment Rate Chart
        new Chart(document.getElementById('abandonmentRateChart'), {
            type: 'bar',
            data: {
                labels: ['Tous Cadres', 'Cadre Médical', 'Infirmier/Technicien', 'Cadre Administratif'],
                datasets: [{
                    label: 'Taux d\'abandon (%)',
                    data: [
                        {{ $hrStats['abandon_poste']['abandonment_rate'] ?? 0 }},
                        {{ $hrStats['abandon_poste_par_cadre']['medical']['abandonment_rate'] ?? 0 }},
                        {{ $hrStats['abandon_poste_par_cadre']['nursing']['abandonment_rate'] ?? 0 }},
                        {{ $hrStats['abandon_poste_par_cadre']['admin']['abandonment_rate'] ?? 0 }}
                    ],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
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
    });
</script>
