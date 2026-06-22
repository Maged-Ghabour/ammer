const fs = require('fs');
let text = fs.readFileSync('functions.php', 'utf8');

let servicesPhp = '';
for(let i=1; i<=6; i++) {
    servicesPhp += `        array(
            'key' => 'field_service_${i}_tab',
            'label' => 'Service ${i}',
            'name' => '',
            'type' => 'accordion',
            'open' => 0,
            'multi_expand' => 1,
        ),
        array(
            'key' => 'field_service_${i}_icon',
            'label' => 'Icon (Image URL)',
            'name' => 'service_${i}_icon',
            'type' => 'text',
        ),
        array(
            'key' => 'field_service_${i}_title',
            'label' => 'Title',
            'name' => 'service_${i}_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_service_${i}_desc',
            'label' => 'Description',
            'name' => 'service_${i}_desc',
            'type' => 'textarea',
        ),\n`;
}

// Remove the last newline and comma so it matches the indentation correctly
servicesPhp = servicesPhp.trimEnd().replace(/,$/, '');

// Replace services_list using a more precise regex that doesn't eat trailing arrays
text = text.replace(
    /        array\(\s*'key' => 'field_services_list',[\s\S]*?'type' => 'repeater',[\s\S]*?,\s*\),/m,
    servicesPhp
);

let statsPhp = '';
for(let i=1; i<=4; i++) {
    statsPhp += `        array(
            'key' => 'field_stat_${i}_tab',
            'label' => 'Statistic ${i}',
            'name' => '',
            'type' => 'accordion',
            'open' => 0,
            'multi_expand' => 1,
        ),
        array(
            'key' => 'field_stat_${i}_text',
            'label' => 'Label',
            'name' => 'stat_${i}_label',
            'type' => 'text',
        ),
        array(
            'key' => 'field_stat_${i}_num',
            'label' => 'Number/Value',
            'name' => 'stat_${i}_number',
            'type' => 'text',
        ),\n`;
}
statsPhp = statsPhp.trimEnd().replace(/,$/, '');

text = text.replace(
    /        array\(\s*'key' => 'field_trust_stats',[\s\S]*?'type' => 'repeater',[\s\S]*?,\s*\),/m,
    statsPhp
);

let casesPhp = '';
for(let i=1; i<=3; i++) {
    casesPhp += `        array(
            'key' => 'field_case_${i}_tab',
            'label' => 'Case ${i}',
            'name' => '',
            'type' => 'accordion',
            'open' => 0,
            'multi_expand' => 1,
        ),
        array(
            'key' => 'field_case_${i}_before',
            'label' => 'Before Image URL',
            'name' => 'case_${i}_before',
            'type' => 'text',
        ),
        array(
            'key' => 'field_case_${i}_after',
            'label' => 'After Image URL',
            'name' => 'case_${i}_after',
            'type' => 'text',
        ),\n`;
}
casesPhp = casesPhp.trimEnd().replace(/,$/, '');

text = text.replace(
    /        array\(\s*'key' => 'field_ba_cases',[\s\S]*?'type' => 'repeater',[\s\S]*?,\s*\),/m,
    casesPhp
);

fs.writeFileSync('functions.php', text, 'utf8');
