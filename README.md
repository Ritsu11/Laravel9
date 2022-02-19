# Laravel Dockerfile

## Laravel9 用

## 導入手順

Docker インストール済みが前提  
作業スペースにクローン後以下のコマンドを同ディレクトリで順に実行

Docker 起動

```bash
$ docker-compose up -d
$ docker-compose exec web bash

root@???/var/www/html # composer update
root@???/var/www/html # chown www-data storage/ -R
```

DB アクセス時

```bash
root@???/var/www/html # mysql -u hew -h 172.20.0.1 -P 13306 -p
```

## Note

わからない点があれば連絡ください

mail : r.ishimi0213@gmail.com

## Version

Laravel :9.1.0

Composer :2.2.5

Node.js :16.13

MySQL :8.0
