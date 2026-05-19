<?php
$page_title = 'Главная | IT-Universe | IT-Куб Находка';
include 'header.php';
?>

<!-- HERO -->
<section class="hero">
    <div class="hero-grid">
        <div class="hero-content">
            <div class="hero-badge">
                <span class="dot"></span>
                IT-Куб Находка &nbsp;•&nbsp; Открыт с 2022 года
            </div>

            <h1 class="hero-title">
                Центр цифрового<br>
                образования детей<br>
                <span class="highlight">«IT-Куб. Находка»</span>
            </h1>

            <p class="hero-subtitle">
                Бесплатное качественное обучение современным IT-навыкам для детей и подростков 7–17 лет.
            </p>

            <div class="hero-chips">
                <span class="chip">💻 Программирование</span>
                <span class="chip">🤖 Робототехника</span>
                <span class="chip">🧠 Искусственный интеллект</span>
                <span class="chip">📐 3D-моделирование</span>
                <span class="chip">🔒 Кибербезопасность</span>
            </div>

            <div class="hero-actions">
                <a href="profile.php" class="button">
                    <i class="fas fa-user-plus"></i> Записаться бесплатно
                </a>
                <a href="schedule.php" class="button btn-outline">
                    <i class="fas fa-calendar-alt"></i> Расписание
                </a>
            </div>

            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-value">1400+</div>
                    <div class="stat-label">учеников</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">28</div>
                    <div class="stat-label">направлений</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">16</div>
                    <div class="stat-label">наставников</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">0 ₽</div>
                    <div class="stat-label">стоимость</div>
                </div>
            </div>
        </div>

        <div class="hero-visual">
            <div class="hero-image-card">
                <img src="group.png" alt="Ученики IT-Куб">
            </div>
            <div class="hero-float-card">
                <div class="icon">🏆</div>
                <div class="fc-text">
                    <div class="fc-label">Последнее достижение</div>
                    <div class="fc-value">1 место — Олимпиада по робототехнике 2025</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FEATURES -->
<section class="section" style="background: var(--dark-2);">
    <div class="container">
        <div class="section-header fade-in">
            <div class="tag">🎯 Возможности платформы</div>
            <h2>Что вы найдёте на сайте</h2>
            <p>Удобный инструмент для родителей и учеников центра IT-Куб Находка</p>
        </div>

        <div class="grid-4">
            <div class="card fade-in" style="transition-delay:0s;">
                <span class="card-icon">📅</span>
                <h3>Расписание</h3>
                <p>Актуальные Excel-файлы с расписанием занятий каждый месяц</p>
            </div>
            <div class="card fade-in" style="transition-delay:0.1s;">
                <span class="card-icon">👤</span>
                <h3>Личный кабинет</h3>
                <p>Информация об успеваемости, занятиях и достижениях ученика</p>
            </div>
            <div class="card fade-in" style="transition-delay:0.2s;">
                <span class="card-icon">🏆</span>
                <h3>Достижения</h3>
                <p>Новости, олимпиады и победы учеников центра</p>
            </div>
            <div class="card fade-in" style="transition-delay:0.3s;">
                <span class="card-icon">📞</span>
                <h3>Быстрая связь</h3>
                <p>Ответы на вопросы в течение рабочего дня</p>
            </div>
        </div>
    </div>
</section>

<!-- COURSES -->
<section class="section">
    <div class="container">
        <div class="section-header fade-in">
            <div class="tag">🚀 Обучение</div>
            <h2>Направления обучения</h2>
            <p>Выберите то, что вам интересно — все курсы бесплатны</p>
        </div>

        <div class="grid-3">
            <div class="course-card fade-in">
                <span class="course-icon">💻</span>
                <h3>Программирование</h3>
                <p style="color:var(--text-muted); margin-top:10px;">Scratch, Python, C++, разработка игр и веб-приложений</p>
                <span class="age-badge">7–17 лет</span>
            </div>
            <div class="course-card fade-in">
                <span class="course-icon">🤖</span>
                <h3>Робототехника</h3>
                <p style="color:var(--text-muted); margin-top:10px;">LEGO Mindstorms, Arduino, участие в соревнованиях</p>
                <span class="age-badge">8–16 лет</span>
            </div>
            <div class="course-card fade-in">
                <span class="course-icon">🧠</span>
                <h3>Искусственный интеллект</h3>
                <p style="color:var(--text-muted); margin-top:10px;">Основы ИИ, машинное обучение, нейросети</p>
                <span class="age-badge">10–17 лет</span>
            </div>
            <div class="course-card fade-in">
                <span class="course-icon">📐</span>
                <h3>3D-моделирование</h3>
                <p style="color:var(--text-muted); margin-top:10px;">Blender, Tinkercad, 3D-печать прямо в центре</p>
                <span class="age-badge">9–17 лет</span>
            </div>
            <div class="course-card fade-in">
                <span class="course-icon">🔒</span>
                <h3>Кибербезопасность</h3>
                <p style="color:var(--text-muted); margin-top:10px;">Защита информации, основы этичного хакинга</p>
                <span class="age-badge">11–17 лет</span>
            </div>
            <div class="course-card fade-in" style="display:flex;flex-direction:column;align-items:flex-start;justify-content:center;background:linear-gradient(135deg,rgba(0,212,184,0.1),rgba(67,97,238,0.1));border-color:rgba(0,212,184,0.2);">
                <span class="course-icon">✨</span>
                <h3>Хочу узнать больше</h3>
                <p style="color:var(--text-muted); margin-top:10px;">Свяжитесь с нами и узнайте обо всех 28 направлениях</p>
                <a href="contact.php" class="button" style="margin-top:20px;font-size:14px;padding:12px 24px;">Написать нам</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section-sm" style="background: var(--dark-2);">
    <div class="container">
        <div style="background: linear-gradient(135deg, rgba(0,212,184,0.12), rgba(67,97,238,0.12)); border: 1px solid rgba(0,212,184,0.2); border-radius: 32px; padding: 70px 60px; text-align: center;" class="fade-in">
            <div class="tag" style="margin: 0 auto 24px;">🎓 Бесплатно</div>
            <h2 style="font-size: clamp(28px, 4vw, 48px); margin-bottom: 20px;">Готовы начать обучение?</h2>
            <p style="color: var(--text-muted); font-size: 18px; max-width: 560px; margin: 0 auto 40px;">
                Зарегистрируйтесь на сайте и запишитесь на любой курс — это совершенно бесплатно
            </p>
            <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
                <a href="registr.php" class="button" style="font-size:17px;padding:16px 40px;">
                    <i class="fas fa-rocket"></i> Записаться сейчас
                </a>
                <a href="information.php" class="button btn-outline" style="font-size:17px;padding:16px 40px;">
                    Узнать больше
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
