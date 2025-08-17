<?php
$authController = new src\Controllers\AuthController();
$csrfToken = $authController->generateCsrfToken();
?>

<h1>Register</h1>
<?php if (isset($_SESSION['error'])): ?>
    <div class="error"><?= htmlspecialchars($_SESSION['error']) ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form action="/register" method="POST">
    <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
    
    <label>Username:</label>
    <input type="text" name="username" required>
    
    <label>Email:</label>
    <input type="email" name="email" required>
    
    <label>Password:</label>
    <input type="password" name="password" required>
    
    <label>Confirm Password:</label>
    <input type="password" name="confirm_password" required>
    
    <button type="submit">Register</button>
</form>