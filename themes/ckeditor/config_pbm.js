/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */
 
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'id';
	// config.uiColor = '#AADC6E';
	config.skin = 'kama';
		config.extraPlugins =  'video,oembed,equation';
	config.oembed_maxWidth = '560';
config.oembed_maxHeight = '315';
config.toolbarGroups = [
    { name: 'document',    groups: [ 'tools', 'mode', 'document', 'doctools' ] },
	    { name: 'styles' }  ,
    { name: 'clipboard',   groups: [ 'find', 'selection','clipboard', 'undo' ] },
    { name: 'insert', groups: [ 'insert', 'others','links' ]  },
    { name: 'basicstyles', groups: [ 'basicstyles', 'colors', 'cleanup', 'list', 'indent', 'blocks', 'align' ] },
    { name: 'editing',     groups: [  'spellchecker' ] }

];

   config.filebrowserBrowseUrl = 'webgis/ckeditor/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = 'webgis/ckeditor/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = 'webgis/ckeditor/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = 'webgis/ckeditor/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = 'webgis/ckeditor/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = 'webgis/ckeditor/kcfinder/upload.php?type=flash';

};
