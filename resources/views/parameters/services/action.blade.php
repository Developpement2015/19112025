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
                            <h4>Modifier - {{ $data->nom }} / {{ $data->nom_arabe }} </h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="{{ route('services.update', $data->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="nom">Nom en français</label>
                                        <input type="text" name="nom" id="nom" value="{{ $data->nom }}"
                                            placeholder="Nom en français" required class="form-control">
                                    </div>
                                    <div class="mb-3" dir="rtl">
                                        <label class="form-label" for="nom_arabe">الإسم بالعربية</label>
                                        <input type="text" name="nom_arabe" id="nom_arabe" value="{{ $data->nom_arabe }}"
                                            placeholder="الإسم بالعربية" required class="form-control">
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
<!-- modifier - modal-->
    <a class="me-0 btn btn-danger  p-2 mb-0" href="javascript:void(0);"
        onclick="confirmDelete({{ $data->id }}, '{{ route('services.delete', $data->id) }}', '{{ $data->nom }}', 'êtes-vous sûr de vouloir supprimer ce service?')">
        <i class="fas fa-trash-alt me-2 text-white"></i>
        Supprimer
    </a>
</div>
