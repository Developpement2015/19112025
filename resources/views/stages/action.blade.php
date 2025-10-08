<div class="edit-delete-action">
    <a class="me-2 btn btn-info p-2 mb-0" href="{{ route('stages.show', $data->id) }}" data-bs-toggle="tooltip" title="Voir les détails">
        <i class="fas fa-eye me-2 text-white"></i>
        Voir
    </a>

    <a class="me-2 btn btn-success p-2 mb-0" href="{{ route('stages.edit', $data->id) }}" data-bs-toggle="tooltip" title="Modifier">
        <i class="fas fa-pen-alt me-2 text-white"></i>
        Modifier
    </a>

    <a class="me-2 btn btn-warning p-2 mb-0" href="{{ route('stages.attestation', $data->id) }}" target="_blank" data-bs-toggle="tooltip" title="Attestation de stage">
        <i class="fas fa-print me-2 text-white"></i>
        Attestation
    </a>

    <a class="me-2 btn btn-primary p-2 mb-0" href="{{ route('stages.note-stage', $data->id) }}" target="_blank" data-bs-toggle="tooltip" title="Note de stage">
        <i class="fas fa-file-alt me-2 text-white"></i>
        Note Stage
    </a>

    <a class="me-0 btn btn-danger p-2 mb-0" href="javascript:void(0);"
        onclick="confirmDelete({{ $data->id }}, '{{ route('stages.destroy', $data->id) }}', '{{ $data->nom_prenom }}', 'êtes-vous sûr de vouloir supprimer ce stage?')"
        data-bs-toggle="tooltip" title="Supprimer">
        <i class="fas fa-trash-alt me-2 text-white"></i>
        Supprimer
    </a>
</div>
