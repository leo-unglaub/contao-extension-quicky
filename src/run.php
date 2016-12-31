<?php

/**
 * Initialize the system
 */
define ('TL_MODE', 'FE');
require ('system/initialize.php');


/**
 * Class QuickRun
 * This class contains methods to give a developer an easy way to execute
 * methods from the framework directly without any initialisation.
 *
 * You have two ways to use this extension:
 *
 * 1: You simply write your code into the method "customCode" and call
 * this script on the command line of via a web browser. If will be
 * executed directly and you have the full framework available.
 *
 * 2: You can create a folder called "run" in your extension and place
 * there as many files as you wish. As long as the file ends with .php
 * it will be called by the quicky extension.
 *
 *   Example: system/modules/myextension/run/myMigration.php
 *   Example: system/modules/myextension/run/httpRequestTests.php
 */
class QuickRun extends Controller
{
	/**
	 * Initialize the object (do not remove)
	 *
	 * @param	void
	 * @return	void
	 */
	public function __construct ()
	{
		parent::__construct ();

		// include all found files
		foreach ((array) glob (TL_ROOT . '/system/modules/*/run/*.php') as $file)
		{
			include $file;
		}
	}


	/**
	 * Run the custom code directly in the framework
	 *
	 * @param	void
	 * @return	void
	 */
	public function customCode ()
	{
		// your code
	}
}


/**
 * Run the thing
 */
$objQuickRun = new QuickRun ();
$objQuickRun->customCode ();
