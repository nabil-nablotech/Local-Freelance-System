<html>
<head>
   <link rel="stylesheet" href="chat.css">
   <style>


 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}
#chat_history{
 min-height: 450px;
 max-height: 450px;
 overflow-y: auto;
 padding:16px;
}

#chat_history a{
	display: block;
	color: black;
	text-decoration:none;
}

.wrapper{
  background: #fff;
  max-width: 100%;
  min-height: 500px;
  max-height: 500px;
  border-radius: 16px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}

/* Chat Area CSS Start */
.chat-area{
  min-height: 500px;
  max-height: 500px;
}
.chat-area header{
  display: flex;
  align-items: center;
  padding: 18px 30px;
}
.chat-area header .back-icon{
  color: #333;
  font-size: 18px;
}
.chat-area header img{
  height: 45px;
  width: 45px;
  margin: 0 15px;
}
.chat-area header .details span{
  font-size: 17px;
  font-weight: 500;
}
.chat-box{
  position: relative;
  min-height: 330px;
  max-height: 330px;
  padding: 10px 15px 15px 20px;
  overflow: hidden;
  background: #f7f7f7;
  box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
              inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
}

.chat-box .active{
  overflow: auto;
}

.chat-box .text{
  position: absolute;
  top: 45%;
  left: 50%;
  width: calc(100%);
  text-align: center;
  transform: translate(-50%, -50%);
}
.chat-box .chat{
  margin: 15px 0;
}
.chat-box .chat p{
  word-wrap: break-word;
  padding: 8px 16px;
  box-shadow: 0 0 32px rgb(0 0 0 / 8%),
              0rem 16px 16px -16px rgb(0 0 0 / 10%);
}
.chat-box .outgoing{
  display: flex;
}
.chat-box .outgoing .details{
  margin-left: auto;
  max-width: calc(100% - 130px);
}
.outgoing .details p{
  background: #333;
  color: #fff;
  border-radius: 18px 18px 0 18px;
}
.chat-box .incoming{
  display: flex;
  align-items: flex-end;
}
.chat-box .incoming img{
  height: 35px;
  width: 35px;
}
.chat-box .incoming .details{
  margin-right: auto;
  margin-left: 10px;
  max-width: calc(100% - 130px);
}
.incoming .details p{
  background: #9ddbe5;
  color:black;
  border-radius: 18px 18px 18px 0;
}
 
/* Responive media query */

@media screen and (max-width: 450px) {
  .form, .users{
    padding: 20px;
  }
  .form header{
    text-align: center;
  }
  .form form .name-details{
    flex-direction: column;
  }
  .form .name-details .field:first-child{
    margin-right: 0px;
  }
  .form .name-details .field:last-child{
    margin-left: 0px;
  }

  .users header img{
    height: 45px;
    width: 45px;
  }
  .users header .logout{
    padding: 6px 10px;
    font-size: 16px;
  }
  :is(.users, .users-list) .content .details{
    margin-left: 15px;
  }

  .users-list a{
    padding-right: 10px;
  }

  .chat-area header{
    padding: 15px 20px;
  }

  .chat-box .chat p{
    font-size: 15px;
  }
  .chat-box .outogoing .details{
    max-width: 230px;
  }
  .chat-box .incoming .details{
    max-width: 265px;
  }
  .incoming .details img{
    height: 30px;
    width: 30px;
  }
  .chat-area form{
    padding: 20px;
  }
  .chat-area form input{
    height: 40px;
    width: calc(100% - 48px);
  }
  .chat-area form button{
    width: 45px;
  }
}

