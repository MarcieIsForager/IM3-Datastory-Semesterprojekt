<?php
/**
 * Code-Along 10: Shark-Daten transformieren – Startcode
 *
 * Dieses Gerüst braucht ihr nur, wenn ihr ohne KI arbeitet. Der reguläre Weg
 * läuft über explore.php und eure eigene Spezifikation in KI_PROMPT.md.
 *
 * Eure Fragen:
 * 1. ...
 * 2. ...
 * 3. ...
 *
 * Die Werte unten sind Platzhalter aus einer möglichen Fassung. Ersetzt sie
 * durch eure eigenen Entscheidungen – Zeitraum und Kategorien folgen aus eurer
 * Frage, nicht umgekehrt.
 *
 * Wichtig: Häufigkeit im Datensatz ist nicht dasselbe wie Risiko.
 */

$raw_death_data = include 'extract.php';
$cleaned_up_death_data = $raw_death_data;

unset($cleaned_up_death_data[0]);

echo('in file');


for ($row = 0; $row < sizeof($cleaned_up_death_data); $row++) {
    echo('outer for loop');
    for ($col = 0; $col < sizeof($cleaned_up_death_data[$row+1]); $col++) {
        echo('inner for loop');
        switch ($cleaned_up_death_data[$row+1][$col]['Kanton']){
            case 'BS':
                $cleaned_up_death_data[$row+1][$col]['canton_id'] = 1;
                break;
            case 'GR':
                $cleaned_up_death_data[$row+1][$col]['canton_id'] = 1;
                break;
            case 'UR':
                $cleaned_up_death_data[$row+1][$col]['canton_id'] = 1;
                break;
            case 'AR':
                $cleaned_up_death_data[$row+1][$col]['canton_id'] = 1;
                break;
            case 'ZH':
                $cleaned_up_death_data[$row+1][$col]['canton_id'] = 1;
                break;
            case 'GE':
                $cleaned_up_death_data[$row+1][$col]['canton_id'] = 1;
                break;
            default:
                echo('Unexpected Canton');
        }
    }
}


   

for ($row = 0; $row < sizeof($cleaned_up_death_data); $row++) {
    echo('outer for loop');
    for ($col = 0; $col < sizeof($cleaned_up_death_data[$row+1]); $col++) {
        echo('inner for loop');
        switch ($cleaned_up_death_data[$row+1][$col]['Todesursache']){
            case 'Herz-Kreislauf Erkrankungen':
                $cleaned_up_death_data[$row+1][$col]['is_caused_by_stress'] = true;
                break;
            case 'Suizid':
                $cleaned_up_death_data[$row+1][$col]['is_caused_by_stress'] = true;
                break;
            case 'alkoholische Leberzirrhose':
                $cleaned_up_death_data[$row+1][$col]['is_caused_by_stress'] = true;
                break;
           
            default:
                $cleaned_up_death_data[$row+1][$col]['is_caused_by_stress'] = 0;
                break;
        }
    }
}
//Death cause+
// 0: Unknown
// 1: Definite
// 2: Likely
// 3: Unlikely
// 4: Unrelated



return $cleaned_up_death_data;

