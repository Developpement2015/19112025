<x-modifier-mon-profil-modal />


<div class="customizer-links" id="setdata">
    <ul class="sticky-sidebar">
        <li class="sidebar-icons">
            <a href="#" class="navigation-add" data-bs-toggle="tooltip" data-bs-placement="left"
                data-bs-original-title="Theme">
                <i data-feather="settings" class="feather-five"></i>
            </a>
        </li>
    </ul>
</div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="/html/assets/js/jquery-3.7.1.min.js"></script>

<!-- Feather Icon JS -->
<script src="/html/assets/js/feather.min.js"></script>

<!-- Slimscroll JS -->
<script src="/html/assets/js/jquery.slimscroll.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="/html/assets/js/bootstrap.bundle.min.js"></script>

<!-- Chart JS -->
<script src="/html/assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="/html/assets/plugins/apexchart/chart-data.js"></script>

<!-- Sweetalert 2 -->
<script src="/html/assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="/html/assets/plugins/sweetalert/sweetalerts.min.js"></script>

<!-- Custom JS -->
<script src="/html/assets/js/script.js"></script>

<!-- Datatable JS -->
<script src="/html/assets/js/jquery.dataTables.min.js"></script>
<script src="/html/assets/js/dataTables.bootstrap5.min.js"></script>

<!-- Datetimepicker JS -->
<script src="/html/assets/js/moment.min.js"></script>
<script src="/html/assets/js/bootstrap-datetimepicker.min.js"></script>

<!-- Summernote JS -->
<script src="/html/assets/plugins/summernote/summernote-bs4.min.js"></script>

<!-- Select2 JS -->
<script src="/html/assets/plugins/select2/js/select2.min.js"></script>

@if (session('error'))
    <x-alerts type="error" msg="{{ session('error') }}" />
@endif


@if (session('success'))
    <x-alerts type="success" msg="{{ session('success') }}" />
@endif
<script>
    function confirmDelete(id, routeUrl, name, message) {
        Swal.fire({
            title: `Confirmer la suppression de ${name}`,
            text: message,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Oui, supprimer!",
            cancelButtonText: "Annuler"
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement("form");
                form.action = routeUrl;
                form.method = "POST";

                const csrfInput = document.createElement("input");
                csrfInput.type = "hidden";
                csrfInput.name = "_token";
                csrfInput.value = "{{ csrf_token() }}";

                const methodInput = document.createElement("input");
                methodInput.type = "hidden";
                methodInput.name = "_method";
                methodInput.value = "DELETE";

                form.appendChild(csrfInput);
                form.appendChild(methodInput);

                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>


<script defer>
    function confirmGetAction(id, routeUrl, name, message) {
        Swal.fire({
            title: `Confirmer action - ${name}`,
            text: message,
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, continuer!",
            cancelButtonText: "Annuler"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = routeUrl;
            }
        });
    }
</script>


<!-- Choices -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            const selectElements = document.querySelectorAll('.searchable-select');

            selectElements.forEach(selectElement => {
                new Choices(selectElement, {
                    searchEnabled: true,
                    placeholderValue: 'Choisir une option',
                    noResultsText: 'Aucun résultat trouvé',
                    searchFields: ['label', 'value'],
                    removeItemButton: true,
                    searchResultLimit: 10,
                    itemSelectText: '',
                    shouldSort: false,
                });
            });
            console.log('Choices initialized after 2 seconds.');
        }, 2000);
    });
</script>
<script src="/html/assets/js/rocket-loader.min.js" defer></script>
</body>

</html>
