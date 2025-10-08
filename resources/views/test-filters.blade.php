<!DOCTYPE html>
<html>
<head>
    <title>Test Filtres Fonctionnaires</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .filter-section { margin: 20px 0; padding: 15px; border: 1px solid #ccc; }
        select, input { padding: 8px; margin: 5px; width: 200px; }
        button { padding: 10px 20px; margin: 10px; }
        .results { margin-top: 20px; padding: 15px; background: #f5f5f5; }
    </style>
</head>
<body>
    <h1>Test des Filtres Fonctionnaires</h1>
    
    <div class="filter-section">
        <h3>Niveau Catégories Formation</h3>
        <select id="niveau-filter">
            <option value="">Tous</option>
            @foreach($niveauCategoriesFormation as $niveau)
                <option value="{{ $niveau->id }}">{{ $niveau->nom }} / {{ $niveau->nom_arabe }}</option>
            @endforeach
        </select>
        <button onclick="testNiveauFilter()">Test Niveau</button>
    </div>
    
    <div class="filter-section">
        <h3>Catégories Cadres</h3>
        <select id="categorie-filter">
            <option value="">Tous</option>
            @foreach($categoriesCadre as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->nom }} / {{ $categorie->nom_arabe }}</option>
            @endforeach
        </select>
        <button onclick="testCategorieFilter()">Test Catégorie</button>
    </div>
    
    <div class="filter-section">
        <h3>Date Prise en Service</h3>
        <input type="date" id="date-de" placeholder="Date de">
        <input type="date" id="date-a" placeholder="Date à">
        <button onclick="testDateFilter()">Test Date</button>
    </div>
    
    <div class="results" id="results">
        <h3>Résultats</h3>
        <p>Cliquez sur un bouton de test pour voir les résultats</p>
    </div>

    <script>
        function testNiveauFilter() {
            const niveauId = document.getElementById('niveau-filter').value;
            if (!niveauId) {
                alert('Veuillez sélectionner un niveau');
                return;
            }
            
            fetch('/fonctionnaire/data?niveau_categorie_formation=' + niveauId)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('results').innerHTML = 
                        '<h3>Résultats Niveau Filter</h3>' +
                        '<p>Nombre de résultats: ' + data.recordsFiltered + '</p>' +
                        '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
                })
                .catch(error => {
                    document.getElementById('results').innerHTML = 
                        '<h3>Erreur</h3><p>' + error + '</p>';
                });
        }
        
        function testCategorieFilter() {
            const categorieId = document.getElementById('categorie-filter').value;
            if (!categorieId) {
                alert('Veuillez sélectionner une catégorie');
                return;
            }
            
            fetch('/fonctionnaire/data?categorie_cadre=' + categorieId)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('results').innerHTML = 
                        '<h3>Résultats Catégorie Filter</h3>' +
                        '<p>Nombre de résultats: ' + data.recordsFiltered + '</p>' +
                        '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
                })
                .catch(error => {
                    document.getElementById('results').innerHTML = 
                        '<h3>Erreur</h3><p>' + error + '</p>';
                });
        }
        
        function testDateFilter() {
            const dateDe = document.getElementById('date-de').value;
            const dateA = document.getElementById('date-a').value;
            
            if (!dateDe || !dateA) {
                alert('Veuillez sélectionner les deux dates');
                return;
            }
            
            fetch('/fonctionnaire/data?date_prise_service_de=' + dateDe + '&date_prise_service_a=' + dateA)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('results').innerHTML = 
                        '<h3>Résultats Date Filter</h3>' +
                        '<p>Nombre de résultats: ' + data.recordsFiltered + '</p>' +
                        '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
                })
                .catch(error => {
                    document.getElementById('results').innerHTML = 
                        '<h3>Erreur</h3><p>' + error + '</p>';
                });
        }
    </script>
</body>
</html>
