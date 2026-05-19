<?php
$page_title = 'О нас | IT-Universe | IT-Куб Находка';
include 'header.php';
?>

<section class="section">
    <div class="container">

        <!-- Header -->
        <div class="section-header fade-in">
            <div class="tag">🏫 О центре</div>
            <h1 style="font-size:clamp(32px,5vw,58px);margin-bottom:16px;">О центре «IT-Куб. Находка»</h1>
            <p>Открыт в 2022 году в рамках национального проекта «Образование»</p>
        </div>

        <!-- Main info -->
        <div class="grid-2" style="margin-bottom:60px;">
            <div class="fade-in">
                <img src="info.jpg" alt="IT-Куб логотип"
                     style="width:100%;border-radius:28px;border:1px solid var(--border);box-shadow:var(--shadow);">
            </div>
            <div class="about-card fade-in">
                <div class="tag" style="margin-bottom:28px;">📍 Находка, Приморский край</div>
                <h2 style="text-align:left;font-size:28px;margin-bottom:20px;">О нас</h2>
                <p style="color:var(--text-muted);font-size:17px;line-height:1.85;margin-bottom:20px;">
                    Центр цифрового образования детей открыт на базе МАОУ СОШ&nbsp;№&nbsp;22. За годы работы мы обучили более <strong style="color:var(--primary);">1400 детей</strong> в возрасте от 7 до 17 лет.
                </p>
                <p style="color:var(--text-muted);font-size:17px;line-height:1.85;margin-bottom:36px;">
                    Наши ученики регулярно занимают призовые места на региональных и всероссийских олимпиадах, хакатонах и соревнованиях по робототехнике.
                </p>

                <h3 style="margin-bottom:20px;font-size:20px;">Наши преимущества</h3>
                <div class="advantage-item">80–90% практики на каждом занятии</div>
                <div class="advantage-item">Современное оборудование: роботы, VR, 3D-принтеры, мощные ПК</div>
                <div class="advantage-item">Наставники — практикующие IT-специалисты</div>
                <div class="advantage-item">Полностью бесплатное обучение для всех желающих</div>
                <div class="advantage-item">Индивидуальный подход и регулярная связь с родителями</div>
            </div>
        </div>

        <!-- Stats -->
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:24px;margin-bottom:60px;">
            <?php
            $stats = [
                ['value' => '1400+', 'label' => 'Обученных детей', 'icon' => '👩‍💻'],
                ['value' => '28',    'label' => 'Направлений',     'icon' => '📚'],
                ['value' => '16',    'label' => 'Наставников',     'icon' => '🧑‍🏫'],
                ['value' => '2022',  'label' => 'Год открытия',    'icon' => '📅'],
            ];
            foreach ($stats as $i => $s): ?>
            <div class="card fade-in" style="text-align:center;transition-delay:<?= $i * 0.1 ?>s;">
                <div style="font-size:36px;margin-bottom:10px;"><?= $s['icon'] ?></div>
                <div style="font-family:'Montserrat',sans-serif;font-size:40px;font-weight:900;background:linear-gradient(135deg,#fff,var(--primary));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1.1;margin-bottom:8px;"><?= $s['value'] ?></div>
                <div style="color:var(--text-muted);font-size:15px;"><?= $s['label'] ?></div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Achievements -->
        <div class="about-card fade-in">
            <h2 style="text-align:left;font-size:26px;margin-bottom:32px;">🏆 Наши достижения</h2>
            <div class="achievement-item">
                <div class="achievement-icon">🥇</div>
                <div>
                    <strong style="font-size:17px;">1 место — Всероссийская олимпиада по робототехнике 2025</strong>
                    <p style="color:var(--text-muted);font-size:15px;margin-top:4px;">Команда центра заняла первое место среди участников со всей России</p>
                </div>
            </div>
            <div class="achievement-item">
                <div class="achievement-icon">🥈</div>
                <div>
                    <strong style="font-size:17px;">2 место — Хакатон «Цифровой Приморье»</strong>
                    <p style="color:var(--text-muted);font-size:15px;margin-top:4px;">Разработка инновационного IT-решения для региона</p>
                </div>
            </div>
            <div class="achievement-item">
                <div class="achievement-icon">🎓</div>
                <div>
                    <strong style="font-size:17px;">14 учеников поступили в профильные IT-классы</strong>
                    <p style="color:var(--text-muted);font-size:15px;margin-top:4px;">В ведущие технические вузы Приморского края и Москвы</p>
                </div>
            </div>
            <div class="achievement-item">
                <div class="achievement-icon">🌟</div>
                <div>
                    <strong style="font-size:17px;">Лучший центр цифрового образования Приморского края</strong>
                    <p style="color:var(--text-muted);font-size:15px;margin-top:4px;">По итогам регионального конкурса 2024 года</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div style="text-align:center;margin-top:60px;" class="fade-in">
            <a href="registr.php" class="button" style="font-size:17px;padding:16px 40px;margin-right:16px;">
                <i class="fas fa-user-plus"></i> Записаться бесплатно
            </a>
            <a href="contact.php" class="button btn-outline" style="font-size:17px;padding:16px 40px;">
                <i class="fas fa-phone"></i> Связаться с нами
            </a>
        </div>

    </div>
</section>

<?php include 'footer.php'; ?>
