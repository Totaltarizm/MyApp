# **Project**

Короткий опис проєкту:  
"Проєкт на Laravel, упакований у контейнери Docker для зручного розгортання. Підходить для локальної розробки та тестування."

---

## **Вимоги**

- **Docker**: Встановіть [Docker](https://www.docker.com/get-started) і [Docker Compose](https://docs.docker.com/compose/).
- **WSL 2**: Встановіть WSL 2 з дистрибутивом Ubuntu. Інструкцію можна знайти [тут](https://learn.microsoft.com/uk-ua/windows/wsl/install).
- **Laravel**: Проєкт уже налаштований для роботи через Docker.

---

## **Встановлення**

1. **Увімкніть WSL і перейдіть до вашого проєкту:**

   Відкрийте WSL (Ubuntu) та перейдіть до директорії, де буде ваш проєкт:

   ```bash
   cd /mnt/c/шлях_до_проєкту

2. **Клонуйте репозиторій:**
   ```
   git clone https://github.com/ваш_юзернейм/назва_проєкту.git
   cd назва_проєкту
   ```

3. **Створіть файл `.env`:**
   Скопіюйте `.env.example` у `.env`:
   ```
   cp .env.example .env
   ```
   Переконайтеся, що змінні середовища налаштовані коректно. Наприклад:
   ```
   DB_CONNECTION=pgsql
   DB_HOST=pgsql
   DB_PORT=5432
   DB_DATABASE=laravel
   DB_USERNAME=sail
   DB_PASSWORD=password
   ```

4. **Запустіть контейнери Docker:**
   ```
   docker-compose up -d
   ```

5. **Встановіть залежності Laravel:**
   Виконайте команду всередині контейнера:
   ```
   docker-compose exec app composer install
   ```

6. **Згенеруйте ключ додатка:**
   ```
   docker-compose exec app php artisan key:generate
   ```

7. **Запустіть міграції бази даних:**
   ```
   docker-compose exec app php artisan migrate
   ```

---

## **Запуск**

Після виконання вищезазначених кроків відкрийте браузер і перейдіть за адресою:  
```
http://http://localhost:8080/admin
```

За замовчуванням, проєкт буде доступний на порту 8080. Якщо використовується інший порт, перевірте налаштування у файлі `docker-compose.yml`.

---

## **Корисні команди**

- Зупинити контейнери:
  ```
  docker-compose down
  ```
- Переглянути логи:
  ```
  docker-compose logs -f
  ```
- Увійти в контейнер додатка:
  ```
  docker-compose exec app bash
  ```

---

## **Додаткова інформація**

Якщо виникнуть помилки або питання, ознайомтеся з документацією Laravel або Docker.

---

## **Powered by Fursov Danil**

