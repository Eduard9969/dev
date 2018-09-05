(function ($) {
	"use strict";

	$(document).on('blur', 'input, textarea', function(e){
		$(this).val() ? $(this).addClass('has-value') : $(this).removeClass('has-value');
	});

	$(document).on('ready pjax:end', function(event) {
		$('form').submit(function(event) {
			$(this).addClass('active-form');
			var attr = $(this).attr('method').toLowerCase();

			if(attr == 'get'){
				return;
			}

			var json;
			event.preventDefault();
			$.ajax({
				type: $(this).attr('method'),
				url: $(this).attr('action'),
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(result) {
					json = jQuery.parseJSON(result);
					if (json.url) {
						window.location.href = json.url;
					} else {
						if(json.status == 'error') {json.status = 'warning';}

						notification(json.status, json.message);
						$('form').removeClass('active-form');
						// alert(json.status + ' - ' + json.message);
					}
				},
			});
		});
		function notification(status, message) {
			$('form.active-form').prepend('<div class="row alert-form"><div class="col-sm-12 text-center box-color '+status+' pos-rlt"><span class="arrow bottom b-'+status+'"></span><div class="box-body">'+message+'</div></div></div>');
			setTimeout(function(){ $('.alert-form').remove(); }, 3000);
		}

        $('a.del-test').click(function (e) {
            e.preventDefault();
            var checked = [];

            $('input:checkbox:checked').each(function() {
                checked.push($(this).val());
            });

            if(checked.length != 0) {
                $.ajax({
                    url: /project/,
                    type: "POST",
                    data: {del_test: true, data: checked}
                }).done(function (id) {
                	$('div[data-content = '+id+'] a').trigger('click');
                });
			}
        });
	});


})(jQuery);
