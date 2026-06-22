const fs = require('fs');
let t = fs.readFileSync('functions.php', 'utf8');
t = t.replace("\t'location' => array(", "\t),\n\t'location' => array(");
fs.writeFileSync('functions.php', t, 'utf8');
