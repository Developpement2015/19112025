<x-head titre="Gestion des grades de cadres" />
<x-header />
<x-sidebar />

<!-- Block Principal -->

<div class="page-wrapper">

    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Gestion des Grades de cadres</h4>
                    <h6 class="text-capitalize text-muted">Paramétrage Grades de cadres</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a href="{{ route('grades-cadres.pdf') }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Imprimer on PDF"><img src="/html/assets/img/icons/pdf.svg" alt="img"></a>
                </li>
                <li>
                    <a href="{{ route('grades-cadres.export') }}" data-bs-toggle="tooltip" data-bs-placement="top"
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
        </div>


        <!-- /product list -->
        <div class="card table-list-card">
            <div class="card-body">

                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table  " id="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cadre</th>
                                <th>Nom en français</th>
                                <th>الإسم بالعربية</th>
                                <th class="no-sort">Actions</th>
                            </tr>
                        </thead>
                    </table>
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
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Ajouter un cadre</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="{{ route('grades-cadres.add') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="nom">Cadre</label>
                                        <select name="cadre_id" id="cadre_id" class="form-select searchable-select"
                                            required>
                                            <option value="" disabled selected>Choisir une cadre
                                            </option>
                                            @foreach (\App\Models\Cadre::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->nom }} /
                                                    {{ $item->nom_arabe }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="nom">Nom en français</label>
                                        <input type="text" name="nom" id="nom"
                                            placeholder="Nom en français" required class="form-control">
                                    </div>
                                    <div class="mb-3" dir="rtl">
                                        <label class="form-label" for="nom_arabe">الإسم بالعربية</label>
                                        <input type="text" name="nom_arabe" id="nom_arabe"
                                            placeholder="الإسم بالعربية" required class="form-control">
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
<!-- ajouter - modal-->



{{-- datatable --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // DataTable for #table
        var table = new DataTable('#table', {
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('grades-cadres.data') }}",
                data: function(d) {
                    d.nom = document.getElementById('nom').value || "{{ request()->get('nom') }}" ||
                        '';
                    d.nom_arabe = document.getElementById('nom_arabe').value ||
                        "{{ request()->get('nom_arabe') }}" || '';
                }
            },
            columns: [{
                    data: 'cadre',
                    render: function(data, type, row) {
                        if (type === 'display') {
                            return '<span class="badge badge-md bg-warning"> ' + data +
                                '</span>';
                        }
                        return data;
                    }
                },
                {
                    data: 'nom',
                    render: function(data, type, row) {
                        if (type === 'display') {
                            return '<span class="badge badge-md bg-success"> ' + data +
                                '</span>';
                        }
                        return data;
                    }
                },
                {
                    data: 'nom_arabe',
                    render: function(data, type, row) {
                        if (type === 'display') {
                            return '<span class="badge badge-md bg-primary"> ' + data +
                                '</span>';
                        }
                        return data;
                    }
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            order: [
                [1, 'desc']
            ],
            orderCellsTop: true,
            language: {
                url: "/html/assets/js/data-French.json"
            }
        });

        // Filter button
        document.getElementById('filter').addEventListener('click', function() {
            table.draw();
        });

        // Additional DataTable for elements with .datanew class
        if (document.querySelectorAll('.datanew').length > 0) {
            document.querySelectorAll('.datanew').forEach(function(element) {
                new DataTable(element, {
                    bFilter: true,
                    sDom: 'fBtlpi',
                    ordering: true,
                    language: {
                        search: ' ',
                        sLengthMenu: '_MENU_',
                        searchPlaceholder: "Search",
                        info: "_START_ - _END_ of _TOTAL_ items",
                        paginate: {
                            next: ' <i class=" fa fa-angle-right"></i>',
                            previous: '<i class="fa fa-angle-left"></i> '
                        }
                    },
                    initComplete: function(settings, json) {
                        // Reposition the DataTable search box
                        var searchBox = document.querySelector('.dataTables_filter');
                        if (searchBox) {
                            var tableSearch = document.getElementById('tableSearch');
                            var searchInput = document.querySelector('.search-input');
                            if (tableSearch) {
                                tableSearch.appendChild(searchBox);
                            }
                            if (searchInput) {
                                searchInput.appendChild(searchBox);
                            }
                        }
                    }
                });
            });
        }

    });
</script>


<!--  Choices  -->
{{-- <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script> --}}
<!-- Choices -->


{{-- datatable --}}


<x-foot />
