<div class="certificate-section">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="mb-0">Certificats</h2>
            <div class="d-none d-md-flex align-items-center mt-1">
                <span class="badge bg-primary me-2">PPR: {{ $fonctionnaire->ppr }}</span>
                <span class="fw-bold">{{ $fonctionnaire->nom }} {{ $fonctionnaire->prenom }}</span>
                @if($fonctionnaire->nom_arabe || $fonctionnaire->prenom_arabe)
                <span class="ms-2" dir="rtl" lang="ar" style="font-family: 'Traditional Arabic', Arial, sans-serif;">
                    {{ $fonctionnaire->nom_arabe }} {{ $fonctionnaire->prenom_arabe }}
                </span>
                @endif
            </div>
            <p class="text-muted mt-2">Gestion des certificats médicaux et administratifs</p>
        </div>
        <div>
            <div class="d-flex align-items-center">
                <div class="me-3 filter-container">
                    <label for="year-filter-certificate" class="form-label mb-0 me-2 fw-bold">Filtrer par année:</label>
                    <select id="year-filter-certificate" class="form-select form-select-sm d-inline-block" style="width: auto;">
                        @php
                            $currentYear = date('Y');
                            $startYear = $currentYear - 5;
                        @endphp
                        @for ($year = $currentYear; $year >= $startYear; $year--)
                            <option value="{{ $year }}" {{ $year == $currentYear ? 'selected' : '' }}>{{ $year }}</option>
                        @endfor
                    </select>
                </div>
                <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcertificate">
                    <i data-feather="plus-circle" class="me-2"></i>Ajouter un certificat
                </a>
            </div>
        </div>
    </div>

    <style>
        .certificate-section .filter-container {
            background-color: #f8f9fa;
            padding: 8px 12px;
            border-radius: 6px;
        }
        .certificate-table th {
            background-color: #f1f5f9;
            font-weight: 600;
        }
        .certificate-table .badge {
            font-size: 0.85rem;
            padding: 5px 8px;
        }
        .certificate-table .file-link {
            transition: all 0.2s;
        }
        .certificate-table .file-link:hover {
            transform: translateY(-2px);
        }
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            margin: 20px 0;
        }
        .empty-state i {
            font-size: 48px;
            color: #adb5bd;
            margin-bottom: 15px;
        }
        .badge.bg-primary {
            font-size: 0.85rem;
            padding: 5px 8px;
        }
        .fonctionnaire-info-container {
            background-color: #f8f9fa;
            border-left: 4px solid #007bff;
            padding: 8px 12px;
            border-radius: 6px;
            margin-bottom: 15px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
    </style>

    <!-- Fonctionnaire info box for mobile view -->
    <div class="fonctionnaire-info-container d-md-none mb-3">
        <div class="d-flex flex-column">
            <div class="d-flex align-items-center">
                <span class="badge bg-primary me-2">PPR: {{ $fonctionnaire->ppr }}</span>
                <span class="fw-bold">{{ $fonctionnaire->nom }} {{ $fonctionnaire->prenom }}</span>
            </div>
            @if($fonctionnaire->nom_arabe || $fonctionnaire->prenom_arabe)
            <div class="mt-1">
                <span dir="rtl" lang="ar" style="font-family: 'Traditional Arabic', Arial, sans-serif;">
                    {{ $fonctionnaire->nom_arabe }} {{ $fonctionnaire->prenom_arabe }}
                </span>
            </div>
            @endif
        </div>
    </div>
</div>

@if(count($fonctionnaire->certificates ?? []) > 0)
    <div class="table-responsive">
        <table class="table table-striped table-hover certificate-table">
            <thead>
                <tr>
                    <th>Type de Certificat</th>
                    <th>Date de Dépôt</th>
                    <th>Date de Début</th>
                    <th>Nombre de Jours</th>
                    <th>Observation</th>
                    <th>Fichier</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fonctionnaire->certificates ?? [] as $certificate)
                <tr>
                    <td>
                        <span class="badge bg-primary">{{ $certificate->type_certificate->nom }}</span>
                    </td>
                    <td>
                        <span class="text-nowrap">{{ \Carbon\Carbon::parse($certificate->date_depot)->format('d/m/Y') }}</span>
                    </td>
                    <td>
                        <span class="text-nowrap">{{ \Carbon\Carbon::parse($certificate->date_debut)->format('d/m/Y') }}</span>
                    </td>
                    <td>
                        <span class="badge bg-info">{{ $certificate->jours }} jour(s)</span>
                    </td>
                    <td>
                        @if($certificate->observation)
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $certificate->observation }}">
                                {{ Str::limit($certificate->observation, 30) }}
                            </span>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        @if($certificate->url)
                            <a href="{{ asset('storage/' . $certificate->url) }}" target="_blank" class="btn btn-sm btn-info file-link">
                                <i class="fas fa-file-download"></i> Télécharger
                            </a>
                        @else
                            <span class="badge bg-secondary">Aucun fichier</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-sm btn-danger" href="javascript:void(0);"
                        onclick="confirmDelete({{ $certificate->id }}, '{{ route('certificate.delete', $certificate->id) }}', 'êtes-vous sûr de vouloir supprimer ce certificat?')">
                        <i class="fas fa-trash-alt me-1"></i>
                        Supprimer
                        </a>
                        <a href="{{ route('certificates.pdf', $certificate->id) }}" target="_blank" class="btn btn-sm btn-info ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Exporter PDF">
                            <i class="fas fa-file-pdf me-1"></i> PDF
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="empty-state">
        <i class="fas fa-certificate"></i>
        <h4>Aucun certificat trouvé</h4>
        <p class="text-muted">Aucun certificat n'a été ajouté pour ce fonctionnaire.</p>
        <a href="javascript:void(0)" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addcertificate">
            <i class="fas fa-plus-circle me-1"></i> Ajouter un premier certificat
        </a>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Year filter functionality
        const yearFilter = document.getElementById('year-filter-certificate');
        const certificateRows = document.querySelectorAll('#nav-certificate-justified tbody tr');
        const emptyState = document.querySelector('.empty-state');

        // Function to filter certificates by year
        function filterCertificatesByYear() {
            const selectedYear = yearFilter.value;
            let visibleRows = 0;

            certificateRows.forEach(row => {
                const dateCell = row.querySelector('td:nth-child(2)'); // Date de Dépôt column
                if (!dateCell) return;

                const dateText = dateCell.textContent.trim();

                // Extract year from date (format: dd/mm/yyyy)
                const dateParts = dateText.split('/');
                if (dateParts.length === 3) {
                    const year = dateParts[2];

                    // Show/hide row based on year match
                    if (year === selectedYear) {
                        row.style.display = '';
                        visibleRows++;
                    } else {
                        row.style.display = 'none';
                    }
                }
            });

            // Show/hide empty state message based on visible rows
            if (emptyState) {
                if (certificateRows.length > 0 && visibleRows === 0) {
                    // Show a filtered empty state
                    if (!document.getElementById('filtered-empty-state')) {
                        const filteredEmptyState = document.createElement('div');
                        filteredEmptyState.id = 'filtered-empty-state';
                        filteredEmptyState.className = 'empty-state';
                        filteredEmptyState.innerHTML = `
                            <i class="fas fa-filter"></i>
                            <h4>Aucun certificat pour l'année ${selectedYear}</h4>
                            <p class="text-muted">Aucun certificat n'a été trouvé pour l'année sélectionnée.</p>
                            <a href="javascript:void(0)" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addcertificate">
                                <i class="fas fa-plus-circle me-1"></i> Ajouter un certificat
                            </a>
                        `;

                        const tableResponsive = document.querySelector('.table-responsive');
                        if (tableResponsive) {
                            tableResponsive.style.display = 'none';
                            tableResponsive.parentNode.insertBefore(filteredEmptyState, tableResponsive.nextSibling);
                        }
                    }
                } else {
                    // Remove filtered empty state if it exists
                    const filteredEmptyState = document.getElementById('filtered-empty-state');
                    if (filteredEmptyState) {
                        filteredEmptyState.remove();
                        const tableResponsive = document.querySelector('.table-responsive');
                        if (tableResponsive) {
                            tableResponsive.style.display = '';
                        }
                    }
                }
            }
        }

        // Add event listener to year filter
        if (yearFilter) {
            yearFilter.addEventListener('change', filterCertificatesByYear);

            // Initial filter
            filterCertificatesByYear();
        }
    });
</script>
