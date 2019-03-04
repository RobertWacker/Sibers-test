<?php

namespace app\core;

// The class for display pages, receives instructions which template and which page to display
class View {

    /**
	 * Page rendering
	 *
	 * @param $page string
	 * @param $layer string
	 * @param $data array
     */
	public static function render($page, $layer, $data='') {

		// Load file of view
		$path = APP.'views/'.$page.'.php';

		// If the file of view exists
		if (file_exists($path)) {

			ob_start();

			require $path;

			$content = ob_get_clean();

			// Connecting the page template
			require APP.'views/'.$layer.'.php';
		}
	}

    /**
	 * Redirect method
	 *
	 * @param $url string
     */
	public static function redirect($url) {

		header('location: /'.$url);
		exit();
	}

    /**
	 * Show error page
	 *
	 * @param $code string - contains error code
     */
	public static function errorCode($code) {

		self::render('index/'.$code, 'main');
		exit();
	}
}