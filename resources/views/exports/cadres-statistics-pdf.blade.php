<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relations Cadres - Statistiques</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            margin: 15px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #FFC107;
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
            border-left: 4px solid #FFC107;
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
            background-color: #FFC107;
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
            color: #FFC107;
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
        <h1>Relations Cadres - Statistiques Détaillées</h1>
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
            <span class="filter-label">Total lignes :</span>
            <span class="summary-number">{{ count($exportData) }}</span>
        </div>
        <div class="summary-item">
            <span class="filter-label">Total fonctionnaires :</span>
            <span class="summary-number">
                {{ array_sum(array_filter(array_column($exportData, 'total_fonctionnaires_count'), function($value) { return is_numeric($value); })) }}
            </span>
        </div>
        <div class="summary-item">
            <span class="filter-label">Total formations :</span>
            <span class="summary-number">
                {{ array_sum(array_filter(array_column($exportData, 'formations_count'), function($value) { return is_numeric($value); })) }}
            </span>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Catégorie Cadre / Spécialité-Grade</th>
                <th>Nb Cadres</th>
                <th>Nb Grades</th>
                <th>Nb Spécialités</th>
                <th>Nom du Cadre</th>
                <th>Nb Fonctionnaires (Spécialité)</th>
                <th>Total Fonctionnaires (Catégorie)</th>
                <th>Formations Sanitaires</th>
                <th>Noms de formations sanitaires</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exportData as $row)
            <tr style="{{ $row['is_category_header'] ? 'background-color: #f0f0f0; font-weight: bold;' : '' }}">
                <td>{{ $row['categorie_cadre'] }}</td>
                <td class="text-center">{{ $row['cadres_count'] }}</td>
                <td class="text-center">{{ $row['grade_cadres_count'] }}</td>
                <td class="text-center">{{ $row['specialite_grades_count'] }}</td>
                <td class="text-center">{{ $row['cadre_name'] }}</td>
                <td class="text-center">{{ $row['specialite_fonctionnaires_count'] }}</td>
                <td class="text-center">{{ $row['total_fonctionnaires_count'] }}</td>
                <td class="text-center">{{ $row['formations_count'] }}</td>
                <td class="long-text">{{ $row['formation_names'] }}</td>
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
