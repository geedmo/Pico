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

	public function config_loaded(&$settings)
	{
		
	}
	
	public function request_url(&$url)
	{
		
	}
	
	public function before_load_content(&$file)
	{
		
	}
	
	public function after_load_content(&$file, &$content)
	{
		
	}
	
	public function before_404_load_content(&$file)
	{
		
	}
	
	public function after_404_load_content(&$file, &$content)
	{
		
	}
	
	public function before_read_file_meta(&$headers)
	{
		
	}
	
	public function file_meta(&$meta)
	{
		
	}

	public function before_parse_content(&$content)
	{
		
	}
	
	public function after_parse_content(&$content)
	{
		
	}
	
	public function get_page_data(&$data, $page_meta)
	{
		
	}
	
	public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page)
	{
		$this->pages = &$pages;
	}
	
	public function before_twig_register()
	{
		
	}
	
	public function before_render(&$twig_vars, &$twig, &$template)
	{
		
	}

	// http://ar2.php.net/time#108581
	function time_elapsed($secs){
	  $bit = array(
	      'y' => $secs / 31556926 % 12,
	      'w' => $secs / 604800 % 52,
	      'd' => $secs / 86400 % 7,
	      'h' => $secs / 3600 % 24,
	      'm' => $secs / 60 % 60,
	      's' => $secs % 60,
	      'ms' => $secs % 1000
	      );
	  
	  $ret = array();
	  foreach($bit as $k => $v)
	      if($v > 0) 
	      	$ret[] = $v . $k;
	      
	  return join(' ', $ret);
	}
	  
	
	public function after_render(&$output)
	{
			return;  // uncomment to disable

			$this->end = microtime(true);
			$diff = $this->end - $this->start;

			$f_start = date('h:i:s', $this->start);
			$f_end = date('h:i:s', $this->end);
			$f_diff = $this->end - $this->start;
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
	<p>$f_diff seconds</p>
</body>
</html>
";
	}
	
}

?>