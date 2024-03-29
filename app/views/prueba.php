<html>
	<head>
		<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
		<script src="js/FCClientJS.js"></script>
		<style type="text/css">
#content_demo_image {
	float: left;
	margin-bottom: 10px;
}
.image_wrapper {
	float: left;
	position: relative;
	display: inline-block;
}
.api_face {
	opacity: 0.8;
	background: transparent 0 0 repeat;
	position: absolute;
	background-image: url('.');
}
.api_face_inner {
	width: 100%;
	height: 100%;
	border: 5px solid #88cc00;
	left: -5px;
	top: -5px;
	position: relative;
}
.api_face_inner_tid {
	color: #88cc00;
	font-weight: bold;
	font-size: 20px;
	margin-top: -26px;
}
.api_face_inner_sim {
	display: none;
}
.api_face_point {
	position: absolute;
	width: 3px;
	height: 3px;
	background: #88cc00;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
	border: 1px solid #88cc00;
	margin: -2px 0 0 -2px;
	font-size: 0;
}
.api_face_all_point {
	position: absolute;
	width: 3px;
	height: 3px;
	background: #e4d00a;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
	border: 1px solid #e4d00a;
	margin: -2px 0 0 -2px;
	font-size: 0;
}
		</style>
	</head>
	<body>
		<input type="file" id="emotion_file" name="datafile" size="40">
		<div id="conent_demo_image" style="width: 480px;">
		</div>
		<script type="text/javascript">
			$(function() {
				function drawFacesAddPoint(control, imgWidth, imgHeight, point, title) {
					var x = Math.round(point.x * imgWidth / 100);
					var y = Math.round(point.y * imgHeight / 100);
					var pointClass = title == null ? "api_face_all_point" : "api_face_point";
					var pointStyle = 'top: ' + y + 'px; left: ' + x + 'px;';
					var pointTitle = (title == null ? '' : title + ': ') + 'X=' + x + ', Y=' + y + ', Confidence=' + point.confidence + '%' + (title == null ? ', Id=' + point.id.toString(16) : '');
					control.append($('<span class="' + pointClass + '" style="' + pointStyle + '" title="' + pointTitle + '"></span>'));
				}
				function drawFaces(div, photo, drawPoints) {
					if (!photo) {
						alert("No image found");
						return;
					}
					if (photo.error_message) {
						alert(photo.error_message);
						return;
					}
					var imageWrapper = $('<div class="image_wrapper"></div>').appendTo(div);
					var maxImgWidth = parseInt(div.prev().children(".img_max_width").html(), 10);
					var maxImgHeight = parseInt(div.prev().children(".img_max_height").html(), 10);
					var imgWidth = photo.width;
					var imgHeight = photo.height;
					var scaleFactor = Math.min(maxImgWidth / imgWidth, maxImgHeight / imgHeight);
					if (scaleFactor < 1) {
						imgWidth = Math.round(imgWidth * scaleFactor);
						imgHeight = Math.round(imgHeight * scaleFactor);
					}
					imageWrapper.append($('<img alt="face detection results" width="' + imgWidth + 'px" height="' + imgHeight + 'px" src="' + photo.url +$('#emotion_file').val().split('\\').pop()+ '" />'));
					if (photo.tags) {
						for (var i = 0; i < photo.tags.length; ++i) {
							var tag = photo.tags[i];
							var tagWidth = tag.width * 1.5;
							var tagHeight = tag.height * 1.5;
							var width = Math.round(tagWidth * imgWidth / 100);
							var height = Math.round(tagHeight * imgHeight / 100);
							var left = Math.round((tag.center.x - 0.5 * tagWidth) * imgWidth / 100);
							var top = Math.round((tag.center.y - 0.5 * tagHeight) * imgHeight / 100);
							if (drawPoints && tag.points) {
								for (var p = 0; p < tag.points.length; p++) {
									drawFacesAddPoint(imageWrapper, imgWidth, imgHeight, tag.points[p], null);
								}
							}
							var tagStyle = 'top: ' + top + 'px; left: ' + left + 'px; width: ' + width + 'px; height: ' + height + 'px; transform: rotate(' +
								tag.roll + 'deg); -ms-transform: rotate(' + tag.roll + 'deg); -moz-transform: rotate(' + tag.roll + 'deg); -webkit-transform: rotate(' +
								tag.roll + 'deg); -o-transform: rotate(' + tag.roll + 'deg)';
							var apiFaceTag = $('<div class="api_face" style="' + tagStyle + '"><div class="api_face_inner"><div class="api_face_inner_tid" name="' + tag.tid + '"></div></div></div>').appendTo(imageWrapper);
							if (drawPoints) {
								if (tag.eye_left) drawFacesAddPoint(imageWrapper, imgWidth, imgHeight, tag.eye_left, "Left eye");
								if (tag.eye_right) drawFacesAddPoint(imageWrapper, imgWidth, imgHeight, tag.eye_right, "Right eye");
								if (tag.mouth_center) drawFacesAddPoint(imageWrapper, imgWidth, imgHeight, tag.mouth_center, "Mouth center");
								if (tag.nose) drawFacesAddPoint(imageWrapper, imgWidth, imgHeight, tag.nose, "Nose tip");
							}
						}
					}
				}
				function callback(data) {
					console.log(data);
					//drawFaces($("#conent_demo_image"), data.photos[0], true);
					emotion = "irreconocible";
					if( data.photos[0].tags.length >0 ) {
						emotion = data.photos[0].tags[0].attributes.mood.value;
					}
					$.post("/laravelile_final/public/api/save_emotion",{id:id,emotion:emotion});
					if( data.usage.remaining > 0 ) {
						processEmotion();
					}
				};
				client = new FCClientJS("31eb94e894e347a6a38da52987fc0fdc","b527831691a342eb973e7c9666f17778");
				options = new Object();
				options.detect_all_feature_points = true;
				options.attributes = "all";
				subeImagen =  function() {
					client.facesDetect(null, $('#emotion_file')[0].files, options, callback)
				};
				id = 0;
				console.log("paso");
				function processEmotion() {
			    	$.post( '/laravelile_final/public/api/process_emotions',function(data) {
				      	console.log(data);
				      	if(data.length > 0) {
				      		id =data[0].id;
				      		console.log(options);
				      		client.facesDetect("http://hugosama.tk/data/public/img/"+data[0].filename, null, options, callback);
				      		console.log("http://hugosama.tk/data/public/img/"+data[0].filename);
				      	}
					});
				};
				processEmotion();
			});
		</script>
	</body>
</html>
