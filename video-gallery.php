<!DOCTYPE html>
<html lang="en">
   <head>
      <!--====== Required meta tags ======-->
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!--====== Title ======-->
      <title>MIS Website</title>
      
      <?php include 'inc/head.php'; ?>
      <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
      
     <style>
          .dropdown:hover>.dropdown-menu {
            display: block;
            }

            .dropdown>.dropdown-toggle:active {
              /*Without this, clicking will make it sticky*/
                pointer-events: none;
            }
            .theme-header .dropdown-item{    padding: .15rem .5rem}
            .theme-header .dropdown-menu{ padding: 0px; }
            .dropdown-menu{margin: .12rem 0 0; font-size: .9rem;}
            .modal {
  background-color: rgba(0,0,0,0.4);
}
.ekko-lightbox .modal-header {
    border-bottom: 1px solid #505050;
    padding: 12px 16px 6px 16px;
    padding: 0px;
    right: 3px;
    top: 10px;
    background: #000;
    position: absolute;
    z-index: 999;
    border-radius: 0px;
    /* line-height: 0; */
    /* height: 10px; */
    border-radius: 100%;
    height: 25px;
    width: 25px;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
}
   
  
.ekko-lightbox   .modal-title {
    color: #ccc;
   display: none;
    margin: 0;
  }
 .ekko-lightbox  .modal-header .close{ margin: 0px; padding: 0px; }
 .ekko-lightbox  .modal-header .close:hover{ color: #fff; }
 .ekko-lightbox  .close {
       font-size: 20px;
    font-weight: normal;
    font-size: 1.5rem;
    opacity: 1.0;
    color: #ccc;
    text-shadow: none;
    outline: none;
    margin: 0px;
        
  }

.ekko-lightbox .modal-content {  
  border-radius:0;
  border: 0;
  background-color: #323232;
}
.video{overflow: hidden; }
.video img{transition: 0.3s; }
.video:hover img {transform: scale(1.1);}
.video img{transition: 0.3s; }
.img-responsive { width: 100%; }
.btn-play{ left:0; right:0; top:0; bottom: 0; font-size:2.5rem; color: #f00; z-index: 99; }
.ekko-lightbox .modal-body{ padding: 0px; }
.vid { position: relative; padding-bottom:60px; }

      </style>
      
   </head>
   <body class="">
     
      <!--====== Start Header Section ======-->
      <?php include 'inc/header.php'; ?>
      <!--====== End Header Section ======-->
      
        <!--====== Start Page-banner section ======-->
        <section class="page-banner bg_cover position-relative z-1">
            <!-- <div class="shape shape-one scene" style="top:0px;"><span data-depth="1"><img src="assets/images/shape/shape-1.png" alt=""></span></div>

            <div class="shape shape-three scene"><span data-depth="3"><img src="assets/images/shape/shape-3.png" alt=""></span></div>
            <div class="shape shape-four scene"><span data-depth="4"><img src="assets/images/shape/shape-2.png" alt=""></span></div> -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="page-title text-center">
                            <h1>Videos</h1>
                            <!-- <ul class="breadcrumbs-link">
                                <li><a href="">Home</a></li>
                                <li class="active">About Us</li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End Page-banner section ======-->
      <!--====== Start Blog Section ======-->
      <section class=" pt-50 pb-30">
         <div class="container">
            
            <div class="row videos">
              
                 <div class="col-sm-6 col-md-4 mb-30">
                          <div class="card border rounded px-2 py-2 shadow ">
                            <a href="https://www.youtube.com/watch?v=-f39s8alRy0&t=309s"
                              
                              data-width="768"
                              data-toggle="lightbox" data-gallery="youtubevideos" class="video position-relative d-block">
                             <button type="button" class="btn btn-play position-absolute">
                               <i class="fa-brands fa-youtube"></i>
                             </button>
                             <img src="assets/images/yt1.jpg" class="img-responsive">
                           </a>
                         </div>
                      </div>
                      <div class="col-sm-6 col-md-4 mb-30">
                          <div class="card border rounded px-2 py-2 shadow">
                          <a href="https://www.youtube.com/watch?v=_lTASz6zDqM&t=96s" 
                            
                            data-width="768"
                            data-toggle="lightbox" data-gallery="youtubevideos" class="video position-relative d-block">
                           <button type="button" class="btn btn-play position-absolute">
                             <i class="fa-brands fa-youtube"></i>
                           </button>
                           <img src="assets/images/yt2.jpg" class="img-responsive">
                        </a>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-4 mb-30">
                          <div class="card border rounded px-2 py-2 shadow">
                              <a href="https://www.youtube.com/watch?v=fpmo37-Qpfk"
                               
                                data-width="768"
                                data-toggle="lightbox" data-gallery="youtubevideos" class="video position-relative d-block">
                               <button type="button" class="btn btn-play position-absolute">
                                  <i class="fa-brands fa-youtube"></i>
                               </button>
                               <img src="assets/images/yt3.jpg" class="img-responsive">
                            </a>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-4 mb-30">
                          <div class="card border rounded px-2 py-2 shadow">
                          <a href="https://www.youtube.com/watch?v=M56gDssDbPU"
                           
                            data-width="768"
                            data-toggle="lightbox" data-gallery="youtubevideos" class="video position-relative d-block">
                           <button type="button" class="btn btn-play position-absolute">
                              <i class="fa-brands fa-youtube"></i>
                           </button>
                           <img src="assets/images/yt4.jpg" class="img-responsive">
                         </a>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-4 mb-30 ">
                          <div class="card border rounded px-2 py-2 shadow">
                          <a href="https://www.youtube.com/watch?v=5eCef2-oC50" 
                           
                            data-width="768"
                            data-toggle="lightbox" data-gallery="youtubevideos" class="video position-relative d-block">
                           <button type="button" class="btn btn-play position-absolute">
                              <i class="fa-brands fa-youtube"></i>
                           </button>
                           <img src="assets/images/yt5.jpg" class="img-responsive">
                        </a>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-4 mb-30">
                          <div class="position-relative">
                               <div class="card border rounded px-2 py-2 shadow">
                              <a href="https://www.youtube.com/watch?v=QsQq1av9bOI"
                               
                                data-width="768"
                                data-toggle="lightbox" data-gallery="youtubevideos" class="video position-relative d-block">
                               <button type="button" class="btn btn-play position-absolute">
                                  <i class="fa-brands fa-youtube"></i>
                               </button>
                               <img src="assets/images/yt6.jpg" class="img-responsive">
                            </a>
                               </div>
                          </div>
                      </div>
                
                 
                
                  
                      
                    
                
               
            </div>
         </div>
      </section>
      <!--====== End Blog Section ======-->
       
        
      <!--====== Start Footer ======-->
      <?php include 'inc/footer.php'; ?>
      <!--====== End Footer ======-->
   </body>
</html>