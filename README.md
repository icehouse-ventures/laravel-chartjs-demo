# Laravel Chart.js demo

This application is the integration demo for the community-maintained
[Laravel Chart.js package](https://github.com/icehouse-ventures/laravel-chartjs).
It exercises Chart.js 4 through legacy rendering, Blade components, multiple
charts on one page, and reactive Livewire charts.

## Requirements

- PHP 8.3 or newer
- Composer
- Node.js 20.19 or newer (Node.js 22.12+ is also supported)
- SQLite

## Local setup

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

Open the URL printed by Artisan. The landing page links to the examples:

- `/legacy` – legacy string renderer
- `/vanilla-blade` – Blade chart component
- `/vanilla-blade-multi` – multiple independent charts
- `/livewire-users-demo` – Blade component inside Livewire
- `/user/chart` – reactive Livewire chart
- `/tufte/charts` – Tufte data-ink progression
- `/stephenfew/charts` – Stephen Few chart makeover

## Test a local package checkout

Place this repository beside `laravel-chartjs`, then point Composer at the
working tree:

```bash
composer config repositories.local-chartjs path ../laravel-chartjs
composer require icehouse-ventures/laravel-chartjs:dev-master --with-all-dependencies
readlink vendor/icehouse-ventures/laravel-chartjs
```

Composer symlinks the package, so changes in the package checkout are reflected
immediately. Remove the local repository override before preparing a standalone
demo release:

```bash
composer config --unset repositories.local-chartjs
```

## Quality checks

```bash
composer check
npm audit
npm run build
```

The feature suite renders every example route and exercises both Livewire chart
components against an in-memory SQLite database.

## Docker

The repository also includes a Docker-based workflow:

```bash
docker-compose build
cp .env.example .env
./bin/up
./bin/init
```

Use `./bin/down` when finished.

## Contributing

Contributions are welcome from everyone. Bug reproductions, accessibility and
design improvements, additional chart examples, documentation fixes, and
compatibility updates are all useful. Please open an issue or pull request in
this repository or the package repository.

## License

Laravel Chart.js demo is open-source software licensed under the
[MIT license](https://opensource.org/licenses/MIT).
