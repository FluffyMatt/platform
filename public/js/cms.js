$(function() {

	// Ckeditor
	if ($('[name="body"]').length > 0) {
		CKEDITOR.replace('body', {
			skin: 'flat,/js/flat/',
			customConfig: '/js/ckeditor.js'
		})
	};

	// Save button located outside form can trigger submit
	$('#save').click(function() {
		$('.ui.form').submit();
	});

	// Confirm delete
	$('.item.delete-confirm').click(function() {
		$(this).children('form').submit();
	})

	// Conditional fields
	$('#content-form').each(function() {
		$('#content-categories').dependsOn({
			'#content-type select': {
				not: ['page']
			}
		});
		$('#content-description').dependsOn({
			'#content-type select': {
				not: ['page']
			}
		});
	});

	// Semantic
	$('.ui.calendar').calendar({
		on: 'focus',
		ampm: false,
		formatter: {
			date: function (date, settings) {
				if (!date) return '';
				var day = ("0" + date.getDate()).slice(-2);
				var month = ("0" + (date.getMonth() + 1)).slice(-2);
				var year = date.getFullYear();
				return  + year + '-' + month + '-' + day;
			}
		},
		type: 'datetime'
	});

	$('.message .close').on('click', function() {
		$(this).closest('.message').transition('fade');
	});

	$('.ui.dropdown').dropdown({on: 'hover'})
	$('form .ui.dropdown').dropdown({on: 'focus'})

	$('.ui.checkbox').checkbox();

	$('.ui.accordion').accordion();

	// Js Diff
	$("#old-diff").each(function(){
		var newVal = $('#new-diff').text();
		$('#new-diff').text('');
		var oldVal = $('#old-diff').text();
		$('#old-diff').text('');
		var diff = JsDiff.diffWords(oldVal, newVal);
		diff.forEach(function(part){
			var color = '';
			var append;
			if (part.added) {
				writeDiff(part, 'new-diff', 'added');
				//$('#new-diff').html($('#new-diff').html().replace(part.value, "<span class='added' style='color: #5cb85c;'>"+part.value+"</span>"));
			}
			else if (part.removed) {
				writeDiff(part, 'old-diff', 'removed');
				//$('#old-diff').html($('#old-diff').html().replace(part.value, "<span class='removed' style='color: #d9534f;'>"+part.value+"</span>"));
			} else {
				writeDiff(part, 'old-diff', '');
				writeDiff(part, 'new-diff', '');
			}
		});
	});

	function writeDiff(part, element, status) {
	  element = document.getElementById(element);
	  var span = document.createElement('span');
	  span.className = status;
	  span.appendChild(document.createTextNode(part.value));
	  element.appendChild(span);
	}

	// File uploads
	$('.button-upload').click(function() {
	  $('#file-upload').click();
	})

	$('#file').change(function() {
		$('.extra.content').children().hide();
		$(this).parent().parent().prepend('<i class="green upload icon"></i> New file attached');
	});

	var rowId = 0;
	var images =  [
		'image/png',
		'image/gif',
		'image/jpg',
		'image/jpeg'
	];

	$('#file-upload').change(function() {
		$(this).parent().addClass('loading');
		$(this).css('height', '80px');
		$(this).parent().css('height', '80px');

		for (var i = 0; i < this.files.length; i++) {
			var formData = new FormData();
			var file = this.files[i];
			var reader = new FileReader();

			reader.onload = (function(file, i) {
				rowId++;
				formData.append('file', file);
				upload(formData, rowId);
				var row = document.createElement('tr');
				row.id = rowId;
				return function(e) {
					if (images.indexOf(file.type) > -1) {
						var thumb = '<img src="'+this.result+'"/>';
					} else {
						var fileType = file.name.substr(file.name.indexOf('.')+1);
						var thumb = '<i class="file '+fileType+' icon outline huge"></i>';
					}
					row.innerHTML = '<td><div class="ui card"><div class="ui tiny centered image">'+thumb+'</div><div data-percent="" class="ui bottom attached tiny indicating progress"><div class="bar"></div></div></td><td>'+file.name+'</td><td>'+file.type+'</td><td>'+humanFileSize(file.size)+'</td><td></td>';
					document.getElementById('uploads').insertBefore(row, null);
				}
			})(file, i)

			reader.readAsDataURL(file);

			reader.onloadend = function() {
				$('#uploads').removeClass('hide');
				$('.loading').removeClass('loading');
			}

		}

		if (reader.readyState == '2') {
			$(this).parent().removeClass('loading');
		}

	})

	function humanFileSize(size) {
	    var i = Math.floor( Math.log(size) / Math.log(1024) );
	    return ( size / Math.pow(1024, i) ).toFixed(2) * 1 + ' ' + ['B', 'KB', 'MB', 'GB', 'TB'][i];
	};

	function upload(file, id) {
		$.ajax({
			headers: { 'X-CSRF-Token' : $('input[name="_token"]').val() },
			type:'POST',
			url: '/cms/files/upload',
			data:file,
			cache:false,
			contentType: false,
			processData: false,

			xhr: function() {
				var myXhr = $.ajaxSettings.xhr();
				if(myXhr.upload){
				    myXhr.upload.addEventListener('progress',function progress(e){
					    if(e.lengthComputable){
					        var max = e.total;
					        var current = e.loaded;

					        var percentage = (current * 100)/max;
							$('#'+id+' .ui.progress').progress({'percent': percentage});
					    }
					 }, false);
				}
				return myXhr;
	        },

			success:function(data){
				data = $.parseJSON(data);
				if (data.error) {
					$('#'+id).addClass('negative');
					$('#'+id).children('td').eq(4).html('Error - '+data.error.message);
					$('#'+id+' .ui.progress').removeClass('success').addClass('error');
				} else {
					$('#'+id).addClass('positive');
					$('#'+id).children('td').eq(4).html('<a class="ui button" target="_blank" href="/cms/files/'+data+'/edit">Edit</a>');
				}
			},

			error: function(data){
			  $('#'+id).addClass('negative');
			}
		});
  	};


});
