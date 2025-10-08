<div >
    <h2 >Positions &nbsp;&nbsp; <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal"
            style="position: sticky; right: 9rem;" data-bs-target="#addposition"><i
                data-feather="plus-circle" class="me-2"></i>
            Ajouter</a></h2>
    <div>


    </div>
</div>


<table class="table">




    <thead>
        <tr>
            <th>Ancienne Position</th>
            <th>Nouvelle Position</th>
            <th>Type</th>
            <th>Date de cessation de service</th>
            <th>Date de prise en service</th>
            <th>Remarque</th>
            <th>Date Note</th>
            <th>Ref Note</th>
            <th>Fichiers Notes</th>
            <th>Actions</th>
        </tr>

    </thead>
    <tbody>
        @foreach (\App\Models\PositionHistorique::where('fonctionnaire_id', $fonctionnaire->id)->get() as $position)
            <tr>
                <th>
                    <span class="badge bg-blue">{{ $position->ancienPosition->nom }}</span>

                </th>
                <th>
                    <span class="badge bg-blue">{{ $position->nouveauxPosition->nom }}</span>

                </th>
                <th>
                    <span
                        class="badge bg-pink">{{ $position->type }}
                        @if($position->type == 'conge')
                            {{ '- ' .$position->typeConge->nom }}
                        @elseif ($position->type == 'certificat')
                            {{ '- ' .$position->typeCertificate->nom }}
                        @elseif ($position->type == 'greve')
                            - Grève
                        @endif
                        ({{ $position->type }})
                    </span>
                    @if($position->type == 'greve')
                        <div>
                            <span class="badge bg-danger">Début: {{ $position->greve_date_debut ?? '' }}</span>
                            <span class="badge bg-danger">Fin: {{ $position->greve_date_fin ?? '' }}</span>
                            <span class="badge bg-warning">Remarque: {{ $position->greve_remarque ?? '' }}</span>
                        </div>
                    @endif
                </th>
                <th>
                    <span
                        class="badge bg-purple">{{ \Carbon\Carbon::parse($position->date_cessation_service)->diffForHumans() }}</span>
                    <span class="badge bg-gray">{{ $position->date_cessation_service }}</span>
                </th>
                <th>
                    <span
                        class="badge bg-purple">{{ \Carbon\Carbon::parse($position->date_prise_en_service)->diffForHumans() }}</span>
                    <span class="badge bg-gray">{{ $position->date_prise_en_service }}</span>
                </th>
                <th>
                    <span class="badge bg-indigo">{{ $position->remarque }}</span>
                </th>
                <th>
                    <span class="badge bg-red">{{ $position->date_note }}</span>

                </th>
                <th>
                    <span class="badge bg-red">{{ $position->ref_note }}</span>

                </th>
                <th>
                    @if($position->fichiers_notes && file_exists(storage_path('app/public/' . $position->fichiers_notes)))
                        <a href="{{ route('files.notes', $position->fichiers_notes) }}" target="_blank">
                            <span class="badge bg-red"><i class="fas fa-eye"></i> Voir</span>
                        </a>
                    @else
                        <span class="badge bg-gray"><i class="fas fa-file-times"></i> Aucun fichier</span>
                    @endif
                </th>
                <th>


                    <!-- modifier - modal-->
                    <a class="me-2 btn btn-info p-2 mb-0" href="javascript:void(0)" data-bs-toggle="modal"
                        data-bs-target="#editposition-{{ $position->id }}">
                        <i class="fas fa-edit me-2 text-white"></i>
                        Modifier
                    </a>

                    <!-- supprimer - modal-->
                    <a class="me-0 btn btn-danger  p-2 mb-0" href="javascript:void(0);"
                        onclick="confirmDelete({{ $position->id }}, '{{ route('historique-position.delete', $position->id) }}', '{{ $position->ref_note }}', 'êtes-vous sûr de vouloir supprimer ce position?')">
                        <i class="fas fa-trash-alt me-2 text-white"></i>
                        Supprimer
                    </a>
                </th>
        @endforeach
    </tbody>

</table>

@foreach (\App\Models\PositionHistorique::where('fonctionnaire_id', $fonctionnaire->id)->get() as $position)
    @include('fonctionnaire.partials.historiquepositionledit', ['position' => $position, 'fonctionnaire' => $fonctionnaire])
@endforeach
