<?php
session_start();
require_once 'connect.php';
require_once 'forms.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = trim($_POST['identifier'] ?? '');
    $password   = $_POST['password'] ?? '';

    if (empty($identifier) || empty($password)) {
        $error = "Заполните все поля";
    } else {
        try {
            $stmt = $conn->prepare("SELECT id, login, email, password, role FROM users WHERE login = ? OR email = ? LIMIT 1");
            $stmt->execute([$identifier, $identifier]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['login']     = $user['login'];
                $_SESSION['role']      = (int)$user['role'];

                $redirect = ($user['role'] == 1) ? 'administrator.php' : 'profile.php';
                header("Location: $redirect");
                exit;
            } else {
                $error = "Неверный логин/email или пароль";
            }
        } catch (PDOException $e) {
            $error = "Ошибка базы данных";
        }
    }
}

$page_title = 'Вход | IT-Universe';
include 'header.php';
?>

<section class="form-section">
    <div class="form-card">
        <div class="logo-area">
            <img src="logo4.png" alt="IT-Куб">
        </div>
        <h2>Добро пожаловать</h2>
        <p class="sub">Войдите в свой аккаунт IT-Universe</p>

        <?php if ($error): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <label style="display:block;font-size:12px;font-weight:700;font-family:'Montserrat',sans-serif;letter-spacing:0.5px;text-transform:uppercase;color:var(--text-muted);margin-bottom:8px;">Логин или Email</label>
            <input class="input" type="text" name="identifier" placeholder="your_login или email@mail.ru" required
                   value="<?= htmlspecialchars($_POST['identifier'] ?? '') ?>">

            <label style="display:block;font-size:12px;font-weight:700;font-family:'Montserrat',sans-serif;letter-spacing:0.5px;text-transform:uppercase;color:var(--text-muted);margin-bottom:8px;margin-top:4px;">Пароль</label>
            <input class="input" type="password" name="password" placeholder="••••••••" required>

            <button class="button" type="submit" style="width:100%;justify-content:center;font-size:16px;padding:16px;margin-top:10px;">
                <i class="fas fa-sign-in-alt"></i> Войти
            </button>
        </form>

        <p class="form-footer">
            Нет аккаунта? <a href="registr.php">Зарегистрируйтесь</a>
        </p>
    </div>
</section>

<?php include 'footer.php'; ?>
