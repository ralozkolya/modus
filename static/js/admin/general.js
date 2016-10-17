$(function(){

	$('.delete').click(function(){
		return confirm(lang.areYouSure);
	});

	$('.ckeditor').ckeditor({
		language: config.language,
		filebrowserBrowseUrl: '/static/kcfinder/browse.php?opener=ckeditor&type=' + config.type,
	});

	$('.chosen').chosen();

	$('.multiple-upload').submit(function(){

		if(window.FormData) {

			var id = $('input[name=id]', this).val();
			
			var files = $('input[multiple]', this).get(0).files;

			if(files.length === 0 || !id) {
				return false;
			}

			//$('.multiple-loading').show();

			var waiting = false;
			var currentIndex = 0;
			var currentIndex = 0;

			//$('.loading-info').html(Math.round(currentIndex / files.length * 100) + '%');

			var t = $(this);

			var interval = setInterval(function(){
				
				if(!waiting) {

					waiting = true;

					var file = files.item(currentIndex);
					var formData = new FormData();
					var url = t.attr('action');

					formData.append('item', id);
					formData.append('image', file);

					$.ajax({
						url: url,
						method: 'post',
						data: formData,
						processData: false,
						contentType: false,
						complete: function(){
							waiting = false;
							currentIndex++;
							//$('.loading-info').html(Math.round(currentIndex / files.length * 100) + '%');

							if(currentIndex === files.length) {
								clearInterval(interval);
								//location.reload();
							}
						},
					});
				}

			}, 100);

			return false;
		}
	});
});