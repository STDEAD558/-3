<?php
$page_title = 'Контакты | IT-Universe | IT-Куб Находка';
include 'header.php';

$success = false;
$error   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        $error = 'Пожалуйста, заполните все поля.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Неверный формат email.';
    } else {
        // TODO: отправка письма / сохранение в БД
        $success = true;
    }
}
?>

<section class="section">
    <div class="container">

        <div class="section-header fade-in">
            <div class="tag">📞 Обратная связь</div>
            <h1 style="font-size:clamp(32px,5vw,58px);margin-bottom:16px;">Наши контакты</h1>
            <p>Свяжитесь с нами удобным способом — ответим быстро</p>
        </div>

        <div style="display:grid;grid-template-columns:1fr 1.4fr;gap:40px;align-items:start;" class="contact-layout">

            <!-- Contact info -->
            <div class="fade-in">
                <div class="contact-info-card">
                    <h2 style="font-size:22px;text-align:left;margin-bottom:8px;">Информация</h2>
                    <div class="divider" style="margin:0 0 28px;"></div>

                    <div class="contact-item">
                        <div class="ci-icon">📞</div>
                        <div>
                            <div class="ci-label">Телефон</div>
                            <div class="ci-value"><a href="tel:+79242402287" style="color:var(--primary);">+7 (924) 240-22-87</a></div>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="ci-icon">✉️</div>
                        <div>
                            <div class="ci-label">Email</div>
                            <div class="ci-value"><a href="mailto:itcube25@yandex.ru" style="color:var(--primary);">itcube25@yandex.ru</a></div>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="ci-icon">📍</div>
                        <div>
                            <div class="ci-label">Адрес</div>
                            <div class="ci-value">ул. Юбилейная, 12<br>МАОУ СОШ № 22, 3 этаж<br>г. Находка, 692900</div>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="ci-icon">🕐</div>
                        <div>
                            <div class="ci-label">Режим работы</div>
                            <div class="ci-value">Пн–Пт: 09:00–19:00<br>Сб: 10:00–16:00</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="fade-in" style="transition-delay:0.15s;">
                <div class="about-card">
                    <h2 style="font-size:22px;text-align:left;margin-bottom:8px;">Напишите нам</h2>
                    <div class="divider" style="margin:0 0 32px;"></div>

                    <?php if ($success): ?>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i>
                            Сообщение отправлено! Мы ответим в течение рабочего дня.
                        </div>
                    <?php endif; ?>
                    <?php if ($error): ?>
                        <div class="alert alert-error">
                            <i class="fas fa-exclamation-circle"></i>
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!$success): ?>
                    <form method="post">
                        <label style="display:block;font-size:13px;font-weight:700;font-family:'Montserrat',sans-serif;letter-spacing:0.5px;text-transform:uppercase;color:var(--text-muted);margin-bottom:8px;">Ваше имя</label>
                        <input class="input" type="text" name="name" placeholder="Иван Петров" required
                               value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">

                        <label style="display:block;font-size:13px;font-weight:700;font-family:'Montserrat',sans-serif;letter-spacing:0.5px;text-transform:uppercase;color:var(--text-muted);margin-bottom:8px;margin-top:4px;">Email</label>
                        <input class="input" type="email" name="email" placeholder="ivan@example.com" required
                               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

                        <label style="display:block;font-size:13px;font-weight:700;font-family:'Montserrat',sans-serif;letter-spacing:0.5px;text-transform:uppercase;color:var(--text-muted);margin-bottom:8px;margin-top:4px;">Ваш вопрос</label>
                        <textarea class="input" name="message" rows="6"
                                  placeholder="Хочу записать ребёнка на курс программирования..." required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>

                        <button class="button" type="submit" style="width:100%;font-size:16px;padding:16px;margin-top:8px;justify-content:center;">
                            <i class="fas fa-paper-plane"></i> Отправить сообщение
                        </button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
@media(max-width:900px) {
    .contact-layout { grid-template-columns: 1fr !important; }
}
</style>

<?php include 'footer.php'; ?>
