<?php
defined('TYPO3_MODE') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Borsericerca',
        'Bandi',
        [
            \Polimiacre\Borsericerca\Controller\BorsericercaController::class => 'list, show'
        ],
        // non-cacheable actions
        [
            \Polimiacre\Borsericerca\Controller\BorsericercaController::class => 'list, show'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Borsericerca',
        'Archivio',
        [
            \Polimiacre\Borsericerca\Controller\BorsericercaController::class => 'list, show'
        ],
        // non-cacheable actions
        [
            \Polimiacre\Borsericerca\Controller\BorsericercaController::class => 'list, show'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    bandi {
                        iconIdentifier = borsericerca-plugin-bandi
                        title = LLL:EXT:borsericerca/Resources/Private/Language/locallang_db.xlf:tx_borsericerca_bandi.name
                        description = LLL:EXT:borsericerca/Resources/Private/Language/locallang_db.xlf:tx_borsericerca_bandi.description
                        tt_content_defValues {
                            CType = list
                            list_type = borsericerca_bandi
                        }
                    }
                    archivio {
                        iconIdentifier = borsericerca-plugin-archivio
                        title = LLL:EXT:borsericerca/Resources/Private/Language/locallang_db.xlf:tx_borsericerca_archivio.name
                        description = LLL:EXT:borsericerca/Resources/Private/Language/locallang_db.xlf:tx_borsericerca_archivio.description
                        tt_content_defValues {
                            CType = list
                            list_type = borsericerca_archivio
                        }
                    }
                }
                show = *
            }
       }'
    );

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'borsericerca-plugin-bandi',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:borsericerca/Resources/Public/Icons/user_plugin_bandi.svg']
    );
    $iconRegistry->registerIcon(
        'borsericerca-plugin-archivio',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:borsericerca/Resources/Public/Icons/user_plugin_archivio.svg']
    );

    // Edit restriction for news records
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processCmdmapClass']['borsericerca'] =
        \Polimi\Abstractbandi\Hooks\SlugHandler::class;

})();
