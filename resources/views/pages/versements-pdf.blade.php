<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Versements</title>
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
    <h1>Liste des Versements</h1>
    <table>
        <thead>
            <tr>
                <th>Mois</th>
                <th>Référence</th>
                <th>Date de versement</th>
                <th>Mode de paiement</th>
                <th>Numéro de quittance</th>
                <th>Principale</th>
                <th>Pénalité</th>
                <th>Majorations</th>
                <th>Total versé</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($versements as $versement)
            <tr>
                <td>{{ $versement->mois }}</td>
                <td>{{ $versement->reference }}</td>
                <td>{{ $versement->date_versement }}</td>
                <td>{{ $versement->mode_paiement }}</td>
                <td>{{ $versement->numero_quittance }}</td>
                <td>{{ $versement->principale }}</td>
                <td>{{ $versement->penalite }}</td>
                <td>{{ $versement->majorations }}</td>
                <td>{{ $versement->total_verse }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
