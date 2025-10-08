<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titre }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
            font-size: 12px;
        }
        
        .header {
            text-align: center;
            border-bottom: 3px solid #3498db;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .header h1 {
            color: #2c3e50;
            font-size: 24px;
            margin: 0 0 10px 0;
            font-weight: bold;
        }
        
        .header .subtitle {
            color: #7f8c8d;
            font-size: 14px;
            margin: 0;
        }
        
        .meta-info {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 25px;
            border-left: 4px solid #3498db;
        }
        
        .meta-info table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .meta-info td {
            padding: 5px 0;
            vertical-align: top;
        }
        
        .meta-info .label {
            font-weight: bold;
            color: #2c3e50;
            width: 150px;
        }
        
        .section {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }
        
        .section-title {
            color: #2c3e50;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 2px solid #ecf0f1;
        }
        
        .section-content {
            text-align: justify;
            line-height: 1.8;
            color: #2c3e50;
        }
        
        .resume {
            background: #e8f4fd;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #3498db;
            font-style: italic;
        }
        
        .analyse {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #2ecc71;
        }
        
        .recommandations {
            background: #fff5e6;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #f39c12;
        }
        
        .footer {
            position: fixed;
            bottom: 20px;
            left: 20px;
            right: 20px;
            text-align: center;
            font-size: 10px;
            color: #7f8c8d;
            border-top: 1px solid #ecf0f1;
            padding-top: 10px;
        }
        
        .page-break {
            page-break-before: always;
        }
        
        h1, h2, h3, h4, h5, h6 {
            color: #2c3e50;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        
        p {
            margin-bottom: 12px;
            text-align: justify;
        }
        
        ul, ol {
            margin-left: 20px;
            margin-bottom: 15px;
        }
        
        li {
            margin-bottom: 5px;
        }
        
        strong {
            color: #2980b9;
            font-weight: bold;
        }
        
        .highlight {
            background-color: #fff3cd;
            padding: 2px 4px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>{{ $titre }}</h1>
        <p class="subtitle">Analyse IA des Statistiques RH - Application Service GRH-DMSPS Fès</p>
    </div>

    <!-- Meta Information -->
    <div class="meta-info">
        <table>
            <tr>
                <td class="label">Type d'analyse :</td>
                <td>{{ ucfirst(str_replace('_', ' ', $prompt_type)) }}</td>
            </tr>
            <tr>
                <td class="label">Date de génération :</td>
                <td>{{ $date_generation }}</td>
            </tr>
            <tr>
                <td class="label">Généré par :</td>
                <td>{{ $generated_by }}</td>
            </tr>
        </table>
    </div>

    <!-- Executive Summary -->
    <div class="section">
        <h2 class="section-title">
            📋 Résumé Exécutif
        </h2>
        <div class="section-content resume">
            {!! nl2br(e($resume)) !!}
        </div>
    </div>

    <!-- Detailed Analysis -->
    <div class="section">
        <h2 class="section-title">
            🔍 Analyse Détaillée
        </h2>
        <div class="section-content analyse">
            {!! nl2br(e($analyse)) !!}
        </div>
    </div>

    <!-- Recommendations -->
    <div class="section">
        <h2 class="section-title">
            💡 Recommandations
        </h2>
        <div class="section-content recommandations">
            {!! nl2br(e($recommandations)) !!}
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>
            Document généré automatiquement par l'IA - Application Service GRH-DMSPS Fès<br>
            {{ $date_generation }} - Confidentiel
        </p>
    </div>
</body>
</html>
