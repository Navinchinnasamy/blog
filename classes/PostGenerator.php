<?php
	/**
	 * Created by PhpStorm.
	 * User: navin
	 * Date: 12/21/2017
	 * Time: 4:59 PM
	 */

	class PostGenerator extends functions {
		private static $instance = null;
		protected $file;
		protected $values = array();

		public function __construct() {
		}

		public static function getInstance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function postGenerate( $post ) {
			return $post;
			exit;
		}

		public function output() {
			if ( ! file_exists( $this->file ) ) {
				return "Error loading template file ($this->file).<br />";
			}
			$output = file_get_contents( $this->file );

			foreach ( $this->values as $key => $value ) {
				$tagToReplace = "[@$key]";
				$output       = str_replace( $tagToReplace, $value, $output );
			}

			return $output;
		}

		private function generateImagePost( $post ) {
		}

		private function generateStandardPost( $post ) {
		}

		private function generateStandardPostWithImage( $post ) {
		}

		private function generateVideoPost( $post ) {
		}

		private function generateLinkPost( $post ) {
		}

		private function generateQuotePost( $post ) {
		}

		private function generateGalleryPost( $post ) {
		}
	}