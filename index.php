<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [$_POST['nom'], $_POST['email'], $_POST['telephone']];
    $f = fopen("contacts.csv", "a");
    fputcsv($f, $data);
    fclose($f);
}
?>
<h2>Ajouter un contact</h2>
<form method="post">
    <input name="nom" placeholder="Nom" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="telephone" placeholder="Téléphone" required>
    <button type="submit">Ajouter</button>
</form>
<a href="liste.php">Voir les contacts</a> | <a href="logout.php">Déconnexion</a>
