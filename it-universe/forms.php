<?php
// forms.php — вспомогательные функции форм
// Основные формы теперь встроены напрямую в страницы auth.php и registr.php
// Этот файл оставлен для обратной совместимости

function form_login() {
    echo '
    <form method="post">
        <input class="input" type="text" name="identifier" placeholder="Логин или email" required>
        <input class="input" type="password" name="password" placeholder="Пароль" required>
        <button class="button" type="submit" style="width:100%;justify-content:center;font-size:16px;padding:16px;">
            <i class="fas fa-sign-in-alt"></i> Войти
        </button>
    </form>
    ';
}

function form_register() {
    echo '
    <form method="post">
        <input class="input" type="text" name="login" placeholder="Логин" required>
        <input class="input" type="email" name="email" placeholder="Email" required>
        <input class="input" type="password" name="password" placeholder="Пароль (мин. 6 символов)" required>
        <input class="input" type="password" name="password_confirm" placeholder="Повторите пароль" required>
        <button class="button" type="submit" style="width:100%;justify-content:center;font-size:16px;padding:16px;">
            <i class="fas fa-user-plus"></i> Зарегистрироваться
        </button>
    </form>
    ';
}
?>
