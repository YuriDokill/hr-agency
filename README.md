<p align="center">
    <h1 align="center">HR Agency Platform</h1>
    <p align="center">Креативное кадровое агенство</p>
    <br>
</p>

[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-purple)](https://php.net)
[![Yii2 Framework](https://img.shields.io/badge/Framework-Yii2-blue)](https://www.yiiframework.com/)

Платформа для управления кандидатами, вакансиями и поиска специалистов. Проект создан на базе Yii 2 Basic Project Template с расширенной функциональностью.

![Screenshot](screenshots/hr-agency.png)

## Основные возможности

- 🔍 Поиск кандидатов по навыкам и опыту
- 📝 Система резюме с прикреплением фото
- 📊 Фильтрация и сортировка результатов

## Установка

### Требования
- PHP 7.4 или выше
- MySQL 5.7+
- Composer

### Пошаговая инструкция

1. Клонируйте репозиторий:
```bash
git clone https://github.com/YuriDokill/hr-agency.git
cd hr-agency
```

2. Установите зависимости:
```bash
composer install
```

3. Настройте базу данных:
```bash
# Создайте БД (например, hr_agency)
mysql -u root -p -e "CREATE DATABASE hr_agency CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci"
```

4. Настройте приложение:
```bash
# Скопируйте файл окружения
cp .env.example .env

# Отредактируйте .env (укажите данные БД)
```

5. Примените миграции:
```bash
php yii migrate
```

6. Запустите встроенный сервер:
```bash
php yii serve
```

Приложение будет доступно по адресу: [http://localhost:8080](http://localhost:8080)

## Структура проекта

```
config/             - конфигурации приложения
controllers/        - контроллеры
models/             - модели (Кандидат, Резюме и др.)
migrations/         - миграции БД
runtime/            - временные файлы (кеш, логи)
views/              - шаблоны страниц
web/                - публичные файлы
  assets/           - скомпилированные ресурсы
  css/              - стили
  uploads/          - загруженные файлы
```

## Документация

### Работа с кандидатами
```php
// Пример создания кандидата
$candidate = new Candidate([
    'name' => 'Иванов Иван',
    'email' => 'ivanov@example.com',
    'phone' => '+7 (999) 123-45-67'
]);
$candidate->save();
```

### Поиск специалистов
```php
// Поиск по навыкам
$candidates = Candidate::find()
    ->joinWith('resume')
    ->where(['like', 'resume.skills', 'PHP'])
    ->all();
```

## Лицензия

Проект распространяется под лицензией MIT. См. [LICENSE.md](LICENSE.md).

## Разработка

Чтобы внести изменения:

1. Создайте новую ветку:
```bash
git checkout -b feature/new-search-filters
```

2. После внесения изменений:
```bash
git add .
git commit -m "Добавлены фильтры поиска"
git push origin feature/new-search-filters
```

3. Создайте Pull Request на GitHub

## Тестирование
Запуск тестов:
```bash
vendor/bin/codecept run
```

## Контакты
- Автор: Юрий
- По вопросам сотрудничества: ваш@email.com
