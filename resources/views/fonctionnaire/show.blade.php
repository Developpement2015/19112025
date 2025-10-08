@php
    $displayName = trim((($fonctionnaire->nom ?? '') . ' ' . ($fonctionnaire->prenom ?? '')));
@endphp
<x-head titre="{{ $displayName }}" />
<x-header />
<x-sidebar />

<!-- Block Principal -->

<div class="page-wrapper">


    <style>
        .modal {
            --bs-modal-width: 1200px;
        }
    </style>
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex justify-content-between">
                <div class="page-title">
                    <h4>Gestion des fonctionnaires</h4>
                    <h6 class="text-capitalize text-muted">{{ $displayName }}</h6>
                </div>
            </div>
        </div>


        <!-- /product list -->
        <div class="card table-list-card">
            <div class="p-3 card-body">
                <nav class="mb-3 nav nav-style-6 nav-pills nav-justified d-sm-flex d-block" role="tablist">
                    <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page"
                        href="#nav-info-justified" aria-selected="false"><i class="fa fa-info-circle"></i>
                        Informations</a>
                    <a class="nav-link " data-bs-toggle="tab" role="tab" href="#nav-mutations-justified"
                        aria-selected="true"><i class="fa fa-history"></i> Mutations </a>
                    <a class="nav-link" data-bs-toggle="tab" role="tab" href="#nav-positions-justified"
                        aria-selected="false"><i class="fa fa-history"></i> Positions </a>

                    <a class="nav-link" data-bs-toggle="tab" role="tab" href="#nav-relicat-justified"
                        aria-selected="false"> <i class="fa fa-history"></i> Congés</a>
                    <a class="nav-link" data-bs-toggle="tab" role="tab" href="#nav-certificate-justified"
                        aria-selected="false"> <i class="fa fa-certificate"></i> Certificats</a>
                    <a class="nav-link" data-bs-toggle="tab" role="tab" href="#nav-greve-justified"
                        aria-selected="false"> <i class="fa fa-ban"></i> Grèves</a>
                </nav>
                <div class="tab-content">
                    <div class="tab-pane show active text-muted" id="nav-info-justified" role="tabpanel">

                        @include('fonctionnaire.partials.fonctionnaireinfos')

                    </div>
                    <div class="tab-pane text-muted" id="nav-mutations-justified" role="tabpanel">
                        @include('fonctionnaire.partials.historiquemutationlist')
                    </div>
                    <div class="tab-pane text-muted" id="nav-positions-justified" role="tabpanel">
                        @include('fonctionnaire.partials.historiquepositionlist')
                    </div>

                    <div class="tab-pane text-muted" id="nav-relicat-justified" role="tabpanel">
                        @include('fonctionnaire.partials.relicatlist')
                    </div>

                    <div class="tab-pane text-muted" id="nav-certificate-justified" role="tabpanel">
                        @include('fonctionnaire.partials.certificatelist')
                    </div>

                    <div class="tab-pane text-muted" id="nav-greve-justified" role="tabpanel">
                        @include('fonctionnaire.partials.grevelist')
                    </div>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
<!-- Block Principal -->


@include('fonctionnaire.partials.historiquemutationladd')
@include('fonctionnaire.partials.historiquepositionladd')
@include('fonctionnaire.partials.relicatladd')
@include('fonctionnaire.partials.certificateadd')




<x-foot />
