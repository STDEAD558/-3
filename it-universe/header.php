<?php
session_start();
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?? 'IT-Universe | IT-Куб Находка' ?></title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <header class="header">
        <nav class="nav">
            <div class="logo">
                <a href="index.php">
                    <span class="logo-text">IT-Universe</span>
                </a>
            </div>

            <div class="links">
                <a href="index.php"><i class="fas fa-home"></i> Главная</a>
                <a href="information.php"><i class="fas fa-info-circle"></i> О нас</a>
                <a href="schedule.php"><i class="fas fa-calendar-alt"></i> Расписание</a>
                <a href="contact.php"><i class="fas fa-phone"></i> Контакты</a>
            </div>

            <div class="auth">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <a href="logout.php" class="auth-link"><i class="fas fa-sign-out-alt"></i> Выйти</a>
                    <?php if ($_SESSION['role'] == 1): ?>
                        <a href="administrator.php" class="button admin-btn"><i class="fas fa-shield-alt"></i> Админ-панель</a>
                    <?php else: ?>
                        <a href="profile.php" class="button"><i class="fas fa-user"></i> <?= htmlspecialchars($_SESSION['login']) ?></a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="auth.php" class="auth-link">Войти</a>
                    <a href="registr.php" class="button"><i class="fas fa-user-plus"></i> Регистрация</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
