up:
	./vendor/bin/sail up -d
	./vendor/bin/sail npm run dev
down:
	./vendor/bin/sail down
	pkill -f "npm run dev"
clear:
	./vendor/bin/sail artisan cache:clear
	./vendor/bin/sail artisan view:clear
	./vendor/bin/sail artisan config:clear
