/**
 * @license Copyright © 2013 Stuart Sillitoe <stuart@vericode.co.uk>
 * This work is mine, and yours. You can modify it as you wish.
 *
 * Stuart Sillitoe
 * stuartsillitoe.co.uk
 *
 */

CKEDITOR.plugins.add('strinsert',
{
	requires : ['richcombo'],
	init : function( editor )
	{
		//  array of strings to choose from that'll be inserted into the editor
		var strings = editor.config.strinsertlist;
		// strings.push(['<div class="block">block</div>', 'block']);
		// strings.push(['<div class="block clean"><img class="fl" src="" /><div class="p_desc">content here</div></div>', 'column-l']);

		// add the menu to the editor
		editor.ui.addRichCombo('strinsert',
		{
			label: 		'Template',
			title: 		'Template',
			voiceLabel: 'Template',
			className: 	'cke_format',
			multiSelect:false,
			panel:
			{
				css: [ editor.config.contentsCss, CKEDITOR.skin.getPath('editor') ],
				voiceLabel: editor.lang.panelVoiceLabel
			},

			init: function()
			{
				this.startGroup( "Template" );
				for (var i in strings)
				{
					this.add(strings[i][0], strings[i][1], strings[i][1]);
				}
			},

			onClick: function( value )
			{
				editor.focus();
				editor.fire( 'saveSnapshot' );
				editor.insertHtml(value);
				editor.fire( 'saveSnapshot' );
			}
		});
	}
});