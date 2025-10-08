<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formations Sanitaires - Statistiques</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            margin: 15px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #198754;
            padding-bottom: 10px;
        }
        
        .header h1 {
            color: #333;
            margin: 0;
            font-size: 18px;
        }
        
        .header p {
            color: #666;
            margin: 5px 0;
            font-size: 12px;
        }
        
        .filters {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            border-left: 4px solid #198754;
        }
        
        .filters h3 {
            margin: 0 0 8px 0;
            color: #333;
            font-size: 12px;
        }
        
        .filter-item {
            display: inline-block;
            margin-right: 15px;
            margin-bottom: 3px;
        }
        
        .filter-label {
            font-weight: bold;
            color: #555;
        }
        
        .filter-value {
            color: #333;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 8px;
        }
        
        th {
            background-color: #198754;
            color: white;
            padding: 6px 3px;
            text-align: center;
            font-weight: bold;
            border: 1px solid #ddd;
            font-size: 7px;
        }
        
        td {
            padding: 4px 3px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 7px;
        }
        
        .text-center {
            text-align: center;
        }
        
        .text-right {
            text-align: right;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 8px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        
        .summary {
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        
        .summary h3 {
            margin: 0 0 8px 0;
            color: #333;
            font-size: 12px;
        }
        
        .summary-item {
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 3px;
        }
        
        .summary-number {
            font-weight: bold;
            color: #198754;
            font-size: 14px;
        }
        
        .long-text {
            max-width: 120px;
            word-wrap: break-word;
            font-size: 6px;
            line-height: 1.1;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Formations Sanitaires - Statistiques Détaillées</h1>
        <p>Rapport généré le {{ date('d/m/Y à H:i') }}</p>
    </div>

    @if($request->filled('date_debut_service') || $request->filled('date_fin_service') || $request->filled('position_id') || $request->filled('categorie_cadre_id') || $request->filled('formation_sanitaire_id'))
    <div class="filters">
        <h3>Filtres appliqués :</h3>
        @if($request->filled('date_debut_service'))
            <div class="filter-item">
                <span class="filter-label">Date début :</span>
                <span class="filter-value">{{ \Carbon\Carbon::parse($request->date_debut_service)->format('d/m/Y') }}</span>
            </div>
        @endif
        @if($request->filled('date_fin_service'))
            <div class="filter-item">
                <span class="filter-label">Date fin :</span>
                <span class="filter-value">{{ \Carbon\Carbon::parse($request->date_fin_service)->format('d/m/Y') }}</span>
            </div>
        @endif
        @if($request->filled('position_id'))
            <div class="filter-item">
                <span class="filter-label">Position :</span>
                <span class="filter-value">{{ $request->position_id }}</span>
            </div>
        @endif
        @if($request->filled('categorie_cadre_id'))
            <div class="filter-item">
                <span class="filter-label">Catégorie :</span>
                <span class="filter-value">{{ $request->categorie_cadre_id }}</span>
            </div>
        @endif
        @if($request->filled('formation_sanitaire_id'))
            <div class="filter-item">
                <span class="filter-label">Formation :</span>
                <span class="filter-value">{{ $request->formation_sanitaire_id }}</span>
            </div>
        @endif
    </div>
    @endif

    <div class="summary">
        <h3>Résumé</h3>
        <div class="summary-item">
            <span class="filter-label">Total formations :</span>
            <span class="summary-number">{{ count($exportData) }}</span>
        </div>
        <div class="summary-item">
            <span class="filter-label">Total fonctionnaires :</span>
            <span class="summary-number">{{ array_sum(array_column($exportData, 'fonctionnaires_count')) }}</span>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Formation Sanitaire</th>
                <th>Nom Arabe</th>
                <th>Arrondissement/Commune</th>
                <th>Ville</th>
                <th>Région</th>
                <th>Fonctionnaires</th>
                <th>Cadres</th>
                <th>Spécialité-Grades</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exportData as $row)
            <tr>
                <td>{{ $row['formation_name'] }}</td>
                <td>{{ $row['formation_name_arabic'] }}</td>
                <td class="text-center">{{ $row['arrondissement'] }}</td>
                <td class="text-center">{{ $row['ville'] }}</td>
                <td class="text-center">{{ $row['region'] }}</td>
                <td class="text-center">{{ $row['fonctionnaires_count'] }}</td>
                <td class="long-text">{{ $row['cadres'] }}</td>
                <td class="long-text">{{ $row['specialite_grades'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Document généré automatiquement par le système de gestion RH</p>
        <p>{{ config('app.name') }} - {{ date('Y') }}</p>
    </div>
</body>
</html>
