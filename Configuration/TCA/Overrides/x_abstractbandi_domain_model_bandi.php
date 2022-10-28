<?php
defined('TYPO3_MODE') || die();

if (!isset($GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['ctrl']['type'])) {
    // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
    $GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['ctrl']['type'] = 'tx_extbase_type';
    $tempColumnstx_borsericerca_x_abstractbandi_domain_model_bandi = [];
    $tempColumnstx_borsericerca_x_abstractbandi_domain_model_bandi[$GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['ctrl']['type']] = [
        'exclude' => true,
        'label' => 'LLL:EXT:borsericerca/Resources/Private/Language/locallang_db.xlf:tx_borsericerca.tx_extbase_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['', ''],
                ['Borsericerca', 'Tx_Borsericerca_Borsericerca']
            ],
            'default' => 'Tx_Borsericerca_Borsericerca',
            'size' => 1,
            'maxitems' => 1,
        ]
    ];
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('x_abstractbandi_domain_model_bandi', $tempColumnstx_borsericerca_x_abstractbandi_domain_model_bandi);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'x_abstractbandi_domain_model_bandi',
    $GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['ctrl']['type'],
    '',
    'after:' . $GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['ctrl']['label']
);

// inherit and extend the show items from the parent class
if (isset($GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['types']['Tx_Abstractbandi_Bandi']['showitem'])) {
    $GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['types']['Tx_Borsericerca_Borsericerca']['showitem'] = $GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['types']['Tx_Abstractbandi_Bandi']['showitem'];
} elseif (is_array($GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['types'])) {
    // use first entry in types array
    $x_abstractbandi_domain_model_bandi_type_definition = reset($GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['types']);
    $GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['types']['Tx_Borsericerca_Borsericerca']['showitem'] = $x_abstractbandi_domain_model_bandi_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['types']['Tx_Borsericerca_Borsericerca']['showitem'] = '';
}
$GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['types']['Tx_Borsericerca_Borsericerca']['showitem'] .= ',--div--;LLL:EXT:borsericerca/Resources/Private/Language/locallang_db.xlf:tx_borsericerca_domain_model_borsericerca,';
$GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['types']['Tx_Borsericerca_Borsericerca']['showitem'] .= '';

$GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['columns'][$GLOBALS['TCA']['x_abstractbandi_domain_model_bandi']['ctrl']['type']]['config']['items'][] = [
    'LLL:EXT:borsericerca/Resources/Private/Language/locallang_db.xlf:x_abstractbandi_domain_model_bandi.tx_extbase_type.Tx_Borsericerca_Borsericerca',
    'Tx_Borsericerca_Borsericerca'
];
