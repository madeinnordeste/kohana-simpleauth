<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Serve Kohana Twitter Bootstrap static files
 *
 * @package    Kohana-twitter-bootstrap
 * @category   Controllers
 * @author     Luiz Alberto <madeinnordeste@gmail.com>
 */
class Controller_Simpleauth extends Controller {



	public function action_assets()
	{	


		
		// Generate and check the ETag for this file
		$this->request->check_cache(sha1($this->request->uri));

		

		// Get the file path from the request
		$file = $this->request->param('file');

		// Find the file extension
		$ext = pathinfo($file, PATHINFO_EXTENSION);

		// Remove the extension from the filename
		$file = substr($file, 0, -(strlen($ext) + 1));

				
		if ($file = Kohana::find_file('assets/simpleauth/', $file, $ext))
		{
			// Send the file content as the response
			$this->request->response = file_get_contents($file);
		}
		else
		{
			// Return a 404 status
			$this->request->status = 404;
		}

		// Set the proper headers to allow caching
		$this->request->headers['Content-Type']   = File::mime_by_ext($ext);
		$this->request->headers['Content-Length'] = filesize($file);
		$this->request->headers['Last-Modified']  = date('r', filemtime($file));
		
		
	}

}
