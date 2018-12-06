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
	var base_url = <?php echo json_encode($base_url); ?>;
	var limit = <?php echo json_encode($limit); ?>;
	var start=<?php echo json_encode($start); ?>;
	var i = 0;
	var isAjax = false;
	var totalLastResult = 0;

	function sendData(data){
		// console.log (data);
		isAjax = true;
		$.post(base_url+"cleaning/do_send", {data:data}).done(function(e){
			i++;
			isAjax = false;
		});
	}

	function dataParse(data){
		var newData={};
		$.each(data, function(i,row){
			var word_id = row.word_id;
			var defin = row.definition;
			var htmls = $('<textarea />').html(defin).text();
			var rowData = {};
			rowData.definition = htmls;
			rowData.word_id = word_id;

			newData[i] = rowData;
		});

		sendData(newData);
	}

	function getData(){
		isAjax = true;
		$.getJSON(base_url+"cleaning/do_clean?s="+start).done(function(response){
			var data = response.data;
			dataParse(data);
			totalLastResult=response.total;
			start+=limit;
		});
	}

	function cleaning(){
		if (i>0 && totalLastResult<limit) return;
		if (!isAjax) {
			getData();
		}
		setTimeout(cleaning, 10);
	}

	cleaning();
});
</script>
</body>
</html>