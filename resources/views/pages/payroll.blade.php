<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin de Paie</title>
</head>
<body>
    <div class="grid-container" >
        <div class="header"> <h1 >EIGHT</h1></div>
       <div class="content">
       <table >
            
            <tbody>
            <tr><th  style="text-align: center;">Bulletin de Paie</th> </tr>
                <tr>
                    <td>Raison sociale :{{ $entreprise->raison_sociale }}</td>
                    
                </tr>
                <tr>
                    <td>N CNSS : {{ $entreprise->n_cnss }}</td>
                </tr>
                <tr>
                    <td>Siège social: {{ $entreprise->adresse }}</td>
                </tr>
            </tbody>
        </table>
       </div>
        
    </div>
<br>
    <table >
       
        <tbody>
            <tr>
                <th>ID Personnel</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>CIN</th>
                

                
            </tr>
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->nom }}</td>
                <td>{{ $employee->prenom }}</td>
                <td>{{ $employee->cin }}</td>
                
            </tr>
            <tr>
            </table>
            <table>
            <th>Adresse</th>
                <th>Situation familiale</th>
                <th>CNSS</th>
            </tr>
            <tr>
                <td>{{ $employee->adresse }}</td>
                <td>{{ $employee->situation_famille }}</td>
                <td>{{ $employee->cnss }}</td>
            </tr>
</table>
        </tbody>
    </table>

<br>

    <table >
       
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td colspan="3">Part salariale</td>
                <td colspan="2">Part patronale</td>
            </tr>
            
            <tr>
                <td>libelle</td>
                <td>Base</td>
                <td>Taux /nbre</td>
                <td>Gain</td>
                <td>retenue</td>
                <td>taux</td>
                <td>Montant</td>
            </tr>
            <tr>
                
                <td>
                <p> salaire brut <br>
                    Montant des indemnités <br>
                    Avantages <br>
                    Frais proffesionnels<br>
                    Cotisations <br>
                    Exonerations <br>
                    Retenues <br>
                    echeances <br>
                    <br>
                    <br>
                   
                </p>
                </td>
                <td>
                <p> 
    {{ number_format($employee->montant_brut , 2) }} <br>
    {{ number_format($employee->montant_indemnites , 2) }} <br>
    {{ number_format($employee->montant_avantages , 2) }} <br>
    {{ number_format($employee->montant_frais_professionnels , 2) }} <br>
    {{ number_format($employee->montant_cotisations , 2) }} <br>
    {{ number_format($employee->montant_exoneres , 2) }} <br>
    {{ number_format($employee->montant_autres_retenues , 2) }} <br>
    {{ number_format($employee->montant_echeances , 2) }} <br>
    <br>
    <br>
</p>
                </td>
                <td>
                 <p>   
                    26 j<br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    
                </p>
                </td>
                <td>
                <p>
    {{ number_format($employee->montant_brut , 2) }} <br>
    {{ number_format($employee->montant_indemnites , 2) }} <br>
    {{ number_format($employee->montant_avantages , 2) }} <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    
                </p>
                </td>
                <td> 
                <p>
                    <br>
                    <br>
                    <br>
    {{ number_format($employee->montant_frais_professionnels , 2) }} <br>
    {{ number_format($employee->montant_cotisations , 2) }} <br>
    {{ number_format($employee->montant_exoneres , 2) }} <br>
    {{ number_format($employee->montant_autres_retenues , 2) }} <br>
    {{ number_format($employee->montant_echeances , 2) }} <br>
                    <br>
                    <br>
                </p>
                </td>
                <td>
                <p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </p>    
                </td>
                <td>
                <p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </p>
                </td>
                
            </tr>
            
        </tbody>
        <tfoot>
        <tr>
                <th colspan="3">Totaux</th>
                <th> {{$employee ->gain}}</th>
                <th>{{$employee ->Indemnité}}</th>
                <th colspan="2"></th>
            </tr>
            <tr>
                <th>Net a payer</th>
                <th colspan="4"></th>
                <th colspan="2">{{number_format($employee ->revenu_net_imposable,2)}}</th>
            </tr>
        </tfoot>
    </table>
<br>
    <table>
        <tr>
            <th>Jrs Trv</th>
            <th>Brut Imposable</th>
            <th>Mutuelles</th>
            <th>Retraites</th>
            <th>CNSS</th>
            <th>AMO</th>
            <th>Net imposable</th>
            <th>IR</th>
        </tr>
        <tr>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
            <th>0</th>
        </tr>
    </table>
    
    <br>

    <div style="margin-left: 350px;">
        <table >
            <td style="height: 70px; text-align:center; vertical-align: top; ">Signature de l'employé</td>
        </table>
        <h6>CONCERVEZ CE BULLETIN DE PAIE SANS LIMITATION DE DUREE</h6>
        
     
    </div>

   
</body>
</html>
<style>
    p {
        line-height: 1.5;
        text-align: left;
    }

table {
  font-family: arial, sans-serif;
 
  width: 100%;
  
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
  font-size: small;
}


h3 { 
    font-weight: bold;
    font-size : 1em;
}



.grid-container {
    display: grid;
    grid-template-columns: auto auto; /* Deux colonnes de largeur automatique */
   /* Espacement entre les éléments */
}
.header {
    float: left;
}

/* Style spécifique pour la deuxième colonne */
.content {
   margin-left: 250px; /* Placer dans la deuxième colonne */
}
