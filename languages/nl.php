<?php
	$dutch = array(
		// Main Title
		'faq' => "Veel Gestelde Vragen",
		'faq:title' => "Veel Gestelde Vragen",
		'faq:shorttitle' => "FAQ",
		
		'item:object:faq' => "FAQ Object",
		
		// add
		'faq:add' => "Nieuwe FAQ",
		'faq:add:title' => "Nieuwe Veel Gestelde Vraag",
		'faq:add:question' => "Vraag",
		'faq:add:category' => "Categorie",
		'faq:add:answer' => "Antwoord",
		
		'faq:add:oldcat:please' => "Selecteer een categorie",
		'faq:add:oldcat:new' => "Maak nieuwe categorie:",
		
		'faq:add:check:question' => "Vul aub een vraag in",
		'faq:add:check:category' => "Vul aub een categorie in",
		'faq:add:check:answer' => "Vul aub een antwoord in",
		
		'faq:add:error:invalid_input' => "Fout tijdens opslaan: ongeldige invoer, controlleer de invoer velden",
		'faq:add:error:save' => "Er is een onbekende fout opgetreden tijdens het opslaan",
		'faq:add:success' => "Nieuwe FAQ is succesvol toegevoegd",
		
		// edit
		'faq:edit:title' => "Bewerk Veel Gestelde Vraag",
		'faq:edit:error:invalid_input' => "Fout tijdens bewerken: ongeldige invoer, controlleer de invoer velden",
		'faq:edit:error:invalid_object' => "Fout tijdens bewerken: ongeldig object, het lijkt erop of het FAQ object niet bestaat",
		'faq:edit:error:save' => "Er is een onbekende fout opgetreden tijdens het bewerken",
		'faq:edit:success' => "Het bewerken van de FAQ was succesvol",
		
		// delete
		'faq:delete:confirm' => "Weet je zeker dat je deze FAQ wilt verwijderen?",
		'faq:delete:success' => "FAQ succesvol verwijderd",
		
		// settings
		'faq:settings:public' => "Is de FAQ publiekelijk beschikbaar? Anders alleen voor Admins",
		'faq:settings:minimum_search_tag_size' => "Minimale lengte van zoekwoorden",
		'faq:settings:minimum_hit_count' => "Minimale aantal hits",
		'faq:settings:ask' => "Mogen gebruikers vragen stellen",
		
		// search
		'faq:search:noresult' => "Geen resultaten gevonden",
		'faq:search:hitcount' => "Hits:",
		
		// List a category
		'faq:list:no_category' => "Ongeldige categorie opgegeven",
		'faq:list:edit:new_category' => "Geef een nieuwe categorie op",
		'faq:list:edit:confirm:question' => "Weet u zeker dat u ",
		'faq:list:edit:confirm:category' => " vragen wilt verplaatsen naar de categorie ",
		'faq:list:edit:category:please' => "Selecteer een of meer vragen om te verplaatsen",
		'faq:list:edit:begin' => "Wijzig categorie",
		'faq:list:edit:all' => "Alles selecteren",
		'faq:list:edit:none' => "Alles deselecteren",
		'faq:list:edit:select:choice' => "- Kies een categorie",
		'faq:list:edit:select:new' => "- Maak een nieuwe categorie",
		
		// Change category
		'faq:change_category:error:input' => "Ongeldige invoer",
		'faq:change_category:error:no_faq' => "Geen FAQ object opgegeven",
		'faq:change_category:error:save' => "Er is een fout opgetreden tijdens het opslaan van het FAQ object, probeer het nogmaals",
		'faq:change_category:succes' => "De FAQ is succesvol opgeslagen",
		
		// Ask a question
		'faq:ask' => "Stel een vraag",
		'faq:ask:title' => "Stel een vraag",
		'faq:ask:description' => "Heb je een vraag waarvoor je nog geen antwoord kon vinden in de FAQ? Stel dan hier je vraag! Je vraag kan worden opgenomen in de FAQ. In ieder geval krijg je altijd een antwoord.",
		
		'faq:ask:new_question:subject' => "Je hebt een nieuwe vraag gesteld",
		'faq:ask:new_question:message' => "Hartelijk dank voor je vraag.
		
Wij zullen ons best doen om de vraag:

%s

zo spoedig mogelijk te beantwoorden.

Wij kunnen besluiten om je vraag op te nemen in de FAQ. Wij zullen je op de hoogte brengen van het antwoord en of je vraag is opgenomen in de FAQ.",
		'faq:ask:new_question:send' => "Je vraag is opgeslagen, tevens is er een bevestiging naar je gestuurd",
		'faq:ask:error:not_send' => "Je vraag is opgeslagen, echter konden we dit niet aan jou bevestigen",
		'faq:ask:error:save' => "Er is een fout opgetreden tijdens het opslaan van je vraag. Probeer het nogmaals",
		'faq:ask:error:no_user' => "Er is een fout opgetreden, geef aub een geldige Gebruiker op",
		'faq:ask:error:input' => "FOUT: ongeldige invoer, probeer het nogmaals",
		'faq:ask:notify:admin:subject' => "Er is een nieuwe vraag gesteld",
		'faq:ask:notify:admin:message' => "Beste %s,

Er is een nieuwe vraag gesteld in de FAQ. 

Om de openstaande vragen te bekijken klik hier:
%s",
		
		// View asked questions
		'faq:asked' => "Gebruikers vragen (%s)",
		'faq:asked:title' => "Gebruikers vragen",
		'faq:asked:no_questions' => "Er zijn op dit moment geen openstaande vragen",
		'faq:asked:not_allowed' => "Gebruikers mogen op dit moment geen vragen stellen. Als je dit wel wilt toelaten, controlleer dan de Plugin Instellingen.",
		'faq:asked:added' => "Toegevoegd:",
		'faq:asked:add' => "Voeg deze vraag toe aan de FAQ",
		'faq:asked:by' => "Vraag van: %s",
		'faq:asked:check:add' => "Selecteer of de vraag moet worden opgenomen in de FAQ",
		
		// Answer an asked question
		'faq:answer:notify:subject' => "Je vraag is beantwoord",
		'faq:answer:notify:message:added:same' => "De vraag:
%s

is beantwoord. Het antwoord kun je hier vinden:

%s

Zoals je kunt zien is je vraag opgenomen in de FAQ.",
		'faq:answer:notify:message:added:adjusted' => "De vraag:
%s

is beantwoord. Echter hebben we de vraag aangepast naar:
%s

Het antwoord kun je hier vinden:

%s

Zoals je kunt zien is je vraag opgenomen in de FAQ.",
		'faq:answer:succes:added:send' => "De vraag is opgenomen in de FAQ en de Gebruiker is op de hoogte gebracht",
		'faq:answer:error:added:not_send' => "De vraag is opgenomen in de FAQ, echter kon de Gebruiker niet op de hoogte worden gebracht",
		'faq:answer:error:save' => "Er is een fout opgetreden tijdens het opslaan van de FAQ",
		'faq:answer:error:remove' => "Er is een fout opgetreden tijdens het verwijderen van de vraag, probeer het nogmaals",
		'faq:answer:error:no_cat' => "Fout: ongeldige categorie opgegeven, probeer het nogmaals",
		'faq:answer:notify:not_added:same' => "De vraag:
%s

is beantwoord. Het antwoord is:

%s

Je vraag is NIET opgenomen in de FAQ.",
		'faq:answer:notify:not_added:adjusted' => "De vraag:
%s

is beantwoord. Echter hebben we de vraag aangepast naar:
%s

Het antwoord is:

%s

Je vraag is NIET opgenomen in de FAQ.",
		'faq:answer:succes:not_added:send' => "De Gebruiker is op de hoogte gebracht van het antwoord",
		'faq:answer:error:not_added:not_send' => "Er is een fout opgetreden tijdens het op de hoogte brengen van de Gebruiker",
		'faq:answer:error:no_faq' => "Fout: ongeldig FAQ object",
		'faq:answer:error:input' => "Fout: ongeldige invoer, probeer het nogmaals",
	
		// Stats page
		'faq:stats:categories' => "Deze FAQ bevat %s categori&euml;n,",
		'faq:stats:questions' => " met in totaal %s vragen/antwoorden.",
		'faq:stats:user' => "Er zijn nog %s openstaande Gebruikers vragen die wachten op een antwoord.",
	);
	
	add_translation("nl", $dutch);
?>