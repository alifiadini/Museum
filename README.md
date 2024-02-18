<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Museum Lampung

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/adityamfu/MuseumLampung-Laravel.git
    cd MuseumLampung-Laravel/
    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Copy the `.env.example` file and rename it to `.env`. Update the necessary configurations in the `.env` file.

4. Run the following command to migrate and seed the database:

    ```bash
    php artisan migrate:refresh --seed
    ```

## Run Development
1. Start the Laravel development server:

    ```bash
    php artisan serve
    ```

2. Visit http://127.0.0.1:8000/ in your browser and generate the application key.

## Account Information

### Admin

- **Name:** Admin
- **Email:** admin@gmail.com
- **Password:** katasandi

### User

- **Name:** User
- **Email:** user@gmail.com
- **Password:** 12345678

## License

This project is licensed under the [MIT License](LICENSE).