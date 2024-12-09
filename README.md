# Laravel Filament Demo Project

This Laravel project is designed to test and explore features of FilamentPHP.

> [!WARNING]
> Before installing, ensure you have `Composer`, `NPM`, and `Docker` installed on your local machine.

---

## Installation
> [!NOTE]
>  To simplify Sail usage, configure your shell by adding the following alias to your .bashrc or .zshrc:
> ```shell
> alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
> ```

1. Clone the repository and start Sail:
```shell
git clone https://github.com/ZRJChris/Laravel_Filament-demo.git
cd Laravel_Filament-demo/
composer install && npm install
cp .env.example .env
sail up -d
```

### SetUp

1. Generate the application key: `sail artisan key:generate`

2. Once Sail is running, run the following commands to populate the database:
    
    ```shell
    sail artisan migrate
    sail artisan db:seed
    ```

3.	Access the admin panel at http://localhost/admin/ and log in using the following credentials:
- Email: admin@example.com
- Password: password
