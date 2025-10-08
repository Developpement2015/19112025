<x-head titre="Gestion des fonctionnaires" />
<x-header />
<x-sidebar />

<!-- Block Principal -->

<div class="page-wrapper">


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const formElements = document.querySelectorAll("input, textarea, select");

            formElements.forEach(element => {
                element.addEventListener("input", function() {
                    if (this.value.trim() !== "") {
                        this.classList.add("border-4",
                            "border-blue-500");
                    } else {
                        this.classList.remove("border-4", "border-blue-500");
                    }
                });

                if (element.value.trim() !== "") {
                    element.classList.add("border-4", "border-blue-500");
                }
            });



        });
    </script>
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Gestion des fonctionnaires</h4>
                    <h6 class="text-capitalize text-muted">Fonctionnaires</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a href="{{ route('fonctionnaire.pdf') }}" target="_blank" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Imprimer on PDF"><img src="/html/assets/img/icons/pdf.svg"
                            alt="img"></a>
                </li>
                <li>
                    <a href="{{ route('fonctionnaire.export') }}" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Exporter Fichier Excel"><img src="/html/assets/img/icons/excel.svg" alt="img"></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Réduit" id="collapse-header"><i
                            data-feather="chevron-up" class="feather-chevron-up"></i></a>
                </li>
            </ul>
            <div class="page-btn">
                <a href="javascript:void(0)" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add"><i
                        data-feather="plus-circle" class="me-2"></i> Ajouter</a>
            </div>

            <div class="page-btn">
                <a href="javascript:void(0)" class="btn btn-added " style="background: indigo;" data-bs-toggle="modal"
                    data-bs-target="#filter"><i data-feather="filter" class="me-2"></i> Filtrer</a>
            </div>

            <!-- Export buttons for filtered results (initially hidden) -->
            <div class="page-btn" id="filtered-export-buttons" style="display: none;">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-success" onclick="exportFilteredResults('excel')" title="Exporter les résultats filtrés en Excel">
                        <i data-feather="file-text" class="me-2"></i> Excel Filtré
                    </button>
                    <button type="button" class="btn btn-danger" onclick="exportFilteredResults('pdf')" title="Exporter les résultats filtrés en PDF">
                        <i data-feather="file" class="me-2"></i> PDF Filtré
                    </button>
                </div>
            </div>

            <div class="page-btn">
                <a href="javascript:void(0)" class="btn btn-added" style="background: #28a745;" data-bs-toggle="modal"
                    data-bs-target="#exportAssignments"><i data-feather="file-text" class="me-2"></i> Liste des affectations</a>
            </div>
        </div>


        <!-- /product list -->
        <div class="card table-list-card">
            <div class="card-body">
                <!-- Custom Universal Search -->
                <div class="mb-3 row">
                    <div class="col-md-12">
                        <div class="p-3 card" style="background-color: #f8f9fa; border-left: 5px solid #6571ff;">
                            <h5 class="mb-2"><i data-feather="search" class="me-2"></i> Recherche </h5>
                            <p class="mb-3 text-muted small">Recherchez dans tous les champs: nom, prénom, ppr, cin, email, téléphone, service, fonction, etc.</p>
                            <form method="GET" action="{{ route('fonctionnaire.page') }}" class="d-flex">
                                <!-- Preserve existing filters -->
                               @foreach(request()->except(['search_term', 'page']) as $key => $value)

                                    @if(is_array($value))
                                        @foreach($value as $item)
                                            <input type="hidden" name="{{ $key }}[]" value="{{ $item }}">
                                        @endforeach
                                    @else
                                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                    @endif
                                @endforeach


                                <div class="input-group">
                                    <span class="input-group-text bg-primary">
                                        <i data-feather="search" class="text-white"></i>
                                    </span>
                                    <input type="text" name="search_term" id="universalSearch" class="form-control form-control-lg"
                                        placeholder="Tapez votre recherche ici... (Ctrl+F)"
                                        style="border: 2px solid #6571ff; font-size: 1.1rem;"
                                        value="{{ request('search_term') }}">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i data-feather="search" class="me-1"></i> Rechercher
                                    </button>
                                    @if(request('search_term'))
                                        <a href="{{ route('fonctionnaire.page', request()->except('search_term')) }}" class="btn btn-danger btn-lg">
                                            <i data-feather="x" class="me-1"></i> Effacer
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Applied Filters Display -->
                @if(!empty($appliedFilters))
                <div class="mb-3">
                    <div class="card" style="background-color: #e3f2fd; border-left: 5px solid #2196f3;">
                        <div class="card-body p-3">
                            <h6 class="mb-2"><i data-feather="filter" class="me-2"></i> Filtres appliqués:</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($appliedFilters as $filterType => $filterValue)
                                    @if($filterType == 'search_term')
                                        <span class="badge bg-primary">Recherche: {{ $filterValue }}</span>
                                    @elseif(is_array($filterValue))
                                        @foreach($filterValue as $value)
                                            <span class="badge bg-info">{{ ucfirst(str_replace('_', ' ', $filterType)) }}: {{ $value }}</span>
                                        @endforeach
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst(str_replace('_', ' ', $filterType)) }}: {{ $filterValue }}</span>
                                    @endif
                                @endforeach
                                <a href="{{ route('fonctionnaire.page') }}" class="badge bg-danger text-decoration-none">
                                    <i data-feather="x" class="me-1" style="width: 12px; height: 12px;"></i> Effacer tous les filtres
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Results Count -->
                <div class="mb-3">
                    <div class="alert alert-info">
                        <i data-feather="info" class="me-2"></i>
                        <strong>{{ $fonctionnaires->total() ?? $fonctionnaires->count() }}</strong> fonctionnaire(s) trouvé(s)
                        @if(!empty($appliedFilters))
                            avec les filtres appliqués
                        @endif
                        <div class="small text-muted mt-1">Affichage: {{ $fonctionnaires->firstItem() ?? 0 }} - {{ $fonctionnaires->lastItem() ?? 0 }} / {{ $fonctionnaires->total() ?? $fonctionnaires->count() }}</div>
                    </div>
                </div>

                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Photo / PPR</th>
                                <th>CIN</th>
                                <th>Nom / الإسم</th>
                                <th>Nom Formation Sanitaire</th>
                                <th>Spécialité</th>
                                <th class="no-sort">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($fonctionnaires as $fonctionnaire)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($fonctionnaire->photo && file_exists(public_path('storage/photos/' . $fonctionnaire->photo)))
                                            <img src="{{ asset('storage/photos/' . $fonctionnaire->photo) }}"
                                                 alt="Photo {{ $fonctionnaire->nom }}"
                                                 class="rounded-circle me-2"
                                                 style="width: 40px; height: 40px; object-fit: cover; border: 2px solid #dc3545;">
                                        @else
                                            <div class="rounded-circle me-2 d-flex align-items-center justify-content-center"
                                                 style="width: 40px; height: 40px; background-color: #6c757d; color: white; font-weight: bold; font-size: 14px;">
                                                {{ strtoupper(substr($fonctionnaire->nom, 0, 1) . substr($fonctionnaire->prenom, 0, 1)) }}
                                            </div>
                                        @endif
                                        <span class="badge badge-md bg-danger">{{ $fonctionnaire->ppr }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-md bg-info">{{ $fonctionnaire->cin }}</span>
                                </td>
                                <td>
                                    <span class="badge badge-md bg-dark">
                                        {{ $fonctionnaire->nom }} {{ $fonctionnaire->prenom }} /
                                        {{ $fonctionnaire->nom_arabe }} {{ $fonctionnaire->prenom_arabe }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-md bg-success">
                                        {{ $fonctionnaire->nomFormationSanitaire ?
                                           $fonctionnaire->nomFormationSanitaire->nom . ' / ' . $fonctionnaire->nomFormationSanitaire->nom_arabe : '-' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-md bg-warning">
                                        {{ $fonctionnaire->specialiteGrade ?
                                           $fonctionnaire->specialiteGrade->nom . ' / ' . $fonctionnaire->specialiteGrade->nom_arabe : '-' }}
                                    </span>
                                </td>
                                <td>
                                    @include('fonctionnaire.action', ['data' => $fonctionnaire])
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <div class="alert alert-warning mb-0">
                                        <i data-feather="search" class="me-2"></i>
                                        Aucun fonctionnaire trouvé
                                        @if(!empty($appliedFilters))
                                            avec les filtres appliqués. <a href="{{ route('fonctionnaire.page') }}" class="alert-link">Effacer les filtres</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                            <div class="mt-3 d-flex justify-content-end">
                                {{ $fonctionnaires->links() }}
                            </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
<!-- Block Principal -->

<!-- ajouter - modal-->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="p-0 page-wrapper-new">
                <div class="content">
                    <div class="border-0 modal-header custom-modal-header">
                        <div class="page-title">
                            <h4>Ajouter Fonctionnaire</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <link rel="stylesheet"
                            href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
                        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const selectElements = document.querySelectorAll('.choices-select');
                                selectElements.forEach(select => new Choices(select, {
                                    removeItemButton: true
                                }));

                                const inputElements = document.querySelectorAll('input');
                                inputElements.forEach(input => {
                                    input.addEventListener('input', () => {
                                        input.style.border = "2px solid black";
                                        input.style.backgroundColor = "#eeeeee";
                                    });
                                });


                            });
                        </script>

                        <style>
                            .modal {
                                --bs-modal-width: 1200px;
                            }
                        </style>

                        <form action="{{ route('fonctionnaire.add') }}" method="post" enctype="multipart/form-data"
                            class="p-6 bg-white rounded-lg shadow-md">
                            @csrf
                            <style>
                                .gridsss {
                                    display: grid;
                                    grid-template-columns: 1fr;
                                }

                                @media (min-width: 768px) {
                                    .gridsss {
                                        grid-template-columns: repeat(3, 1fr);
                                    }
                                }

                                .gridsss input,
                                .gridsss select,
                                .gridsss textarea {
                                    width: 100%;
                                }

                                .gridsss label {
                                    font-weight: 800;
                                }

                                .gap-4s {
                                    gap: 1rem;
                                }
                            </style>
                            <div class="gridsss gap-4s">
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="ppr">PPR</label><br>
                                    <input type="text" name="ppr" id="ppr"
                                        class="w-full p-2 border rounded">
                                </div>

                                <!-- Nom -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="nom">Nom en français</label><br>
                                    <input type="text" name="nom" id="nom"
                                        class="w-full p-2 border rounded">
                                </div>

                                <!-- Prénom -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="prenom">Prénom en français</label><br>
                                    <input type="text" name="prenom" id="prenom"
                                        class="w-full p-2 border rounded">
                                </div>

                                <!-- CIN -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="cin">CIN</label><br>
                                    <input type="text" name="cin" id="cin"
                                        class="w-full p-2 border rounded">
                                </div>

                                <!-- Sexe -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="sexe">Sexe</label><br>
                                    <select name="sexe" id="sexe"
                                        class="w-full p-2 border rounded choices-select">
                                        <option value="">Sélectionner</option>
                                        <option value="M">Masculin / ذكر</option>
                                        <option value="F">Féminin / أنثى</option>
                                    </select>
                                </div>

                                <!-- Photo -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="photo">Photo de profil</label><br>
                                    <input type="file" accept="image/*" name="photo" id="photo"
                                        class="w-full p-2 border rounded">
                                    <small class="text-gray-500">Formats acceptés: JPG, PNG, GIF (Max: 2MB)</small>
                                </div>

                                <!-- Date de naissance -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="date_naissance">Date de
                                        naissance</label><br>
                                    <input type="date" name="date_naissance" id="date_naissance"
                                        class="w-full p-2 border rounded">
                                </div>

                                <!-- Date d'embauche -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="date_embauche">Date d'embauche</label><br>
                                    <input type="date" name="date_embauche" id="date_embauche"
                                        class="w-full p-2 border rounded">
                                </div>

                                <!-- Nom arabe -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="nom_arabe" dir="rtl">الإسم
                                        بالعربية</label><br>
                                    <input type="text" name="nom_arabe" id="nom_arabe"
                                        class="w-full p-2 border rounded">
                                </div>

                                <!-- Prénom arabe -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="prenom_arabe" dir="rtl">الإسم الشخصي
                                        بالعربية</label><br>
                                    <input type="text" name="prenom_arabe" id="prenom_arabe"
                                        class="w-full p-2 border rounded">
                                </div>

                                <!-- Email -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="email">Email</label><br>
                                    <input type="email" name="email" id="email"
                                        class="w-full p-2 border rounded">
                                </div>

                                <!-- Téléphone -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="telephone">Téléphone</label><br>
                                    <input type="text" name="telephone" id="telephone"
                                        class="w-full p-2 border rounded">
                                </div>

                                <!-- Adresse -->
                                <div class="col-span-3 mb-4">
                                    <label class="block text-gray-700" for="adresse">Adresse</label><br>
                                    <textarea name="adresse" id="adresse" class="w-full p-2 border rounded"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="gridsss gap-4s">




                                <!-- Fonction -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="fonction_id">Fonction</label><br>
                                    <select name="fonction_id" id="fonction_id"
                                        class="w-full p-2 border rounded choices-select">
                                        <option value="">Sélectionner une fonction</option>
                                        @foreach ($fonctions as $fonction)
                                            <option value="{{ $fonction->id }}">
                                                {{ $fonction->nom . ' / ' . $fonction->nom_arabe }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Service -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="service_id">Service</label><br>
                                    <select name="service_id" id="service_id"
                                        class="w-full p-2 border rounded choices-select">
                                        <option value="">Sélectionner un service</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">
                                                {{ $service->nom . ' / ' . $service->nom_arabe }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Spécialité/Grade -->
                                <div class="mb-4">
                                    <label class="block text-gray-700"
                                        for="specialite_grade_id">Spécialité/Grade</label><br>
                                    <select name="specialite_grade_id" id="specialite_grade_id"
                                        class="w-full p-2 border rounded choices-select">
                                        <option value="">Sélectionner une spécialité/grade</option>
                                        @foreach ($specialite_grades as $specialite_grade)
                                            <option value="{{ $specialite_grade->id }}">
    {{
         ($specialite_grade->nom ?? '') .
        ' / ' .
        ($specialite_grade->nom_arabe ?? '') .
         ' | ' .
         ($specialite_grade->grade->cadre->categorie_cadre->nom ?? '') .
        ' / ' .
        ($specialite_grade->grade->cadre->categorie_cadre->nom_arabe ?? '') .
        ' | ' .
             ($specialite_grade->grade->nom ?? '') .
        ' / ' .
        ($specialite_grade->grade->nom_arabe ?? '') .
        ' | ' .
        ($specialite_grade->grade->cadre->nom ?? '') .
        ' / ' .
        ($specialite_grade->grade->cadre->nom_arabe ?? '')  }}


</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>



                            <div class="gridsss gap-4s">

                                <!-- Position -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="position_id">Position</label><br>
                                    <select name="position_id" id="position_id"
                                        class="w-full p-2 border rounded choices-select">
                                        <option value="">Sélectionner une position</option>
                                        @foreach ($positions as $position)
                                            <option value="{{ $position->id }}">
                                                {{ $position->nom . ' / ' . $position->nom_arabe }}</option>
                                        @endforeach
                                    </select>
                                </div>



                                <!-- Nom formation sanitaire -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="nom_formation_sanitaire_id">Nom formation
                                        sanitaire</label><br>
                                    <select name="nom_formation_sanitaire_id" id="nom_formation_sanitaire_id"
                                        class="w-full p-2 border rounded choices-select">
                                        <option value="">Sélectionner une formation sanitaire</option>
                                        @foreach ($nomFormationSanitaires as $nomFormationSanitaire)
                                            <option value="{{ $nomFormationSanitaire->id }}">
                                                {{ $nomFormationSanitaire->nom . ' / ' . $nomFormationSanitaire->nom_arabe }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Type de mutation -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="type_mutation">Type de
                                        mutation/recrutement</label><br>
                                    <select name="type_mutation" id="type_mutation"
                                        class="w-full p-2 border rounded choices-select">
                                        <option value="">Sélectionner un type de mutation</option>
                                        @foreach ($typemutations as $typemutation)
                                            <option value="{{ $typemutation->id }}">
                                                {{ $typemutation->nom . ' / ' . $typemutation->nom_arabe }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Date de mutation -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="date_mutation">Date de
                                        mutation/recrutement</label><br>
                                    <input type="date" name="date_mutation" id="date_mutation"
                                        class="w-full p-2 border rounded">
                                </div>

                                <!-- Date de prise en service -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="date_prise_en_service">Date de prise en
                                        service</label><br>
                                    <input type="date" name="date_prise_en_service" id="date_prise_en_service"
                                        class="w-full p-2 border rounded">
                                </div>

                                <!-- Remarques -->
                                <div class="col-span-3 mb-4">
                                    <label class="block text-gray-700" for="remarques">Remarques</label><br>
                                    <textarea name="remarques" id="remarques" class="w-full p-2 border rounded"></textarea>
                                </div>
                            </div>


                            <hr>
                            <div class="gridsss gap-4s">



                                <!-- Date de note -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="date_note">Date de note</label><br>
                                    <input type="date" name="date_note" id="date_note"
                                        class="w-full p-2 border rounded">
                                </div>

                                <!-- Fichier de la note -->
                                <div class="mb-4">
                                    <label class="block text-gray-700" for="fichier_note">Fichier de la note</label><br>
                                    <input type="file" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" name="fichier_note" id="fichier_note"
                                        class="w-full p-2 border rounded">
                                </div>

                                <!-- ref de la note -->
                                <div class="col-span-3 mb-4">
                                    <label class="block text-gray-700" for="ref_note">Réference de la note</label><br>
                                    <input type="text" name="ref_note" id="ref_note" class="w-full p-2 border rounded" />
                                </div>
                            </div>

                            <div class="flex justify-end gap-4 mt-6"
                                style="margin-top: 20px;display: flex;justify-content: flex-end;">
                                <button type="button" class="px-4 py-2 text-white rounded bg-danger"
                                    data-bs-dismiss="modal">Annuler</button>
                                <button type="submit"
                                    class="px-4 py-2 text-white rounded bg-success">Ajouter</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ajouter - modal-->



<!-- filter - modal-->
<div class="modal fade" id="filter">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="p-0 page-wrapper-new">
                <div class="content">
                    <div class="border-0 modal-header custom-modal-header">
                        <div class="page-title">
                            <h4>Filtrer Fonctionnaire</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">

                        <style>
                            .filter-section {
                                margin-bottom: 25px;
                                padding: 15px;
                                border: 1px solid #e0e0e0;
                                border-radius: 8px;
                                background-color: #f9f9f9;
                            }
                            .filter-title {
                                font-weight: 700;
                                font-size: 18px;
                                color: #007bff;
                                margin-bottom: 15px;
                                border-bottom: 2px solid #007bff;
                                padding-bottom: 5px;
                            }
                            .checkbox-grid {
                                display: grid;
                                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                                gap: 10px;
                                max-height: 200px;
                                overflow-y: auto;
                            }
                            .checkbox-item {
                                display: flex;
                                align-items: center;
                                padding: 8px;
                                border: 1px solid #ddd;
                                border-radius: 4px;
                                background-color: white;
                            }
                            .checkbox-item:hover {
                                background-color: #f0f8ff;
                            }
                            .checkbox-item input[type="checkbox"] {
                                margin-right: 8px;
                                transform: scale(1.2);
                            }
                            .year-grid {
                                display: grid;
                                grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
                                gap: 10px;
                            }
                            .year-item {
                                text-align: center;
                                padding: 10px;
                                border: 2px solid #ddd;
                                border-radius: 6px;
                                background-color: white;
                                cursor: pointer;
                                transition: all 0.3s;
                            }
                            .year-item:hover {
                                border-color: #007bff;
                                background-color: #f0f8ff;
                            }
                            .year-item input[type="checkbox"]:checked + label {
                                background-color: #007bff;
                                color: white;
                            }
                        </style>

                        <form id="filterForm" method="GET" action="{{ route('fonctionnaire.page') }}">
                            @include('fonctionnaire.filter-checkbox')

                            <div class="flex justify-end gap-4 mt-6"
                                style="margin-top: 20px;display: flex;justify-content: flex-end;">
                                <button type="button" class="px-4 py-2 text-white rounded bg-danger" id="annulerbtnflt"
                                    data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" id="filtrebtn"
                                    class="px-4 py-2 text-white rounded bg-success">Appliquer</button>
                            </div>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- filter - modal-->

<!-- Export Assignments Modal -->
<div class="modal fade" id="exportAssignments">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Liste des dernières affectations</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <div class="card p-3 mb-4" style="border-left: 5px solid #28a745;">
                            <h5 class="mb-3"><i data-feather="info" class="me-2"></i> Information</h5>
                            <p class="text-muted mb-0">
                                Cette fonctionnalité vous permet d'exporter la liste des fonctionnaires qui ont pris service
                                entre deux dates spécifiées, avec possibilité de filtrer par formation sanitaire.
                            </p>
                        </div>

                        <form id="exportAssignmentsForm" action="{{ route('fonctionnaire.export-assignments') }}" method="post" class="p-2">
                            @csrf

                            <!-- Filtre par période de prise de service -->
                            <div class="card p-3 mb-4" style="border-left: 4px solid #007bff;">
                                <h6 class="mb-3"><i data-feather="calendar" class="me-2"></i> Période de Prise de Service</h6>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold" for="date_debut_service">Date de début</label>
                                        <input type="date" id="date_debut_service" name="date_debut_service" class="form-control"
                                            value="{{ date('Y-01-01') }}">
                                        <small class="text-muted">Date de début de la période</small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold" for="date_fin_service">Date de fin</label>
                                        <input type="date" id="date_fin_service" name="date_fin_service" class="form-control"
                                            value="{{ date('Y-m-d') }}">
                                        <small class="text-muted">Date de fin de la période</small>
                                    </div>
                                </div>
                                <div class="alert alert-info mb-0">
                                    <i data-feather="info" class="me-2"></i>
                                    <strong>Note :</strong> Seuls les fonctionnaires ayant pris service entre ces deux dates seront inclus dans l'export.
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold" for="formation_sanitaire_id">Formation Sanitaire</label>
                                    <select id="formation_sanitaire_id" name="formation_sanitaire_id" class="form-select choices-select">
                                        <option value="">Toutes les formations sanitaires</option>
                                        @foreach ($nomFormationSanitaires as $formation)
                                            <option value="{{ $formation->id }}">
                                                {{ $formation->nom }} / {{ $formation->nom_arabe }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">Sélectionnez une formation sanitaire ou laissez vide pour toutes</small>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i data-feather="x" class="me-1"></i> Annuler
                                </button>
                                <div>
                                    <button type="button" id="exportExcelBtn" class="btn btn-success me-2">
                                        <i data-feather="file-text" class="me-1"></i> Exporter en Excel
                                    </button>
                                    <button type="button" id="exportWordBtn" class="btn btn-primary">
                                        <i data-feather="file" class="me-1"></i> Exporter en PDF
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Export Assignments Modal -->

{{-- Filter and Search Scripts --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize feather icons
        if (typeof feather !== 'undefined') {
            feather.replace();
        }

        // Universal search functionality
        const universalSearchInput = document.getElementById('universalSearch');
        const searchStatus = document.getElementById('searchStatus');

        if (universalSearchInput) {
            // Add keyboard shortcut (Ctrl+F or Cmd+F) to focus the search field
            document.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
                    // Prevent the browser's default search
                    e.preventDefault();
                    // Focus our custom search field
                    universalSearchInput.focus();
                }
            });

            // Clear search button
            const clearSearchBtn = document.getElementById('clearSearch');
            if (clearSearchBtn) {
                clearSearchBtn.addEventListener('click', function() {
                    universalSearchInput.value = '';
                    // Submit form to refresh results
                    document.getElementById('filterForm').submit();
                });
            }
        }

        // Form submission handling
        const filterForm = document.getElementById('filterForm');
        if (filterForm) {
            filterForm.addEventListener('submit', function(e) {
                // Convert checkbox arrays to comma-separated strings
                const checkboxGroups = ['services[]', 'positions[]', 'specialites[]', 'categories_cadre[]', 'cadres[]', 'specialites_grades[]'];

                checkboxGroups.forEach(function(groupName) {
                    const checkedBoxes = document.querySelectorAll(`input[name="${groupName}"]:checked`);
                    const values = Array.from(checkedBoxes).map(cb => cb.value);

                    // Remove existing hidden inputs for this group
                    const existingInputs = document.querySelectorAll(`input[name="${groupName.replace('[]', '')}"]`);
                    existingInputs.forEach(input => {
                        if (input.type === 'hidden') {
                            input.remove();
                        }
                    });

                    // Add new hidden input with comma-separated values
                    if (values.length > 0) {
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = groupName.replace('[]', '');
                        hiddenInput.value = values.join(',');
                        filterForm.appendChild(hiddenInput);
                    }
                });

                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('filter'));
                if (modal) {
                    modal.hide();
                }
            });
        }

        // Handle export buttons for assignments
        const exportExcelBtn = document.getElementById('exportExcelBtn');
        const exportWordBtn = document.getElementById('exportWordBtn');

        if (exportExcelBtn) {
            exportExcelBtn.addEventListener('click', function() {
                const form = document.getElementById('exportAssignmentsForm');
                form.action = "{{ route('fonctionnaire.export-assignments') }}";
                form.submit();
            });
        }

        if (exportWordBtn) {
            exportWordBtn.addEventListener('click', function() {
                const form = document.getElementById('exportAssignmentsForm');
                form.action = "{{ route('fonctionnaire.export-assignments-word') }}";
                form.submit();
            });
        }

        // Checkbox helper functions
        window.selectAllCheckboxes = function(name) {
            document.querySelectorAll(`input[name="${name}"]`).forEach(function(checkbox) {
                checkbox.checked = true;
            });
        };

        window.clearAllCheckboxes = function(name) {
            document.querySelectorAll(`input[name="${name}"]`).forEach(function(checkbox) {
                checkbox.checked = false;
            });
        };

        // Show/hide filtered export buttons based on applied filters
        @if(!empty($appliedFilters))
            document.getElementById('filtered-export-buttons').style.display = 'block';
        @endif

        // Function to export filtered results
        window.exportFilteredResults = function(format) {
            // Get current URL parameters (filters)
            const urlParams = new URLSearchParams(window.location.search);

            // Create form data with current filters
            const formData = new FormData();

            // Add all current URL parameters to form data
            for (const [key, value] of urlParams.entries()) {
                formData.append(key, value);
            }

            // Add export format
            formData.append('export_format', format);

            // Create and submit form
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("fonctionnaire.export-filtered") }}';

            // Add CSRF token
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            // Add all form data as hidden inputs
            for (const [key, value] of formData.entries()) {
                if (key !== '_token') { // Don't duplicate CSRF token
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = key;
                    input.value = value;
                    form.appendChild(input);
                }
            }

            // Submit form
            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        };
    });
</script>


{{-- datatable --}}


<x-foot />
