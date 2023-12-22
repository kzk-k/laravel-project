project:
	./vendor/bin/sail up -d --build
# php.ini Docker > 8.* > php.iniを修正する
# ./vendor/bin/sail artisan sail:publish
# langディレクトリ生成
	./vendor/bin/sail artisan lang:publish
# 翻訳ファイル追加（エラーなどに使用）
	./vendor/bin/sail composer require askdkc/breezejp --dev
	./vendor/bin/sail artisan breezejp
# 認証、tailwind
# ./vendor/bin/sail composer require laravel/breeze --dev
# ./vendor/bin/sail artisan breeze:install
# debugger
	./vendor/bin/sail composer require laravel/telescope --dev
	./vendor/bin/sail composer require fruitcake/laravel-telescope-toolbar --dev
	./vendor/bin/sail artisan telescope:install
# ./vendor/bin/sail composer require --dev barryvdh/laravel-debugbar
# ./vendor/bin/sail artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
# ./vendor/bin/sail artisan migrate
init:
	cp .env.example .env
	docker-compose -f docker-compose.yml up -d --build
	docker-compose -f docker-compose.yml exec laravel.test composer install
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
	docker-compose down --rmi all -v
	docker-compose build --no-cache
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
	./vendor/bin/sail artisan cache:clear
	./vendor/bin/sail artisan view:clear
	./vendor/bin/sail artisan config:clear