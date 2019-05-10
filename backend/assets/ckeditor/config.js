/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	config.filebrowserBrowseUrl = 'assets/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = 'assets/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = 'assets/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = 'assets/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = 'assets/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = 'assets/kcfinder/upload.php?type=flash';
	config.enterMode = CKEDITOR.ENTER_BR // pressing the ENTER KEY input <br/>
    config.shiftEnterMode = CKEDITOR.ENTER_P; //pressing the SHIFT + ENTER KEYS input <p>
    config.autoParagraph = false; // stops automatic insertion of <p> on focus
};
