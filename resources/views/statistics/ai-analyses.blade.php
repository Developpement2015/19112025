<x-head titre="Analyses IA - Statistiques RH" />
<x-header />
<x-sidebar />

<!-- Block Principal -->
<div class="page-wrapper">
    <div class="content">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-gradient-primary text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-robot fa-3x opacity-75"></i>
                        </div>
                        <div>
                            <h1 class="h3 mb-1">Analyses IA des Statistiques RH</h1>
                            <p class="mb-0 opacity-90">Intelligence artificielle pour l'analyse des ressources humaines</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Analysis Controls -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="fas fa-cogs text-primary me-2"></i>
                        Configuration de l'Analyse
                    </h5>
                </div>
                <div class="card-body">
                    <form id="aiAnalysisForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="prompt_type" class="form-label fw-bold">Type d'analyse</label>
                                <select class="form-select" id="prompt_type" name="prompt_type" required>
                                    <option value="">Sélectionnez un type d'analyse...</option>
                                    @foreach($analysisPrompts as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                    @endforeach
                                    <option value="custom">Analyse personnalisée</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="custom_prompt" class="form-label fw-bold">Demande personnalisée (optionnel)</label>
                                <textarea class="form-control" id="custom_prompt" name="custom_prompt" rows="3"
                                    placeholder="Exemples: 'Analysez l'évolution de l'absentéisme', 'Étudiez la mobilité par service', 'Recommandations pour améliorer la performance'..."
                                    style="display: none;"></textarea>
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Décrivez votre demande d'analyse RH. Exemples: analyse de tendances, comparaisons, recommandations, etc.
                                </small>
                            </div>
                        </div>
                        <!-- Example prompts for custom analysis -->
                        <div class="row mt-3" id="examplePrompts" style="display: none;">
                            <div class="col-12">
                                <div class="alert alert-light border">
                                    <h6 class="fw-bold mb-2">
                                        <i class="fas fa-lightbulb text-warning me-2"></i>
                                        Exemples de demandes personnalisées :
                                    </h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="mb-0 small">
                                                <li>"Analysez l'évolution de l'absentéisme sur les 6 derniers mois"</li>
                                                <li>"Comparez la mobilité entre les différents services"</li>
                                                <li>"Étudiez l'impact des congés sur la productivité"</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="mb-0 small">
                                                <li>"Recommandations pour réduire le taux de rotation"</li>
                                                <li>"Analyse des tendances de départ en retraite"</li>
                                                <li>"Stratégies d'amélioration de la performance RH"</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-magic me-2"></i>
                                    Générer l'Analyse IA
                                </button>
                                <button type="button" class="btn btn-outline-secondary ms-2" id="clearAnalysis">
                                    <i class="fas fa-eraser me-2"></i>
                                    Effacer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Indicator -->
    <div class="row mb-4" id="loadingIndicator" style="display: none;">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                    <h5 class="text-muted">Génération de l'analyse en cours...</h5>
                    <p class="text-muted mb-0">L'IA analyse vos données RH, veuillez patienter.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Analysis Results -->
    <div class="row" id="analysisResults" style="display: none;">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-gradient-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-line me-2"></i>
                        <span id="analysisTitle">Résultats de l'Analyse IA</span>
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Executive Summary -->
                    <div class="alert alert-info border-0 mb-4" id="executiveSummary">
                        <h6 class="alert-heading">
                            <i class="fas fa-info-circle me-2"></i>
                            Résumé Exécutif
                        </h6>
                        <p class="mb-0" id="summaryContent"></p>
                    </div>

                    <!-- Detailed Analysis -->
                    <div class="mb-4">
                        <h6 class="fw-bold text-primary mb-3">
                            <i class="fas fa-microscope me-2"></i>
                            Analyse Détaillée
                        </h6>
                        <div class="analysis-content bg-light p-4 rounded" id="detailedAnalysis"></div>
                    </div>

                    <!-- Recommendations -->
                    <div class="mb-4">
                        <h6 class="fw-bold text-success mb-3">
                            <i class="fas fa-lightbulb me-2"></i>
                            Recommandations
                        </h6>
                        <div class="analysis-content bg-light p-4 rounded" id="recommendations"></div>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" onclick="printAnalysis()">
                            <i class="fas fa-print me-2"></i>
                            Imprimer
                        </button>
                        <button class="btn btn-outline-success" onclick="exportAnalysis()">
                            <i class="fas fa-download me-2"></i>
                            Exporter PDF
                        </button>
                        <button class="btn btn-outline-info" onclick="shareAnalysis()">
                            <i class="fas fa-share me-2"></i>
                            Partager
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Display -->
    <div class="row" id="errorDisplay" style="display: none;">
        <div class="col-12">
            <div class="alert alert-danger border-0">
                <h6 class="alert-heading">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Erreur
                </h6>
                <p class="mb-0" id="errorMessage"></p>
            </div>
        </div>
    </div>

    <!-- HR Statistics Summary -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="fas fa-database text-info me-2"></i>
                        Données Statistiques Disponibles
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="bg-primary bg-opacity-10 p-3 rounded text-center">
                                <i class="fas fa-users fa-2x text-primary mb-2"></i>
                                <h6 class="fw-bold">Effectif</h6>
                                <p class="mb-0 text-muted">{{ \App\Models\Fonctionnaire::count() }} fonctionnaires</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="bg-warning bg-opacity-10 p-3 rounded text-center">
                                <i class="fas fa-calendar-times fa-2x text-warning mb-2"></i>
                                <h6 class="fw-bold">Absentéisme</h6>
                                <p class="mb-0 text-muted">{{ round($hrStats['taux_absence_totale']['percentage'] ?? 0, 2) }}% taux</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="bg-success bg-opacity-10 p-3 rounded text-center">
                                <i class="fas fa-exchange-alt fa-2x text-success mb-2"></i>
                                <h6 class="fw-bold">Mobilité</h6>
                                <p class="mb-0 text-muted">{{ $hrStats['mobilite']['total_movements'] ?? 0 }} mouvements</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="bg-info bg-opacity-10 p-3 rounded text-center">
                                <i class="fas fa-umbrella-beach fa-2x text-info mb-2"></i>
                                <h6 class="fw-bold">Congés</h6>
                                <p class="mb-0 text-muted">{{ $hrStats['conge']['leave_days'] ?? 0 }} jours</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<style>
<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .bg-gradient-success {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .card {
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: translateY(-2px);
    }

    .spinner-border {
        width: 3rem;
        height: 3rem;
    }

    .analysis-content {
        white-space: pre-wrap;
        line-height: 1.8;
        font-size: 1.05rem;
        color: #2c3e50;
        border-left: 4px solid #3498db;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .analysis-content h1, .analysis-content h2, .analysis-content h3,
    .analysis-content h4, .analysis-content h5, .analysis-content h6 {
        color: #2c3e50;
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .analysis-content p {
        margin-bottom: 1rem;
        text-align: justify;
    }

    .analysis-content ul, .analysis-content ol {
        margin-left: 1.5rem;
        margin-bottom: 1rem;
    }

    .analysis-content li {
        margin-bottom: 0.5rem;
    }

    .analysis-content strong {
        color: #2980b9;
        font-weight: 600;
    }

    .analysis-content::first-line {
        font-weight: 500;
        color: #2c3e50;
    }

    /* Print styles */
    @media print {
        .analysis-content {
            background: white !important;
            box-shadow: none !important;
            border: 1px solid #ddd !important;
        }

        .card {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
        }

        .btn {
            display: none !important;
        }
    }

    /* Responsive improvements */
    @media (max-width: 768px) {
        .analysis-content {
            font-size: 1rem;
            padding: 1rem;
        }

        .container-fluid {
            padding: 0.5rem;
        }
    }

    .alert {
        border-left: 4px solid;
    }

    .alert-info {
        border-left-color: #0dcaf0;
    }

    .alert-danger {
        border-left-color: #dc3545;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('aiAnalysisForm');
    const promptTypeSelect = document.getElementById('prompt_type');
    const customPromptTextarea = document.getElementById('custom_prompt');
    const loadingIndicator = document.getElementById('loadingIndicator');
    const analysisResults = document.getElementById('analysisResults');
    const errorDisplay = document.getElementById('errorDisplay');

    // Show/hide custom prompt textarea and examples
    promptTypeSelect.addEventListener('change', function() {
        const examplePrompts = document.getElementById('examplePrompts');

        if (this.value === 'custom') {
            customPromptTextarea.style.display = 'block';
            customPromptTextarea.required = true;
            examplePrompts.style.display = 'block';
        } else {
            customPromptTextarea.style.display = 'none';
            customPromptTextarea.required = false;
            customPromptTextarea.value = '';
            examplePrompts.style.display = 'none';
        }
    });

    // Handle form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Hide previous results and errors
        analysisResults.style.display = 'none';
        errorDisplay.style.display = 'none';

        // Show loading indicator
        loadingIndicator.style.display = 'block';

        // Prepare form data
        const formData = new FormData(form);

        // Make AJAX request
        fetch('{{ route("statistics.ai-analyses.generate") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            loadingIndicator.style.display = 'none';

            if (data.success) {
                displayAnalysis(data.analysis, data.prompt_type);
            } else {
                displayError(data.error || 'Une erreur est survenue');
            }
        })
        .catch(error => {
            loadingIndicator.style.display = 'none';
            displayError('Erreur de connexion. Veuillez réessayer.');
            console.error('Error:', error);
        });
    });

    // Clear analysis
    document.getElementById('clearAnalysis').addEventListener('click', function() {
        form.reset();
        analysisResults.style.display = 'none';
        errorDisplay.style.display = 'none';
        customPromptTextarea.style.display = 'none';
        customPromptTextarea.required = false;
        document.getElementById('examplePrompts').style.display = 'none';
    });

    function displayAnalysis(analysis, promptType) {
        document.getElementById('analysisTitle').textContent = analysis.titre || 'Analyse IA';
        document.getElementById('summaryContent').textContent = analysis.resume || '';
        document.getElementById('detailedAnalysis').textContent = analysis.analyse || '';
        document.getElementById('recommendations').textContent = analysis.recommandations || '';

        // Store current prompt type for export/share
        window.currentPromptType = promptType;

        analysisResults.style.display = 'block';
        analysisResults.scrollIntoView({ behavior: 'smooth' });
    }

    function displayError(message) {
        document.getElementById('errorMessage').textContent = message;
        errorDisplay.style.display = 'block';
        errorDisplay.scrollIntoView({ behavior: 'smooth' });
    }
});

