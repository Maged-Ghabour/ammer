const fs = require('fs');

let servicesPhp = '';
for(let i=1; i<=6; i++) {
    servicesPhp += `
        array(
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
        ),`;
}

let statsPhp = '';
for(let i=1; i<=4; i++) {
    statsPhp += `
        array(
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
        ),`;
}

let casesPhp = '';
for(let i=1; i<=3; i++) {
    casesPhp += `
        array(
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
        ),`;
}

let functionsText = fs.readFileSync('functions.php', 'utf8');

functionsText = functionsText.replace(
    /array\(\s*'key'\s*=>\s*'field_services_list'[\s\S]*?'type'\s*=>\s*'repeater'[\s\S]*?\),[\s]*\),/m,
    servicesPhp.trim() + ','
);

functionsText = functionsText.replace(
    /array\(\s*'key'\s*=>\s*'field_trust_stats'[\s\S]*?'type'\s*=>\s*'repeater'[\s\S]*?\),[\s]*\),/m,
    statsPhp.trim() + ','
);

functionsText = functionsText.replace(
    /array\(\s*'key'\s*=>\s*'field_ba_cases'[\s\S]*?'type'\s*=>\s*'repeater'[\s\S]*?\),[\s]*\),/m,
    casesPhp.trim() + ','
);

fs.writeFileSync('functions.php', functionsText, 'utf8');
console.log('Done modifying functions.php');

