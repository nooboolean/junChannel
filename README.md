# junChannel

## 環境構築手順
1. Docker管理の `.env` (環境変数設定ファイル)の作成
2. Laravel管理の `.env` ファイル作成
3. Laravelのコンテナ内で `composer install` 実行
4. Laravelのコンテナ内で `npm install` 実行
5. コンテナ群の起動 `docker-compose up -d` の実行
6. DB migration の実行

### 1. Docker管理の `.env` (環境変数設定ファイル)の作成
junChannelディレクトリ配下の `.env.example` を複製して `.env` ファイルを作成してください。
```
MYSQL_DATABASE=jun_channel // junChannelのDB名
MYSQL_USER={Dockerで作成するMySQLのユーザー名(なんでも可)}
MYSQL_PASSWORD={Dockerで作成するMySQLユーザーのパスワード(なんでも可)}
MYSQL_ROOT_PASSWORD={Dockerで作成するMySQLのrootユーザーのパスワード(なんでも可)}
```

### 2. Laravel管理の `.env` ファイル作成
`junChannel/src` 配下の `.env.example` を複製して `.env` ファイルを作成してください。<br>
`.env` ファイルの以下の部分を編集してください。
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=jun_channel // junChannelのDB名
DB_USERNAME={手順1で設定したMYSQL_USERの値}
DB_PASSWORD={手順1で設定したMYSQL_PASSWORDの値}
```

### 3. Laravelのコンテナ内で `composer install` 実行
junChannelディレクトリ配下で、以下コマンドを実行
```
$ docker-compose run --rm app /bin/bash -c "cd src && composer install && \
composer dump-autoload && \
php artisan key:generate"
```

### 4. Laravelのコンテナ内で `npm install` 実行
junChannelディレクトリ配下で、以下コマンドを実行
```
$ docker-compose run --rm app /bin/bash -c "cd src && npm install && \
npm run dev"
```

### 5. コンテナ群の起動 `docker-compose up -d` の実行
junChannelディレクトリ配下で、以下コマンドを実行
```
$ docker-compose up -d
```

### 6. DB migration の実行
junChannelディレクトリ配下で、以下コマンドを実行
```
$ docker-compose exec app bash
# cd src
# php artisan migrate
```

## こんなときどうすればいい？
### migrationファイルが追加された
junChannelディレクトリ配下で、以下コマンドを実行
```
$ docker-compose exec app bash
# cd src
# php artisan migrate
```
### css/javascriptが修正された
junChannelディレクトリ配下で、以下コマンドを実行
(css/javascriptのコンパイル実行)
```
$ docker-compose exec app bash
# cd src
# npm run dev
```
### composer.jsonが修正された
junChannelディレクトリ配下で、以下コマンドを実行
```
$ docker-compose exec app bash
# cd src
# composer install
```
### packeage.jsonが修正された
junChannelディレクトリ配下で、以下コマンドを実行
```
$ docker-compose exec app bash
# cd src
# npm install
```
### docker-compose.yml または Dockerfileが修正された
junChannelディレクトリ配下で、以下コマンドを実行
```
$ docker-compose up -d --build
```