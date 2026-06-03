# PollVot

How to run app with Docker

1. Build and start the containers:

   ```sh
   docker compose up --build
   ```

   If your Docker installation uses the legacy Compose binary, run `docker-compose up --build` instead.

2. Open http://localhost:8000
3. The MySQL dump from `database/dump-pollvot-202212251211.sql` is imported automatically the first time the `db_data` volume is created.
4. Administrator user credentials are email: administrator@pollvot.app and password: 12345678

Useful commands:

```sh
docker compose down
docker compose down -v
docker compose exec app php artisan cache:clear
docker compose exec db mysql -upollvot -ppollvot votems
```

Use `docker compose down -v` only when you want to delete the database volume and re-import the SQL dump on the next start.

The Python prediction scripts are not installed in the container image.

How to run app without Docker

1. Import database dump located at /database directory.
2. Create .env file with MySQL credentials
3. Install Python and Python packages: sklearn, keras, tensorflow, pandas
4. Make sure Python is globally accessible by setting environment variable
5. Run `composer install` 
6. Run `php artisan serve`
7. Administrator user credentials are email: administrator@pollvot.app and password: 12345678

## Screenshots 
- Home page
![](https://i.ibb.co/KrzLhTz/Screenshot-2022-12-25-at-11-37-05-Poll-Vot.png)

- Register form
![](https://i.ibb.co/LgJBPVq/Screenshot-2022-12-25-at-11-37-23-Poll-Vot.png)

- Waiting for the prediction script computation
![](https://i.ibb.co/txTgPWX/Screenshot-2022-12-25-at-12-04-56-Poll-Vot.png)

- Applying prediction script answer
![](https://i.ibb.co/QPddC9z/Screenshot-2022-12-25-at-12-05-04-Poll-Vot.png)

- Administrator dashboard
![](https://i.ibb.co/g4mr1yT/Screenshot-2022-12-25-at-12-07-46-Poll-Vot.png)

- Administrator generating stats and graphs
![](https://i.ibb.co/hX58sMF/Screenshot-2022-12-25-at-12-07-21-Poll-Vot.png)

- Administrator dashboard showing last votes
![](https://i.ibb.co/HtQw1Yz/Screenshot-2022-12-25-at-12-06-42-Poll-Vot.png)


