<?php
/**
 *	OUTRAGEbot - PHP 5.3 based IRC bot
 *
 *	Author:		David Weston <westie@typefish.co.uk>
 *
 *	Version:        2.0.0-Alpha
 *	Git commit:     34505731494ce4358c897884a185e6869f52bc08
 *	Committed at:   Tue Jul 26 23:19:16 BST 2011
 *
 *	Licence:	http://www.typefish.co.uk/licences/
 */


class CoreResource
{
	private
		$bCreated = false,
		$rHandle = null,
		$sResource = "";


	/**
	 *	Called when the class is loaded.
	 */
	public function __construct($sPlugin, $sResource, $sMode)
	{
		$this->sResource = ROOT."/Resources/{$sPlugin}/{$sResource}";

		$sDirectory = dirname($this->sResource);

		if(!is_dir($sDirectory))
		{
			mkdir($sDirectory, 0777, true);
		}

		if(!file_exists($this->sResource))
		{
			$this->bCreated = true;

			touch($this->sResource);
		}
	}


	/**
	 *	Read entire contents from the Resource.
	 */
	public function read()
	{
		return file_get_contents($this->sResource);
	}


	/**
	 *	Write to the Resource.
	 */
	public function write($sString, $bAppend = false)
	{
		return file_put_contents($this->sResource, $sString, ($bAppend ? FILE_APPEND : 0));
	}


	/**
	 *	Returns whether the file was created just now, or existed before.
	 */
	public function isNew()
	{
		return $this->bCreated;
	}


	/**
	 *	Return the modification time of the Resource.
	 */
	public function modifyTime()
	{
		return filemtime($this->sResource);
	}
}
