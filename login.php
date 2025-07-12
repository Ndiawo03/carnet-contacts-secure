<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === 'admin' && $_POST['password'] === '1234') {
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
    } else {
        $error = "Identifiants incorrects.";
    }
}
?>
<form method="post">
    <h2>Connexion</h2>
    <input name="username" placeholder="Nom d'utilisateur" required>
    <input name="password" type="password" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</form>
