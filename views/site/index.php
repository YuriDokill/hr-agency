<?php

/** @var yii\web\View $this */
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Главная';
?>
<main>
    <div class="container">

    </div>


    <section class="hero-section">
        <img src="<?= Yii::getAlias('@web/images/main11.jpg') ?>" class="hero-bg" alt="Фон типа">
        <div class="info-box">
           <!-- <div class="star-container">
                <div class="star-m">͙</div>
            </div>-->
            <h1 class="company-name">TalentCanvas</h1>
            <p class="slogan">Рисуем команды мечты, мазок за мазком</p>
             <?= Html::a('Найти специалистов', ['employer/search'], [
                'class' => 'cta-btn',
                'data' => [
                'method' => 'get',
                ]
            ]) ?>
            <p class="micro-text">93% работадателей собирают команды мечты через платформу</p>
            <div class="side-phrase">
                <span class="phrase-line">ГЕНИИ</span>
                <span class="phrase-line">В ДОСТУПНОСТИ</span>
            </div>
        </div>
    </section>


    <section class="services-section">
        
        <div class="services-header">
            <h2 class="services-title">Наши услуги</h2>
            <p class="services-slogan">Мы — креативное рекрутинговое агенство, создающее мосты между талантами и возможностями</p>
        </div>
        
        <div class="services-wrapper">
            <div class="services-grid-container">
                <div class="full-width-line"></div>

                <div class="services-grid">
                    <div class="service-column">
                        <div class="service-number">(01)</div>
                        <div class="service-content">
                            <h3>Подбор персонала</h3>
                            <p>Точечный поиск специалистов под уникальные требования вашей компании</p>
                        </div>
                    </div>
                     <div class="service-column">
                        <div class="service-number">(02)</div>
                        <div class="service-content">
                            <h3>Карьерный коучинг</h3>
                            <p>Профессиональная помощь в развитии карьеры и подготовке к собеседованиям</p>
                        </div>
                    </div>
                     <div class="service-column">
                        <div class="service-number">(03)</div>
                        <div class="service-content">
                            <h3>Аудит команды</h3>
                            <p>Оптимизация структуры компании и выявление ключевых компетенций</p>
                        </div>
                    </div>
                     <div class="service-column">
                        <div class="service-number">(04)</div>
                        <div class="service-content">
                            <h3>HR-брендинг</h3>
                            <p>Разработка стратегии усиления репутации работодателя</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="why-section">
        <div class="why-hero">
            <h2 class="why-slogan">Таланты найдут<br>свой путь</h2>
            <p class="why-microtext">Мы соединяем амбиции</p>
        </div>

        <div class="why-grid-container">
            <div class="why-grid">
                <div class="why-cell">
                    <h3 class="why-heading">Почему мы?</h3>
                </div>
                <div class="why-cell">
                    <div class="why-num"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#E76D40" viewBox="0 0 256 256"><path d="M215.79,118.17a8,8,0,0,0-5-5.66L153.18,90.9l14.66-73.33a8,8,0,0,0-13.69-7l-112,120a8,8,0,0,0,3,13l57.63,21.61L88.16,238.43a8,8,0,0,0,13.69,7l112-120A8,8,0,0,0,215.79,118.17ZM109.37,214l10.47-52.38a8,8,0,0,0-5-9.06L62,132.71l84.62-90.66L136.16,94.43a8,8,0,0,0,5,9.06l52.8,19.8Z"></path></svg></div>
                    <h4>Скорость</h4>
                    <p>90% вакансий закрываем в 2x быстрее рынка</p>
                </div>
                <div class="why-cell">
                    <div class="why-num"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#E76D40" viewBox="0 0 256 256"><path d="M254.3,107.91,228.78,56.85a16,16,0,0,0-21.47-7.15L182.44,62.13,130.05,48.27a8.14,8.14,0,0,0-4.1,0L73.56,62.13,48.69,49.7a16,16,0,0,0-21.47,7.15L1.7,107.9a16,16,0,0,0,7.15,21.47l27,13.51,55.49,39.63a8.06,8.06,0,0,0,2.71,1.25l64,16a8,8,0,0,0,7.6-2.1l55.07-55.08,26.42-13.21a16,16,0,0,0,7.15-21.46Zm-54.89,33.37L165,113.72a8,8,0,0,0-10.68.61C136.51,132.27,116.66,130,104,122L147.24,80h31.81l27.21,54.41ZM41.53,64,62,74.22,36.43,125.27,16,115.06Zm116,119.13L99.42,168.61l-49.2-35.14,28-56L128,64.28l9.8,2.59-45,43.68-.08.09a16,16,0,0,0,2.72,24.81c20.56,13.13,45.37,11,64.91-5L188,152.66Zm62-57.87-25.52-51L214.47,64,240,115.06Zm-87.75,92.67a8,8,0,0,1-7.75,6.06,8.13,8.13,0,0,1-1.95-.24L80.41,213.33a7.89,7.89,0,0,1-2.71-1.25L51.35,193.26a8,8,0,0,1,9.3-13l25.11,17.94L126,208.24A8,8,0,0,1,131.82,217.94Z"></path></svg></div>
                    <h4>Гарантии</h4>
                    <p>Бесплатный замен кандидата 6 месяцев</p>
                </div>
                <div class="why-cell">
                    <div class="why-num"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#E76D40" viewBox="0 0 256 256"><path d="M208,40H48A16,16,0,0,0,32,56v56c0,52.72,25.52,84.67,46.93,102.19,23.06,18.86,46,25.26,47,25.53a8,8,0,0,0,4.2,0c1-.27,23.91-6.67,47-25.53C198.48,196.67,224,164.72,224,112V56A16,16,0,0,0,208,40Zm0,72c0,37.07-13.66,67.16-40.6,89.42A129.3,129.3,0,0,1,128,223.62a128.25,128.25,0,0,1-38.92-21.81C61.82,179.51,48,149.3,48,112l0-56,160,0ZM82.34,141.66a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32l-56,56a8,8,0,0,1-11.32,0Z"></path></svg></div>
                    <h4>Конфиденциальность</h4>
                    <p>Полная защита персональных данных</p>
                </div>
                <div class="why-cell">
                    <div class="why-num"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#E76D40" viewBox="0 0 256 256"><path d="M240,56v64a8,8,0,0,1-16,0V75.31l-82.34,82.35a8,8,0,0,1-11.32,0L96,123.31,29.66,189.66a8,8,0,0,1-11.32-11.32l72-72a8,8,0,0,1,11.32,0L136,140.69,212.69,64H168a8,8,0,0,1,0-16h64A8,8,0,0,1,240,56Z"></path></svg></div>
                    <h4>Экспертиза</h4>
                    <p>12 лет создания карьерных стратегий</p>
                </div>
                <div class="why-cell">
                    <a href="#" class="why-button">Начать работу</a>
                </div>
            </div>
        
            <div class="why-h-line"></div>
            <div class="why-v-line why-v1"></div>
            <div class="why-v-line why-v2"></div>
        </div>
    </section>



    <section class="contact-section">
        <div class="contact-overlay"></div>
    
        <div class="contact-box">
            <h2 class="contact-title">Свяжитесь с нами!</h2>
        
            <div class="contact-content">
                <div class="contact-info-p">
                    <p>Наша команда готова помочь вам найти идеального кандидата или подходящую вакансию. Оставьте свои контактные данные, и наш специалист свяжется с вами в течение 24 часов для консультации.</p>
                    <p>Мы работаем с 9:00 до 18:00 по будням и всегда рады новым партнёрствам!</p>
                </div>
            
                <form class="contact-form">
                    <div class="form-group">
                        <input type="text" placeholder="Ваше имя" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Телефон или Email" required>
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Краткий запрос" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Отправить</button>
                </form>
            </div>
        </div>
    </section>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const infoBox = document.querySelector('.info-box');
            const elements = [
                infoBox,
                document.querySelector('.company-name'),
                document.querySelector('.slogan'),
                document.querySelector('.cta-btn'),
                document.querySelector('.micro-text'),
                document.querySelector('.side-phrase')
            ];

            setTimeout(() => {
                elements.forEach((el, index) => {
                    if(el) {
                        setTimeout(() => {
                            el.classList.add('visible');
                        }, 300 + index * 300);
                    }
                });
            }, 500);
        });



        document.addEventListener('DOMContentLoaded', () => {
            const section = document.querySelector('.services-section');
            const elements = {
                slogan: document.querySelector('.services-slogan'),
                title: document.querySelector('.services-title'),
                line: document.querySelector('.full-width-line'),
                columns: document.querySelectorAll('.service-column')
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if(entry.isIntersecting) {
                        elements.slogan.classList.add('animate');
                        elements.title.classList.add('animate');
            
                        setTimeout(() => {
                            elements.line.classList.add('animate');
                            elements.columns.forEach(column => {
                                column.classList.add('animate');
                            });
                        }, 1000);
                    }
                });
            }, {
                threshold: 0.2,
                rootMargin: '0px 0px -150px 0px'
            });

            observer.observe(section);
        });




        document.addEventListener('DOMContentLoaded', () => {
            const section = document.querySelector('.why-section');
            const elements = {
                slogan: document.querySelector('.why-slogan'),
                microtext: document.querySelector('.why-microtext'),
                hLine: document.querySelector('.why-h-line'),
                vLines: document.querySelectorAll('.why-v-line'),
                cells: document.querySelectorAll('.why-cell')
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if(entry.isIntersecting) {
                        elements.slogan.classList.add('animate');
                        elements.microtext.classList.add('animate');
                
                        setTimeout(() => {
                            elements.hLine.classList.add('animate');
                            elements.vLines.forEach(line => line.classList.add('animate'));
                        }, 900);

                        setTimeout(() => {
                            elements.cells.forEach((cell, index) => {
                                setTimeout(() => {
                                    cell.classList.add('animate');
                                }, index * 200);
                            });
                        }, 1400);
                    }
                });
            }, {
                threshold: 0.2,
                rootMargin: '0px 0px -150px 0px'
            });

            observer.observe(section);
        });
        



       document.addEventListener('DOMContentLoaded', () => {
            const contactSection = document.querySelector('.contact-section');
            const elements = {
                overlay: document.querySelector('.contact-overlay'),
                title: document.querySelector('.contact-title'),
                info: document.querySelector('.contact-info-p'),
                form: document.querySelector('.contact-form')
            };

            const observerOptions = {
                threshold: 0.2, 
                rootMargin: '0px 0px -150px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if(entry.isIntersecting && entry.intersectionRatio > 0.2) {
                        elements.overlay.classList.add('animate');
                        elements.title.classList.add('animate');
                        elements.info.classList.add('animate');
                        elements.form.classList.add('animate');
                
                        observer.unobserve(contactSection);
                    }
                });
            }, observerOptions);

            observer.observe(contactSection);
    
            if (/^((?!chrome|android).)*safari/i.test(navigator.userAgent)) {
                document.querySelector('.contact-box').style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
            }
        });
    </script>
</main>


