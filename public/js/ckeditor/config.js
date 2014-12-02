/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.language = 'zh-CN';
	config.allowedContent=true;
	config.enterMode = CKEDITOR.ENTER_BR;
	config.extraPlugins = 'sourcedialog,strinsert';
	// config.filebrowserBrowseUrl = '/browser/browse.php';
	// config.filebrowserImageBrowseUrl = '/browser/browse.php?type=Images';
	// config.filebrowserUploadUrl = '/uploader/upload.php';
	config.filebrowserImageUploadUrl = '/uploader/upload.php?type=Images';

	// config.font_names = 'Arial;Times New Roman;Verdana';

	config.strinsertlist = [
		['<div class="ym-grid"><div class="ym-gbox">block content here</div></div>', 'empty block'],
		['<div class="ym-grid full_w_img"><div class="ym-gbox"><img src="/uploads/page/o/XDJ8LRGUoykzaQzm93rN.png" /></div></div>', 'full-width-image'],
		['<div class="ym-grid ym-equalize"><div class="ym-g50 ym-gl"><div class="ym-gbox-left">left content here</div></div><div class="ym-g50 ym-gr"><div class="ym-gbox-right">right content here</div></div></div>', '2 grids'],
		['<div class="ym-grid ym-equalize"><div class="ym-g50 ym-gl"><div class="ym-gbox-left"><img class="grid-img" src="/uploads/page/o/XDJ8LRGUoykzaQzm93rN.png" /></div></div><div class="ym-g50 ym-gr"><div class="ym-gbox-right">right content here</div></div></div>', '2 grids - left image'],
		['<div class="ym-grid ym-equalize"><div class="ym-g50 ym-gl"><div class="ym-gbox-left">left content here</div></div><div class="ym-g50 ym-gr"><div class="ym-gbox-right"><img class="grid-img" src="/uploads/page/o/XDJ8LRGUoykzaQzm93rN.png" /></div></div></div>', '2 grids - right image'],
		['<div class="ym-column ym-cl"><div class="ym-col1"><div class="ym-cbox">flexible content here</div></div><div class="ym-col3"><div class="ym-cbox">fixed width content here</div></div></div>', 'fixed-left-column'],
		['<div class="ym-column ym-cr"><div class="ym-col1"><div class="ym-cbox">flexible content here</div></div><div class="ym-col3"><div class="ym-cbox">fixed width content here</div></div></div>', 'fixed-right-column'],
		['<div class="ym-clearfix line"></div>', 'line'],
		['<div class="ym-grid author_image_right"><div class="ym-gbox ym-contain-oh"><div class="author_wrap"><div class="author_desc"><h4>素心</h4><p>【香氛达人】</p></div><img src="/uploads/page/o/Ms5q9LGuiDsnF0EvqLEE.png" /></div></div></div>', 'author_image_right'],
		['<div class="ym-grid others_works"><div class="ym-gbox"><a>查看往期作品</a></div></div>', '往期作品']
	];

	config.toolbar = [
		['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'],
		['Styles', 'Format', 'Font', 'FontSize'],
		[ 'TextColor', 'BGColor' ],
		['Find', '-' , 'ShowBlocks'],
		'/',
		[ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
		['Link', 'Unlink'],
		[ 'Image', 'Table', 'HorizontalRule', 'SpecialChar'],
		

		['strinsert'],
		['Sourcedialog'],
	];
};
