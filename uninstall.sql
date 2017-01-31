#*********************************************
#
# UNINSTALLTION
#
# Autor: 	G.Seilheimer
# Company:	contic.de
# Version: 	1.0.10
# Update:	2013-05-04
# CMS:		Redaxo 4.5
#
#*********************************************


#*********************************************
#
# delete values from rex_template
#
#*********************************************

DELETE FROM `%TABLE_PREFIX%template` WHERE `name` LIKE '%addon gs_piwik (jquery)%' LIMIT 1;