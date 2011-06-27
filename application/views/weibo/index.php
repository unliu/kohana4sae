<style type="text/css">
	#timeline, #update, #friends {
		margin-top:10px;
	}
</style>
<?php echo HTML::image($avatar); ?><br />
<?php echo $name; ?><br />
<hr />
<div class="span-6 colborder">
	<button class="sexybutton sexysimple" id="get_post_btn">latest posts</button>
	<div id="timeline" ></div>
</div>
<div class="span-6 colborder">
	<button class="sexybutton sexysimple" id="get_friends_btn">friends</button>
	<div id="friends" ></div>
</div>
<div class="span-6 colborder last">
	<h6>update status</h6>
	<div id="update"></div>
</div>

<script type="text/javascript">
	$(document).ready(function(){   
		$("#get_post_btn").bind('click', function(){
			getTimeline();
		});
		$('#get_friends_btn').bind('click', function(){
			getFriends();
		})
	});   
  
	function getTimeline(){
		$.ajax({
  			url: '<?php echo URL::site('weibo/latestpost', TRUE); ?>',
 			dataType: 'json',
 			success: function(data){
 				$('#timeline').html('');
   				 for (var i = 0; i < data.length; i ++) {
   				 	$('#timeline').append(data[i]['text']);
   				 	$('#timeline').append('<br />');
   				 	$('#timeline').append('<hr />');
   				 }
  			},
  			error: function(jqXHR, textStatus, errorThrown){
  				alert(errorThrown);
  			}
		});
	}
	
	function getFriends(){
		$.ajax({
  			url: '<?php echo URL::site('weibo/friends', TRUE); ?>',
 			dataType: 'json',
 			success: function(data){
 				$('#friends').html('');
   				 for (var i = 0; i < data.length; i ++) {
   				 	$('#friends').append("<img src='" + data[i]['profile_image_url'] + "' />");
   				 	$('#friends').append('<br />');
   				 	$('#friends').append(data[i]['screen_name']);
   				 	$('#friends').append('<br />');
   				 	$('#friends').append('<hr />');
   				 }
  			},
  			error: function(jqXHR, textStatus, errorThrown){
  				alert(errorThrown);
  			}
		});
	}
</script>
