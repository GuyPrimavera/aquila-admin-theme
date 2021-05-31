$j=jQuery.noConflict();

$j(document).ready(function() {
	// New screen links
	if (document.getElementById('screen-options-wrap')) {
	} else {
	  $j('#wp-admin-bar-screenOptions').hide();
	}
	if (document.getElementById('contextual-help-wrap')) {
	} else {
	  $j('#wp-admin-bar-contextHelp').hide();
	}

	// Screen Options button
	$j('#wp-admin-bar-screenOptions .ab-item').click(function() {
		if ($j('#wp-admin-bar-contextHelp .ab-item').hasClass('active')) {
			$j('#contextual-help-wrap').hide();
			$j('#wp-admin-bar-contextHelp .ab-item').removeClass('active');
			$j(this).addClass('active');
			$j('#screen-options-wrap').slideDown( "fast" );
		} else {
			if ($j('#screen-meta').is(':visible')) {
				$j('#screen-meta').slideUp( "fast" );
				$j('#screen-options-wrap').slideUp( "fast" );
				$j(this).removeClass('active');
			} else {
				$j('#screen-meta').show();
				$j('#screen-options-wrap').slideDown( "fast" );
				$j(this).addClass('active');
			}
		};
	}); 

	// Admin bar icon functions
	$j('#aquilaAdminbarIcon').click(function() {
		if (document.body.classList.contains('aquilaClosedBar')) {
			$j('body').removeClass('aquilaClosedBar');
			$j('body').addClass('aquilaOpenBar');
			$j('#wpadminbar').slideDown( "fast" );
		} else {
			$j('body').removeClass('aquilaOpenBar');
			$j('body').addClass('aquilaClosedBar');
			$j('#wpadminbar').slideUp( "fast" );
		};
	}); 

	// Contextual Help button
	if (!document.getElementById('contextual-help-wrap')) {
	  $j('#wp-admin-bar-contextHelp').hide();
	}

	$j('#wp-admin-bar-contextHelp .ab-item').click(function() {
		if ($j('#wp-admin-bar-screenOptions .ab-item').hasClass('active')) {
			$j('#screen-options-wrap').hide();
			$j('#wp-admin-bar-screenOptions .ab-item').removeClass('active');
			$j(this).addClass('active');
			$j('#contextual-help-wrap').slideDown( "fast" );
		} else {
			if ($j('#screen-meta').is(':visible')) {
				$j('#screen-meta').slideUp( "fast" );
				$j('#contextual-help-wrap').slideUp( "fast" );
				$j(this).removeClass('active');
			} else {
				$j('#screen-meta').show();
				$j('#contextual-help-wrap').slideDown( "fast" );
				$j(this).addClass('active');
			}
		};
	}); 
})

// Media manager
$j(document).ready(function($j){
	$j('.aquilaNewLogoUpload').click(function() {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $j(this);
		wp.media.editor.send.attachment = function(props, attachment) {
			$j(button).next().next().attr('src', attachment.url);
			$j(button).prev().val(attachment.url);
			wp.media.editor.send.attachment = send_attachment_bkp;
		}
		wp.media.editor.open(button);
		return false;       
  });
});

// Show "Remove Logo" button if logo is present
$j(document).ready(function($j){
	$j('input.aquilaNewLogoUrl').each(function(){
		if ( !$j(this).val() ) { 
			$j(this).next().next().hide();
		} else {
			$j(this).next().next().show();
		}
	});
});

// Clear custom logo field on button click
$j(document).ready(function($j){
	$j('a.aquilaNewLogoClear').on('click',function(){
		$j(this).prev().prev().val("");
		$j(this).next('img').hide("fast");
		$j(this).hide("fast");
	});
});

// Colour picker
$j(document).ready(function($j){
  $j('.colourPicker').each(function(){
    $j(this).wpColorPicker();
  });
});
