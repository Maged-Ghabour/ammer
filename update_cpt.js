const fs = require('fs');
let lines = fs.readFileSync('functions.php', 'utf8').split('\n');
let newLines = [];
let skip = false;
for (let i = 0; i < lines.length; i++) {
    if (lines[i].includes('// BEFORE/AFTER SECTION')) {
        skip = true;
    }
    if (skip && lines[i].includes("'location' => array(")) {
        skip = false;
    }
    if (!skip) {
        newLines.push(lines[i]);
    }
}
fs.writeFileSync('functions.php', newLines.join('\n'), 'utf8');
