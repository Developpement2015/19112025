<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Taux d'Absence - Statistiques Détaillées</h5>
            </div>
            <div class="card-body">
                <!-- Overall Absence Rate -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Taux d'absence totale (tous cadres)</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h3 class="mb-0">{{ number_format($hrStats['taux_absence_totale']['percentage'] ?? 0, 2) }}%</h3>
                                        <p class="text-muted">Total jours d'absence: {{ $hrStats['taux_absence_totale']['total_days'] ?? 0 }}</p>
                                        <p class="text-muted small">Données réelles de la base de données</p>
                                    </div>
                                    <div class="chart-container" style="position: relative; height:150px; width:150px">
                                        <canvas id="absenceRateChart"></canvas>
                                    </div>
                                </div>
                                <p class="text-muted small">Formule: (Nombre total de jours d'absence / (365 jours × Effectif total)) × 100</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Taux d'absence par catégorie de cadre</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:200px;">
                                    <canvas id="absenceByCadreChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Absence Causes -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Ratio cause absence médicale courte durée (1-7 jours)</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:200px;">
                                    <canvas id="shortAbsenceChart"></canvas>
                                </div>
                                <p class="text-muted small mt-2">Formule: (Total certificats de 1 à 7 jours / Total certificats médicaux) × 100</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Ratio cause absence longue durée (>30 jours)</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:200px;">
                                    <canvas id="longAbsenceChart"></canvas>
                                </div>
                                <p class="text-muted small mt-2">Formule: (Total certificats de plus de 30 jours / Total certificats médicaux) × 100</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lost Work Days -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Nombre de jours perdus de travail</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="lostWorkDaysChart"></canvas>
                                </div>
                                <p class="text-muted small mt-2">Formule: Nombre de jours d'absence + jours de grèves + jours de certificats médicaux</p>
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
        // Overall Absence Rate Chart
        new Chart(document.getElementById('absenceRateChart'), {
            type: 'doughnut',
            data: {
                labels: ['Jours d\'absence', 'Jours travaillés'],
                datasets: [{
                    data: [
                        {{ $hrStats['taux_absence_totale']['percentage'] ?? 0 }},
                        {{ 100 - ($hrStats['taux_absence_totale']['percentage'] ?? 0) }}
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

        // Absence by Cadre Chart
        new Chart(document.getElementById('absenceByCadreChart'), {
            type: 'bar',
            data: {
                labels: ['Cadre Médical', 'Infirmier/Technicien Santé', 'Cadre Administratif'],
                datasets: [{
                    label: 'Taux d\'absence (%)',
                    data: [
                        {{ $hrStats['taux_absence_par_cadre']['medical']['percentage'] ?? 0 }},
                        {{ $hrStats['taux_absence_par_cadre']['nursing']['percentage'] ?? 0 }},
                        {{ $hrStats['taux_absence_par_cadre']['admin']['percentage'] ?? 0 }}
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

        // Short Absence Chart
        new Chart(document.getElementById('shortAbsenceChart'), {
            type: 'pie',
            data: {
                labels: ['Certificats 1-7 jours', 'Autres certificats'],
                datasets: [{
                    data: [
                        {{ $hrStats['absence_medicale']['short_term_ratio'] ?? 0 }},
                        {{ 100 - ($hrStats['absence_medicale']['short_term_ratio'] ?? 0) }}
                    ],
                    backgroundColor: ['#FF6384', '#36A2EB']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Long Absence Chart
        new Chart(document.getElementById('longAbsenceChart'), {
            type: 'pie',
            data: {
                labels: ['Certificats >30 jours', 'Autres certificats'],
                datasets: [{
                    data: [
                        {{ $hrStats['absence_medicale']['long_term_ratio'] ?? 0 }},
                        {{ 100 - ($hrStats['absence_medicale']['long_term_ratio'] ?? 0) }}
                    ],
                    backgroundColor: ['#FF6384', '#36A2EB']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Lost Work Days Chart
        new Chart(document.getElementById('lostWorkDaysChart'), {
            type: 'bar',
            data: {
                labels: ['Tous Cadres', 'Cadre Médical', 'Infirmier/Technicien', 'Cadre Administratif'],
                datasets: [{
                    label: 'Jours perdus',
                    data: [
                        {{ $hrStats['jours_perdus']['total_lost_days'] ?? 0 }},
                        {{ $hrStats['jours_perdus_par_cadre']['medical']['total_lost_days'] ?? 0 }},
                        {{ $hrStats['jours_perdus_par_cadre']['nursing']['total_lost_days'] ?? 0 }},
                        {{ $hrStats['jours_perdus_par_cadre']['admin']['total_lost_days'] ?? 0 }}
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
                            text: 'Nombre de jours'
                        }
                    }
                }
            }
        });
    });
</script>