function printAnalysis() {
    window.print();
}

function exportAnalysis() {
    const analysisData = getCurrentAnalysisData();
    if (!analysisData) {
        alert('Aucune analyse à exporter. Veuillez d\'abord générer une analyse.');
        return;
    }

    // Create form data for PDF export
    const formData = new FormData();
    formData.append('titre', analysisData.titre);
    formData.append('resume', analysisData.resume);
    formData.append('analyse', analysisData.analyse);
    formData.append('recommandations', analysisData.recommandations);
    formData.append('prompt_type', analysisData.prompt_type || 'analyse_globale');
    formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    // Create a temporary form and submit it
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '{{ route("statistics.ai-analyses.export-pdf") }}';
    form.style.display = 'none';

    // Add form data as hidden inputs
    for (let [key, value] of formData.entries()) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = value;
        form.appendChild(input);
    }

    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}

function shareAnalysis() {
    const analysisData = getCurrentAnalysisData();
    if (!analysisData) {
        alert('Aucune analyse à partager. Veuillez d\'abord générer une analyse.');
        return;
    }

    // Create shareable content
    const shareText = `📊 Analyse IA RH: ${analysisData.titre}\n\n` +
                     `📋 Résumé: ${analysisData.resume.substring(0, 200)}...\n\n` +
                     `🔗 Généré par l'Application Service GRH-DMSPS Fès`;

    // Check if Web Share API is supported
    if (navigator.share) {
        navigator.share({
            title: analysisData.titre,
            text: shareText,
            url: window.location.href
        }).catch(err => console.log('Erreur lors du partage:', err));
    } else {
        // Fallback: copy to clipboard
        navigator.clipboard.writeText(shareText).then(() => {
            alert('Contenu copié dans le presse-papiers! Vous pouvez maintenant le coller où vous voulez.');
        }).catch(() => {
            // Final fallback: show modal with content
            showShareModal(shareText);
        });
    }
}

