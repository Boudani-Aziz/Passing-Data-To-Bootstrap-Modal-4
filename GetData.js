$(function() {
	
	$("#StudentModal").on("show.bs.modal", function(e) {
		var studentid = $(e.relatedTarget).attr('data-id');
		$(this).find(".studentid").text(studentid);
		$.ajax({
            type: "POST",
            url: 'getdata.php',
            data: {
				ID: studentid,
			},
            success: function(response)
            {
				var names = response.split(" ");
				$("#FirstName").val(names[0]);
				$("#LastName").val(names[1]);
			}
		});
	});
	
});