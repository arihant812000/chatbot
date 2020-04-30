<link rel="stylesheet" href= "/css/stylesheet.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 20px;
}
.cross
{
	text-align:center;
	font-size:40px;
	background-color:#A3130E;
	color:white;
	border:none;
	margin-left:57%;
}
.ui button:hover
{
border:2px inset #A3130E;
}
.photo
{
	
	border-radius:50%;
	border:none;
	position:fixed;
	bottom:20px;
	margin-left:85%;
}
.photo :hover
{
	border:1px inset black;
}
.photo img
{
	width:60px;
	height:60px;
	border-radius:50%;
	
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}
</style>

<button onclick="document.getElementById('id01').style.display='block'"  class ="photo" style="cursor:pointer"><img src="images\bprd2.png"></img></button>

<div id="id01" class="modal" >
  
  <div class="modal-content animate" >
    <div class ="chatbox">
<div class="ui">
			
			<h1 class ="message" style="display:block;font-size:40px;background-color:#b50d29;color:white;text-align:center">CHAT US
			
			<button onclick="window.location.href='cr'" class="cross" style="cursor:pointer">&times </button></h1>
			
		</div>
		<hr>
	<div class="chatlog" id='Box'>
	@foreach($data as $item)
			@if(($item->id)!=1)
			<div class="chat me">
			<div class ="user-photo name">A
			</div>
			<p class ="message">{!!$item->user!!}</p>
		</div>
		<div class="chat friend">
			<div class ="user-photo">
			<img src="images\bprd2.png"></img>
			</div>
			<p class ="message">{!!$item->chatbot!!}</p>
		</div>
			
			@else
				<div class="chat friend">
			<div class ="user-photo">
			<img src="images\bprd2.png"></img>
			</div>
			<div>
			<p class ="message" style="text-align:center"><img src="images\bprd1.jpg" ></img></br>{!!$item->chatbot!!}</p>
			
			</div>
		</div>
			@endif
		@endforeach
	</div>
	<form class="chat-form" action="dbcon" method="POST" >
	{{ csrf_field() }}
	<input id = "msg" name="msg" type="text" maxlength="1000" autocomplete="off">
	<button onclick="myFunction()" class="btn"><i class = "fa fa-paper-plane"></i></button>
	</form>
	</div>
</div>
</div>
<script>
var box = document.getElementById('Box');
box.scrollTop = box.scrollHeight;

function myFunction() {
  var inpObj = document.getElementById("id1");
  if (!inpObj.checkValidity()) {
    document.getElementById("demo").innerHTML = inpObj.validationMessage;
  } else {
    form.submit();
  } 
} 
document.getElementById('msg').onkeydown = function(e){
   if(e.keyCode == 13){
     myFunction();
   }
};
</script>