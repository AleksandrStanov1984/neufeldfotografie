<?php

return [
    'datenschutz' => [
        'kicker' => 'Datenschutzerklärung',
        'title'  => 'Datenschutzerklärung',
        'updated'=> 'Stand: 1. März 2024',
        'toc_title' => 'Inhaltsübersicht',

        'toc' => [
            ['id' => 'rechtsgrundlagen', 'label' => 'Rechtsgrundlagen'],
            ['id' => 'speicherdauer', 'label' => 'Speicherdauer'],
            ['id' => 'optout', 'label' => 'Widerruf und Widerspruch (Opt-Out)'],
            ['id' => 'borlabs', 'label' => 'Einwilligung mit Borlabs Cookie'],
            ['id' => 'hosting', 'label' => 'Hosting und Bereitstellung'],
            ['id' => 'kontakt-messenger', 'label' => 'Kontakt- und Messenger-Verwaltung'],
            ['id' => 'social-plugins', 'label' => 'Soziale Netzwerke & Plugins'],
            ['id' => 'google-maps', 'label' => 'Google Maps'],
            ['id' => 'rechte', 'label' => 'Ihre Rechte als betroffene Person'],
        ],

        'sections' => [
            [
                'id' => 'rechtsgrundlagen',
                'title' => 'Rechtsgrundlagen',
                'body' => '
                    <p>Auf welcher datenschutzrechtlichen Rechtsgrundlage wir die personenbezogenen Daten der Nutzer mit Hilfe von Cookies verarbeiten, hängt davon ab, ob wir Nutzer um eine Einwilligung bitten.</p>
                    <p>Falls die Nutzer einwilligen, ist die Rechtsgrundlage der Verarbeitung Ihrer Daten die erklärte Einwilligung (Art. 6 Abs. 1 S. 1 lit. a) DSGVO).</p>
                    <p>Andernfalls werden die mithilfe von Cookies verarbeiteten Daten auf Grundlage unserer berechtigten Interessen (Art. 6 Abs. 1 S. 1 lit. f) DSGVO) verarbeitet (z. B. an einem betriebswirtschaftlichen Betrieb unseres Onlineangebotes und Verbesserung seiner Nutzbarkeit) oder, wenn dies im Rahmen der Erfüllung unserer vertraglichen Pflichten erfolgt (Art. 6 Abs. 1 S. 1 lit. b) DSGVO).</p>
                ',
            ],
            [
                'id' => 'speicherdauer',
                'title' => 'Speicherdauer',
                'body' => '
                    <ul>
                        <li><strong>Temporäre Cookies (Session-Cookies):</strong> Diese werden gelöscht, nachdem ein Nutzer das Online-Angebot verlassen und seinen Browser geschlossen hat.</li>
                        <li><strong>Permanente Cookies:</strong> Diese bleiben auch nach dem Schließen des Browsers gespeichert (z. B. für den Login-Status oder Reichweitenmessung). Sofern nicht anders angegeben, können permanente Cookies eine Speicherdauer von bis zu zwei Jahren haben.</li>
                    </ul>
                ',
            ],
            [
                'id' => 'optout',
                'title' => 'Widerruf und Widerspruch (Opt-Out)',
                'body' => '
                    <p>Nutzer können eine erteilte Einwilligung jederzeit widerrufen oder der Verarbeitung widersprechen. Dies ist über die Browsereinstellungen möglich oder über folgende Dienste:</p>
                    <ul>
                        <li><a href="https://optout.aboutads.info" target="_blank" rel="noopener noreferrer">optout.aboutads.info</a></li>
                        <li><a href="https://www.youronlinechoices.com/" target="_blank" rel="noopener noreferrer">youronlinechoices.com</a></li>
                    </ul>
                ',
            ],
            [
                'id' => 'borlabs',
                'title' => 'Einwilligung mit Borlabs Cookie',
                'body' => '
                    <p>Wir setzen das Einwilligungs-Management-Tool „Borlabs Cookie“ ein. Dabei werden eine individuelle Nutzer-ID, die Sprache sowie die Arten der Einwilligungen und der Zeitpunkt ihrer Abgabe sowohl serverseitig als auch in einem Cookie auf Ihrem Endgerät gespeichert.</p>
                    <p>Dies dient dazu, Ihre Einwilligung bei erneutem Seitenaufruf zuzuordnen und gesetzliche Nachweispflichten zu erfüllen.</p>
                    <p><strong>Rechtsgrundlage:</strong> Einwilligung (Art. 6 Abs. 1 S. 1 lit. a) DSGVO).</p>
                    <p><strong>Speicherdauer:</strong> Bis zu 2 Jahre.</p>
                ',
            ],
            [
                'id' => 'hosting',
                'title' => 'Hosting und Bereitstellung',
                'body' => '
                    <p>Wir nutzen für den Betrieb unserer Website den Dienst WordPress.com (Aut O’Mattic A8C Irland Ltd.).</p>
                    <p><strong>Verarbeitete Daten:</strong> IP-Adressen, Zugriffszeiten, Meta- und Kommunikationsdaten.</p>
                    <p><strong>Zweck:</strong> Bereitstellung des Onlineangebotes, Sicherheit und Stabilität.</p>
                    <p><strong>Rechtsgrundlage:</strong> Berechtigte Interessen (Art. 6 Abs. 1 S. 1 lit. f) DSGVO).</p>
                    <p><strong>Drittlandtransfer:</strong> Die Übermittlung in die USA erfolgt auf Grundlage des Data Privacy Framework (DPF).</p>
                ',
            ],
            [
                'id' => 'kontakt-messenger',
                'title' => 'Kontakt- und Messenger-Verwaltung',
                'body' => '
                    <p>Bei der Kontaktaufnahme (z. B. via Kontaktformular, E-Mail oder Messenger) verarbeiten wir Ihre Daten zur Beantwortung der Anfrage.</p>
                    <p><strong>Besonderer Hinweis zu Messengern (z. B. WhatsApp/Instagram):</strong> Wir nutzen Messenger auf Grundlage Ihrer Einwilligung oder zur Vertragserfüllung. Die Inhalte werden bei aktuellen Versionen Ende-zu-Ende verschlüsselt. Dennoch verarbeiten die Anbieter Metadaten (wer mit wem wann kommuniziert).</p>
                    <p><strong>Widerruf:</strong> Sie können eine erteilte Einwilligung jederzeit mit Wirkung für die Zukunft widerrufen. In diesem Fall löschen wir die Konversation, sofern keine gesetzlichen Archivierungspflichten entgegenstehen.</p>
                    <p><strong>Rechtsgrundlage:</strong> Einwilligung (Art. 6 Abs. 1 S. 1 lit. a) DSGVO) oder Vertragserfüllung (Art. 6 Abs. 1 S. 1 lit. b) DSGVO).</p>
                ',
            ],
            [
                'id' => 'social-plugins',
                'title' => 'Soziale Netzwerke & Plugins',
                'body' => '
                    <p>Wir unterhalten Präsenzen auf Instagram. Bei der Einbindung von Inhalten (z. B. Bilder/Videos) werden technisch notwendige Daten wie Ihre IP-Adresse an Meta Platforms Ireland Limited übertragen.</p>
                    <p><strong>Gemeinsame Verantwortlichkeit:</strong> Wir sind mit Meta für die Erhebung von „Event-Daten“ gemeinsam verantwortlich, um Inhalte zu personalisieren und die Reichweite zu messen.</p>
                    <p><strong>Rechtsgrundlage:</strong> Berechtigte Interessen (Art. 6 Abs. 1 S. 1 lit. f) DSGVO).</p>
                    <p><strong>Betroffenenrechte:</strong> Diese können Sie am effektivsten direkt bei Meta geltend machen.</p>
                ',
            ],
            [
                'id' => 'google-maps',
                'title' => 'Google Maps',
                'body' => '
                    <p>Wir binden Landkarten von Google Maps ein, um Ihnen die geografische Auffindbarkeit zu erleichtern. Dabei wird Ihre IP-Adresse an Google übertragen.</p>
                    <p><strong>Rechtsgrundlage:</strong> Einwilligung (Art. 6 Abs. 1 S. 1 lit. a) DSGVO) über das Cookie-Banner.</p>
                    <p><strong>Anbieter:</strong> Google Cloud EMEA Limited, Irland.</p>
                ',
            ],
            [
                'id' => 'rechte',
                'title' => 'Ihre Rechte als betroffene Person',
                'body' => '
                    <p>Sie haben das Recht auf:</p>
                    <ul>
                        <li>Auskunft über Ihre gespeicherten Daten</li>
                        <li>Berichtigung unrichtiger Daten</li>
                        <li>Löschung Ihrer Daten (sofern keine Aufbewahrungspflicht besteht)</li>
                        <li>Einschränkung der Verarbeitung</li>
                        <li>Datenübertragbarkeit</li>
                        <li>Beschwerde bei einer Datenschutz-Aufsichtsbehörde</li>
                    </ul>
                ',
            ],
        ],

        'source_note' => '', // можно пусто, если не хочешь ссылаться на генератор
    ],


    'agb' => [
        'kicker' => 'Rechtliches',
        'title'  => 'AGB',
        'toc_title' => 'Inhaltsverzeichnis',

        'toc' => [
            ['id' => 'anwendungsbereich', 'label' => 'Anwendungsbereich'],
            ['id' => 'auftragsproduktionen', 'label' => 'Auftragsproduktionen'],
            ['id' => 'stock', 'label' => 'Lizenzierung von Stock-Fotos'],
            ['id' => 'verguetung', 'label' => 'Vergütung'],
            ['id' => 'haftung', 'label' => 'Haftung'],
            ['id' => 'datenschutz', 'label' => 'Datenschutz'],
            ['id' => 'schlussbestimmungen', 'label' => 'Schlussbestimmungen'],
        ],

        'sections' => [
            [
                'id' => 'anwendungsbereich',
                'title' => '1. Anwendungsbereich',
                'body' => '
                    <p>Diese AGB gelten für alle dem Fotografen erteilten Aufträge und für die Lizenzierung von Stock-Fotos. Sie gelten auch ohne erneuten Hinweis für weitere gleichartige Verträge.</p>
                    <p>Abweichende Bedingungen des Auftraggebers oder Lizenznehmers werden nicht anerkannt, es sei denn, der Fotograf stimmt deren Geltung ausdrücklich zu.</p>
                ',
            ],
            [
                'id' => 'auftragsproduktionen',
                'title' => '2. Auftragsproduktionen',
                'body' => '
                    <p>Bei Auftragsproduktionen erstellt der Fotograf für den Auftraggeber Aufnahmen. Verträge über Auftragsproduktionen kommen durch Angebot des Fotografen und Annahme durch den Auftraggeber zustande.</p>

                    <p>Von den erstellten Aufnahmen wählt der Fotograf die vereinbarte Anzahl nach eigenem Ermessen aus, führt eine allgemeine Bildoptimierung durch und überlässt sie dem Auftraggeber per Datenübertragung oder auf einem Datenträger. Liefertermine sind nur dann verbindlich, wenn sie ausdrücklich vereinbart wurden.</p>

                    <p>Weitere Zusatzleistungen des Fotografen wie Bildbearbeitung, Speicherung, Bildergalerie oder Druck werden individuell vereinbart.</p>

                    <p>Hat der Auftraggeber dem Fotografen keine ausdrücklichen Weisungen hinsichtlich der Gestaltung der Aufnahmen gegeben, so sind Reklamationen bezüglich der Bildauffassung sowie der künstlerisch-technischen Gestaltung ausgeschlossen.</p>

                    <p>Der Fotograf räumt dem Auftraggeber mit Zahlung der vereinbarten Vergütung die ausschließlichen und unbeschränkten Nutzungs- und Verwertungsrechte an den Aufnahmen einschließlich des Bearbeitungsrechts ein, soweit nichts anderes vereinbart wurde.</p>

                    <p>Der Fotograf hat das Recht zur Eigennutzung und zur Namensnennung, sofern diese nicht ausgeschlossen wurden.</p>
                ',
            ],
            [
                'id' => 'stock',
                'title' => '3. Lizenzierung von Stock-Fotos',
                'body' => '
                    <p>Bei der Lizenzierung von Stock-Fotos räumt der Fotograf dem Lizenznehmer Nutzungsrechte an den lizenzierten Fotos ein.</p>
                    <p>Der Umfang der Nutzungsrechte ergibt sich aus der Vereinbarung. Soweit nichts anderes vereinbart wurde, erhält der Lizenznehmer ein nicht ausschließliches und nicht übertragbares Nutzungsrecht.</p>
                    <p>Sofern nichts anderes vereinbart wurde, kann der Fotograf verlangen, als Urheber der lizenzierten Fotos genannt zu werden.</p>
                ',
            ],
            [
                'id' => 'verguetung',
                'title' => '4. Vergütung',
                'body' => '
                    <p>Für Auftragsproduktionen und die Lizenzierung von Stock-Fotos gilt die vereinbarte Vergütung.</p>
                    <p>Kommt es bei Auftragsproduktionen zu einer Überschreitung des gebuchten Zeitraums, so erhöht sich die Vergütung des Fotografen im angemessenen Umfang.</p>
                    <p>Ist der Fotograf für einen bestimmten Termin oder Zeitraum gebucht worden und wird dieser vom Auftraggeber abgesagt, so behält der Fotograf den Anspruch auf die vereinbarte Vergütung. Die Vergütung vermindert sich jedoch um die ersparten Aufwendungen des Fotografen und um den Betrag, den der Fotograf mit einem anderen Auftrag an dem abgesagten Termin verdient hat oder hätte verdienen können.</p>
                    <p>Rechnungen sind innerhalb von 14 Tagen ohne Abzug zu zahlen. Bis zur vollständigen Zahlung der vereinbarten Vergütung ist dem Auftraggeber bzw. dem Lizenznehmer eine Nutzung der Aufnahmen bzw. der Stock-Fotos nicht gestattet.</p>
                ',
            ],
            [
                'id' => 'haftung',
                'title' => '5. Haftung',
                'body' => '
                    <p>Der Auftraggeber versichert, dass bei der Aufnahme von Personen diese ihre Einwilligung erteilt haben.</p>
                    <p>Der Fotograf haftet dafür, dass die lizenzierten Stock-Fotos keine Rechte Dritter verletzen.</p>
                ',
            ],
            [
                'id' => 'datenschutz',
                'title' => '6. Datenschutz',
                'body' => '
                    <p>Die zur Vertragserfüllung erforderlichen personenbezogenen Daten des Auftraggebers werden vom Fotografen gespeichert.</p>
                    <p>Der Fotograf verpflichtet sich, alle ihm im Rahmen des Auftrages bekannt gewordenen Informationen vertraulich zu behandeln und Aufnahmen – außer zur Eigennutzung – nicht ohne Einwilligung des Auftraggebers zu verwenden.</p>
                ',
            ],
            [
                'id' => 'schlussbestimmungen',
                'title' => '7. Schlussbestimmungen',
                'body' => '
                    <p>Änderungen, Ergänzungen und Nebenabreden bedürfen, sofern in diesen AGB nichts anderes bestimmt ist, zu ihrer Wirksamkeit der Schriftform. Das Schriftformerfordernis gilt auch für den Verzicht auf dieses Formerfordernis.</p>
                    <p>Sollte eine der vorangehenden Bestimmungen unwirksam oder undurchführbar sein, bleibt die Wirksamkeit der übrigen Bestimmungen davon unberührt. Anstelle der unwirksamen oder undurchführbaren Bestimmung wird einvernehmlich eine geeignete, dem wirtschaftlichen Erfolg möglichst nahekommende rechtswirksame Ersatzbestimmung getroffen.</p>
                    <p>Als Gerichtsstand richtet sich nach den gesetzlichen Bestimmungen. Es gilt das Recht der Bundesrepublik Deutschland.</p>
                    <p>Sollte eine Bestimmung dieser Allgemeinen Geschäftsbedingungen unwirksam sein, wird davon die Wirksamkeit der übrigen Bestimmungen nicht berührt.</p>
                ',
            ],
        ],
    ],

   'impressum' => [
       'kicker' => 'Impressum',
       'title'  => 'Impressum',
       'updated'=> 'Angaben gemäß § 5 TMG',

       'toc_title' => 'Inhaltsübersicht',

       'toc' => [
           ['id' => 'anbieter', 'label' => 'Angaben gemäß § 5 TMG'],
           ['id' => 'kontakt', 'label' => 'Kontakt'],
           ['id' => 'redaktion', 'label' => 'Redaktionell verantwortlich'],
           ['id' => 'eu-streitschlichtung', 'label' => 'EU-Streitschlichtung'],
           ['id' => 'verbraucherstreit', 'label' => 'Verbraucherstreitbeilegung'],
           ['id' => 'urheberrecht', 'label' => 'Urheberrecht & Bildnachweise'],
       ],

       'sections' => [
           [
               'id' => 'anbieter',
               'title' => 'Angaben gemäß § 5 TMG',
               'body' => '
                   <p><strong>Angelika Neufeld</strong><br>
                   Fotostudio Neufeldfotografie<br>
                   Schlossblick 7<br>
                   78250 Tengen</p>
               ',
           ],
           [
               'id' => 'kontakt',
               'title' => 'Kontakt',
               'body' => '
                   <p><strong>Telefon:</strong> 0176 47154066<br>
                   <strong>E-Mail:</strong> <a href="mailto:angelaneufeld85@gmail.com">angelaneufeld85@gmail.com</a><br>
                   <strong>Webseite:</strong> <a href="https://www.neufeldfotografie.de" target="_blank" rel="noopener noreferrer">www.neufeldfotografie.de</a></p>
               ',
           ],
           [
               'id' => 'redaktion',
               'title' => 'Redaktionell verantwortlich',
               'body' => '
                   <p><strong>Angelika Neufeld</strong><br>
                   Schlossblick 7<br>
                   78250 Tengen</p>
               ',
           ],
           [
               'id' => 'eu-streitschlichtung',
               'title' => 'EU-Streitschlichtung',
               'body' => '
                   <p>Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit:</p>
                   <p><a href="https://ec.europa.eu/consumers/odr/" target="_blank" rel="noopener noreferrer">
                   https://ec.europa.eu/consumers/odr/
                   </a></p>
                   <p>Unsere E-Mail-Adresse findest du oben im Impressum.</p>
               ',
           ],
           [
               'id' => 'verbraucherstreit',
               'title' => 'Verbraucherstreitbeilegung / Universalschlichtungsstelle',
               'body' => '
                   <p>Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>
               ',
           ],
           [
               'id' => 'urheberrecht',
               'title' => 'Urheberrecht und Bildnachweise',
               'body' => '
                   <p>Die durch die Seitenbetreiberin erstellten Inhalte, insbesondere Fotografien, Bildkompositionen und Texte auf dieser Webseite, sind urheberrechtlich geschützt.</p>
                   <p>Jede Nutzung, Vervielfältigung oder kommerzielle Weitergabe der Lichtbilder bedarf der ausdrücklichen schriftlichen Genehmigung von Angelika Neufeld.</p>
                   <p>Unbefugte Kopien oder Nutzungen der Studioaufnahmen werden rechtlich verfolgt.</p>
               ',
           ],
       ],
   ],

];

