SERVER_HOST := "server03.baty.net"
SERVER_DIR := "/srv/daily.baty.net/public_html"
PUBLIC_DIR := "/Users/jbaty/sites/daily.baty.net/"
TARGET := "Hetzner"

default:
        just --list

serve:
	php -S localhost:8000 kirby/router.php
	
checkpoint:
	git add .
	git diff-index --quiet HEAD || git commit -m "Publish checkpoint"

pull:
	rsync -avz {{SERVER_HOST}}:{{SERVER_DIR}}/content/ {{PUBLIC_DIR}}content \
			--delete
publish-disabled: checkpoint
	@echo "\033[0;32mDeploying content to {{TARGET}}...\033[0m"
	rsync -v -rz \
		--checksum \
		--delete \
		--no-perms \
		--exclude .DS_Store \
		{{PUBLIC_DIR}}content/ {{SERVER_HOST}}:{{SERVER_DIR}}/content

deploy: checkpoint
	git push
	@echo "\033[0;32mDeploying updates to {{TARGET}}...\033[0m"
	rsync   -v -rz \
			--checksum \
			--delete \
			--no-perms \
			--exclude .git/ \
			--exclude /storage/ \
			--exclude /content/ \
			--exclude /public/media/ \
			--exclude /config/.license \
			--exclude Caddyfile \
			--exclude justfile \
			--filter=':- .gitignore' \
			{{PUBLIC_DIR}}site/ {{SERVER_HOST}}:{{SERVER_DIR}}/site

deployall: checkpoint
	@echo "\033[0;32mDeploying updates to {{TARGET}}...\033[0m"
	rsync   -v -rz \
			--checksum \
			--delete \
			--no-perms \
			--exclude media/ \
			--exclude Caddyfile \
			--exclude /site/logs/ \
			--exclude .git/ \
			--exclude .htaccess \
			--exclude Makefile \
			--filter=':- .gitignore' \
			--exclude .gitignore.swp \
			--exclude /storage/ \
			--exclude /config/.license \
			{{PUBLIC_DIR}} {{SERVER_HOST}}:{{SERVER_DIR}}
