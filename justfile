SERVER_HOST := "bsd01.baty.net"
SERVER_DIR := "/usr/local/www/daily.baty.net/public_html"
PUBLIC_DIR := "/Users/jbaty/sites/daily.baty.net/"
TARGET := "Vultr FreeBSD"

default:
        just --list


checkpoint:
	git add .
	git diff-index --quiet HEAD || git commit -m "Publish checkpoint"

pull:
	rsync -avz {{SERVER_HOST}}:{{SERVER_DIR}}/content/ {{PUBLIC_DIR}}content \
			--delete
publish: checkpoint
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
			--exclude /logs/ \
			--exclude .git/ \
			--exclude /cache/ \
			--exclude /config/.license \
			--exclude /accounts/.logins \
			--exclude /sessions/ \
			{{PUBLIC_DIR}}site/ {{SERVER_HOST}}:{{SERVER_DIR}}/site
	rsync   -v -rz \
			--checksum \
			--delete \
			--no-perms \
			--exclude /logs/ \
			--exclude .git/ \
			{{PUBLIC_DIR}}assets/ {{SERVER_HOST}}:{{SERVER_DIR}}/assets

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
			--exclude /accounts/.logins \
			--exclude /config/.license \
			{{PUBLIC_DIR}} {{SERVER_HOST}}:{{SERVER_DIR}}
	open raycast://confetti
