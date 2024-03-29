<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Stagiaires</title>
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
    <h1>Liste des Stagiaires</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>CIN</th>
                <th>Carte de séjour</th>
                <th>Numéro CNSS</th>
                <th>Id fiscal</th>
                <th>Montant Brut</th>
                <th>Indemnité</th>
                <th>Retenues</th>
                <th>Net Imposable</th>
                <th>Période</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stagiaires as $stagiaire)
            <tr>
                <td>{{ $stagiaire->nom }}</td>
                <td>{{ $stagiaire->prenom }}</td>
                <td>{{ $stagiaire->adresse }}</td>
                <td>{{ $stagiaire->cin }}</td>
                <td>{{ $stagiaire->carte_sejour }}</td>
                <td>{{ $stagiaire->numero_cnss }}</td>
                <td>{{ $stagiaire->id_fiscal }}</td>
                <td>{{ $stagiaire->montant_brut }}</td>
                <td>{{ $stagiaire->indemnite }}</td>
                <td>{{ $stagiaire->retenues }}</td>
                <td>{{ $stagiaire->net_imposable }}</td>
                <td>{{ $stagiaire->periode }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
