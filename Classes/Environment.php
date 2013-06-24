<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Ralf Schneider <ralf@hr-interactive.de>
 *  All rights reserved
 *
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Environment Configuration functions
 *
 * @author Ralf Schneider
 */
class Tx_Envconf_Environment {

	/**
	 * @string
	 */
	const ENV_DEV = 'dev';

	/**
	 *
	 * @var string
	 */
	const ENV_STAGE = 'stage';

	/**
	 *
	 * @var string
	 */
	const ENV_PRODUCTION = 'production';

	/**
	 * are we on a dev server?
	 * @return boolean
	 */
	public static function isDev() {
		return ('dev' == getenv('TYPO3_ENVIRONMENT'));
	}

	/**
	 * is this a stage server?
	 * @return boolean
	 */
	public static function isStage() {
		return ('stage' == getenv('TYPO3_ENVIRONMENT'));
	}

	/**
	 * @return string environment {'dev','stage','production'}
	 */
	public static function getEnv() {
		$env = getenv('TYPO3_ENVIRONMENT');
		if (self::ENV_DEV == $env) {
			return self::ENV_DEV;
		}
		if (self::ENV_STAGE) {
			return self::ENV_STAGE;
		}
		return self::ENV_PRODUCTION;
	}

	/**
	 * add Default.txt end $env.txt pageTSconfig
	 */
	public static function addPageTSconfigs() {
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig("<INCLUDE_TYPOSCRIPT: source='FILE:EXT:envswitch/Configuration/PageTSconfig/Default.txt'>");
		$envBaseName = ucfirst(self::getEnv());
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig("<INCLUDE_TYPOSCRIPT: source='FILE:EXT:envswitch/Configuration/PageTSconfig/{$envBaseName}.txt'>");
	}

	/**
	 * add Default.txt end $env.txt pageTSconfig
	 */
	public static function addUserTSconfigs() {
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig("<INCLUDE_TYPOSCRIPT: source='FILE:EXT:envswitch/Configuration/UserTSconfig/Default.txt'>");
		$envBaseName = ucfirst(self::getEnv());
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig("<INCLUDE_TYPOSCRIPT: source='FILE:EXT:envswitch/Configuration/UserTSconfig/{$envBaseName}.txt'>");
	}

}
