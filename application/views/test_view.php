

<!DOCTYPE html>
<html>

<head>
	<!-- Import bootstrap cdn -->
	<link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
		integrity=
"sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
		crossorigin="anonymous">

	<!-- Import jquery cdn -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity=
"sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
		crossorigin="anonymous">
	</script>
	
	<script src=
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
		integrity=
"sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
		crossorigin="anonymous">
	</script>

<style>
/* Popup container - can be anything you want */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;} 
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
</style>

</head>

<body>

<<iframe src="https://img.youtube.com/vi/watch?v=fD6SzYIRr4c/0.jpg"></iframe>


<!-- Button trigger modal -->





    <?php
    
    $uri = "https://www.youtube.com/watch?v=jp7jG-TB1p4";
    parse_str( parse_url( $uri, PHP_URL_QUERY ), $my_array_of_vars );
    // echo $my_array_of_vars['v'];

    // echo substr($my_url, strrpos($my_url, '/' )+1);
    $url = "http://img.youtube.com/vi/".$my_array_of_vars['v']."/mqdefault.jpg";
    ?>

    <!-- <iframe src="<?php echo $uri ?>" frameborder="0">
    
    
    </iframe> -->

    <?php 

$src = "https://www.youtube.com/embed/" . $my_array_of_vars['v'];

?>


	<div class="container mt-2">

		<!-- Input field to accept user input -->
		Name: <input type="text" name="name"
			id="name"><br><br>

		Marks: <input type="text" name="marks"
			id="marks"><br><br>

		<!-- Button to invoke the modal -->
		<button type="button" class="btn btn-primary
			btn-sm" data-toggle="modal"
			data-target="#exampleModal"
			id="submit">
			Submit
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal"
			tabindex="-1"
			aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"
							id="exampleModalLabel">
							Confirmation
						</h5>
						
						<button type="button"
							class="close"
							data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>

					<div class="modal-body">

						<!-- Data passed is displayed
							in this part of the
							modal body -->
						<h6 id="modal_body"></h6>
						<button type="button"
							class="btn btn-success btn-sm"
							data-toggle="modal"
							data-target="#exampleModal"
							id="submit">
							Submit
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$("#submit").click(function () {
			var name = $("#name").val();
			var marks = $("#marks").val();
			var str = "You Have Entered "
				+ "Name: " + name
				+ " and Marks: " + marks;
			$("#modal_body").html(str);
		});
	</script>
</body>

</html>




    <!-- <iframe src="https://www.w3schools.com" title="W3Schools Free Online Web Tutorials"></iframe>  -->

        <div class="popup" onclick="myFunction()">Click me to toggle the popup!
  <iframe width="420" height="345" src="<?php echo $src; ?>" class="popuptext" id="myPopup"> 
</div>

<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>

<br>




<div data-role="popup" id="popupVideo" data-overlay-theme="a" data-theme="d" data-tolerance="15,15" class="ui-content">

    <!-- <iframe src="http://player.vimeo.com/video/41135183" width="497" height="298" seamless></iframe> -->
        <iframe width="420" height="345" src="<?php echo $src; ?>">
	 
</div>
<br>
<hr>
<br>
<br>
<br>
<h1>Hello</h1>
 
 


<!-- <a href="#" onclick="popup('popUpDiv');foo(this);">OnSale</a> -->

            
</iframe>

<img src="<?php //  echo  $url ?>" >
    
    
</body>
</html>

<<script>
    $( document ).on( "pageinit", function() {
    $( "#popupVideo iframe" )
        .attr( "width", 0 )
        .attr( "height", 0 );
		  
    $( "#popupVideo" ).on({
        popupbeforeposition: function() {
            var size = scale( 497, 298, 15, 1 ),
                w = size.width,
                h = size.height;

            $( "#popupVideo iframe" )
                .attr( "width", w )
                .attr( "height", h );
        },
        popupafterclose: function() {
            $( "#popupVideo iframe" )
                .attr( "width", 0 )
                .attr( "height", 0 );    
        }
    });
});
</script>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Basic Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
        <?php

    
    $uri = "https://www.youtube.com/watch?v=jp7jG-TB1p4";
    parse_str( parse_url( $uri, PHP_URL_QUERY ), $my_array_of_vars );
    // echo $my_array_of_vars['v'];

    // echo substr($my_url, strrpos($my_url, '/' )+1);
    $url = "http://img.youtube.com/vi/".$my_array_of_vars['v']."/mqdefault.jpg";
    
    ?>
    <iframe width="420" height="345" src="<?php echo $src; ?>" > 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>





