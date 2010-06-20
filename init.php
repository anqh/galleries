<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Init for Galleries
 *
 * @package    Galleries
 * @author     Antti Qvickström
 * @copyright  (c) 2010 Antti Qvickström
 * @license    http://www.opensource.org/licenses/mit-license.php MIT license
 */

Route::set('gallery_image_comment', 'gallery/comment/<id>/<commentaction>', array('commentaction' => 'delete|private'))
	->defaults(array(
		'controller' => 'galleries',
		'action'     => 'comment',
	));
Route::set('gallery_image', 'gallery/<gallery_id>/<id>(/<action>)', array('action' => 'delete', 'id' => '\d+'))
	->defaults(array(
		'controller' => 'galleries',
		'action'     => 'image',
	));
Route::set('gallery', 'gallery/<id>(/<action>)', array('action' => 'add'))
	->defaults(array(
		'controller' => 'galleries',
		'action'     => 'gallery',
	));
Route::set('galleries', 'galleries(/<action>(/<year>(/<month>)))', array('action' => 'browse', 'year' => '\d{4}', 'month' => '\d{1,2}'))
	->defaults(array(
		'controller' => 'galleries',
	));
