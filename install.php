<?php

/** @var rex_addon $this */

// Diese Datei ist keine Pflichtdatei mehr.

// Abhängigkeiten (PHP-Version, PHP-Extensions, Redaxo-Version, andere Addons/Plugins) sollten in die package.yml eingetragen werden.
// Sie brauchen hier dann nicht mehr überprüft werden!

// Hier können zum Beispiel Konfigurationswerte in der rex_config initialisiert werden.
// Das if-Statement ist notwendig, um bei einem reinstall die Konfiguration nicht zu überschreiben.
/*
 * folgt später
if (!$this->hasConfig()) {
    $this->setConfig('url', 'http://www.example.com');
    $this->setConfig('ids', [1, 4, 5]);
}
*/

// Mit einer rex_functional_exception kann die Installation mit einer Fehlermeldung abgebrochen werden.
$somethingIsWrong = false;
if ($somethingIsWrong) {
    throw new rex_functional_exception('Something is wrong');
}


//
// SQL-Anweisungen können auch weiterhin über die install.sql ausgeführt werden.
//

// SQL :: rex_template => tpl : addon piwik (js)
$template = rex_sql::factory();
#$template->setDebug();
$template->setTable(rex::getTablePrefix().'template');
$template->setQuery("SELECT * FROM rex_template WHERE name LIKE '%tpl : addon piwik (js)%'");

try {

    if ( $template->getRows() != 0 ) {

        $template->setTable(rex::getTablePrefix().'template');

        $template_id = $template->getValue('id');
        $template->setWhere(['id' => $template_id]);
        $template->setValue('content',
'<!-- // --- TEMPLATE | PIWIK-START -->
<script>
    
    var domain_website = window.location.hostname;
    var id_website = X; //Konstante oder automatisch fuer MultiDomain-Support
    
    if (domain_website == \"SRV.DOMAIN1.TLD\") {
       id_website = 1;
    }
    else if (domain_website == \"SRV.DOMAIN2.TLD\") {
       id_website = 2;
    }
    else if (domain_website == \"SRV.DOMAIN3.TLD\") {
       id_website = 3;
    }
    else {
       id_website = X;
    } 
        
    var pkBaseURL = ((\"https:\" == document.location.protocol) ? \"SRV.PIWIK-DOMAIN.TLD\" : \"SRV.PIWIK-DOMAIN.TLD\");
    document.write(unescape(\"%3Cscript src=\'\" + pkBaseURL + \"piwik.js\' type=\'text/javascript\'%3E%3C/script%3E\"));
    
    try {
       var piwikTracker = Piwik.getTracker(pkBaseURL + \"piwik.php\", id_website);
       piwikTracker.trackPageView();
       piwikTracker.enableLinkTracking();
    } 
    catch( err ) {
    }
    
</script>
<!-- // --- TEMPLATE | PIWIK-ENDE -->');

        $template->update();

        #echo rex_view::success('Das Template "tpl : addon piwik (js)" wurde aktualisiert.');

    } else {

        $template->setTable(rex::getTablePrefix().'template');

        $template->setValue('name', 'tpl : addon piwik (js)');
        $template->setValue('content',
'<!-- // --- TEMPLATE | PIWIK-START -->
<script>
    
    var domain_website = window.location.hostname;
    var id_website = X; //Konstante oder automatisch fuer MultiDomain-Support
    
    if (domain_website == \"SRV.DOMAIN1.TLD\") {
       id_website = 1;
    }
    else if (domain_website == \"SRV.DOMAIN2.TLD\") {
       id_website = 2;
    }
    else if (domain_website == \"SRV.DOMAIN3.TLD\") {
       id_website = 3;
    }
    else {
       id_website = X;
    } 
        
    var pkBaseURL = ((\"https:\" == document.location.protocol) ? \"SRV.PIWIK-DOMAIN.TLD\" : \"SRV.PIWIK-DOMAIN.TLD\");
    document.write(unescape(\"%3Cscript src=\'\" + pkBaseURL + \"piwik.js\' type=\'text/javascript\'%3E%3C/script%3E\"));
    
    try {
       var piwikTracker = Piwik.getTracker(pkBaseURL + \"piwik.php\", id_website);
       piwikTracker.trackPageView();
       piwikTracker.enableLinkTracking();
    } 
    catch( err ) {
    }
    
</script>
<!-- // --- TEMPLATE | PIWIK-ENDE -->');

        $template->insert();

        #echo rex_view::success('Das Template "tpl : addon piwik (js)" wurde angelegt.');

    }

} catch (rex_sql_exception $e) {

    echo rex_view::warning('Das Template "tpl : addon piwik (js)" wurde nicht angelegt.<br/>Wahrscheinlich existiert es schon.<br>'.$e->getMessage());

}