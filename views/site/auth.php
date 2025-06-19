<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\User;

// Компилируем SCSS в CSS
$scssFile = Yii::getAlias('@webroot/scss/auth.scss');
$cssFile = Yii::getAlias('@webroot/css/auth.css');

if (file_exists($scssFile)) {
    if (!file_exists($cssFile) || filemtime($scssFile) > filemtime($cssFile)) {
        require_once Yii::getAlias('@vendor/scssphp/scssphp/src/Compiler.php');
        Yii::createObject('app\components\ScssCompiler')->compile($scssFile, $cssFile);
    }
}

$this->title = 'Кадровое агентство | Вход и регистрация';
$this->registerCssFile('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=DM+Sans:wght@400;500;700&display=swap');
$this->registerCssFile('@web/css/auth.css');

// Установка фонового изображения
$bgImage = Yii::getAlias('@web/images/16.jpg');
$this->registerCss(<<<CSS
.img:before {
    background-image: url('{$bgImage}') !important;
}
CSS
);
?>

<div class="auth-wrapper">
    <div class="cont">
        <!-- Форма входа -->
        <div class="form sign-in">
            <h2>С возвращением!</h2>
            
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'action' => Url::to(['site/auth']),
                'options' => ['class' => 'auth-form'],
                'fieldConfig' => [
                    'inputOptions' => ['class' => 'form-input custom-input'],
                    'labelOptions' => ['class' => 'form-label'],
                    'errorOptions' => ['class' => 'form-error']
                ]
            ]); ?>
            
            <?= Html::hiddenInput('form-type', 'login') ?>
            <div class="input-container">
              <label>
                  <span>Логин</span>
                  <?= $form->field($loginModel, 'username')->textInput(['placeholder' => ''])->label(false) ?>
              </label>
            </div>
            <div class="input-container">
              <label>
                  <span>Пароль</span>
                  <?= $form->field($loginModel, 'password')->passwordInput(['placeholder' => ''])->label(false) ?>
              </label>
            </div>
            <?= Html::submitButton('Войти', ['class' => 'submit']) ?>
            
            <p class="forgot-pass"><?= Html::a('Забыли пароль?', ['site/request-password-reset']) ?></p>
            
            <?php ActiveForm::end(); ?>
        </div>

        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h2>Впервые у нас?</h2>
                    <p>Зарегистрируйтесь и откройте новые возможности!</p>
                </div>
                <div class="img__text m--in">
                    <h2>Уже с нами?</h2>
                    <p>Если у вас уже есть аккаунт, просто войдите</p>
                </div>
                <div class="img__btn">
                    <span class="m--up">Регистрация</span>
                    <span class="m--in">Вход</span>
                </div>
            </div>
            
            <!-- Форма регистрации -->
            <div class="form sign-up">
                <h2>Добро пожаловать!</h2>
                
                <?php $form = ActiveForm::begin([
                    'id' => 'signup-form',
                    'action' => Url::to(['site/auth']),
                    'options' => ['class' => 'auth-form'],
                    'fieldConfig' => [
                        'inputOptions' => ['class' => 'form-input custom-input'],
                        'labelOptions' => ['class' => 'form-label'],
                        'errorOptions' => ['class' => 'form-error']
                    ]
                ]); ?>
                
                <?= Html::hiddenInput('form-type', 'signup') ?>
                <div class="input-container">
                  <label>
                      <span>Логин</span>
                      <?= $form->field($signupModel, 'username')->textInput(['placeholder' => ''])->label(false) ?>
                  </label>
                </div>

                <div class="input-container">
                  <label>
                      <span>Email</span>
                      <?= $form->field($signupModel, 'email')->textInput(['type' => 'email', 'placeholder' => ''])->label(false) ?>
                  </label>
                </div>
                
                <div class="input-container">
                  <label>
                      <span>Пароль</span>
                      <?= $form->field($signupModel, 'password')->passwordInput(['placeholder' => ''])->label(false) ?>
                  </label>
                </div>
                
                <!-- Поле выбора роли -->
                <div class="role-selector">
                    <div class="role-option">
                        <input type="radio" id="role-candidate" name="User[role]" 
                            value="<?= User::ROLE_CANDIDATE ?>" 
                            class="role-radio"
                            <?= $signupModel->role == User::ROLE_CANDIDATE ? 'checked' : '' ?>>
                        <label for="role-candidate" class="role-label">Соискатель</label>
                    </div>
                    
                    <div class="role-option">
                        <input type="radio" id="role-employer" name="User[role]"
                            value="<?= User::ROLE_EMPLOYER ?>" 
                            class="role-radio"
                            <?= $signupModel->role == User::ROLE_EMPLOYER ? 'checked' : '' ?>>
                        <label for="role-employer" class="role-label">Работодатель</label>
                    </div>
                </div>
                
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'submit']) ?>
                
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php
$js = <<<JS
document.querySelector('.img__btn').addEventListener('click', function() {
    document.querySelector('.cont').classList.toggle('s--signup');
});

// Автофокус на первое поле при переключении
document.querySelector('.img__btn').addEventListener('click', function() {
    setTimeout(() => {
        const activeForm = document.querySelector('.cont.s--signup') 
            ? document.querySelector('.sign-up') 
            : document.querySelector('.sign-in');
            
        const firstInput = activeForm.querySelector('input[type="text"], input[type="email"]');
        if (firstInput) firstInput.focus();
    }, 600);
});

// Инициализация фокуса при загрузке
document.querySelector('.sign-in input[type="text"]')?.focus();
JS;
$this->registerJs($js);
?>