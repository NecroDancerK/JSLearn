# Запуск JSLearn с Docker

## Установка

### Требования
- Docker
- Docker Compose

### Быстрый старт

1. **Запусти контейнеры:**
```bash
docker-compose up -d
```

2. **Открой в браузере:**
```
http://localhost:8080
```

3. **Остановка:**
```bash
docker-compose down
```

## Полезные команды

### Просмотр логов
```bash
# Все сервисы
docker-compose logs -f

# Только веб-сервер
docker-compose logs -f web

# Только БД
docker-compose logs -f db
```

### Подключение к БД из терминала
```bash
docker-compose exec db mysql -u jslearn_user -p jslearn
# пароль: jslearn_password
```

### Пересборка контейнеров
```bash
docker-compose up -d --build
```

### Удаление всего (включая БД)
```bash
docker-compose down -v
```

### Перезагрузка только веб-сервера
```bash
docker-compose restart web
```

## Структура

- **web** - PHP Apache сервер на порту 8080
- **db** - MySQL сервер на порту 3306

### Учетные данные БД (для Docker)
- **Host:** db
- **User:** jslearn_user
- **Password:** jslearn_password
- **Database:** jslearn

### Учетные данные root БД
- **Password:** root_password

## Проблемы

### Порт 8080 занят
Измени порт в docker-compose.yml:
```yaml
ports:
  - "8081:80"  # вместо 8080
```

### БД не загружается
```bash
docker-compose logs db
```

### Нужно изменить пароли
Отредактируй переменные в docker-compose.yml и выполни:
```bash
docker-compose down -v
docker-compose up -d
```

## Разработка

Файлы проекта подключены как том, поэтому изменения будут видны в реальном времени. Просто отредактируй файлы и обнови браузер.

```bash
# Только если нужно пересобрать контейнер
docker-compose up -d --build
```
