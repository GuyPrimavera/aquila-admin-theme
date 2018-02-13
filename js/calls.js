// JavaScript Document
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
    if( $j('#wp-admin-bar-contextHelp .ab-item').hasClass('active')) {

	    $j('#contextual-help-wrap').hide();
	    $j('#wp-admin-bar-contextHelp .ab-item').removeClass('active');
	    $j(this).addClass('active');
	    $j('#screen-options-wrap').slideDown( "fast" );

    } else {

	    if( $j('#screen-meta').is(':visible')) {
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

// Contextual Help button

if (document.getElementById('contextual-help-wrap')) {
} else {
  $j('#wp-admin-bar-contextHelp').hide();
}

$j('#wp-admin-bar-contextHelp .ab-item').click(function() {
    if( $j('#wp-admin-bar-screenOptions .ab-item').hasClass('active')) {

	    $j('#screen-options-wrap').hide();
	    $j('#wp-admin-bar-screenOptions .ab-item').removeClass('active');
	    $j(this).addClass('active');
	    $j('#contextual-help-wrap').slideDown( "fast" );

    } else {

	    if( $j('#screen-meta').is(':visible')) {
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


$j(function($j) {
	if (typeof $j.wp !== 'undefined' && typeof $j.wp.wpColorPicker !== 'undefined') {
		$j.wp.wpColorPicker.prototype.options = {
			palettes: [
				'#f44336',
				'#E91E63',
				'#9c27b0',
				'#673ab7',
				'#3f51b5',
				'#2196F3',
				'#03a9f4',
				'#00bcd4',
				'#009688',
				'#4caf50',
				'#8bc34a',
				'#cddc39',
				'#ffeb3b',
				'#ffc107',
				'#ff9800',
				'#ff5722',
				'#795548',
				'#9e9e9e',
				'#607d8b',
				'#ffffff'
			],
			width: 450,
			mode: "hsv"
		};
	}

});


$j(document).ready(function($j){
  $j('.colourPicker').each(function(){
    $j(this).wpColorPicker();
  });
});


/*
$j(document).ready(function($j){
  //$j('#color-picker').iris();
  $j('.colourPicker').each(function(){
    $j(this).iris();
  });
});
*/
