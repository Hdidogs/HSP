<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Candidature</title>
</head>
<body>
<p>Bonjour,</p>

<p>Vous avez reçu une nouvelle candidature pour l'offre : <strong>{{ $offre->titre }}</strong>.</p>

<p><strong>Candidat :</strong> {{ $user->name }} ({{ $user->email }})</p>

<p><strong>Message du candidat :</strong></p>
<p>{{ $messageContent }}</p>

<p>Veuillez prendre contact avec le candidat pour plus d'informations.</p>

<p>Cordialement,</p>
<p>L'équipe HSP</p>
</body>
</html>
