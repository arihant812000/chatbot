<link rel="stylesheet" href= "css\stylesheet.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
/* The Modal (background) */
.modal {
  display: block; /* Hidden by default */
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

/* The Modal (background) */
.modal2 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal2 {
 background-color:rosyBrown;
  margin: 10% auto 15% auto;
margin-left:20% auto;  /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
  height:30%;
  font-size:30px;
  border:10px inset rosyBrown;
  overflow:hidden;
}
/* Add Zoom Animation */
.animate2 {
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
@media screen and (max-width: 800px) {
.modal2 {
 background-color:rosyBrown;
 margin-left:0px;
  margin: 10% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 70%; /* Could be more or less, depending on screen size */
  height:50%;
  font-size:30px;
  border:10px inset rosyBrown;
  overflow:hidden;
  font-size:20px;
}
}
</style>

<button onclick="document.getElementById('id01').style.display='block'"  class ="photo" style="cursor:pointer"><img src="images\bprd2.png"></img></button>

<div id="id01" class="modal" >
  
  <div class="modal-content" >
    <div class ="chatbox">
<div class="ui">
			
			<h1 class ="message" style="display:block;font-size:40px;background-color:#b50d29;color:white;text-align:center">CHAT US
			
			<button onclick="window.location.href='cr'" class="cross" style="cursor:pointer">&times </button></h1>
			
		</div>
		<hr>
	<div class="chatlog" id ='Box'>
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
	@foreach($data as $item)
	@if(($item->input)!="")
	<form class="chat-form" action="register" method="POST" >
	{{ csrf_field() }}
	
	{!!$item->input!!}
	<button onclick="myFunction()"><i class = "fa fa-paper-plane" ></i></button>
	@else
		@endif
	<p id="demo"></p>
	</form>
	
	@endforeach
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
<div id="id02" class="modal2" style="margin-left:20%">
  
  <form class="modal-content2 animate2" action="upload" method="POST" enctype="multipart/form-data" id='form'>
       <div style="text-align:center ; background-color:rosyBrown;margin-left:30px auto">
	{{csrf_field()}}
<input type="file" name="file" onchange="form.submit()" style="text-align:center;margin-left:10% auto ;font-size:20px">
  </br></br>
      <button type="button" onclick="document.getElementById('id02').style.display='none'" style="width:200px;height:50px;border:none;font-size:20px;cursor:pointer;text-align:center ">Cancel</button>
    </div>
	</form>
</div>