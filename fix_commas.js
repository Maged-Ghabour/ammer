const fs = require('fs');
let t = fs.readFileSync('functions.php', 'utf8');
t = t.replace(/\)\s*\n\s*\/\/\s*TRUST/g, '),\n        // TRUST');
t = t.replace(/\)\s*\n\s*\/\/\s*BEFORE/g, '),\n        // BEFORE');
t = t.replace(/\)\s*\n\s*\),\s*\n\s*'location'/g, ')\n\t),\n\t\'location\'');
fs.writeFileSync('functions.php', t, 'utf8');
