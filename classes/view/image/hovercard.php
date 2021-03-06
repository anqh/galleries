<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Image_HoverCard
 *
 * @package    Galleries
 * @author     Antti Qvickström
 * @copyright  (c) 2012 Antti Qvickström
 * @license    http://www.opensource.org/licenses/mit-license.php MIT license
 */
class View_Image_HoverCard extends View_Section {

	/**
	 * @var  Model_Gallery
	 */
	public $gallery;

	/**
	 * @var  Model_Image
	 */
	public $image;


	/**
	 * Create new view.
	 *
	 * @param  Model_Image    $image
	 * @param  Model_Gallery  $gallery
	 */
	public function __construct(Model_Image $image, Model_Gallery $gallery) {
		parent::__construct();

		$this->image   = $image;
		$this->gallery = $gallery;
		$this->title   = HTML::chars($gallery->name);
	}


	/**
	 * Render view.
	 *
	 * @return  string
	 */
	public function content() {
		ob_start();

		echo '<figure>', HTML::image($this->image->get_url(Model_Image::SIZE_THUMBNAIL)), '</figure>';

		// Tagged people
		if ($this->image->description):
			$names = array();
			foreach (explode(',', $this->image->description) as $name):
				$names[] = HTML::user(trim($name));
			endforeach;
			echo __('In picture: :users', array(':users' => implode(', ', $names)));
		endif;

		// Copyright
		if ($this->image->author_id):
			echo '<br />&copy; ', HTML::user($this->image->author_id);
		endif;

		// Comments
		if ($this->image->comment_count) {
			echo '<span class="stats"><i class="icon-comment"></i> ' . $this->image->comment_count . '</span>';
		}

		return ob_get_clean();
	}

}
