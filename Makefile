SERVER_HOST=server01.baty.net
SERVER_DIR=/home/jbaty/apps/baty.net-kirby/public_html
PUBLIC_DIR=/Users/jbaty/sites/blog-kirby/
TARGET=Server01


.POSIX:
.PHONY: checkpoint deploy


checkpoint:
	git add .
	git diff-index --quiet HEAD || git commit -m "Publish checkpoint"

deploy: checkpoint
	git push
	@echo "\033[0;32mDeploying updates to $(TARGET)...\033[0m"
	rsync   -v -rz \
			--checksum \
			--delete \
			--no-perms \
			--exclude media/ \
			--exclude Caddyfile \
			--exclude content/ \
			--exclude site/config/retour.yml \
			--exclude /site/plugins/retour/assets/ \
			--exclude /site/logs/ \
			--exclude .git/ \
			--exclude .htaccess \
			--exclude Makefile \
			--filter=':- .gitignore' \
			--exclude .gitignore.swp \
			$(PUBLIC_DIR) $(SERVER_HOST):$(SERVER_DIR)
	open raycast://confetti
