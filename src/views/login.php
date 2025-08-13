<?php
$authController = new App\Controllers\AuthController();
$csrfToken = $authController->generateCsrfToken();
?>

<h1>Login</h1>
<?php if (isset($_SESSION['error'])): ?>
    <div class="error"><?= htmlspecialchars($_SESSION['error']) ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form action="/login" method="POST">
    <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
    
    <label>Username:</label>
    <input type="text" name="username" required>
    
    <label>Password:</label>
    <input type="password" name="password" required>
    
    <button type="submit">Login</button>
</form>