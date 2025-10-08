<div class="containerr">
    @php
        // Safe helpers to avoid accessing properties on null
        $positionName = optional($fonctionnaire->position)->nom ?? '';
        $nom = $fonctionnaire->nom ?? '';
        $nom_arabe = $fonctionnaire->nom_arabe ?? '';
        $prenom = $fonctionnaire->prenom ?? '';
        $prenom_arabe = $fonctionnaire->prenom_arabe ?? '';
        $cin = $fonctionnaire->cin ?? '';
        $sexe = $fonctionnaire->sexe ?? '';
        $date_naissance = $fonctionnaire->date_naissance ?? null;
        $date_embauche = $fonctionnaire->date_embauche ?? null;
        $latest_mutation_type = $fonctionnaire->latest_mutation_type ?? '';
        $latest_mutation_date = $fonctionnaire->latest_mutation_date ?? null;
        $date_prise_en_service = $fonctionnaire->date_prise_en_service ?? null;

        $formation = $fonctionnaire->nomFormationSanitaire ?? null;
        $arrondissement = $formation ? $formation->arrondissement_commune : null;
        $ville = $arrondissement ? $arrondissement->ville : null;
        $region = $ville ? $ville->region : null;

        $nomFormation = optional($formation)->nom ?? '';
        $serviceName = optional($fonctionnaire->service)->nom ?? '';
        $fonctionName = optional($fonctionnaire->fonction)->nom ?? '';

        $specialite = $fonctionnaire->specialiteGrade ?? null;
        $grade = $specialite ? $specialite->grade : null;
        $cadre = $grade ? $grade->cadre : null;
        $categorie = $cadre ? $cadre->categorie_cadre : null;

        $categorieName = optional($categorie)->nom ?? '';
        $cadreName = optional($cadre)->nom ?? '';
        $gradeName = optional($grade)->nom ?? '';
    @endphp
    <style>
        .containerr {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            align-items: start;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            text-align: left;
            font-weight: bold;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 999px;
            color: white;
        }

        /* Colorful badges */
        .bg-blue {
            background-color: #3498db;
        }

        .bg-green {
            background-color: #2ecc71;
        }

        .bg-yellowww {
            background-color: #db7120;
        }

        .bg-red {
            background-color: #e74c3c;
        }

        .bg-purple {
            background-color: #9b59b6;
        }

        .bg-indigo {
            background-color: #3f51b5;
        }

        .bg-gray {
            background-color: #95a5a6;
        }
    </style>
    <div>
        <table>
            <tbody>
                <tr>
                    <th>PPR</th>
                    <td><span class="badge bg-red">{{ $fonctionnaire->ppr ?? '' }}</span>&nbsp;<span
                            class="badge bg-red">{{ $positionName }}</span></td>
                </tr>
                <tr>
                    <th>Nom</th>
                    <td><span class="badge bg-green">{{ $nom }}</span></td>
                </tr>

                <tr>
                    <th>Nom en Arabe</th>
                    <td><span class="badge bg-green">{{ $nom_arabe }}</span>
                    </td>
                </tr>
                <tr>
                    <th>Prénom</th>
                    <td><span class="badge bg-green">{{ $prenom }}</span></td>
                </tr>
                <tr>
                    <th>Prénom en Arabe</th>
                    <td><span class="badge bg-green">{{ $prenom_arabe }}</span>
                    </td>
                </tr>
                <tr>
                    <th>CIN</th>
                    <td><span class="badge bg-red">{{ $cin }}</span></td>
                </tr>
                <tr>
                    <th>Sexe</th>
                    <td><span class="badge bg-purple">{{ $sexe }}</span></td>
                </tr>
                <tr>
                    <th>Date de Naissance</th>
                    <td><span class="badge bg-indigo">{{ $date_naissance ?? '' }} -
                            <strong class='bg-white text-green p-2 badge'>{{ $date_naissance ? \Carbon\Carbon::parse($date_naissance)->age : '' }}
                                ans</strong></span>
                    </td>
                </tr>
                <tr>
                    <th>Date d'Embauche</th>
                    <td><span class="badge bg-indigo">{{ $date_embauche ?? '' }} -
                            <strong class='bg-white text-green p-2 badge'>{{ $date_embauche ? \Carbon\Carbon::parse($date_embauche)->age : '' }}
                                ans de service</strong></span>
                    </td>
                </tr>
                <tr>
                    <th>Type de mutation | recrutement</th>
                    <td><span class="badge bg-indigo">{{ $latest_mutation_type }}</span>
                        <small class="text-muted">(Basé sur la dernière date)</small>
                    </td>
                </tr>
                <tr>
                    <th>Date de mutation</th>
                    <td>
                        @if($latest_mutation_date)
                            <span class="badge bg-indigo">{{ $latest_mutation_date->format('Y-m-d') }} -
                                <strong class='bg-white text-green p-2 badge'>{{ $latest_mutation_date->diffForHumans() }}</strong></span>
                        @else
                            <span class="badge bg-indigo">-</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Date de prise service</th>
                    <td>
                        @if($date_prise_en_service)
                            <span class="badge bg-indigo">{{ $date_prise_en_service }} - <strong class='bg-white text-green p-2 badge'>{{ \Carbon\Carbon::parse($date_prise_en_service)->diffForHumans() }}
                                depuis la prise service</strong></span>
                        @else
                            <span class="badge bg-indigo">-</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table>
            <tbody>
                <tr>
                    <th>Emplacement</th>
                    <td>
                        <span class="badge bg-blue">
                            {{ $region ? ($region->nom . ' | ' . $region->nom_arabe . ' | ') : '' }}
                            {{ $arrondissement ? ($arrondissement->nom . ' | ') : '' }}
                            {{ $ville ? $ville->nom : '' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Formation Sanitaire</th>
                    <td><span class="badge bg-blue">{{ $nomFormation }}</span>
                    </td>
                </tr>
                <tr>
                    <th>Service</th>
                    <td><span class="badge bg-blue">{{ $serviceName }}</span>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><span class="badge bg-gray">{{ $fonctionnaire->email }}</span></td>
                </tr>
                <tr>
                    <th>Téléphone</th>
                    <td><span class="badge bg-gray">{{ $fonctionnaire->telephone }}</span></td>
                </tr>
                <tr>
                    <th>Adresse</th>
                    <td><span class="badge bg-gray">{{ $fonctionnaire->adresse }}</span></td>
                </tr>
                <tr>
                    <th>Fonction</th>
                    <td><span class="badge bg-teal">{{ $fonctionName }}</span>
                    </td>
                </tr>

                <tr>
                    <th>Catégorie Cadre</th>
                    <td><span class="badge bg-teal">{{ $categorieName }}</span>
                    </td>
                </tr>
                <tr>
                    <th>Cadre</th>
                    <td><span class="badge bg-teal">{{ $cadreName }}</span>
                    </td>
                </tr>
                <tr>
                    <th>Grade</th>
                    <td><span class="badge bg-teal">{{ $gradeName }}</span>
                    </td>
                </tr>


                <tr>
                    <th>Remarques</th>
                    <td><span class="badge bg-gray">{{ $fonctionnaire->remarques }}</span></td>
                </tr>
                <tr>
                    <th>La note </th>
                    <td>
                        <span
                            class="badge bg-teal mb-2">{{ $fonctionnaire->ref_note }}</span><br>
                        @php $date_note = $fonctionnaire->date_note ?? null; @endphp
                        <span class="badge bg-teal mb-2">{{ $date_note ?? '' }}
                            @if($date_note)
                                - {{ \Carbon\Carbon::parse($date_note)->diffForHumans() }}
                            @endif
                        </span><br>

                        @if(!empty($fonctionnaire->fichier_note) && file_exists(storage_path('app/public/' . $fonctionnaire->fichier_note)))
                            <span class="badge bg-teal" style='cursor: pointer;color:white;'><a
                                    href="{{ route('files.notes', $fonctionnaire->fichier_note) }}"
                                    target="_blank" style="color:white;"><i class="fas fa-eye"></i> Voir</a></span>
                        @else
                            <span class="badge bg-gray"><i class="fas fa-file-times"></i> Aucun fichier</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal: Greves du fonctionnaire -->
<div class="modal fade" id="fonctionnaireGrevesModal" tabindex="-1" aria-labelledby="fonctionnaireGrevesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fonctionnaireGrevesModalLabel">Grèves du fonctionnaire</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="fnGrevesLoading" style="display:none; text-align:center;">
                    <div class="spinner-border text-primary" role="status"><span class="sr-only">Chargement...</span></div>
                    <p>Chargement des grèves...</p>
                </div>
                <div id="fnGrevesResults">
                    <div class="d-flex justify-content-end mb-2">
                        <form id="fnGrevesExportFormExcel" method="POST" action="{{ route('greves.export-fonctionnaire-excel') }}" target="_blank">
                            @csrf
                            <input type="hidden" name="fonctionnaire_id" value="{{ $fonctionnaire->id }}">
                            <button type="submit" class="btn btn-success btn-sm me-2"><i class="fa fa-download"></i> Export Excel</button>
                        </form>
                        <form id="fnGrevesExportFormPdf" method="POST" action="{{ route('greves.export-fonctionnaire-pdf') }}" target="_blank">
                            @csrf
                            <input type="hidden" name="fonctionnaire_id" value="{{ $fonctionnaire->id }}">
                            <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-file-pdf-o"></i> Export PDF</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>PPR</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Formation</th>
                                    <th>Date début</th>
                                    <th>Date fin</th>
                                    <th>Durée (jours)</th>
                                    <th>Remarque</th>
                                </tr>
                            </thead>
                            <tbody id="fnGrevesTableBody"></tbody>
                        </table>
                    </div>
                </div>
                <div id="fnGrevesNoResults" style="display:none;" class="alert alert-info">Aucune grève trouvée.</div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openBtn = document.getElementById('openFonctionnaireGrevesBtn');
        const modalEl = document.getElementById('fonctionnaireGrevesModal');
        const modal = modalEl ? new bootstrap.Modal(modalEl) : null;

        openBtn && openBtn.addEventListener('click', function() {
            if (!modal) return;
            // show loading
            document.getElementById('fnGrevesLoading').style.display = 'block';
            document.getElementById('fnGrevesResults').style.display = 'none';
            document.getElementById('fnGrevesNoResults').style.display = 'none';
            modal.show();

            fetch('{{ url('/greves/fonctionnaire/' . $fonctionnaire->id) }}')
                .then(resp => resp.json())
                .then(data => {
                    document.getElementById('fnGrevesLoading').style.display = 'none';
                    if (data.success && data.greves && data.greves.length > 0) {
                        const tbody = document.getElementById('fnGrevesTableBody');
                        tbody.innerHTML = '';
                        data.greves.forEach(g => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td>${g.fonctionnaire.ppr || '-'}</td>
                                <td>${g.fonctionnaire.nom || '-'}</td>
                                <td>${g.fonctionnaire.prenom || '-'}</td>
                                <td>${g.fonctionnaire.nom_formation_sanitaire || '-'}</td>
                                <td>${g.date_debut || '-'}</td>
                                <td>${g.date_fin || '-'}</td>
                                <td>${g.nombre_jours || 0}</td>
                                <td>${g.remarque || '-'}</td>
                            `;
                            tbody.appendChild(tr);
                        });
                        document.getElementById('fnGrevesResults').style.display = 'block';
                    } else {
                        document.getElementById('fnGrevesNoResults').style.display = 'block';
                    }
                })
                .catch(err => {
                    document.getElementById('fnGrevesLoading').style.display = 'none';
                    document.getElementById('fnGrevesNoResults').style.display = 'block';
                    console.error('Erreur fetching greves:', err);
                });
        });
    });
</script>
