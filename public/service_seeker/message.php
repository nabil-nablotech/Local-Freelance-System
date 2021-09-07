<html>
<head>
   <link rel="stylesheet" href="chat.css">
   <style>
 a div:hover{

   background-color: #e6ede8;
 }

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
  overflow-y: auto;
  padding: 10px 10px 10px 10px;
  background: #f7f7f7;
  box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
              inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
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
  .chat-box{
    min-height: 400px;
    padding: 10px 15px 15px 20px;
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
							   <!--  -->
<a href="#" onclick="displayChat()" style="color: black;text-decoration:none">
<div>

<img src="../Image/profile.jpg" alt="" style="width: 
4vw; height:4vw;
">

<span class="ml-4">mulugeta adamu</span>
  <span class=" ml-5">7:30</span>
  <div class="mx-auto">
   <p class="ml-5"> some message content </p>
  </div>
</div>
</a>
<hr>
							   <!--  -->

							   <!--  -->

                           </div>
                       
                        <!--  -->
						 <div class="form-group ml-4" align="left">
                              <button type="button" name="send_message" 
                                class=" btn-sm btn btn-primary" data-toggle="modal" data-target="#sendmessagemodal">
								<i class="fas fa-pencil-alt"></i></button>
                           </div>
						</div>
						<!-- send message modals -->

<div class="modal fade " id="sendmessagemodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
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
  <input name="recipient"type="text" class="form-control" placeholder="Enter username" 
  aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button name="compose_btn"class="btn btn-sm mx-auto  btn-primary" type="submit">
	 Compose</a>
  </div>
</div>
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
                        <div class="wrapper ">
                           <section id="chatarea"class="chat-area">
                              <header>
                                 <img src="../Image/profile.jpg" alt="">
                                 <div class="details">
                                    <span>mulugeta adamu</span>
                                 </div>
                              </header>
                              <div class="chat-box ">

                              <!--  -->

<div class="chat-box active">
          <div class="chat incoming">

                    <div class="details">
                        
                                    <p>hello nabil am dani izkakskka 
                                       <span ><small><i>August 25  <span>4:00 am</span></i> </small></span></p>
                                </div>
                                </div>
                                <div class="chat outgoing">

                                <div class="details">
                                     
                                    <p>hello dani  am nabil <br>
                                                                         
                                    <span ><small><i>August 25  <span>4:00 am</span></i>
                                  </small></span>
</p>
                                </div>
                                </div></div>
                              </div>
                              <form action="#" class="typing-area " style="background-color:#a4c5ed
;">
     <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="enter message" 
  aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <a href="#" class="btn btn-sm mx-auto  btn-primary" type="button">
		send</a>
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

<!-- <script>
    let displayChat = () => {
        let ele = document.getElementById('chatarea');
        ele.innerHTML += 'Hello, I am Arun';
    }
</script> -->
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