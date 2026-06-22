const fs = require('fs');
let text = fs.readFileSync('functions.php', 'utf8');

let services = fs.readFileSync('services.txt', 'utf8') + ',';
let stats = fs.readFileSync('stats.txt', 'utf8') + ',';
let cases = fs.readFileSync('cases.txt', 'utf8') + ',';

let s1 = text.indexOf("'key' => 'field_services_list'");
if(s1 > -1) {
    let start = text.lastIndexOf("array(", s1);
    let end = text.indexOf("// TRUST SECTION", s1);
    if(start > -1 && end > -1) {
        let endStr = text.substring(start, end);
        let lastComma = endStr.lastIndexOf("),");
        if(lastComma > -1) {
            text = text.substring(0, start) + services + "\r\n        " + text.substring(start + lastComma + 2);
        }
    }
}

let s2 = text.indexOf("'key' => 'field_trust_stats'");
if(s2 > -1) {
    let start = text.lastIndexOf("array(", s2);
    let end = text.indexOf("// BEFORE/AFTER SECTION", s2);
    if(start > -1 && end > -1) {
        let endStr = text.substring(start, end);
        let lastComma = endStr.lastIndexOf("),");
        if(lastComma > -1) {
            text = text.substring(0, start) + stats + "\r\n        " + text.substring(start + lastComma + 2);
        }
    }
}

let s3 = text.indexOf("'key' => 'field_ba_cases'");
if(s3 > -1) {
    let start = text.lastIndexOf("array(", s3);
    let end = text.indexOf("'location'", s3);
    if(start > -1 && end > -1) {
        text = text.substring(0, start) + cases + "\n\t),\n\t'location'" + text.substring(end + 10);
    }
}

fs.writeFileSync('functions.php', text, 'utf8');
