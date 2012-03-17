<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jQuery MultiSelect Widget Demo</title>
<link rel="stylesheet" type="text/css" href="jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="jquery.multiselect.filter.css" />

<link rel="stylesheet" type="text/css" href="css/custom-theme/jquery-ui-1.8.18.custom.css" />
<script type="text/javascript" src="js/jquery-1.5.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="jquery.multiselect.js"></script>
<script type="text/javascript" src="jquery.multiselect.filter.js"></script>
</head>
<body>

<form style="margin:20px 0">
	<p>
		<select multiple="multiple" style="width:370px">
		<option value="red">Red</option>
		<option value="green">Green</option>
		<option value="blue">Blue</option>
		<option value="orange">Orange</option>
		<option value="purple">Purple</option>
		<option value="yellow">Yellow</option>
		<option value="brown">Brown</option>
		<option value="black">Black</option>
		</select>
	</p>
	<p>
		<select multiple="multiple" style="width:370px">
		<optgroup label="test">
			<option value="red">Red</option>
			<option value="green">Green</option>
			<option value="blue">Blue</option>
		</optgroup>
		<optgroup label="foo">
            <option value="orange">Orange</option>
			<option value="purple">Purple</option>
			<option value="yellow">Yellow</option>
			<option value="brown">Brown</option>
			<option value="black">Black</option>
		</optgroup>
		</select>
	</p>
</form>

<script type="text/javascript">
$("select").multiselect().multiselectfilter();
</script>

</body>
</html>