   <!-- ajouter - modal-->
   <div class="modal fade" id="modifier-profil-modal">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Modifier mes informations - {{ auth()->user()->name }}</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="{{ route('user.update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Nom Complet</label>
                                        <input type="text" value="{{ auth()->user()->name }}" id="name" readonly class="form-control">
                                    </div>

                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email*</label>
                                        <input type="text" value="{{ auth()->user()->email }}" id="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="password">Mot De Passe</label>
                                        <div class="pass-group">
                                            <input type="password" class="pass-input form-control" name="password" id="password">
                                            <span class="fas toggle-password fa-eye-slash"></span>
                                        </div>
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
<!-- ajouter - modal-->
