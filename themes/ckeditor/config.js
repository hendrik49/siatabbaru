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
    { name: 'clipboard',   groups: [ 'find', 'selection','clipboard', 'undo' ] },
    { name: 'insert', groups: [ 'insert', 'others','links' ]  },
    { name: 'basicstyles', groups: [ 'basicstyles', 'colors', 'cleanup', 'list', 'indent', 'blocks', 'align' ] },
    { name: 'editing',     groups: [  'spellchecker' ] }, 
    { name: 'styles' }  
];

   config.filebrowserBrowseUrl = 'ckeditor/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = 'ckeditor/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = 'ckeditor/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = 'ckeditor/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = 'ckeditor/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = 'ckeditor/kcfinder/upload.php?type=flash';

};
