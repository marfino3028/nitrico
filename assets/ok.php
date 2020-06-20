<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<script src="js/tinymce/tinymce.min.js"></script>
</head>
<body>
	<textarea name="ok" class="konten"></textarea>
	<script>
		tinymce.init({
    selector: ".konten",
    theme: "modern",
    height: 300,
   plugins: [
    "advlist autolink link image media filemanager code responsivefilemanager"
  ],
  toolbar1: "undo redo | bold italic underline | forecolor backcolor",
  toolbar2: "| responsivefilemanager | link unlink | image media | code",
  image_advtab: true,
  external_filemanager_path: "filemanager/",
  filemanager_title: "Responsive Filemanager",
  external_plugins: {
    "responsivefilemanager": "plugins/responsivefilemanager/plugin.min.js",
    "filemanager": "../../filemanager/plugin.min.js"
    // "filemanager": "../../filemanager/plugin.min.js"
  },
 });
	</script>
</body>
</html>