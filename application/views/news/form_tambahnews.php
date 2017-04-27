<script type="text/javascript">
	function cekform()
	{
		//if (!$("#kode").val()) {
			//alert('ID BARANG TIDAK BOLEH KOSONG');
			//$("#kode").focus()
			//return false;
		//}


		if (!$("#judul").val()) {
			alert('JUDUL TIDAK BOLEH KOSONG');
			$("#judul").focus()
			return false;
		}

		// if ($("#status") == "") {
		// 	alert('status TIDAK BOLEH KOSONG');
		// 	$("#status").focus()
		// 	return false;
		// }

		
	}
</script>

<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/news/simpan" onsubmit="return cekform();">
	<!--<div class="control-group">
			<label class="control-label">Id Barang :</label>
			<div class="controls">
				<input type="text" name="kode" id="kode" placeholder="kode" class="span5" value="<?php echo $kode; ?>">
		</div>
	</div>-->

	<div class="control-group">
			<label class="control-label">Title :</label>
		<div class="controls">
				<input type="text" name="judul" id="judul" placeholder="judul" class="span5" value="<?php echo $judul; ?>">
		</div>
	</div>

	 <div class="control-group">
			<label class="control-label">Kategori :</label>
			<select name="kategori">
 	<option value="0"></option>     
 	<option value="1">Sport</option>
 	<option value="2">Politic</option>  
 	<option value="3">Lifestyle</option>  

 	<!--<option value="waiting">waiting</option>-->
</select>      
<br>
		</div>
<label class="control-label">Content :</label>
		<textarea class="myTextarea" name="isi"></textarea>
	</div>

	<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>

<script>
	tinymce.init({
		selector: ".myTextarea",
		theme: "modern",
		plugins: [
			"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker toc",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons template paste textcolor importcss colorpicker textpattern codesample",
			"advlist autolink lists link image charmap print preview anchor",
    		"searchreplace visualblocks code fullscreen",
    		"insertdatetime media table contextmenu paste jbimages"
		],
		external_plugins: {
			//"moxiemanager": "/moxiemanager-php/plugin.js"
		},
		content_css: "css/development.css",
		add_unload_trigger: false,

		toolbar: "insertfile undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link jbimages | print preview media fullpage | forecolor backcolor emoticons table codesample",

		image_advtab: true,
		image_caption: true,
		relative_urls: false,

		style_formats: [
			{title: 'Bold text', format: 'h1'},
			{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			{title: 'Example 1', inline: 'span', classes: 'example1'},
			{title: 'Example 2', inline: 'span', classes: 'example2'},
			{title: 'Table styles'},
			{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		],

		template_replace_values : {
			username : "Jack Black"
		},

		template_preview_replace_values : {
			username : "Preview user name"
		},

		link_class_list: [
			{title: 'Example 1', value: 'example1'},
			{title: 'Example 2', value: 'example2'}
		],

		image_class_list: [
			{title: 'Example 1', value: 'example1'},
			{title: 'Example 2', value: 'example2'}
		],

		templates: [
			{title: 'Some title 1', description: 'Some desc 1', content: '<strong class="red">My content: {$username}</strong>'},
			{title: 'Some title 2', description: 'Some desc 2', url: 'development.html'}
		],

		setup: function(ed) {
			/*ed.on(
				'Init PreInit PostRender PreProcess PostProcess BeforeExecCommand ExecCommand Activate Deactivate ' +
				'NodeChange SetAttrib Load Save BeforeSetContent SetContent BeforeGetContent GetContent Remove Show Hide' +
				'Change Undo Redo AddUndo BeforeAddUndo', function(e) {
				console.log(e.type, e);
			});*/
		},

		spellchecker_callback: function(method, data, success) {
			if (method == "spellcheck") {
				var words = data.match(this.getWordCharPattern());
				var suggestions = {};

				for (var i = 0; i < words.length; i++) {
					suggestions[words[i]] = ["First", "second"];
				}

				success({words: suggestions, dictionary: true});
			}

			if (method == "addToDictionary") {
				success();
			}
		}
	});

	if (!window.console) {
		window.console = {
			log: function() {
				tinymce.$('<div></div>').text(tinymce.grep(arguments).join(' ')).appendTo(document.body);
			}
		};
	};
</script>

<br>
                Header Image : <input type="file" name="btn_upload"/>
        <br>
	<p>
	<div>
		<button type="submit" class="btn btn-primary btn-small">Simpan</button>
		<a href="<?php echo base_url();?>index.php/news" class="btn btn-primary btn-small"> Tutup </a>
	</div>
	</p>
</form>