

<?php

// Fragment - START
$fragment = new rex_fragment();

$content .= '
<p>
    Bei der Installation wurde noch kein Template hinzugefügt:
<ul>
    <li>tpl : addon piwik (js)</li>  
</ul>
    Dieses Template ist per REX_TEMPLATE[] im <body> der JS-Dateien hinzufügen!
</p>
<hr>
';

if (rex::getUser()->isAdmin()) {

    // SQL :: rex_template => tpl : addon piwik (js)
    $template = rex_sql::factory();
    #$template->setDebug();
    $template->setTable(rex::getTablePrefix().'template');
    $template->setQuery("SELECT * FROM rex_template WHERE content LIKE '%TEMPLATE | PIWIK%'");

    $template_id = 0;
    $template_name = '';
    $template_id = $template->getValue('id');
    $template_name = $template->getValue('name');

    if (rex_request('install_module',"integer") == 1) {

        try {

            // SQL :: rex_template => tpl : addon piwik (js)
            $template = rex_sql::factory();
            #$template->setDebug();
            $template->setTable(rex::getTablePrefix().'template');

            $template->setValue('content',rex_file::get(rex_path::addon('piwik','pages/help_template_install.inc')));

            if ( $template_id == rex_request('module_id','integer',-1) ) {

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

            echo rex_view::warning('Das Modul "'.$template_name.'" konnte nicht angelegt werden.<br/>Details siehe Fehlermeldung.<br>'.$e->getMessage());

        }

    }

    $content .= '<p>'.$this->i18n('template_install_description').'</p>';

    if ($template_id > 0) {
        $content .= '<p><a class="btn btn-primary" href="index.php?page=piwik/help&amp;install_module=1&amp;module_id=' . $template_id . '" class="rex-button">' . $this->i18n('template_update', htmlspecialchars($template_name)) . '</a></p>';

    }else {
        $content .= '<p><a class="btn btn-primary" href="index.php?page=piwik/help&amp;install_module=1" class="rex-button">' . $this->i18n('template_install', $template_name) . '</a></p>';

    }
}

$fragment = new rex_fragment();
$fragment->setVar('class', 'info', false);
$fragment->setVar('title', $this->i18n('help'), false);
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');
// Fragment - ENDE


// Fragment - START
$fragment = new rex_fragment();

$content_collapse1 = '
<p>Folgendes im Template einfügen:</p>
';

$content_collapse1 .= rex_string::highlight(rex_file::get(rex_path::addon('piwik','pages/help_template.inc')));

$fragment = new rex_fragment();
$fragment->setVar('collapse', true, false);
$fragment->setVar('collapsed', true, false);
$fragment->setVar('class', 'default', false);
$fragment->setVar('title', $this->i18n('help_template'), false);
$fragment->setVar('body', $content_collapse1, false);
echo $fragment->parse('core/page/section.php');
// Fragment - ENDE


