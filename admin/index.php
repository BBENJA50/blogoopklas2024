<?php
//include: error op de pagina, php genereert een waarschuwing. Maar de pagina zal wel verder uitgevoerd worden.
//require: hetzelfde als een include met het verschil dat php een fatale fout genereert en de pagina stopt van uitvoering.
//include_once: Once zal ervoor zorgen dat het element maar 1 keer gelezen zal worden en deze opslaat in de cache van de browser
//require_once: hetzelfde als require met de once functionaliteit
include("includes/header.php");
include("includes/sidebar.php");
include("includes/content-top.php");
include("includes/content.php");
include("includes/footer.php");

?>



