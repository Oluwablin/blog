
## BLOG

A blog that lists all blogs i follow and polls RSS feeds every minute to check for updates.

## Project Description

A blog that lists all blogs i follow and polls RSS feeds every minute to check for updates

This includes the following:
### View
• List all blogs I follow.
• Manage my blog.
• Add RSS feeds.
• Latest posts from all RSS feeds.
• Remove RSS feeds.
• Background service that polls RSS feeds every minute.

## Project Setup

### Cloning the GitHub Repository

Clone the repository to your local machine by running the terminal command below.

```bash
git clone https://github.com/Oluwablin/blog
```

### Setup Database

Create a MySQL database and note down the required connection parameters. (DB Host, Username, Password, Name)

### Install Composer Dependencies

Navigate to the project root directory via terminal and run the following command.

```bash
composer install
```

### Create a copy of your .env file

Run the following command

```bash
cp .env.example .env
```

This should create an exact copy of the .env.example file. Name the newly created file .env and update it with your local environment variables (database connection info and others).

### Generate an app encryption key

```bash
php artisan key:generate
```

### Migrate the database

```bash
php artisan migrate
```

### Run the database seeds

```bash
php artisan db:seed
```
