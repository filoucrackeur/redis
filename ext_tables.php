<?php
defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Filoucrackeur.redis',
        'tools',
        'redis',
        '',
        [
            'Backend\Redis' => 'index',
        ],
        [
            'access' => 'user,group',
            'icon' => 'EXT:redis/ext_icon.svg',
            'labels' => 'LLL:EXT:redis/Resources/Private/Language/locallang_mod.xlf',
        ]
    );
}
