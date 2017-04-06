<!-- // --- TEMPLATE | PIWIK-START -->
<script>

    var domain_website = window.location.hostname;
    var id_website = X; //Konstante oder automatisch fuer MultiDomain-Support

    if (domain_website == "SRV.DOMAIN1.TLD") {
    id_website = 1;
    }
    else if (domain_website == "SRV.DOMAIN2.TLD") {
    id_website = 2;
    }
    else if (domain_website == "SRV.DOMAIN3.TLD") {
    id_website = 3;
    }
    else {
        id_website = X;
    }

    var pkBaseURL = (("https:" == document.location.protocol) ? "SRV.PIWIK-DOMAIN.TLD" : "SRV.PIWIK-DOMAIN.TLD");
    document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));

    try {
        var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", id_website);
        piwikTracker.trackPageView();
        piwikTracker.enableLinkTracking();
    }
    catch( err ) {
    }

</script>
<!-- // --- TEMPLATE | PIWIK-ENDE -->