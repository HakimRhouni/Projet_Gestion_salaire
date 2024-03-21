<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des bénéficiaires d'options de souscription</title>
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
    <h1>Liste des bénéficiaires d'options de souscription</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>CIN</th>
                <th>Carte de séjour</th>
                <th>ID Fiscal</th>
                <th>Nbr Actions Acquises</th>
                <th>Nbr Action Distribuées</th>
                <th>Prix Acquisition</th>
                <th>Montant Abondement</th>
                <th>Complément Salaire</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beneficiairesOS as $beneficiaire)
            <tr>
                <td>{{ $beneficiaire->nom }}</td>
                <td>{{ $beneficiaire->prenom }}</td>
                <td>{{ $beneficiaire->cin }}</td>
                <td>{{ $beneficiaire->carte_sejour }}</td>
                <td>{{ $beneficiaire->id_fiscal }}</td>
                <td>{{ $beneficiaire->nbr_actions_acquises }}</td>
                <td>{{ $beneficiaire->nbr_actions_distribuees }}</td>
                <td>{{ $beneficiaire->prix_acquisition }}</td>
                <td>{{ $beneficiaire->montant_abondement }}</td>
                <td>{{ $beneficiaire->complement_salaire }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