.chat_message_area
{
	position: relative;
	width: 100%;
	height: auto;
	background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 3px;
}
 .chat-box .chat p{
    font-size: 15px;
  }
  .chat-box .outogoing .details{
    max-width: 230px;
  }
  .chat-box .incoming .details{
    max-width: 265px;
  }
  .incoming .details img{
    height: 30px;
    width: 30px;
  }
  .chat-area form{
    padding: 20px;
  }
  .chat-area form input{
    height: 40px;
    width: calc(100% - 48px);
  }
  .chat-area form button{
    width: 45px;
  }

  .chat-history-container img{
	width: 40px;
	height: 40px;
  }

  .username-history{
	font-weight: bold;
  }

  .message-history{
	font-size: 12px;
  }

  .time-history{
	font-size: 12px;
	text-align: right;
  }

  .highlighted{
	  color: white !important;
	  background-color: rgb(39, 154, 226,0.6);
  }

  .message_time{
	  display: block;
  }

</style>
</head>
<body>
<?php
require "includes/service_seeker-navigation.php";

?>
<div class="container-fluid" style="margin-top: 100px;">
   <div class="row">
      <div class="col-sm-12" >
         <!--  -->
         <div class="card shadow-sm mb-4" >
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary mx-auto">Message</h6>
            </div>
            <div class="card-body" style="background-color: burlywood;">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-5 ">
                        <!--  -->
                        <div class="card px-0" style="background-color: #edf7f7;">
						   <div id="chat_history" style="overflow-y: auto;">			

  							<!-- List of chats will appear here  -->

                           </div>
                       
                        <!--  -->
						 <div class="form-group ml-4" align="left">
                              <button type="button" name="send_message" 
                                class=" btn-sm btn btn-primary" data-toggle="modal" data-target="#sendmessagemodal">
								<i class="fas fa-pencil-alt"></i></button>
                           </div>
						</div>
						<!-- send message modals -->

<div class="modal fade" id="sendmessagemodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Compose message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <!--  -->
<form method="post">

  <div class="input-group mb-3">
  <input name="recipient" type="text" class="form-control" placeholder="Enter username" 
  aria-label="Recipient's username" aria-describedby="basic-addon2" required>
  <div class="input-group-append">
    <button onclick="compose();" class="btn btn-sm mx-auto  btn-primary" type="button">
	 Compose</a>
  </div>
</div>
<p class="errormessage" id="composeerror"></p>
</form>

	<!--  -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
						<!--  -->
                     </div>
                     <div class="col-sm-7">
                        <div class="wrapper">
                           <section id="chatarea"class="chat-area">
                              <header>
                                 <img  alt="" id="recipient_photo">
                                 <div class="details">
                                    <span id="recipient_username"></span>
                                 </div>
                              </header>
                              <div class="chat-box">

                              <!--  -->

								<!-- <div class="chat-box active">

											<div class="chat incoming">
												<div class="details">                        
													<p>
														hello nzkakskka 
														<span class="message_time"><small><i>August 25 4:00 am</i> </small></span>
													</p>
												</div>
											</div>

											<div class="chat outgoing">
												<div class="details">                                     
													<p>hello dani  am nabil                                                                        
														<span class="message_time"><small><i>August 25 4:00 am</i></small></span>
													</p>
												</div>
											</div>

											<div class="chat incoming">
												<div class="details">                        
													<p>
														hello nzkakskka 
														<span class="message_time"><small><i>August 25 4:00 am</i> </small></span>
													</p>
												</div>
											</div>

											<div class="chat outgoing">
												<div class="details">                                     
													<p>hello dani  am nabil                                                                        
														<span class="message_time"><small><i>August 25 4:00 am</i></small></span>
													</p>
												</div>
											</div>

											<div class="chat incoming">
												<div class="details">                        
													<p>
														hello nzkakskka 
														<span class="message_time"><small><i>August 25 4:00 am</i> </small></span>
													</p>
												</div>
											</div>

											<div class="chat outgoing">
												<div class="details">                                     
													<p>hello dani  am nabil                                                                        
														<span class="message_time"><small><i>August 25 4:00 am</i></small></span>
													</p>
												</div>
											</div>

											<div class="chat incoming">
												<div class="details">                        
													<p>
														hello nzkakskka 
														<span class="message_time"><small><i>August 25 4:00 am</i> </small></span>
													</p>
												</div>
											</div>

											<div class="chat outgoing">
												<div class="details">                                     
													<p>hello dani  am nabil                                                                        
														<span class="message_time"><small><i>August 25 4:00 am</i></small></span>
													</p>
												</div>
											</div>
								</div>
 -->
                              </div>
                              <form style="background-color:#a4c5ed;">
     <div class="input-group mb-3">
	<input name="recipient_message" type="text" onchange="getMessages();" hidden>
  <input name="message" oninput="checkEmpty(this);" type="text" class="form-control" placeholder="Enter message" 
  aria-label="Recipient's username" aria-describedby="basic-addon2" disabled>
  <div class="input-group-append">
    <button id="send_btn" class="btn btn-sm mx-auto btn-primary" onclick="send();"type="button" disabled>
		Send
	</button>
  </div>
