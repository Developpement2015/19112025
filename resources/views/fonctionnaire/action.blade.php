<div class="edit-delete-action">
    <a class="me-2 btn btn-success p-2 mb-0" data-bs-toggle="modal" data-bs-target="#edit-{{ $data->id }}">
        <i class="fas fa-pen-alt me-2 text-white"></i>
        Modifier </a>



<!-- modifier - modal-->
<div class="modal fade" id="edit-{{ $data->id }}">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Modifier - {{ $data->nom . ' ' . $data->prenom }} / {{ $data->nom_arabe . ' ' . $data->prenom_arabe }} </h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="{{ route('fonctionnaire.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="gridsss gap-4s">
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="ppr">PPR</label><br>
                                        <input type="text" name="ppr" id="ppr" required value="{{ $data->ppr }}"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <!-- Nom -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="nom">Nom en français</label><br>
                                        <input type="text" name="nom" id="nom" required value="{{ $data->nom }}"
                                            class="w-full p-2 border rounded">

                                    </div>

                                    <!-- Prénom -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="prenom">Prénom en français</label><br>
                                        <input type="text" name="prenom" id="prenom" required value="{{ $data->prenom }}"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <!-- CIN -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="cin">CIN</label><br>
                                        <input type="text" name="cin" id="cin" required value="{{ $data->cin }}"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <!-- Sexe -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="sexe">Sexe</label><br>
                                        <select name="sexe" id="sexe" required
                                            class="choices-select w-full p-2 border rounded">
                                            <option @if ($data->sexe == 'M') selected @endif value="M">Masculin / ذكر</option>
                                            <option @if ($data->sexe == 'F') selected @endif value="F">Féminin / أنثى</option>
                                        </select>
                                    </div>

                                    <!-- Date de naissance -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="date_naissance">Date de
                                            naissance</label><br>
                                        <input type="date" name="date_naissance" id="date_naissance" required value="{{ \Carbon\Carbon::parse($data->date_naissance)->format('Y-m-d') }}"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <!-- Date d'embauche -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="date_embauche">Date d'embauche</label><br>
                                        <input type="date" name="date_embauche" id="date_embauche" required value="{{ \Carbon\Carbon::parse($data->date_embauche)->format('Y-m-d') }}"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <!-- Nom arabe -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="nom_arabe" dir="rtl">الإسم
                                            بالعربية</label><br>
                                        <input type="text" name="nom_arabe" id="nom_arabe" value="{{ $data->nom_arabe }}"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <!-- Prénom arabe -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="prenom_arabe" dir="rtl">الإسم الشخصي
                                            بالعربية</label><br>
                                        <input type="text" name="prenom_arabe" id="prenom_arabe" value="{{ $data->prenom_arabe }}"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="email">Email</label><br>
                                        <input type="email" name="email" id="email" value="{{ $data->email }}"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <!-- Téléphone -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="telephone">Téléphone</label><br>
                                        <input type="text" name="telephone" id="telephone" value="{{ $data->telephone }}"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <!-- Adresse -->
                                    <div class="mb-4 col-span-3">
                                        <label class="block text-gray-700" for="adresse">Adresse</label><br>
                                        <textarea name="adresse" id="adresse" class="w-full p-2 border rounded">{{ $data->adresse }}</textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="gridsss gap-4s">




                                    <!-- Fonction -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="fonction_id">Fonction</label><br>
                                        <select name="fonction_id" id="fonction_id" required
                                            class="choices-select w-full p-2 border rounded">
                                            @foreach (\App\Models\Fonction::all() as $fonction)
                                                <option {{ $data->fonction_id == $fonction->id ? 'selected' : '' }} value="{{ $fonction->id }}">{{ $fonction->nom . ' / ' . $fonction->nom_arabe }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Service -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="service_id">Service</label><br>
                                        <select name="service_id" id="service_id" required
                                            class="choices-select w-full p-2 border rounded">
                                            @foreach (\App\Models\Service::all() as $service)
                                                <option {{ $data->service_id == $service->id ? 'selected' : '' }} value="{{ $service->id }}">{{ $service->nom . ' / ' . $service->nom_arabe  }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Spécialité/Grade -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700"
                                            for="specialite_grade_id">Spécialité/Grade</label><br>
                                        <select name="specialite_grade_id" id="specialite_grade_id" required
                                            class="choices-select w-full p-2 border rounded">
                                            @foreach (\App\Models\SpecialiteGrade::all() as $specialite_grade)
                                                <option {{ $data->specialite_grade_id == $specialite_grade->id ? 'selected' : '' }} value="{{ $specialite_grade->id }}">


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
                                        <select name="position_id" id="position_id" required
                                            class="choices-select w-full p-2 border rounded">
                                            @foreach (\App\Models\Position::all() as $position)
                                                <option {{ $data->position_id == $position->id ? 'selected' : '' }} value="{{ $position->id }}">{{ $position->nom . ' / ' . $position->nom_arabe }}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <!-- Nom formation sanitaire -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="nom_formation_sanitaire_id">Nom formation sanitaire</label><br>
                                            <select name="nom_formation_sanitaire_id" id="nom_formation_sanitaire_id" required
                                            class="choices-select w-full p-2 border rounded">
                                            @foreach (\App\Models\NomFormationSanitaire::all() as $nomFormationSanitaire)
                                                <option {{ $data->nom_formation_sanitaire_id == $nomFormationSanitaire->id ? 'selected' : '' }} value="{{ $nomFormationSanitaire->id }}">{{ $nomFormationSanitaire->nom . ' / ' . $nomFormationSanitaire->nom_arabe }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Type de mutation -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="type_mutation">Type de
                                            mutation/recrutement</label><br>
                                            <select name="type_mutation" id="type_mutation" required
                                            class="choices-select w-full p-2 border rounded">
                                            @foreach (\App\Models\TypeMutation::all() as $typemutation)
                                                <option {{ $data->type_mutation == $typemutation->id ? 'selected' : '' }} value="{{ $typemutation->id }}">{{ $typemutation->nom . ' / ' . $typemutation->nom_arabe }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Date de mutation -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="date_mutation">Date de
                                            mutation/recrutement</label><br>
                                        <input type="date" name="date_mutation" id="date_mutation" required value="{{ \Carbon\Carbon::parse($data->date_mutation)->format('Y-m-d') }}"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <!-- Date de prise en service -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="date_prise_en_service">Date de prise en
                                            service</label><br>
                                        <input type="date" name="date_prise_en_service" id="date_prise_en_service" required value="{{ \Carbon\Carbon::parse($data->date_prise_en_service)->format('Y-m-d') }}"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <!-- Remarques -->
                                    <div class="mb-4 col-span-3">
                                        <label class="block text-gray-700" for="remarques">Remarques</label><br>
                                        <textarea name="remarques" id="remarques" class="w-full p-2 border rounded">{{ $data->remarques }}</textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="gridsss gap-4s">



                                    <!-- Date de note -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="date_note">Date de note</label><br>
                                        <input type="date" name="date_note" id="date_note" required value="{{ \Carbon\Carbon::parse($data->date_note)->format('Y-m-d') }}"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <!-- Fichier de la note -->
                                    <div class="mb-4">
                                        <label class="block text-gray-700" for="fichier_note">Fichier de la note <a href="/storage/{{ $data->fichier_note }}" target="_blank"><i class="fas fa-eye"></i> Voir la note</a></label><br>
                                        <input type="file" accept=".pdf,.doc,.docx,.png,.jpg,.jpeg" name="fichier_note" id="fichier_note"
                                            class="w-full p-2 border rounded">
                                    </div>

                                    <!-- ref de la note -->
                                    <div class="mb-4 col-span-3">
                                        <label class="block text-gray-700" for="ref_note">Réference de la note</label><br>
                                        <input type="text" required value="{{ $data->ref_note }}" name="ref_note" id="ref_note" class="w-full p-2 border rounded" />
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

<a class="me-2 btn btn-secondary  p-2 mb-0" href="/fonctionnaire/{{ $data->id }}">
        <i class="fas fa-eye me-2 text-white"></i>
        Afficher
    </a>

    <a class="me-2 btn btn-info  p-2 mb-0" href="fonctionnaire/attestation-travail/{{ $data->id }}">
        <i class="fas fa-print me-2 text-white"></i>
        Attestation de travail
    </a>
<!-- supprimer - modal-->
    <a class="me-0 btn btn-danger  p-2 mb-0" href="javascript:void(0);"
        onclick="confirmDelete({{ $data->id }}, '{{ route('fonctionnaire.delete', $data->id) }}', '{{ $data->nom }}', 'êtes-vous sûr de vouloir supprimer ce fonctionnaire?')">
        <i class="fas fa-trash-alt me-2 text-white"></i>
        Supprimer
    </a>
</div>
