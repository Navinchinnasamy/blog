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
		private static $post_templates = array();

		public function __construct() {
			self::$post_templates = array(
				"standard_without_image" => dirname( __DIR__ ) . "/post_templates/standard_post.php",
				"standard_with_image"    => dirname( __DIR__ ) . "/post_templates/standard_post_with_image.php",
				"image_post"             => dirname( __DIR__ ) . "/post_templates/image_post.php",
				"gallery_post"           => dirname( __DIR__ ) . "/post_templates/gallery_post.php",
				"link_post"              => dirname( __DIR__ ) . "/post_templates/link_post.php",
				"quote_post"             => dirname( __DIR__ ) . "/post_templates/quote_post.php",
				"video_post"             => dirname( __DIR__ ) . "/post_templates/video_post.php"
			);
		}

		public static function getInstance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function postGenerate( $post ) {
			if ( empty( $post['post_image'] ) && empty( $post['post_image_url'] ) ) {
				// Standars post without image
				$this->file = self::$post_templates['standard_without_image'];

				/** >>> Set the values to be replaced in the template **/
				$this->values['post_title']       = $post['post_title'];
				$this->values['post_author']      = $post['display_name'];
				$this->values['post_date']        = $post['post_date'];
				$this->values['post_category']    = $post['category'];
				$this->values['post_description'] = $post['post_description'];
				/** <<< Set the values to be replaced in the template **/
			} else if ( ! empty( $post['post_image'] ) && ! empty( $post['post_image_url'] ) ) {
				// Image Post
				$this->file = self::$post_templates['image_post'];

				/** >>> Set the values to be replaced in the template **/
				$this->values['post_title']       = $post['post_title'];
				$this->values['post_image_url']   = empty( $post['post_image'] ) ? $post['post_image_url'] : $post['post_image_url'];
				$this->values['post_author']      = $post['display_name'];
				$this->values['post_date']        = $post['post_date'];
				$this->values['post_category']    = $post['category'];
				$this->values['post_description'] = $post['post_description'];
				/** <<< Set the values to be replaced in the template **/
			}

			return $this->output();
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
	}