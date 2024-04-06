<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attestation de travail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 200px;
        }
        .title {
            text-align: center;
            margin-bottom: 30px;
        }
        .details {
            margin-bottom: 30px;
        }
        .details p {
            margin-bottom: 10px;
            line-height: 1.5;
        }
        .signature {
            text-align: center;
            margin-top: 50px;
        }
        .signature p {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="title">
        <h2>Attestation de travail</h2>
    </div>
    <div class="details">
        <p>Je soussignés,</p>
        <p>Mme Fatou Claire FALL,</p>
        <p>PDG de All You Want,</p>
        <br>
        <p>Certifie que :</p>
        <p>{{ auth()->user()->name }},</p>
        <p>est employé(e) au sein de notre entreprise au département {{ auth()->user()->departement->name }} avec un contrat de {{ auth()->user()->contrat->name }}.</p>
        <p>Cette attestation est délivrée à la demande de l'intéressé(e) pour servir et valoir ce que de droit.</p>
    </div>
    <br>
    <div class="signature">
        <p>Fait à Dakar, le {{ date('Y-m-d') }}</p>
        <p>Fatou claire FALL</p>

    </div>
</div>
</body>
</html>