</div>
</form>
                           </section>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </form>
   </div>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
    
	function getChatHistory(){
		
		$.ajax({
					type: "POST",
					url: "http://localhost/seralance/public/serviceseeker/chathistory",		
					data: {
						username: '<?php echo $_SESSION['username'];?>'
					},
					success: function(data) {
						$('#chat_history').html(data);					
					}
				});
	}
	
	$(document).ready(function(){
		getChatHistory();
	});

	setInterval(getChatHistory,2000);

	function getMessages(){

		let recipient = document.querySelector("input[name=recipient_message]").getAttribute("value");
		$.ajax({
					type: "POST",
					url: "http://localhost/seralance/public/serviceseeker/messages",		
					data: {
						username: '<?php echo $_SESSION['username'];?>',
						recipient: recipient
					},
					success: function(data) {
						$('#chat_history').html(data);					
					}
				});

	}

	function displayChat(event){

		document.getElementById("recipient_photo").setAttribute('src',event.childNodes[1].childNodes[1].getAttribute('src'));
		document.getElementById("recipient_username").innerHTML = event.childNodes[1].childNodes[3].childNodes[1].innerHTML;
		document.querySelector("input[name=message]").disabled = false;
		document.querySelector("input[name=recipient_message]").setAttribute("value",event.childNodes[1].childNodes[3].childNodes[1].innerHTML);

	}

	function compose(){
		
			$.ajax({
						type: "POST",
						url: "http://localhost/seralance/public/serviceseeker/compose",		
						data: {
							recipient: $("input[name=recipient]").val()
						},
						dataType: "json",
						success: function(data) {
							if(data.valid==false){
								$("#composeerror").html(data.error);
							}	
							else{
								
								
								$("input[name=recipient_message]").val(data.username);
								$("input[name=message]").removeAttr("disabled");
								$("#recipient_photo").attr("src","http://localhost/seralance/"+data.profilephoto);
								$("#recipient_username").html(data.username);
								$("input[name=recipient]").val("");
								$("#composeerror").html("");
								$("#sendmessagemodal").css("display","none");
								$(".modal-backdrop").css("display","none");
							}					
						}
					});
	}

	function checkEmpty(event){
		if(event.value==""){
			document.getElementById('send_btn').disabled = true;
		}
		else{
			document.getElementById('send_btn').disabled = false;
		}
	}
	function send(){
		console.log($("input[name=recipient_message]").val());
		$.ajax({
					type: "POST",
					url: "http://localhost/seralance/public/serviceseeker/send",		
					data: {
						recipient: $("input[name=recipient_message]").val(),
						message: $("input[name=message]").val()
					},
					success: function(data) {

							$("input[name=message]").val(data);			
						}
				});
}

</script>
<!--  -->
</div>
</div>
</div>
<!-- included files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</body>
</html> </div>
				</div>
			</div>
		</div>
		<!--  -->
	</div>
	</div>
	</div>
	<!-- included files -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	</body>

	</html>