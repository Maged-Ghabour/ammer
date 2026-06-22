const fs = require('fs');

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
servicesPhp = servicesPhp.trimEnd().replace(/,$/, '');
fs.writeFileSync('services.txt', servicesPhp, 'utf8');

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
fs.writeFileSync('stats.txt', statsPhp, 'utf8');

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
fs.writeFileSync('cases.txt', casesPhp, 'utf8');
