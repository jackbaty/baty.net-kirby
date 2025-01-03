SERVER_HOST=server03.baty.net
SERVER_DIR=/srv/baty.net-kirby/public_html
PUBLIC_DIR=/Users/jbaty/Sync/sites/kirby-blog/
TARGET=Server03 Hetzner


.POSIX:
.PHONY: checkpoint deploy


checkpoint:
	git add .
	git diff-index --quiet HEAD || git commit -m "Publish checkpoint"
	
pull:
	rsync -avz $(SERVER_HOST):$(SERVER_DIR)/content/ $(PUBLIC_DIR)content \
			--delete

deploy: checkpoint
# 	git push
	@echo "\033[0;32mDeploying updates to $(TARGET)...\033[0m"
	rsync   -v -rz \
			--checksum \
			--delete \
			--no-perms \
			--exclude /logs/ \
			--exclude .git/ \
			--exclude /cache/ \
			--exclude /sessions/ \
			$(PUBLIC_DIR)site/ $(SERVER_HOST):$(SERVER_DIR)/site
	rsync   -v -rz \
			--checksum \
			--delete \
			--no-perms \
			--exclude /logs/ \
			--exclude .git/ \
			$(PUBLIC_DIR)assets/ $(SERVER_HOST):$(SERVER_DIR)/assets

deployall: checkpoint
# 	git push
	@echo "\033[0;32mDeploying updates to $(TARGET)...\033[0m"
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
			$(PUBLIC_DIR) $(SERVER_HOST):$(SERVER_DIR)
	open raycast://confetti
