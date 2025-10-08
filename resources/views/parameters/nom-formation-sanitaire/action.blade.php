<div class="edit-delete-action">
    <a class="me-2 btn btn-success p-2 mb-0" data-bs-toggle="modal" data-bs-target="#edit-{{ $data->id }}">
        <i class="fas fa-pen-alt me-2 text-white"></i>
        Modifier </a>

    <a class="me-2 btn btn-dark p-2 mb-0" data-bs-toggle="modal" data-bs-target="#population-{{ $data->id }}">
        <i class="fas fa-users-rectangle me-2 text-white"></i>
        Population Historique </a>




    <!-- modifier - modal-->
    <div class="modal fade modal-lg" id="population-{{ $data->id }}">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Population - {{ $data->nom }} / {{ $data->nom_arabe }} </h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <div class="row">
                                <div  style='justify-content:flex-end;display:flex;margin-bottom:10px'>
                                    <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#create-population-{{ $data->id }}">
                                        <i class="fas fa-plus text-white"></i>
                                    </button>
                                </div>
                                <table class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th>Année</th>
                                            <th>Population</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (\App\Models\HistoriquePopulation::where('nom_formation_sanitaire_id', $data->id)->get() as $item)
                                            <tr>
                                                <td>{{ $item->annee }}</td>
                                                <td>{{ $item->population }}</td>
                                                <td>
                                                    <a class="btn btn-danger p-2 mb-0" onclick="confirmDelete({{ $data->id }}, '{{ route('population.delete', $item->id) }}', '{{ $item->annee . ' - ' . $item->population }}', 'etes-vous sûr de vouloir supprimer cette population?')">
                                                        <i class="fas fa-trash-alt  text-white"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>



                            </div>
                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modifier - modal-->
    <div class="modal fade modal-lg" id="edit-{{ $data->id }}">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Modifier - {{ $data->nom }} / {{ $data->nom_arabe }} </h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <form action="{{ route('nom-formation-sanitaire.update', $data->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="niveau_categorie_formation_id">Niveau de
                                                Catégorie de formation</label>
                                            <select name="niveau_categorie_formation_id"
                                                id="niveau_categorie_formation_id" class="form-select searchable-select"
                                                required>
                                                <option value="" disabled selected>Choisir un niveau de Catégorie
                                                    de
                                                    formation
                                                </option>
                                                @foreach (\App\Models\NiveauCategorieFormation::all() as $item)
                                                    <option @selected($item->id == $data->niveau_categorie_formation_id) value="{{ $item->id }}">
                                                        {{ $item->getniveauFormationAttribute() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="arrondissement_commune_id">Arrondissement/Commune</label>
                                            <select name="arrondissement_commune_id" id="arrondissement_commune_id"
                                                class="form-select searchable-select" required>
                                                <option value="" disabled selected>Choisir arrondissement
                                                </option>
                                                @foreach (\App\Models\ArrondissementCommune::all() as $item)
                                                    <option @selected($item->id == $data->arrondissement_commune_id) value="{{ $item->id }}">
                                                        {{ $item->nom . ' ' . $item->nom_arabe }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="nom">Nom en français</label>
                                            <input type="text" name="nom" id="nom"
                                                value="{{ $data->nom }}" placeholder="Nom en français" required
                                                class="form-control">
                                        </div>
                                        <div class="mb-3" dir="rtl">
                                            <label class="form-label" for="nom_arabe">الإسم بالعربية</label>
                                            <input type="text" name="nom_arabe" id="nom_arabe"
                                                value="{{ $data->nom_arabe }}" placeholder="الإسم بالعربية" required
                                                class="form-control">
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-cancel me-2"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-submit">Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- supprimer - modal-->
    <a class="me-0 btn btn-danger  p-2 mb-0" href="javascript:void(0);"
        onclick="confirmDelete({{ $data->id }}, '{{ route('nom-formation-sanitaire.delete', $data->id) }}', '{{ $data->nom }}', 'êtes-vous sûr de vouloir supprimer ce nom de formation sanitaire?')">
        <i class="fas fa-trash-alt me-2 text-white"></i>
        Supprimer
    </a>








     <!-- add population - modal-->
     <div class="modal fade modal-lg" id="create-population-{{ $data->id }}">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Ajouter population</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body">
                            <form action="{{ route('population.add') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <input type="hidden" name="nom_formation_sanitaire_id" value="{{ $data->id }}">
                                            <label class="form-label" for="annee">Année</label>
                                            <input type="text" name="annee" id="annee"
                                                 placeholder="Année" required
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="population">Population
                                            </label>
                                            <input type="text" name="population" id="population"
                                                 placeholder="Population" required
                                                class="form-control">
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-cancel me-2"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-submit">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
