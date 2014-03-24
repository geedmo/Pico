<?php

/**
 * Example hooks for a Pico plugin
 *
 * @author Gilbert Pellegrom
 * @link http://pico.dev7studios.com
 * @license http://opensource.org/licenses/MIT
 */
class Pico_Timer {
	private
		$start, $end, $pages;

	public function plugins_loaded()
	{
			$this->start = microtime(true);
	}
	
	public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page)
	{
		$this->pages = &$pages;
	}

	public function after_render(&$output)
	{
			return;  // uncomment to disable

			$this->end = microtime(true);
			$diff = $this->end - $this->start;

			$f_start = date('h:i:s', $this->start);
			$f_end = date('h:i:s', $this->end);

			$count = count($this->pages);

			$output = "<!doctype html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>Document</title>
</head>
<body>
	<p>Start: $f_start </p>
	<p>End: $f_end </p>
	<p>Processed: $count</p>
	<hr>
	<h2>Elapsed</h2>
	<p>$diff seconds</p>
</body>
</html>
";
	}
	
}

?>