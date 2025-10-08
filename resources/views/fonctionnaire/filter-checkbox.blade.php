<!-- NOUVEAU FILTRE AVEC CHECKBOXES -->
<style>
    .filter-section {
        margin-bottom: 25px;
        padding: 15px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        background-color: #f9f9f9;
    }
    .filter-title {
        font-weight: 700;
        font-size: 18px;
        color: #007bff;
        margin-bottom: 15px;
        border-bottom: 2px solid #007bff;
        padding-bottom: 5px;
    }
    .checkbox-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 10px;
        max-height: 200px;
        overflow-y: auto;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
        background-color: white;
    }
    .checkbox-item {
        display: flex;
        align-items: center;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #fafafa;
        transition: all 0.2s;
    }
    .checkbox-item:hover {
        background-color: #e3f2fd;
        border-color: #007bff;
    }
    .checkbox-item input[type="checkbox"] {
        margin-right: 8px;
        transform: scale(1.2);
    }
    .checkbox-item input[type="checkbox"]:checked + label {
        font-weight: bold;
        color: #007bff;
    }

    .filter-controls {
        margin-bottom: 20px;
        text-align: center;
    }
    .filter-controls button {
        margin: 0 5px;
        padding: 8px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }
    .select-all {
        background-color: #28a745;
        color: white;
    }
    .clear-all {
        background-color: #dc3545;
        color: white;
    }
</style>

<!-- Universal Search -->
<div class="filter-section">
    <div class="filter-title">🔍 Recherche Universelle</div>
    <div class="mb-3">
        <input type="text" name="search_term" id="search_term" class="form-control"
               placeholder="Rechercher par nom, prénom, PPR, CIN..."
               value="{{ request('search_term') }}">
    </div>
</div>

<!-- Services -->
<div class="filter-section">
    <div class="filter-title">🏢 Services</div>
    <div class="filter-controls">
        <button type="button" class="select-all" onclick="selectAllCheckboxes('services[]')">Tout sélectionner</button>
        <button type="button" class="clear-all" onclick="clearAllCheckboxes('services[]')">Tout désélectionner</button>
    </div>
    <div class="checkbox-grid">
        @foreach ($services as $service)
            <div class="checkbox-item">
                <input type="checkbox" name="services[]" value="{{ $service->id }}" id="service_{{ $service->id }}"
                       @if(in_array($service->id, explode(',', request('services', '')))) checked @endif>
                <label for="service_{{ $service->id }}">{{ $service->nom }}</label>
            </div>
        @endforeach
    </div>
</div>





<!-- Noms Formation Sanitaires -->
<div class="filter-section">
    <div class="filter-title">🏢 Nom Formation Sanitaire</div>
    <div class="filter-controls">
        <button type="button" class="select-all" onclick="selectAllCheckboxes('nomformations[]')">Tout sélectionner</button>
        <button type="button" class="clear-all" onclick="clearAllCheckboxes('nomformations[]')">Tout désélectionner</button>
    </div>
    <div class="checkbox-grid">
        @foreach ($nomFormationSanitaires as $nomFormationSanitaire)
            <div class="checkbox-item">
                <input type="checkbox" name="nomformations[]" value="{{ $nomFormationSanitaire->id }}" id="nomFormationSanitaire_{{ $nomFormationSanitaire->id }}"
                       @if(in_array($nomFormationSanitaire->id, request('nomformations', []))) checked @endif>
                <label for="nomFormationSanitaire_{{ $nomFormationSanitaire->id }}">{{ $nomFormationSanitaire->nom }}</label>
            </div>
        @endforeach
    </div>
</div>









<!-- Positions -->
<div class="filter-section">
    <div class="filter-title">📍 Positions</div>
    <div class="filter-controls">
        <button type="button" class="select-all" onclick="selectAllCheckboxes('positions[]')">Tout sélectionner</button>
        <button type="button" class="clear-all" onclick="clearAllCheckboxes('positions[]')">Tout désélectionner</button>
    </div>
    <div class="checkbox-grid">
        @foreach ($positions as $position)
            <div class="checkbox-item">
                <input type="checkbox" name="positions[]" value="{{ $position->id }}" id="position_{{ $position->id }}"
                       @if(in_array($position->id, explode(',', request('positions', '')))) checked @endif>
                <label for="position_{{ $position->id }}">{{ $position->nom }}</label>
            </div>
        @endforeach
    </div>
</div>

