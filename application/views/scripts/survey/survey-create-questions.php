<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <title>Survey: ACILD </title>

  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">
  <link rel="stylesheet" href="./css/font-awesome.min.css">
  <link rel="stylesheet" href="./js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="./js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.css">
  <link rel="stylesheet" href="./js/plugins/magnific/magnific-popup.css">

  <!-- App CSS -->
  <link rel="stylesheet" href="./css/target-admin.css">
  <link rel="stylesheet" href="./css/custom.css">

  <!-- Page CSS -->
  <link rel="stylesheet" href="./css/demos/ui-notifications.css">


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>

<body>
<?php include 'navigation.php'; ?>


<div class="container">

  <div class="content">

    <div class="content-container">

      

      <div class="content-header">
        <h2 class="content-header-title">Create Survey</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li><a href="/survey-create.php">Create Survey</a></li>
          <li class="active">Survey Questions</li>
        </ol>
      </div> <!-- /.content-header -->

      <div class="row">
         <div class="col-md-12">
         	<div>
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                     <h4>SURVEY TITLE</h4><h5>Social Audit Questionnaire</h5>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="question" class="col-sm-2 control-label">Question</label>
                    <div class="col-sm-6 col-md-6">
                      <input type="text" class="form-control" id="question" placeholder="What is your knowledge of the _______ Project?">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputch1" class="col-sm-2 control-label">1.</label>
                    <div class="col-sm-6 col-md-6">
                      <input type="text" class="form-control" id="ch1" placeholder="poor">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputch2" class="col-sm-2 control-label">2.</label>
                    <div class="col-sm-6 col-md-6">
                      <input type="text" class="form-control" id="ch2" placeholder="Fair">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputch3" class="col-sm-2 control-label">3.</label>
                    <div class="col-sm-6 col-md-6">
                      <input type="text" class="form-control" id="ch3" placeholder="Good">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputch4" class="col-sm-2 control-label">4.</label>
                    <div class="col-sm-6 col-md-6">
                      <input type="text" class="form-control" id="ch4" placeholder="Very Good">
                    </div>
                  </div> 
                  <div class="form-group">
                    <label for="inputch5" class="col-sm-2 control-label">5.</label>
                    <div class="col-sm-6 col-md-6">
                      <input type="text" class="form-control" id="ch5" placeholder="Excellent">
                    </div>
                  </div>               
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <a href="/survey-create-questions.php" class="btn btn-success">Submit &amp; Create Question</a>
           			  <a href="/survey-contact-list.php" class="btn btn-success">Finish &amp; Select Contacts</a>
                    </div>
                  </div>
              </form>
            </div>
         </div>
       </div><!--/.row-->
       <div class="row">
         <div class="col-md-12">
         <h4 class="content-header-title">Sample Questions</h4>
       	   <h4>What is your average monthly income</h4>
           <ul class="choices">
              <li>0 - 10000</li>
              <li>10000 - 20000</li>
              <li>20000 - 50000</li>
              <li>Above 50000</li>
           </ul>
           <h4>Between Which month is your income high</h4>
           <ul class="choices">
              <li>January - February</li>
              <li>March - May</li>
              <li>June - August</li>
              <li>September - December</li>
           </ul>
           <br/>
           
         </div>
       </div><!-- /.row-->

    </div> <!-- /.content-container -->
     
  </div> <!-- /.content -->

</div> <!-- /.container -->
<?php include 'footer.php'; ?>

  <script src="./js/libs/jquery-1.10.1.min.js"></script>
  <script src="./js/libs/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="./js/libs/bootstrap.min.js"></script>

  <!--[if lt IE 9]>
  <script src="./js/libs/excanvas.compiled.js"></script>
  <![endif]-->
  
  <!-- Plugin JS -->
  <script src="./js/plugins/magnific/jquery.magnific-popup.min.js"></script>
  <script src="./js/plugins/howl/howl.js"></script>

  <!-- App JS -->
  <script src="./js/target-admin.js"></script>
  
  <!-- Plugin JS -->
  <script src="./js/demos/ui-notifications.js"></script>

 
</body>
</html>
