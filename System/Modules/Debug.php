<?php
/**
 *	OUTRAGEbot - PHP 5.3 based IRC bot
 *
 *	Author:		David Weston <westie@typefish.co.uk>
 *
 *	Version:        <version>
 *	Git commit:     <commitHash>
 *	Committed at:   <commitTime>
 *
 *	Licence:	http://www.typefish.co.uk/licences/
 */
 

class ModuleDebug
{
	private static
 		$aFunctionList = array();
 	
 	
 	public static function initModule()
 	{
 		println(" * Debug module loaded");
 	}
 	
 	
 	public static function onTick()
 	{
 		$aBacktraces = debug_backtrace(false);

		foreach($aBacktraces as $aBacktrace)
		{
			$sString = "";
			
			if(isset($aBacktrace['class']))
			{
				$sString = "{$aBacktrace['class']}::";
			}

			$sString .= "{$aBacktrace['function']}";
			
			if(!isset(self::$aFunctionList[$sString]))
			{
				self::$aFunctionList[$sString] = 0;
			}

			++self::$aFunctionList[$sString];
		}
 	}
 	
 	
 	public static function Output()
 	{
 		$sString = "";
 		
 		foreach(self::$aFunctionList as $sFunctionName => $iCalledCount)
		{
			$sString .= "{$sFunctionName} => {$iCalledCount}".PHP_EOL;
		}
		
		println(ROOT."/Output.txt");
		file_put_contents(ROOT."/Output.txt", $sString);
		return true;
 	}
 }