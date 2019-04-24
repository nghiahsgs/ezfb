

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Ez Fb Top</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">

<link href="nghiahsgs.css" rel="stylesheet">
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />


   

  
  

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"><i class="fa fa-heart"></i>Ez Fb Top<i class="fa fa-heart"></i></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Trang chủ</span>
          </a>
        </li>

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="importNick">
          <a class="nav-link" href="importNick.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Import nick</span>
          </a>
        </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="BackUp">
          <a class="nav-link" href="importNick2.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Back Up</span>
          </a>
        </li>
        
        
        

       
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-heart"></i>
            <span class="nav-link-text">Bạn bè</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="addFrUid.php">Thêm bạn bè theo uid</a>
            </li>
            <li>
              <a href="addFrCmt.php">Thêm bạn bè theo cmt</a>
            </li>
            <li>
              <a href="frRequest.php">Lời mời kết bạn</a>
            </li>
            <li>
              <a href="http://nghiahsgs.com/locTuongTac/">Lọc tương tác</a>
            </li>
             <li>
              <a href="poke.php">Chọc</a>
            </li>
            
          </ul>
        </li>
       

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-heart"></i>
            <span class="nav-link-text">Nhóm</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents2">
            <li>
              <a href="joinGr.php">Tham gia nhóm</a>
            </li>
            <li>
              <a href="joinGr2.php">Tham gia nhóm (lười)</a>
            </li>
            
            
          </ul>
        </li>

        
 <!-- truy xuat thong tin cac nick : so luong ban be, name, ngay thang nam sinh, uid, sub, fr request--> 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="listNick.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">List Nick</span>
          </a>
        </li>

     
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents3" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-heart"></i>
            <span class="nav-link-text">Access Token</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents3">
            <li>
              <a href="getToken.php">Get Token</a>
            </li>
            <li>
              <a href="checkToken.php">Check Token</a>
            </li>
            
            <li>
              <a href="locTrung.php">Lọc Trùng</a>
            </li>
            <li>
              <a href="locTokenTuList.php">Lọc Token Từ List</a>
            </li>
             <li>
              <a href="tokenToCookie.php">Chuyển Token Sang Cookie</a>
            </li>
             <li>
              <a href="randomToken.php">Get random token</a>
            </li>
            
            
          </ul>
        </li>



      

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents4" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-heart"></i>
            <span class="nav-link-text">Tăng tương tác</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents4">
            <li>
              <a href="catdatthatim.php">Auto thả tim</a>
            </li>
            <li>
              <a href="listnickthatim.php">List nick thả tim</a>
            </li>
          
      
          </ul>
        </li>

         

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents5" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-heart"></i>
            <span class="nav-link-text">Auto đăng bài</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents5">
            <li>
              <a href="lenlichdangbai.php">Lên lịch đăng bài</a>
            </li>
            <li>
              <a href="listnickdangbai.php">List công việc</a>
            </li>
          
      
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="quetCmt.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Quét CMT live stream</span>
          </a>
        </li>



     <!--  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents9" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Quét UID</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents9">
            <li>
              <a href="banBeCuaUid.php">Bạn bè của uid</a>
            </li>
            <li>
              <a href="thanhVienNhom.php">Thành viên nhóm</a>
            </li>
             <li>
              <a href="quetBaiViet.php">Quét bài viết</a>
            </li>
            <li>
            <li>
              <a href="quetLikeBaiViet.php">Quét like bài viết</a>
            </li>
            <li>
              <li>
              <a href="quetCmtBaiViet.php">Quét cmt bài viết</a>
            </li>
            <li>
              <li>
              <a href="quetShareViet.php">Quét share bài viết</a>
            </li>
            
            
          </ul>
        </li> -->
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="buffLikebyToken.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Seeding page</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="spamCmt.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Spam Cmt Gr</span>
          </a>
        </li>

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="uptop.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Uptop Group</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="deleteAllPost.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Delete All Post</span>
          </a>
        </li>
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="importNick">
          <a class="nav-link" href="copyUid.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">My UID</span>
          </a>
        </li> -->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="importNick">
          <a class="nav-link" href="out.php">
            <i class="fa fa-fw fa-sign-out"></i>
            <span class="nav-link-text">Log Out</span>
          </a>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
       


      </ul>
    </div>
  </nav>