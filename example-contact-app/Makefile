project:
	./vendor/bin/sail up -d
# php.ini Docker > 8.* > php.iniを修正する
# ./vendor/bin/sail artisan sail:publish
# langディレクトリ生成
	./vendor/bin/sail artisan lang:publish
# 翻訳ファイル追加（エラーなどに使用）
	./vendor/bin/sail composer require askdkc/breezejp --dev
	./vendor/bin/sail artisan breezejp
# 認証を使う場合
	./vendor/bin/sail composer require laravel/breeze --dev
	./vendor/bin/sail artisan breeze:install
# デバッガー追加
	./vendor/bin/sail composer require laravel/telescope --dev
	./vendor/bin/sail composer require fruitcake/laravel-telescope-toolbar --dev
	./vendor/bin/sail artisan telescope:install
	./vendor/bin/sail artisan migrate
init:
	cp .env.example .env
	docker-compose up -d
	docker-compose exec laravel.test composer install
	./vendor/bin/sail artisan key:generate --ansi
	./vendor/bin/sail npm install
	./vendor/bin/sail artisan migrate:fresh --seed
up:
	./vendor/bin/sail up -d
	./vendor/bin/sail npm run dev
down:
	./vendor/bin/sail down
	pkill -f "npm run dev"
# すべてのイメージとボリュームを削除、すべてのsailコンテナ再構築
rebuild:
	./vendor/bin/sail down --rmi all -v
	./vendor/bin/sail build --no-cache
# すべてのテーブルを削除し、すべてのマイグレーション、seederを再実行
fresh:
	./vendor/bin/sail artisan migrate:fresh --seed
# マイグレーションファイルの内容をDBに反映
migrate:
	./vendor/bin/sail artisan migrate
# すべてのseederを実行
seed:
	./vendor/bin/sail artisan db:seed
# vendorを除外したrouteの確認
route:
	./vendor/bin/sail artisan route:list --except-vendor
# キャッシュ削除
clear:
	./vendor/bin/sail artisan view:clear
	./vendor/bin/sail artisan config:clear