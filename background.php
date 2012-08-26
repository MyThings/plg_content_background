<?php
/**
 * @author 		Axel Tüting - www.time4mambo.de
 * @license		GNU GPL
 */

defined('_JEXEC') or die;

class plgContentBackground extends JPlugin {

	public function onContentPrepare($context, &$article, &$params, $limitstart) {

		// Gibt es überhaupt die gesuchte Zeichenkette in unserem Text?
		if (strpos($article->text, '{background') === false) {
			return true;
		}

		// Suchstring
		$regex = "/{background=(.*) farbe=(.*)}/i";

		// Textersetzung
		$ersetzen = '<div style="background:url($1);background-color: $2">';

		// Einfügen im bestehenden Text anstelle der geschweiften Klammern
		$article->text = preg_replace($regex, $ersetzen, $article->text);

		// Background-Container abschließen
		echo '</div>';
	}
}
