$(document).ready(function() {
	$('form').submit(function(event) {
		$(this).addClass('active-form');
		var json;
		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
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
				}
			},
		});
	});
});

function notification(status, message) {
	$('form.active-form').prepend('<div class="row alert-form"><div class="col-sm-12 text-center box-color '+status+' pos-rlt"><span class="arrow bottom b-'+status+'"></span><div class="box-body">'+message+'</div></div></div>');
	setTimeout(function(){ $('.alert-form').remove(); }, 3000);
}
