(function($){
    Drupal.behaviors.selectarea= {
    attach: function(context, settings) {		
			$('form#views-exposed-form-product-detail-page .selectarea').jqTransform({imgPath:'jqtransformplugin/img/'});				
			$('form#views-exposed-form-product-detail-page .form-text').attr('placeholder','Search');		
			
			    if ( !("placeholder" in document.createElement("input")) ) {
        $("input[placeholder], textarea[placeholder]").each(function() {
            var val = $(this).attr("placeholder");
            if ( this.value == "" ) {
                this.value = val;
            }
            $(this).focus(function() {
                if ( this.value == val ) {
                    this.value = "";
                }
            }).blur(function() {
                if ( $.trim(this.value) == "" ) {
                    this.value = val;
                }
            })
        });
 
        // Clear default placeholder values on form submit
        $('form').submit(function() {
            $(this).find("input[placeholder], textarea[placeholder]").each(function() {
                if ( this.value == $(this).attr("placeholder") ) {
                    this.value = "";
                }
            });
        });
    }
		}
	}
})(jQuery);