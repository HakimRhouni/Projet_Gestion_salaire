<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Doctorants</title>
    <!-- Ajoutez vos styles CSS ici pour formater le PDF -->
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
    <h1>Liste des Doctorants</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Numéro CIN</th>
                <th>Carte de Séjour</th>
                <th>Brut Indemnités</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctorants as $doctorant)
            <tr>
                <td>{{ $doctorant->nom }}</td>
                <td>{{ $doctorant->prenom }}</td>
                <td>{{ $doctorant->adresse }}</td>
                <td>{{ $doctorant->numero_cin }}</td>
                <td>{{ $doctorant->carte_sejour }}</td>
                <td>{{ $doctorant->brut_indemnites }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
