<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: auth.php");
    exit;
}
require_once 'connect.php';
$page_title = 'Профиль | IT-Universe';
include 'header.php';

$stmt = $conn->prepare("SELECT login, email, role FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

$initial = mb_strtoupper(mb_substr($user['login'], 0, 1));
?>

<section class="section">
    <div class="container">
        <div class="section-header fade-in">
            <div class="tag">👤 Личный кабинет</div>
            <h1 style="font-size:clamp(28px,4vw,48px);margin-bottom:8px;">Ваш профиль</h1>
        </div>

        <div class="profile-card fade-in">
            <div class="profile-avatar"><?= $initial ?></div>

            <h2 style="text-align:center;margin-bottom:8px;font-size:28px;">
                <?= htmlspecialchars($user['login']) ?>
            </h2>
            <p style="text-align:center;color:var(--text-muted);margin-bottom:36px;">
                Ученик / родитель IT-Куб Находка
            </p>

            <div class="profile-info-row">
                <div class="label">Логин</div>
                <div class="value"><?= htmlspecialchars($user['login']) ?></div>
            </div>
            <div class="profile-info-row">
                <div class="label">Email</div>
                <div class="value"><?= htmlspecialchars($user['email']) ?></div>
            </div>
            <div class="profile-info-row">
                <div class="label">Роль</div>
                <div class="value">
                    <?php if ($user['role'] == 1): ?>
                        <span class="role-badge">Администратор</span>
                    <?php else: ?>
                        <span class="role-badge" style="background:linear-gradient(135deg,var(--primary),var(--primary-dark));color:#000;">Ученик / Родитель</span>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (!empty($user['created_at'])): ?>
            <div class="profile-info-row">
                <div class="label">Регистрация</div>
                <div class="value" style="color:var(--text-muted);"><?= date('d.m.Y', strtotime($user['created_at'])) ?></div>
            </div>
            <?php endif; ?>

            <div style="display:flex;gap:16px;justify-content:center;margin-top:40px;flex-wrap:wrap;">
                <a href="schedule.php" class="button" style="font-size:16px;padding:14px 32px;">
                    <i class="fas fa-calendar-alt"></i> Расписание
                </a>
                <a href="contact.php" class="button btn-outline" style="font-size:16px;padding:14px 32px;">
                    <i class="fas fa-envelope"></i> Написать нам
                </a>
                <a href="logout.php" class="button btn-danger" style="font-size:16px;padding:14px 32px;">
                    <i class="fas fa-sign-out-alt"></i> Выйти
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
