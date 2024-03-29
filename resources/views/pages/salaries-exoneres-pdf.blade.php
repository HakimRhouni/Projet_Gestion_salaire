<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des salariés exonérés</title>
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
    <h1>Liste des salariés exonérés</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Numéro CIN</th>
                <th>ID fiscale</th>
                <th>Brut des traitements</th>
                <th>Avantages</th>
                <th>Indemnité</th>
                <th>Revenu brut imposable</th>
                <th>Retenues opérées</th>
                <th>Revenu Net Imposable</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salaries_exoneres as $salarie)
                <tr>
                    <td>{{ $salarie->nom }}</td>
                    <td>{{ $salarie->prenom }}</td>
                    <td>{{ $salarie->numero_cin }}</td>
                    <td>{{ $salarie->carte_sejour }}</td>
                    <td>{{ $salarie->brut_traitements }}</td>
                    <td>{{ $salarie->avantages }}</td>
                    <td>{{ $salarie->indemnite }}</td>
                    <td>{{ $salarie->revenu_brut_imposable }}</td>
                    <td>{{ $salarie->retenues_operees }}</td>
                    <td>{{ $salarie->revenu_net_imposable }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
