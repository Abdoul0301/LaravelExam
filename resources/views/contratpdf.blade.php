<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrat de travail</title>
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
        <h2>Contrat de travail</h2>
    </div>
    <div class="details">
        <p>Entre les soussignés,</p>
        <p>Mme Fatou Claire FALL,</p>
        <p>PDG de All You Want,</p>
        <p>d'une part, et</p>
        <p>{{ auth()->user()->name }},</p>
        <p>d'autre part,</p>
        <br>
        <p>Il a été convenu ce qui suit :</p>
        <p>{{ auth()->user()->name }} est engagé(e) en qualité de fonctionnaire au sein de notre entreprise .</p>
        <p>Son lieu de travail est le département de {{ auth()->user()->departement->name }}.</p>
        <p>La rémunération mensuelle brute s'élève à {{ auth()->user()->salaire }} FCFA.</p>
        <p>Le présent contrat est un {{ auth()->user()->contrat->name }}.</p>
        <p>Il pourra être résilié par l'une ou l'autre des parties moyennant un préavis.</p>
    </div>
    <div class="signature">
        <p>Fait à Dakar, le {{ date('d/m/Y') }}</p>
        Fatou claire FALL
    </div>
</div>
</body>
</html>
