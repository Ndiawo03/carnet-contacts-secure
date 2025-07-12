<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}
$contacts = file_exists("contacts.csv") ? array_map("str_getcsv", file("contacts.csv")) : [];
$search = $_GET['search'] ?? '';
$results = [];

foreach ($contacts as $c) {
    if ($search === '' || stripos(implode(',', $c), $search) !== false) {
        $results[] = $c;
    }
}
?>
<h2>Liste des contacts</h2>
<form method="get">
    <input name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Rechercher...">
    <button>Rechercher</button>
</form>
<table border="1">
<tr><th>Nom</th><th>Email</th><th>Téléphone</th></tr>
<?php foreach ($results as $c): ?>
<tr><td><?= $c[0] ?></td><td><?= $c[1] ?></td><td><?= $c[2] ?></td></tr>
<?php endforeach; ?>
</table>
<a href="index.php">Retour</a>
