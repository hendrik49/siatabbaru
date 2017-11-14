/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */
 
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'id';
	// config.uiColor = '#AADC6E';
	config.skin = 'kama';
	config.extraPlugins =   'oembed';
	 config.extraPlugins = 'equation';

	config.oembed_maxWidth = '560';
config.oembed_maxHeight = '315';
config.toolbarGroups = [
    { name: 'tools' },
    { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
    { name: 'clipboard',   groups: [ 'clipboard', 'undo', 'oembed' ] },
    { name: 'insert',   groups: [ 'video' ] },
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
    { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
    { name: 'links' },
    { name: 'others' },
 
    { name: 'styles' },
    { name: 'colors' }
];

   config.filebrowserBrowseUrl = 'webgis/ckeditor/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = 'webgis/ckeditor/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = 'webgis/ckeditor/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = 'webgis/ckeditor/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = 'webgis/ckeditor/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = 'webgis/ckeditor/kcfinder/upload.php?type=flash';

};
