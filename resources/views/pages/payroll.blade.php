<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin de paie</title>
    <style>
        /* Ajoutez votre style CSS ici */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <!-- Tableau de l'entreprise -->
    <table>
        <thead>
            <tr>
                <th colspan="2">Informations de l'entreprise</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Raison sociale</td>
                <td>{{ $entreprise->raison_sociale }}</td>
            </tr>
            <tr>
                <td>N° CNSS</td>
                <td>{{ $entreprise->n_cnss }}</td>
            </tr>
            <tr>
                <td>Adresse</td>
                <td>{{ $entreprise->siege_social }}, {{ $entreprise->commune }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Tableau des données du personnel -->
    <table>
        <thead>
            <tr>
                <th colspan="2">Informations du personnel</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Matricule</td>
                <td>{{ $personnel->matricule }}</td>
            </tr>
            <tr>
                <td>Nom et prénom</td>
                <td>{{ $personnel->nom }} {{ $personnel->prenom }}</td>
            </tr>
            <tr>
                <td>N° CIN</td>
                <td>{{ $personnel->cin }}</td>
            </tr>
            <tr>
                <td>Adresse</td>
                <td>{{ $personnel->adresse }}</td>
            </tr>
            <tr>
                <td>Situation familiale</td>
                <td>{{ $personnel->situation_famille }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Tableau des données de paie -->
    <table>
        <thead>
            <tr>
                <th colspan="2">Données de paie</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Montant brut</td>
                <td>{{ $personnel->montant_brut }}</td>
            </tr>
            <tr>
                <td>Montant avantages</td>
                <td>{{ $personnel->montant_avantages }}</td>
            </tr>
            <tr>
                <td>Montant indemnités</td>
                <td>{{ $personnel->montant_indemnites }}</td>
            </tr>
            <!-- Ajoutez d'autres lignes de données de paie ici -->
        </tbody>
    </table>
</body>
</html>
