<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

// Компилируем SCSS в CSS
$scssFile = Yii::getAlias('@webroot/scss/employer.scss');
$cssFile = Yii::getAlias('@webroot/css/employer.css');

if (file_exists($scssFile)) {
    if (!file_exists($cssFile) || filemtime($scssFile) > filemtime($cssFile)) {
        require_once Yii::getAlias('@vendor/scssphp/scssphp/src/Compiler.php');
        Yii::createObject('app\components\ScssCompiler')->compile($scssFile, $cssFile);
    }
}

$this->title = 'Поиск специалистов';
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
$this->registerCssFile('@web/css/employer.css');
?>

<div class="employer-search">
    <div class="container">
        <h1 class="company-name">Соберите свою идеальную команду</h1>
        
        <div class="search-filters">
            <?php $form = ActiveForm::begin([
                'method' => 'get',
                'options' => ['class' => 'filter-form']
            ]); ?>

            <div class="filter-grid">
                <div class="filter-item">
                    <?= $form->field($searchModel, 'skills')->textInput([
                        'placeholder' => 'PHP, JavaScript, UX/UI...',
                        'class' => 'filter-input'
                    ])->label(false) ?>
                </div>
                
                <div class="filter-item">
                    <?= $form->field($searchModel, 'experience')->dropDownList([
                        '' => 'Любой опыт',
                        '1' => '1 год', 
                        '3' => '3 года',
                        '5' => '5+ лет'
                    ], [
                        'class' => 'filter-select',
                        'prompt' => 'Опыт работы'
                    ])->label(false) ?>
                </div>
                
                <div class="filter-item">
                    <?= $form->field($searchModel, 'position')->textInput([
                        'placeholder' => 'Должность...',
                        'class' => 'filter-input'
                    ])->label(false) ?>
                </div>
                
                <div class="filter-item">
                    <?= Html::submitButton('<i class="fas fa-search"></i> Найти', [
                        'class' => 'filter-submit'
                    ]) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        
        <div class="candidates-grid">
            <?php foreach ($dataProvider->models as $candidate): ?>
                <?php if ($candidate->resume): ?>
                    <div class="profileCard">
                        <div class="profileImage">
                            <?php
                            // Пути к фото
                            $uploadsPath = Yii::getAlias('@webroot') . '/uploads/resume/';
                            $uploadsUrl = Yii::getAlias('@web') . '/uploads/resume/';
                    
                    // 2. Получаем имя файла из базы данных
                            $photoFile = $candidate->resume->photo;
                            
                            // Проверяем индивидуальное фото
                            $defaultPhoto = 'default.jpg';
                            
                            if (!empty($photoFile) && file_exists($uploadsPath . $photoFile)) {
                                $photoUrl = $uploadsUrl . $photoFile;
                            } else {
                                $photoUrl = $uploadsUrl . $defaultPhoto;
                            }
                            ?>
                            <img src="<?= Html::encode($photoUrl) ?>" alt="Фото кандидата">
                            
                            <div class="info">
                                <div class="viewMore">
                                    <span class="name"><?= Html::encode($candidate->name) ?></span>
                                    <button class="trigger">
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                                <!-- Используем поле position -->
                                <span class="designation">
                                    <?= $candidate->resume ? Html::encode($candidate->resume->position) : 'Должность не указана' ?>
                                </span>
                            </div>
                        </div>
                        <div class="profileInfo">
                            <div class="name"><?= Html::encode($candidate->name) ?></div>
                            <div class="designation">
                                <?= Html::encode($candidate->resume->position) ?>
                            </div>
                            <div class="description">
                                <?= Html::encode('Навыки: ' . mb_substr($candidate->resume->skills, 0, 100) . '...') ?>
                            </div>
                            <div class="additional-info">
                                <p>Опыт: <?= Html::encode($candidate->resume->experience) ?> года</p>
                                <p>Зарплатные ожидания: <?= Html::encode($candidate->resume->expected_salary) ?> руб.</p>
                            </div>
                            <div class="action-buttons">
                                <?= Html::a('Посмотреть резюме', ['candidate/view', 'id' => $candidate->id], [
                                    'class' => 'resume-link'
                                ]) ?>
                                <button class="backBtn trigger">Назад</button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php
$js = <<<JS
$(document).ready(function() {
    $(".profileCard .trigger").on("click", function(e) {
        e.preventDefault();
        $(this).closest(".profileCard").toggleClass("active");
    });
});
JS;
$this->registerJs($js);
?>