<!-- Spécialités -->
<div class="filter-section">
    <div class="filter-title">🎯 Spécialités</div>
    <div class="filter-controls">
        <button type="button" class="select-all" onclick="selectAllCheckboxes('specialites[]')">Tout sélectionner</button>
        <button type="button" class="clear-all" onclick="clearAllCheckboxes('specialites[]')">Tout désélectionner</button>
    </div>
    <div class="checkbox-grid">
        @foreach ($specialite_grades as $specialite)
            <div class="checkbox-item">
                <input type="checkbox" name="specialites[]" value="{{ $specialite->id }}" id="specialite_{{ $specialite->id }}"
                       @if(in_array($specialite->id, explode(',', request('specialites', '')))) checked @endif>
                <label for="specialite_{{ $specialite->id }}">{{ $specialite->nom }}</label>
            </div>
        @endforeach
    </div>
</div>

<!-- Catégorie Cadre -->
<div class="filter-section">
    <div class="filter-title">📋 Catégorie Cadre</div>
    <div class="filter-controls">
        <button type="button" class="select-all" onclick="selectAllCheckboxes('categories_cadre[]')">Tout sélectionner</button>
        <button type="button" class="clear-all" onclick="clearAllCheckboxes('categories_cadre[]')">Tout désélectionner</button>
    </div>
    <div class="checkbox-grid">
        @foreach ($categoriesCadre as $categorie)
            <div class="checkbox-item">
                <input type="checkbox" name="categories_cadre[]" value="{{ $categorie->id }}" id="categorie_cadre_{{ $categorie->id }}"
                       @if(in_array($categorie->id, explode(',', request('categories_cadre', '')))) checked @endif>
                <label for="categorie_cadre_{{ $categorie->id }}">{{ $categorie->nom }}</label>
            </div>
        @endforeach
    </div>
</div>

<!-- Cadres -->
<div class="filter-section">
    <div class="filter-title">🏛️ Cadres</div>
    <div class="filter-controls">
        <button type="button" class="select-all" onclick="selectAllCheckboxes('cadres[]')">Tout sélectionner</button>
        <button type="button" class="clear-all" onclick="clearAllCheckboxes('cadres[]')">Tout désélectionner</button>
    </div>
    <div class="checkbox-grid">
        @foreach ($cadres as $cadre)
            <div class="checkbox-item">
                <input type="checkbox" name="cadres[]" value="{{ $cadre->id }}" id="cadre_{{ $cadre->id }}"
                       @if(in_array($cadre->id, explode(',', request('cadres', '')))) checked @endif>
                <label for="cadre_{{ $cadre->id }}">{{ $cadre->nom }}</label>
            </div>
        @endforeach
    </div>
</div>

<!-- Spécialité Grades -->
<div class="filter-section">
    <div class="filter-title">🎓 Spécialité Grades</div>
    <div class="filter-controls">
        <button type="button" class="select-all" onclick="selectAllCheckboxes('specialites_grades[]')">Tout sélectionner</button>
        <button type="button" class="clear-all" onclick="clearAllCheckboxes('specialites_grades[]')">Tout désélectionner</button>
    </div>
    <div class="checkbox-grid">
        @foreach ($grade_cadres as $grade)
            <div class="checkbox-item">
                <input type="checkbox" name="specialites_grades[]" value="{{ $grade->id }}" id="grade_cadre_{{ $grade->id }}"
                       @if(in_array($grade->id, explode(',', request('specialites_grades', '')))) checked @endif>
                <label for="grade_cadre_{{ $grade->id }}">{{ $grade->nom }}</label>
            </div>
        @endforeach
    </div>
</div>

<!-- Filtre par dates de prise de service -->
<div class="filter-section">
    <div class="filter-title">📅 Période de Prise de Service</div>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
        <div>
            <label for="date_debut_service" style="font-weight: bold; margin-bottom: 5px; display: block;">Date de début</label>
            <input type="date" id="date_debut_service" name="date_debut_service" class="form-control"
                   style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"
                   value="{{ request('date_debut_service', '') }}">
        </div>
        <div>
            <label for="date_fin_service" style="font-weight: bold; margin-bottom: 5px; display: block;">Date de fin</label>
            <input type="date" id="date_fin_service" name="date_fin_service" class="form-control"
                   style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"
                   value="{{ request('date_fin_service', '') }}">
        </div>
    </div>
    <div style="background-color: #e3f2fd; padding: 10px; border-radius: 5px; border-left: 4px solid #007bff;">
        <small style="color: #0056b3;">
            <strong>📌 Note :</strong> Seuls les fonctionnaires ayant pris service entre ces deux dates seront affichés.
        </small>
    </div>
</div>



<script>
// Fonctions pour les checkboxes
function selectAllCheckboxes(name) {
    document.querySelectorAll(`input[name="${name}"]`).forEach(function(checkbox) {
        checkbox.checked = true;
    });
}

function clearAllCheckboxes(name) {
    document.querySelectorAll(`input[name="${name}"]`).forEach(function(checkbox) {
        checkbox.checked = false;
    });
}
</script>
