<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des bénéficiaires d’abondements</title>
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
    <h1>Liste des bénéficiaires d’abondements</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>CIN</th>
                <th>Carte de séjour</th>
                <th>Numéro de plan</th>
                <th>Durée en années</th>
                <th>Date d'ouverture</th>
                <th>Montant abondement</th>
                <th>Montant annuel du revenu imposable</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beneficiairesAbondement as $beneficiaire)
            <tr>
                <td>{{ $beneficiaire->nom }}</td>
                <td>{{ $beneficiaire->prenom }}</td>
                <td>{{ $beneficiaire->cin }}</td>
                <td>{{ $beneficiaire->carte_sejour }}</td>
                <td>{{ $beneficiaire->numero_plan }}</td>
                <td>{{ $beneficiaire->duree_annees }}</td>
                <td>{{ $beneficiaire->date_ouverture }}</td>
                <td>{{ $beneficiaire->montant_abondement }}</td>
                <td>{{ $beneficiaire->montant_annuel_revenu_imposable }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
