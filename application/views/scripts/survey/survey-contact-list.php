<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <title>Survey Contact List - ACILD</title>

  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">
  <link rel="stylesheet" href="./css/font-awesome.min.css">
  <link rel="stylesheet" href="./js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="./js/plugins/icheck/skins/minimal/blue.css">

  <!-- App CSS -->
  <link rel="stylesheet" href="./css/target-admin.css">
  <link rel="stylesheet" href="./css/custom.css">


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
        <h2 class="content-header-title">Survey Contact List</h2>
        <ol class="breadcrumb">
          <li><a href="/dashboard.php">Home</a></li>
          <li class="active">Survey Contact List</li>
        </ol>
      </div> <!-- /.content-header -->

      <div class="row">

        <div class="col-md-12">

          <div class="portlet">

            <div class="portlet-header">

              <h3>
                <i class="fa fa-users"></i>
                Contact List
              </h3>

            </div> <!-- /.portlet-header -->

            <div class="portlet-content">           

              <div class="table-responsive">

              <table 
                class="table table-striped table-bordered table-hover table-highlight table-checkable" 
                data-provide="datatable" 
                data-display-rows="10"
                data-info="true"
                data-search="true"
                data-length-change="true"
                data-paginate="true"
              >
                  <thead>
                    <tr>
                      <th class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </th>
                      <th data-filterable="true" data-sortable="true" data-direction="desc">Name</th>
                      <th data-filterable="true" data-sortable="true" data-direction="desc">ID Number</th>
                      <th data-filterable="true" data-sortable="true" data-direction="desc">Gender</th>
                      <th data-direction="asc" data-filterable="true" data-sortable="true">Phone Number</th>
                      <th data-filterable="true" data-sortable="true" data-direction="desc">Language</th>
                      <th data-filterable="true" data-sortable="true" data-direction="desc">Date Registered</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Fredrick Kamau</td>
                      <td>28018279</td>
                      <td>Male</td>
                      <td>0723123321</td>
                      <td>English</td>
                      <td>2/3/2014</td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Winny Njau</td>
                      <td>21011279</td>
                      <td>Female</td>
                      <td>0723447563</td>
                      <td>Kiswahili</td>
                      <td>11/1/2014</td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Mary Chebet</td>
                      <td>23947279</td>
                      <td>Female</td>
                      <td>0721927485</td>
                      <td>English</td>
                      <td>4/3/2014</td>                      
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Juma Otieno</td>
                      <td>21092879</td>
                      <td>Male</td>
                      <td>0719862030</td>
                      <td>Kiswahili</td>
                      <td>30/3/2014</td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Joseph Mohammed</td>
                      <td>10928279</td>
                      <td>Male</td>
                      <td>0754163970</td>
                      <td>English</td>
                      <td>5/2/2014</td>
                    </tr>
                    <tr class="">
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Lillian Mutisia</td>
                      <td>20931279</td>
                      <td>Female</td>
                      <td>0720102943</td>
                      <td>Kiswahili</td>
                      <td>1/1/2014</td>
                    </tr>
                    <tr class="">
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Musa Jumal</td>
                      <td>34218279</td>
                      <td>Male</td>
                      <td>0770943423</td>
                      <td>English</td>
                      <td>4/3/2014</td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Gecko Smith</td>
                      <td>29361279</td>
                      <td>Female</td>
                      <td>0710986753</td>
                      <td>Kiswahili</td>
                      <td>6/2/2014</td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Hillary Muthee</td>
                      <td>30128279</td>
                      <td>Male</td>
                      <td>0729764536</td>
                      <td>English</td>
                      <td>6/2/2014</td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Cyntha Atieno</td>
                      <td>22341279</td>
                      <td>Female</td>
                      <td>0723748392</td>
                      <td>Kiswahili</td>
                      <td>2/1/2013</td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Jane Njeri</td>
                      <td>10328279</td>
                      <td>Female</td>
                      <td>0754123321</td>
                      <td>English</td>
                      <td>3/3/2013</td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Walter Sankuni</td>
                      <td>10918279</td>
                      <td>Male</td>
                      <td>0710984321</td>
                      <td>Kiswahili</td>
                      <td>2/12/2013</td>
                    </tr>
                    <tr>
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Presto Onesmas</td>
                      <td>32190279</td>
                      <td>Male</td>
                      <td>0734763542</td>
                      <td>English</td>
                      <td>4/8/2013</td>
                    </tr>
                    <tr>
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Moses Faulu</td>
                      <td>30129279</td>
                      <td>Male</td>
                      <td>0772872673</td>
                      <td>Kiswahili</td>
                      <td>9/10/2013</td>
                    </tr>
                    <tr>
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Cosmas Koech</td>
                      <td>10208279</td>
                      <td>Male</td>
                      <td>0733859302</td>
                      <td>English</td>
                      <td>6/2/2013</td>
                    </tr>
                    <tr>
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Catherine Nkanai</td>
                      <td>10283279</td>
                      <td>Female</td>
                      <td>0720482745</td>
                      <td>Kiswahili</td>
                      <td>3/2/2013</td>
                    </tr>
                    <tr class="">
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Ken Wamae</td>
                      <td>30218277</td>
                      <td>Male</td>
                      <td>0739217423</td>
                      <td>English</td>
                      <td>6/7/2013</td>
                    </tr>
                    <tr class="">
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Faith Twala</td>
                      <td>20318223</td>
                      <td>Female</td>
                      <td>0772398234</td>
                      <td>Kiswahili</td>
                      <td>1/8/2013</td>
                    </tr>
                    <tr class="">
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Dan Oloo</td>
                      <td>30218421</td>
                      <td>Male</td>
                      <td>0724985764</td>
                      <td>English</td>
                      <td>3/1/2013</td>
                    </tr>
                    <tr class="">
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>John Kamau</td>
                      <td>30289279</td>
                      <td>Male</td>
                      <td>073298621</td>
                      <td>Kiswahili</td>
                      <td>4/2/2014</td>
                    </tr>
                  </tbody>
               </table>
               <a href="#" class="btn btn-success" data-toggle="modal" data-target="#sendSurvey">Send Survey</a>
               
              </div> <!-- /.table-responsive -->
              

            </div> <!-- /.portlet-content -->

          </div> <!-- /.portlet -->

        

        </div> <!-- /.col -->

      </div> <!-- /.row -->
      
    </div> <!-- /.content-container -->
    <div class="modal fade" id="sendSurvey" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">Survey Title: </h4>
			    </div>
			    <div class="modal-body">
			        <p>Social Audit Questionnaire</p>
			    </div>
			 	<div class="modal-footer">
			        <a href="/survey-create-questions.php" class="btn btn-success" data-dismiss="modal">CANCEL</a>
			        <a href="/dashboard.php" class="btn btn-warning">SEND SURVEY</a>
			     </div>
			 </div>
		</div>
	</div>

      
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
  <script src="./js/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="./js/plugins/datatables/DT_bootstrap.js"></script>
  <script src="./js/plugins/tableCheckable/jquery.tableCheckable.js"></script>
  <script src="./js/plugins/icheck/jquery.icheck.min.js"></script>

  <!-- App JS -->
  <script src="./js/target-admin.js"></script>
  


  
</body>
</html>
