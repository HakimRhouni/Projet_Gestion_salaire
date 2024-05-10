<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin de Paie</title>
</head>
<body>
    <div style="display: flex; align-items: center;">
        <h1 style="margin-right: auto;">EIGHT</h1>
        <table border="1">
            <caption><h2>Bulletin de Paie</h2></caption>
            <tbody>
                <tr>
                    <td>Raison sociale</td>
                    <td>{{ $entreprise->raison_sociale }}</td>
                </tr>
                <tr>
                    <td>N CNSS</td>
                    <td>{{ $entreprise->n_cnss }}</td>
                </tr>
                <tr>
                    <td>Siège social</td>
                    <td>{{ $entreprise->adresse }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>

    <table border="1">
        <caption><h3>Informations sur l'employé</h3></caption>
        <tbody>
            <tr>
                <td>ID Personnel</td>
                <td>{{ $employee->id_personnel }}</td>
            </tr>
            <tr>
                <td>Nom</td>
                <td>{{ $employee->nom }}</td>
            </tr>
            <tr>
                <td>Prénom</td>
                <td>{{ $employee->prenom }}</td>
            </tr>
            <tr>
                <td>CIN</td>
                <td>{{ $employee->cin }}</td>
            </tr>
            <tr>
                <td>Adresse</td>
                <td>{{ $employee->adresse }}</td>
            </tr>
            <tr>
                <td>Situation familiale</td>
                <td>{{ $employee->situation_famille }}</td>
            </tr>
            <tr>
                <td>CNSS</td>
                <td>{{ $employee->cnss }}</td>
            </tr>
        </tbody>
    </table>

    <br>

    <table border="1">
        <caption><h3>Informations sur la rémunération</h3></caption>
        <tbody>
            <tr>
                <td>Salaire de base annuel</td>
                <td>{{ $employee->salaire_base_annuel }}</td>
            </tr>
            <tr>
                <td>Montant des indemnités</td>
                <td>{{ $employee->montant_indemnites }}</td>
            </tr>
            <tr>
                <td>Montant des autres retenues</td>
                <td>{{ $employee->montant_autres_retenues }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
