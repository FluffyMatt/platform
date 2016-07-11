CKEDITOR.editorConfig = function( config ) {

    config.toolbar = [['Format'],['Bold','-','Italic'],['NumberedList','-','BulletedList','-','Blockquote'],['Link','-','Unlink','-','Anchor'],['Image','-','Table','-','HorizontalRule'],['Undo','-','Redo'],['Maximize'],['Source']];

    // Remove some buttons provided by the standard plugins, which are
    // not needed in the Standard(s) toolbar.
    config.removeButtons = 'Underline,Subscript,Superscript';
    config.contentsCss = ['/css/semantic.min.css', '/css/site.css'];
    // Set the most common block elements.
    config.format_tags = 'p;h2;h3;h4;div';
    config.height = 300;
    config.resize_maxWidth = 722;
    config.removePlugins = 'elementspath';
    config.allowedContent = true;

    // Simplify the dialog windows.
    config.removeDialogTabs = 'link:advanced';
};
CKEDITOR.dtd.$removeEmpty['i'] = false;

CKEDITOR.on( 'dialogDefinition', function( ev ) {
	var dialogName = ev.data.name;
	var dialogDefinition = ev.data.definition;
	if ( dialogName == 'table' ) {
		var info = dialogDefinition.getContents( 'info' );
		info.get( 'txtWidth' )[ 'default' ] = '';
		info.get( 'txtBorder' )[ 'default' ] = '';
		info.get( 'txtCellSpace' )[ 'default' ] = '';
		info.get( 'txtCellPad' )[ 'default' ] = '';
		var addCssClass = dialogDefinition.getContents('advanced').get('advCSSClasses');
	    addCssClass['default'] = 'ui celled table';
	}
});
