const fs = require('fs');
let text = fs.readFileSync('functions.php', 'utf8');
let services = fs.readFileSync('services.txt', 'utf8');
let stats = fs.readFileSync('stats.txt', 'utf8');
let cases = fs.readFileSync('cases.txt', 'utf8');

// Replace services
const startServices = "array(\r\n\t\t\t'key' => 'field_services_list',";
const endServices = ")\r\n\t\t),\r\n        \r\n        // TRUST SECTION";
const s_index = text.indexOf(startServices);
if(s_index > -1) {
    const e_index = text.indexOf(endServices, s_index);
    if(e_index > -1) {
        text = text.substring(0, s_index) + services + "\r\n        \r\n        // TRUST SECTION" + text.substring(e_index + endServices.length);
    }
}

// Replace stats
const startStats = "array(\r\n\t\t\t'key' => 'field_trust_stats',";
const endStats = ")\r\n\t\t),\r\n        \r\n        // BEFORE/AFTER SECTION";
const st_index = text.indexOf(startStats);
if(st_index > -1) {
    const et_index = text.indexOf(endStats, st_index);
    if(et_index > -1) {
        text = text.substring(0, st_index) + stats + "\r\n        \r\n        // BEFORE/AFTER SECTION" + text.substring(et_index + endStats.length);
    }
}

// Replace cases
const startCases = "array(\r\n\t\t\t'key' => 'field_ba_cases',";
const endCases = ")\r\n\t\t),\r\n\t),\r\n\t'location' => array(";
const c_index = text.indexOf(startCases);
if(c_index > -1) {
    const ec_index = text.indexOf(endCases, c_index);
    if(ec_index > -1) {
        text = text.substring(0, c_index) + cases + "\r\n\t),\r\n\t'location' => array(" + text.substring(ec_index + endCases.length);
    }
}

fs.writeFileSync('functions.php', text, 'utf8');
console.log("Replaced safely!");
