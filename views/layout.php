<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">PHP MVC Lite</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="aactive"><a href="/">Home</a></li>
            <?php if(@$_SESSION['admin'] == 'true'){ ?>
            <li><a href="/logout">Logout</a></li>
            <?php }else{ ?>
            <li><a href="/login">Login</a></li>
            <?php } ?>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
      <?php include(getcwd().DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$view.'.php'); ?>

      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript">
function previewTask(isEdit, origImg) {


  if(isEdit == true && $('#file').val() == "" && origImg != ""){

        $('#prvUser').html($('#user').val());
        $('#prvEmail').html($('#email').val());
        $('#prvDesc').html($('#description').val());
        $('#filename').val(origImg);
        $('#prvImage').attr("src", "/images/tasks/"+origImg);
        $('#previewBox').show();
        return false;
  }


  //if($('#file').val() == ""){

 //       $('#prvUser').html($('#user').val());
 //       $('#prvEmail').html($('#email').val());
 //       $('#prvDesc').html($('#description').val());


   //     return false;
 // }


    var fname = $('#filename').val();
    var imgclean = $('#file');



    data = new FormData();
    data.append('file', $('#file')[0].files[0]);

    var imgname  =  $('input[type=file]').val();

    var ext =  imgname.substr( (imgname.lastIndexOf('.') +1) );

    if(ext !== 'jpg' && ext !== 'jpeg' && ext !== 'png' && ext !== 'gif' && ext !== 'PNG' && ext !== 'JPG' && ext !== 'JPEG' && ext !== ''){

    imgclean.replaceWith( imgclean = imgclean.clone( true ) );
    alert('jpg gif png please!');
    return false;
  }

    $.ajax({
      url: "/tasks/ajaxImg", 
      type: "POST",
      data: data,
      enctype: 'multipart/form-data',
      processData: false, 
      contentType: false 
    }).done(function(data) {
        
        if(data == 'FILE_SIZE_ERROR' || data == 'FILE_TYPE_ERROR' || data == 'FILE_PROCESSING_ERROR' || data == 'FILE_INVALID'){

      imgclean.replaceWith( imgclean = imgclean.clone( true ) );
          alert('server error');
          return false;

    }

        $('#prvUser').html($('#user').val());
        $('#prvEmail').html($('#email').val());
        $('#prvDesc').html($('#description').val());
        if(data != ''){
          $('#prvImage').attr("src", "/images/tasks/"+data);
          $('#image').val(data);
        }
        



     
        $('#filename').val(data);

        imgclean.replaceWith( imgclean = imgclean.clone( true ) );
       

    });

    $('#previewBox').show();
    return false;




}
</script>
  </body>
</html>
