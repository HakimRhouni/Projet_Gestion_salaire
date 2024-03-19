<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des entreprises</title>
    <style>
      
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Liste des entreprises</h1>
    <table>
        <thead>
            <tr>
                <th>Raison sociale</th>
                <th>ID Fiscal</th>
                <th>Forme juridique</th>
                <th>Régime</th>
                <th>Modèle</th>
                <th>Téléphone</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($entreprises as $entreprise)
            <tr>
                <td>{{ $entreprise->raison_sociale }}</td>
                <td>{{ $entreprise->id_fiscal }}</td>
                <td>{{ $entreprise->forme_juridique }}</td>
                <td>{{ $entreprise->regime }}</td>
                <td>{{ $entreprise->modele }}</td>
                <td>{{ $entreprise->telephone }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
