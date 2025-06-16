# DEPRECATED

## About Laravel default project

Laravel 9.19 default project without predefined assets, views nor routes.

**Step 1**: clone the project with git

```sh
$ git clone https://github.com/mdmridul6/Soft_task.git
```

**Step 2**: go into the `Soft_task` folder and run composer
```sh
$ cd Soft_task
$ composer install
```

**Step 2.1**: if you want to get the last vendor versions, run composer update
```sh
$ composer update
```

**Step 3**: install node modules with [yarn](https://yarnpkg.com/) or npm
```sh
# with npm 
$ npm install
```

**Step 4**: Copy `.env` File

To set up your environment configuration, copy the example `.env` file included in the project:

```bash
cp .env.example .env
```

**Step 5**:
Generate Application Key

Laravel requires an application key to secure user sessions and encrypted data. After copying your `.env` file, generate a new application key by running:

```bash
php artisan key:generate
```

**Step 6**: Configure Your `.env` File

After copying the `.env.example` file to `.env`, you need to update it with your environment-specific settings.

### Important fields to update:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

APP_NAME=YourAppName
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

```
**Step 7**: Run Database Migrations

To create the necessary tables and database structure for the application, run the Laravel migrations with this command:

```bash
php artisan migrate
```
**Step 8**: Serve the Application & Build Frontend Assets

### Start Laravel Development Server

Run the following command to start the Laravel built-in development server:

```bash
php artisan serve
npm run dev
```

