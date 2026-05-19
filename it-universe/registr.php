<?php
session_start();
require_once 'connect.php';
require_once 'forms.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login   = trim($_POST['login'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $pass    = $_POST['password'] ?? '';
    $confirm = $_POST['password_confirm'] ?? '';

    if (empty($login) || empty($email) || empty($pass) || empty($confirm)) {
        $error = "Заполните все обязательные поля";
    } elseif ($pass !== $confirm) {
        $error = "Пароли не совпадают!";
    } elseif (strlen($pass) < 6) {
        $error = "Пароль должен содержать не менее 6 символов";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Неверный формат email!";
    } else {
        try {
            $stmt = $conn->prepare("SELECT id FROM users WHERE login = ? OR email = ?");
            $stmt->execute([$login, $email]);

            if ($stmt->rowCount() > 0) {
                $error = "Пользователь с таким логином или email уже существует!";
            } else {
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO users (login, email, password, confirmation, role) VALUES (?, ?, ?, ?, 0)");
                if ($stmt->execute([$login, $email, $hash, $confirm])) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_id']   = $conn->lastInsertId();
                    $_SESSION['login']     = $login;
                    $_SESSION['role']      = 0;
                    header("Location: profile.php");
                    exit;
                } else {
                    $error = "Ошибка при сохранении пользователя";
                }
            }
        } catch (PDOException $e) {
            $error = "Ошибка базы данных: " . $e->getMessage();
        }
    }
}

$page_title = 'Регистрация | IT-Universe';
include 'header.php';
?>

<section class="form-section">
    <div class="form-card" style="max-width:540px;">
        <div class="logo-area">
            <img src="logo4.png" alt="IT-Куб">
        </div>
        <h2>Создать аккаунт</h2>
        <p class="sub">Регистрация в системе IT-Universe</p>

        <?php if ($error): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <label style="display:block;font-size:12px;font-weight:700;font-family:'Montserrat',sans-serif;letter-spacing:0.5px;text-transform:uppercase;color:var(--text-muted);margin-bottom:8px;">Логин</label>
            <input class="input" type="text" name="login" placeholder="my_login" required
                   value="<?= htmlspecialchars($_POST['login'] ?? '') ?>">

            <label style="display:block;font-size:12px;font-weight:700;font-family:'Montserrat',sans-serif;letter-spacing:0.5px;text-transform:uppercase;color:var(--text-muted);margin-bottom:8px;margin-top:4px;">Email</label>
            <input class="input" type="email" name="email" placeholder="email@example.com" required
                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

            <label style="display:block;font-size:12px;font-weight:700;font-family:'Montserrat',sans-serif;letter-spacing:0.5px;text-transform:uppercase;color:var(--text-muted);margin-bottom:8px;margin-top:4px;">Пароль</label>
            <input class="input" type="password" name="password" placeholder="Минимум 6 символов" required>

            <label style="display:block;font-size:12px;font-weight:700;font-family:'Montserrat',sans-serif;letter-spacing:0.5px;text-transform:uppercase;color:var(--text-muted);margin-bottom:8px;margin-top:4px;">Повторите пароль</label>
            <input class="input" type="password" name="password_confirm" placeholder="••••••••" required>

            <button class="button" type="submit" style="width:100%;justify-content:center;font-size:16px;padding:16px;margin-top:12px;">
                <i class="fas fa-user-plus"></i> Зарегистрироваться
            </button>
        </form>

        <p class="form-footer">
            Уже есть аккаунт? <a href="auth.php">Войдите</a>
        </p>
    </div>
</section>

<?php include 'footer.php'; ?>
