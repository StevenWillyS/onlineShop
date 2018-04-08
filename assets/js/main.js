$ (document).ready(function(){
	cat();
	product();
	function cat(){
		$.ajax({
			url : "action.php",
			method: "POST",
			data : {kategori:1},
			success : function(data){
					$("#get_category").html(data);
			}
		})
	}

	function product(){
		$.ajax({
			url : "action.php",
			method: "POST",
			data : {getProduct:1},
			success : function(data){
					$("#get_product").html(data);
			}
		})
	}
	$("body").delegate(".kategori","click",function(event){
		event.preventDefault();
		var cid = $(this).attr('cid');
			$.ajax({
				url : "action.php",
				method: "POST",
				data : {get_selected_Category:1, cat_id:cid},
				success : function(data){
					$("#get_product").html(data);
			}
			})
	})
	$("#search_btn").click(function(){
		var keyword = $("#search").val();
		if(keyword != ""){
			$.ajax({
				url : "action.php",
				method: "POST",
				data : {search:1, keyword:keyword},
				success : function(data){
					$("#get_product").html(data);
			}
			})
		}
	})
})