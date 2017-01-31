#*********************************************
#
# INSTALLATION
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
# insert values into rex_template
#
#*********************************************

#INSERT IGNORE INTO `%TABLE_PREFIX%template` (`id`, `label`, `name`, `content`, `active`, `createuser`, `updateuser`, `createdate`, `updatedate`, `attributes`, `revision`)
#VALUES ('', '', 'gs : piwik (jquery)', '<!-- GS:PIWIK-START -->\r\n<script type=\"text/javascript\">\r\n   var pkBaseURL = ((\"https:\" == document.location.protocol) ? \"https://SRV.DOMAIN.TLD\" : \"http://SRV.DOMAIN.TLD/\");\r\n   document.write(unescape(\"%3Cscript src=\'\" + pkBaseURL + \"piwik.js\' type=\'text/javascript\'%3E%3C/script%3E\"));\r\n</script>\r\n\r\n<script type=\"text/javascript\">\r\n\r\nvar domain_website = window.location.hostname;\r\nvar id_website = PIWIK-ID; //Konstante oder automatisch fuer MultiDomain-Support\r\n\r\nif (domain_website == \"SRV.DOMAIN.TLD\") \r\n{\r\n   id_website = 1;\r\n}\r\nelse if (domain_website == \"SRV.DOMAIN.TLD\")\r\n {\r\n   id_website = 2;\r\n}\r\nelse if (domain_website == \"SRV.DOMAIN.TLD\") \r\n{\r\n   id_website = 3;\r\n}\r\n\r\ntry {\r\n   var piwikTracker = Piwik.getTracker(pkBaseURL + \"piwik.php\", id_website);\r\n   piwikTracker.trackPageView();\r\n   piwikTracker.enableLinkTracking();\r\n} \r\ncatch( err ) \r\n{\r\n}\r\n</script>\r\n<!-- GS:PIWIK-ENDE -->', '0', 'gseilheimer', 'gseilheimer', '1363861505', '1363861505', 'a:3:{s:10:\"categories\";a:1:{s:3:\"all\";s:1:\"1\";}s:5:\"ctype\";a:0:{}s:7:\"modules\";a:1:{i:1;a:1:{s:3:\"all\";s:1:\"1\";}}}', '0');


