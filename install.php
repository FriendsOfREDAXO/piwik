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

/*
 * Installation des Templates nur noch über die Hilfe im Addon
 *

$template = rex_sql::factory();
#$template->setDebug();
$template->setTable(rex::getTablePrefix().'template');
$template->setQuery("SELECT * FROM rex_template WHERE content LIKE '%TEMPLATE | PIWIK%'");

try {

    $template->setValue('content',rex_file::get(rex_path::addon('piwik','pages/help_template_install.inc')));
    $template->setTable(rex::getTablePrefix().'template');

    $template_id = 0;
    $template_name = '';
    $template_id = $template->getValue('id');
    $template_name = $template->getValue('name');

    if ( $template->getRows() != 0 ) {

        $template->setWhere(['id' => $template_id]);

        $template->update();

        echo rex_view::success('Template "' . $template_name . '" wurde aktualisiert');

    } else {

        $template_name = 'tpl : addon piwik (js)';
        $template->setValue('name', $template_name);

        $template->insert();

        echo rex_view::success('Template wurde angelegt unter "' . $template_name . '"');
    }

} catch (rex_sql_exception $e) {

    echo rex_view::warning('Das Template "'.$template_name.'" wurde nicht angelegt.<br/>Wahrscheinlich existiert es schon.<br>'.$e->getMessage());

}
*/