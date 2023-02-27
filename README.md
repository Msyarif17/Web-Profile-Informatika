
# TATA CARA INSTALASI APLIKASI WEB PROFILE





## Tech Stack

**Client:** HTML, CSS, Boptstrap 5, JQuery

**Server:** PHP 8.1, PGSQL/MySQL


## Installation

Download repository

```bash
  git clone https://github.com/Msyarif17/Web-Profile-Informatika.git
```
installasi package

```bash
  composer install --ignore-platform-reqs
```
membuat dan migrasi database

```bash
  php artisan migrate
```
(OPSIONAL) menambahkan default data yang sudah kami siapkan

```bash
  php artisan db:seed
```
melakukan integrasi pada storage local

```bash
  php artisan storage:link
```
membuat file .env atau mengubah nama .env.example menjadi .env



menjalankan aplikasi

```bash
  php artisan serve
```