

<?php

// Fragment - START
$fragment = new rex_fragment();

$content .= '
<p>
    Bei der Installation wurde ein Template hinzugefügt:
<ul>
    <li>tpl : addon piwik (js)</li>  
</ul>
    Dieses Template ist per REX_TEMPLATE[] im <body> der JS-Dateien hinzufügen!
</p>
';

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