function getCurrentAnalysisData() {
    const titre = document.getElementById('analysisTitle').textContent;
    const resume = document.getElementById('summaryContent').textContent;
    const analyse = document.getElementById('detailedAnalysis').textContent;
    const recommandations = document.getElementById('recommendations').textContent;

    if (!titre || titre === 'Résultats de l\'Analyse IA' || !resume) {
        return null;
    }

    return {
        titre: titre,
        resume: resume,
        analyse: analyse,
        recommandations: recommandations,
        prompt_type: window.currentPromptType || 'analyse_globale'
    };
}

function showShareModal(content) {
    const modal = document.createElement('div');
    modal.style.cssText = `
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.5); z-index: 9999; display: flex;
        align-items: center; justify-content: center;
    `;

    const modalContent = document.createElement('div');
    modalContent.style.cssText = `
        background: white; padding: 20px; border-radius: 10px;
        max-width: 500px; width: 90%; max-height: 80%; overflow-y: auto;
    `;

    modalContent.innerHTML = `
        <h5>Partager l'analyse</h5>
        <textarea readonly style="width: 100%; height: 200px; margin: 10px 0;">${content}</textarea>
        <div style="text-align: right;">
            <button onclick="this.closest('.modal').remove()"
                    style="background: #6c757d; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer;">
                Fermer
            </button>
        </div>
    `;

    modal.className = 'modal';
    modal.appendChild(modalContent);
    document.body.appendChild(modal);

    // Close on background click
    modal.addEventListener('click', (e) => {
        if (e.target === modal) modal.remove();
    });
}
</script>

<x-foot />
