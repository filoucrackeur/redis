<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$boot = function ($_EXTKEY) {
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Imaging\IconRegistry::class
    );
    $iconRegistry->registerIcon(
        'tx-redis-redis-logo',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:redis/Resources/Public/Icons/redis-logo.svg']
    );
};

$boot($_EXTKEY);
unset($boot);
