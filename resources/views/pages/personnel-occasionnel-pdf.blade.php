<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste du personnel occasionnel</title>
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
    <h1>Liste du personnel occasionnel</h1>
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
                <th>Profession</th>
                <th>Montant Brut</th>
                <th>IR Prélevé</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personnelOccasionnel as $personnel)
                <tr>
                    <td>{{ $personnel->nom }}</td>
                    <td>{{ $personnel->prenom }}</td>
                    <td>{{ $personnel->adresse }}</td>
                    <td>{{ $personnel->cin }}</td>
                    <td>{{ $personnel->carte_sejour }}</td>
                    <td>{{ $personnel->numero_cnss }}</td>
                    <td>{{ $personnel->id_fiscal }}</td>
                    <td>{{ $personnel->profession }}</td>
                    <td>{{ $personnel->montant_brut }}</td>
                    <td>{{ $personnel->ir_preleve }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
