<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste du personnel permanent</title>
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
    <h1>Liste du personnel permanent</h1>
    <table>
        <thead>
            <tr>
                <th>Matricule</th>
                <th>LF de l'employé</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>CIN</th>
                <th>Carte de séjour</th>
                <th>CNSS</th>
                <th>Situation de famille</th>
                <th>Adresse</th>
                <th>Montant du revenu brut imposable</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personnelPermanents as $personnelPermanent)
            <tr>
                <td>{{ $personnelPermanent->matricule }}</td>
                <td>{{ $personnelPermanent->lf_employe }}</td>
                <td>{{ $personnelPermanent->nom }}</td>
                <td>{{ $personnelPermanent->prenom }}</td>
                <td>{{ $personnelPermanent->cin }}</td>
                <td>{{ $personnelPermanent->carte_sejour }}</td>
                <td>{{ $personnelPermanent->cnss }}</td>
                <td>{{ $personnelPermanent->situation_famille }}</td>
                <td>{{ $personnelPermanent->adresse }}</td>
                <td>{{ $personnelPermanent->montant_revenu_brut_imposable }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
