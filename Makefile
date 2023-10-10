SERVER_HOST=custom-fslm@deploy.us1.frbit.com
SERVER_DIR=/srv/app/custom-fslm/htdocs
PUBLIC_DIR=/Users/jbaty/sites/blog-kirby/
TARGET=Fortrabbit


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
			--exclude content/ \
			--exclude media/ \
			--exclude Caddyfile \
			--exclude .git/ \
			--exclude .htaccess \
			--exclude Makefile \
			--filter=':- .gitignore' \
			--exclude .gitignore.swp \
			$(PUBLIC_DIR) $(SERVER_HOST):$(SERVER_DIR)
	open raycast://confetti
