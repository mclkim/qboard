<?php

namespace App\Domain;

use \Kaiser\Plupload;
use \PluploadHandler;

class UploadFileUtils {
	// public static String uploadFile(String uploadPath,
	// String originalName,
	// byte[] fileData)throws Exception{
	//
	// return null;
	// }
	public static function uploadFile($uploadPath) {
		$directory = self::calcPath ( $uploadPath );
		
		$upload_conf = array_merge ( array (
				'file_data_name' => 'file_data',
				'target_dir' => $directory,
				'cb_sanitize_file_name' => array (
						__CLASS__,
						'sanitize_file_name' 
				) 
		) );
		logger ( $upload_conf );
		
		// $upload = new Plupload ($upload_conf);
		// $upload->no_cache_headers();
		// $upload->cors_headers();
		//
		// if (($file = $upload->getFiles()) !== false) {
		// logger($file);
		// $real = $upload->upload();
		// if (is_array($real)) {
		// logger($real);
		// }
		// } else {
		// // $this->err($upload->get_error_message());
		// }
		// return $real;
		
		PluploadHandler::no_cache_headers ();
		PluploadHandler::cors_headers ();
		
		if (! PluploadHandler::handle ( $upload_conf )) {
			die ( json_encode ( array (
					'OK' => 0,
					'error' => array (
							'code' => PluploadHandler::get_error_code (),
							'message' => PluploadHandler::get_error_message () 
					) 
			) ) );
		} else {
			die ( json_encode ( array (
					'OK' => 1 
			) ) );
		}
	}
	private static function makeIcon($uploadPath, $path, $fileName) {
	}
	private static function makeThumbnail($uploadPath, $path, $fileName) {
	}
	private static function calcPath($uploadPath) {
		$datePath = date ( 'Y' ) . DIRECTORY_SEPARATOR . date ( 'm' ) . DIRECTORY_SEPARATOR . date ( 'd' );
		$directory = $uploadPath . DIRECTORY_SEPARATOR . $datePath;
		// 절대경로생성
		// Create target dir
		if (! file_exists ( $directory )) {
			if (! mkdir ( $directory, 0777, true )) { // 0777
			                                      // throw new \Exception ("Failed to create folders...");
				return '';
			}
		}
		return $directory;
	}
	private static function makeDir($uploadPath, $paths) {
	}
	public static function sanitize_file_name($filename) {
		/**
		 * TODO:: 한글변환을 해야 한다.
		 */
		$filename = iconv ( "utf-8", "euc-kr", $filename );
		
		return sprintf ( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand ( 0, 0xffff ), mt_rand ( 0, 0xffff ), mt_rand ( 0, 0xffff ), mt_rand ( 0, 0x0fff ) | 0x4000, mt_rand ( 0, 0x3fff ) | 0x8000, mt_rand ( 0, 0xffff ), mt_rand ( 0, 0xffff ), mt_rand ( 0, 0xffff ) ) . '_' . $filename;
	}
}
