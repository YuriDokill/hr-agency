<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php

    use yii\bootstrap5\BootstrapAsset;

    BootstrapAsset::register($this);
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    $this->registerLinkTag([
        'rel' => 'stylesheet',
        'href' => 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap'
    ]);
    ?>
    <?php
    $this->registerCssFile('@web/css/site.css');
    ?>
    <?php
    $this->registerLinkTag([
        'rel' => 'stylesheet',
        'href' => 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600&family=DM+Sans:ital,wght@0,400;0,700;1,400&display=swap'
    ]);
    ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>


<div class="container">
    <nav class="main-nav">
        <ul class="nav-list">
            <li class="nav-item <?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index' ? 'active' : '' ?>">
                <?= Html::a('Главная', ['/site/index'], ['class' => 'nav-link']) ?>
                <div class="hover-line"></div>
            </li>

            <li class="nav-item <?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'about' ? 'active' : '' ?>">
                <?= Html::a('О нас', ['/site/error'], ['class' => 'nav-link']) ?>
                <div class="hover-line"></div>
            </li>

            <li class="nav-item <?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'contact' ? 'active' : '' ?>">
                <?= Html::a('Контакты', ['/site/error'], ['class' => 'nav-link']) ?>
                <div class="hover-line"></div>
            </li>

            <li class="nav-item <?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'contact' ? 'active' : '' ?>">
                <?= Html::a('Будущее', ['/site/error'], ['class' => 'nav-link']) ?>
                <div class="hover-line"></div>
            </li>

            <?php if (Yii::$app->user->isGuest): ?>
                <li class="nav-item <?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'login' ? 'active' : '' ?>">
                    <?= Html::a('Вход', ['/site/auth'], ['class' => 'nav-link']) ?>
                    <div class="hover-line"></div>
                </li>
            <?php else: ?>
                <div class="logout-container">
                    <li class="nav-item">
                        <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'logout-form']) ?>
                        <?= Html::submitButton(
                            'Выход',
                            ['class' => 'nav-link logout-btn']
                        ) ?>
                        <?= Html::endForm() ?>
                        <div class="hover-line"></div>
                    </li>
                </div>
            <?php endif; ?>
        </ul>
    </nav>
</div>


<!--<nav class="custom-nav">
    <ul class="nav-list">
        <li class="nav-item">
            <?php /*= Html::a('Главная', ['/site/index'], ['class' => 'nav-link']) */ ?>
        </li>
        <li class="nav-item">
            <?php /*= Html::a('О нас', ['/site/about'], ['class' => 'nav-link']) */ ?>
        </li>
        <li class="nav-item">
            <?php /*= Html::a('Регистрация', ['/site/signup'], ['class' => 'nav-link']) */ ?>
        </li>
        <li class="nav-item">
            <?php /*= Html::a('Контакты', ['/site/contact'], ['class' => 'nav-link']) */ ?>
        </li>
        <?php /*if(Yii::$app->user->isGuest): */ ?>
            <li class="nav-item">
                <?php /*= Html::a('Вход', ['/site/login'], ['class' => 'nav-link']) */ ?>
            </li>
        <?php /*else: */ ?>
            <li class="nav-item">
                <?php /*= Html::beginForm(['/site/logout'], 'post', ['class' => 'logout-form']) */ ?>
                <?php /*= Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'nav-link logout-btn']
                ) */ ?>
                <?php /*= Html::endForm() */ ?>
            </li>
        <?php /*endif; */ ?>
    </ul>
</nav>-->
<!--<header id="header">
    <?php
/*    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'О нас', 'url' => ['/site/about']],
            ['label' => 'Регистрация', 'url' => ['/site/signup']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    */ ?>
</header>-->

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
