..  Editor configuration
	...................................................
	* utf-8 with BOM as encoding
	* tab indent with 4 characters for code snippet.
	* optional: soft carriage return preferred.

.. Includes roles, substitutions, ...
.. include:: _IncludedDirectives.rst

==============
Extension Name
==============

:Extension name: Configuration & Setup by Environment (dev/stage/prod
:Extension key: envconf
:Version: 0.3
:Description: manuals covering TYPO3 extension "Configuration & Setup by Environment (dev/stage/prod"
:Language: en
:Author: Ralf Schneider
:Creation: 2013-06-09
:Generation: 09:30
:Licence: Open Content License available from `www.opencontent.org/opl.shtml <http://www.opencontent.org/opl.shtml>`_

The content of this document is related to TYPO3, a GNU/GPL CMS/Framework available from `www.typo3.org
<http://www.typo3.org/>`_

**Table of Contents**

.. toctree::
	:maxdepth: 2

	ProjectInformation
	UserManual
	AdministratorManual
	TyposcriptReference
	DeveloperCorner
	RestructuredtextHelp

.. STILL TO ADD IN THIS DOCUMENT
	@todo: add section about how screenshots can be automated. Pointer to PhantomJS could be added.
	@todo: explain how documentation can be rendered locally and remotely.
	@todo: explain what files should be versionned and what not (_build, Makefile, conf.py, ...)

.. include:: ../Readme.rst

What does it do?
================

This extension allows to have different settings (TypoScript, Constants, PageTSconfig)
depending on server or environment.

.. figure:: Images/IntroductionPackage.png
		:width: 500px
		:alt: Introduction Package

		Introduction Package just after installation (caption of the image)

		How the Frontend of the Introduction Package looks like just after installation (legend of the image)