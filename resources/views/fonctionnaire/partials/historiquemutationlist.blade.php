<div >
    <h2 >Mutations &nbsp;&nbsp; <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal"
            style="position: sticky; right: 9rem;" data-bs-target="#addmutation"><i
                data-feather="plus-circle" class="me-2"></i>
            Ajouter</a></h2>
    <div>


    </div>
</div>


<table class="table">


    <thead>
        <tr>
            <th>Type Mutation</th>
            <th>Date Mutation</th>
            <th>Date Note</th>
            <th>Ref Note</th>
            <th>La Note</th>
            <th>Formation Sanitaire Origine</th>
            <th>Formation Sanitaire Destination</th>
            <th>Date Prise en Service</th>
            <th>Date Cessation Service</th>
            <th>Ancien Service</th>
            <th>Nouveau Service</th>
            <th>Ancien Fonction</th>
            <th>Nouveau Fonction</th>
            <th>Ancien Spécialité</th>
            <th>Nouveau Spécialité</th>
            <th>Remarque</th>
            <th>Actions</th>
        </tr>

    </thead>
    <tbody>
        @foreach (\App\Models\HistoriqueMutation::where('fonctionnaire_id', $fonctionnaire->id)->get() as $mutation)
            <tr>
                <th>
                    <span class="badge bg-blue">{{ $mutation->typeMutation->nom ?? 'N/A' }}</span>
                    @if ($loop->last)
                        <span class="badge bg-teal">(Dernière mutation)</span>
                    @elseif($loop->first)
                        <span class="badge bg-green">(Première mutation)</span>
                    @endif
                </th>
                <th>
                    <span
                        class="badge bg-purple">{{ \Carbon\Carbon::parse($mutation->date_mutation)->diffForHumans() }}</span>
                    <span class="badge bg-gray">{{ $mutation->date_mutation }}</span>
                </th>
                <th>
                    <span
                        class="badge bg-purple">{{ \Carbon\Carbon::parse($mutation->date_note)->diffForHumans() }}</span>
                    <span class="badge bg-gray">{{ $mutation->date_note }}</span>
                </th>
                <th>
                    <span class="badge bg-indigo">{{ $mutation->ref_note }}</span>
                </th>
                <th>
                    @if($mutation->fichiers_notes && file_exists(storage_path('app/public/' . $mutation->fichiers_notes)))
                        <a href="{{ route('files.notes', $mutation->fichiers_notes) }}" target="_blank">
                            <span class="badge bg-red"><i class="fas fa-eye"></i> Voir</span>
                        </a>
                    @else
                        <span class="badge bg-gray"><i class="fas fa-file-times"></i> Aucun fichier</span>
                    @endif
                </th>
                <th>
                    <span
                        class="badge bg-pink">{{ $mutation->formationSanitaireOrigine->nom ?? 'N/A' }}</span>
                </th>
                <th>
                    <span
                        class="badge bg-pink">{{ $mutation->formationSanitaireDestination->nom ?? 'N/A' }}</span>
                </th>
                <th>
                    <span
                        class="badge bg-teal">{{ \Carbon\Carbon::parse($mutation->date_prise_en_service)->diffForHumans() }}</span>
                    <span class="badge bg-gray">{{ $mutation->date_prise_en_service }}</span>
                </th>
                <th>
                    <span
                        class="badge bg-teal">{{ \Carbon\Carbon::parse($mutation->date_cessation_service)->diffForHumans() }}</span>
                    <span class="badge bg-gray">{{ $mutation->date_cessation_service }}</span>
                </th>
                <th>
                    <span class="badge bg-pink">{{ $mutation->ancienService->nom ?? 'N/A' }}</span>
                </th>
                <th>
                    <span class="badge bg-pink">{{ $mutation->nouveauService->nom ?? 'N/A' }}</span>
                </th>
                <th>
                    <span class="badge bg-indigo">{{ $mutation->ancienFonction->nom ?? 'N/A' }}</span>
                </th>
                <th>
                    <span class="badge bg-indigo">{{ $mutation->nouveauFonction->nom ?? 'N/A' }}</span>
                </th>
                <th>
                    <span class="badge bg-green">{{ $mutation->ancienSpecialite->nom ?? 'N/A' }}</span>
                </th>
                <th>
                    <span
                        class="badge bg-green">{{ $mutation->nouveauSpecialite->nom ?? 'N/A' }}</span>
                </th>
                <th>
                    <span class="badge bg-gray">{{ $mutation->remarques }}</span>
                </th>
                <th>


                    <!-- modifier - modal-->
                    <a class="me-2 btn btn-info p-2 mb-0" href="javascript:void(0)" data-bs-toggle="modal"
                        data-bs-target="#editmutation-{{ $mutation->id }}">
                        <i class="fas fa-edit me-2 text-white"></i>
                        Modifier
                    </a>

                    <!-- supprimer - modal-->
                    <a class="me-0 btn btn-danger  p-2 mb-0" href="javascript:void(0);"
                        onclick="confirmDelete({{ $mutation->id }}, '{{ route('historique-mutation.delete', $mutation->id) }}', '{{ $mutation->ref_note }}', 'êtes-vous sûr de vouloir supprimer ce mutation?')">
                        <i class="fas fa-trash-alt me-2 text-white"></i>
                        Supprimer
                    </a>
                </th>
        @endforeach
    </tbody>

</table>

@foreach (\App\Models\HistoriqueMutation::where('fonctionnaire_id', $fonctionnaire->id)->get() as $mutation)
    @include('fonctionnaire.partials.historiquemutationledit', ['mutation' => $mutation, 'fonctionnaire' => $fonctionnaire])
@endforeach
