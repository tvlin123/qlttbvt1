/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'vi';
	config.uiColor = '#AADC6E';
	config.skin = 'kama';
    config.height=400;

	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		'/',
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];
	config.removeButtons = 'Save,Print,Cut,Copy,Paste,PasteText,PasteFromWord,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,Outdent,Indent,Blockquote,CreateDiv,Language,BidiLtr,BidiRtl,Flash,SpecialChar,PageBreak,Styles,About';

    config.filebrowserBrowseUrl = 'http://127.0.0.1:8080/laravel/song/public/admin/js/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = 'http://127.0.0.1:8080/laravel/song/public/admin/js/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl = 'http://127.0.0.1:8080/laravel/song/public/admin/js/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = 'http://127.0.0.1:8080/laravel/song/public/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = 'http://127.0.0.1:8080/laravel/song/public/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = 'http://127.0.0.1:8080/laravel/song/public/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
