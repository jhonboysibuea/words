<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script type="text/javascript">
$(function(){
	var i = 0;
	var isAjax = false;
	var start=0;

	function sendData(id){
		isAjax = true;
		$.post("http://words.adampc.com/cleaning/do_send?id="+id).done(function(e){
			isAjax = false;
			i++;
		});
	}

	function dataParse(data){
		$.each(data, function(i,row){
			var id = row.word_id;
			sendData(id);
		});
	}

	function getData(){
		isAjax = true;
		$.getJSON("http://words.adampc.com/cleaning/do_clean?s="+start).done(function(response){
			var data = response.data;
			dataParse(data);
			start++;
		});
	}

	function cleaning(){
		// if (i>3) return;
		if (!isAjax) {
			getData();
		}
		setTimeout(cleaning, 500);
	}

	cleaning();
});
</script>
</body>
</html>