/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {

  var lib_root = "/";
config.filebrowserBrowseUrl = lib_root + 'ckfinder/ckfinder.html';
config.filebrowserImageBrowseUrl = lib_root + 'ckfinder/ckfinder.html?Type=Images';
config.filebrowserFlashBrowseUrl = lib_root + 'ckfinder/ckfinder.html?Type=Flash';
//可上傳圖檔
config.filebrowserImageUploadUrl=lib_root+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
/*上傳一般檔案 依照需求使用*/
config.filebrowserUploadUrl=lib_root+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
/*上傳Flash檔案 依照需求使用*/
config.filebrowserFlashUploadUrl=lib_root+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
	// Define changes to default configuration here. For example:
	//  config.language = 'en';
	//  config.uiColor = '#AADC6E';
};
