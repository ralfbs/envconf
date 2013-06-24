<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$extPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY);
require_once $extPath . '/Classes/Environment.php';

/**
 * are we on a dev server? Global Funcion to be used in TypoScript Condition
 * @return boolean
 */
function tx_envconf_isDev() {
	return (Tx_Envconf_Environment::ENV_DEV == Tx_Envconf_Environment::getEnv());
}

/**
 * is this a stage server? Global Funcion to be used in TypoScript Condition
 * @return boolean
 */
function tx_envconf_isStage() {
	return (Tx_Envconf_Environment::ENV_STAGE == Tx_Envconf_Environment::getEnv());
}

if (tx_envconf_isDev()) {

	// debug for development
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = '1';
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask'] = '*';
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['errorHandler'] = 't3lib_error_ErrorHandler';
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['errorHandlerErrors'] = E_ALL ^ E_NOTICE;
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['exceptionalErrors'] = E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_ERROR ^ E_USER_NOTICE ^ E_USER_WARNING;
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['debugExceptionHandler'] = 't3lib_error_DebugExceptionHandler';
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['productionExceptionHandler'] = 't3lib_error_DebugExceptionHandler';
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLogLevel'] = '0';
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLog'] = 'error_log';
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['sqlDebug'] = '1';
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['enable_DLOG'] = '1';
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['enable_errorDLOG'] = '1';
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['enable_exceptionDLOG'] = '1';

} elseif (tx_envconf_isStage) {

} else {

}

if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['setPageTSconfig']) {
	Tx_Envconf_Environment::addPageTSconfigs();
}

if ($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]['setUserTSconfig']) {
	Tx_Envconf_Environment::addUserTSconfigs();
}

$envFolder = ucfirst(Tx_Envconf_Environment::getEnv());

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/_Config', "EnvConf Admin Settings");
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, "Configuration/TypoScript/{$envFolder}", "Config & Setup for {$envFolder}-Environment");


?>