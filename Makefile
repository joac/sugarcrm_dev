### Este target configura los permisos de los directorios
permisos:
	sudo touch sugarcrm.log
	sudo mkdir -p modules/ZuckerReports/archive
	sudo mkdir -p modules/ZuckerReports/temp
	sudo chown $$USER:33 -R ./
	sudo find ./ -type d | xargs chmod 770
	sudo find ./ -type f | xargs chmod 660
	sudo chmod 0777 -R cache
	sudo chmod 0777 -R custom
	sudo find ./ -type d | xargs chmod g+s

rebuild_extensions:
	php tools/rebuild_extensions.php
	make permisos

repair_db:
	php tools/repair_database.php
	make permisos

clean_cache cc:
	rm -rf cache/xml/*
	rm -rf cache/import/*
	rm -rf cache/dashlets/*
	rm -rf cache/modules/*
	rm -rf cache/smarty/*
	rm -rf cache/jsLanguage/*

clean_config: cc
	rm config.php config_*.php

repair_tabs: 
	php tools/repair_tabs.php
