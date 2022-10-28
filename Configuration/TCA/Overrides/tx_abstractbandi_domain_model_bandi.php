<?php
defined('TYPO3_MODE') || die();

if (!isset($GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['ctrl']['type'])) {
    // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
    $GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['ctrl']['type'] = 'tx_extbase_type';
    $tempColumnstx_borsericerca_tx_abstractbandi_domain_model_bandi = [];
    $tempColumnstx_borsericerca_tx_abstractbandi_domain_model_bandi[$GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['ctrl']['type']] = [
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
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_abstractbandi_domain_model_bandi', $tempColumnstx_borsericerca_tx_abstractbandi_domain_model_bandi);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_abstractbandi_domain_model_bandi',
    $GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['ctrl']['type'],
    '',
    'after:' . $GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['ctrl']['label']
);

// inherit and extend the show items from the parent class
if (isset($GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['types']['1']['showitem'])) {
    $GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['types']['Tx_Borsericerca_Borsericerca']['showitem'] = $GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['types']['1']['showitem'];
} elseif (is_array($GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['types'])) {
    // use first entry in types array
    $tx_abstractbandi_domain_model_bandi_type_definition = reset($GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['types']);
    $GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['types']['Tx_Borsericerca_Borsericerca']['showitem'] = $tx_abstractbandi_domain_model_bandi_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['types']['Tx_Borsericerca_Borsericerca']['showitem'] = '';
}
$GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['types']['Tx_Borsericerca_Borsericerca']['showitem'] .= ',--div--;LLL:EXT:borsericerca/Resources/Private/Language/locallang_db.xlf:tx_borsericerca_domain_model_borsericerca,';
$GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['types']['Tx_Borsericerca_Borsericerca']['showitem'] .= '';

$GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['columns'][$GLOBALS['TCA']['tx_abstractbandi_domain_model_bandi']['ctrl']['type']]['config']['items'][] = [
    'LLL:EXT:borsericerca/Resources/Private/Language/locallang_db.xlf:tx_abstractbandi_domain_model_bandi.tx_extbase_type.Tx_Borsericerca_Borsericerca',
    'Tx_Borsericerca_Borsericerca'
];
