<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <title>Survey: Sent</title>

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
        <h2 class="content-header-title">Survey Responses</h2>
        <ol class="breadcrumb">
          <li><a href="./index.html">Home</a></li>
          <li class="active">Survey Responses</li>
        </ol>
      </div> <!-- /.content-header -->

      <div class="row">

        <div class="col-md-12">

          <div class="portlet">

            <div class="portlet-header">

              <h3>
                <i class="fa fa-suitcase"></i>
                Responses
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
                      <th data-filterable="true" data-sortable="true" data-direction="desc">SURVEY TITLE</th>
                      <th data-filterable="true" class="hidden-xs hidden-sm">RESPONSES</th>
                      <th data-filterable="true" class="hidden-xs hidden-sm">DATE</th>
                      <th data-filterable="false" class="text-center hidden-xs hidden-sm">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>59</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>200</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>45</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>73</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>28</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>56</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>98</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>121</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>30</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>83</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>150</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr >
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>50</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>264</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>68</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>10</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>107</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>47</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>85</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>70</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="checkbox-column">
                        <input type="checkbox" class="icheck-input">
                      </td>
                      <td>Social Audit Questionnaire</td>
                      <td>29</td>
                      <td>9/11/2014</td>
                      <td class="text-center">
                      <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#surveyResponce" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
               <a href="#" class="btn btn-success" data-toggle="modal" data-target="#draftSMS">Send SMS</a>
               
              </div> <!-- /.table-responsive -->
              

            </div> <!-- /.portlet-content -->

          </div> <!-- /.portlet -->

        

        </div> <!-- /.col -->

      </div> <!-- /.row -->
      
    </div> <!-- /.content-container -->
    <div class="modal fade" id="surveyResponce" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">Survey</h4>
			    </div>
			    <div class="modal-body">
			        <p>Social Audit Questionnaire</p>
                    <span><h5>Responses:</h5><p>89</p></span>
			    </div>
			 	<div class="modal-footer">
			        <a class="btn btn-success" data-dismiss="modal">CANCEL</a>
			        <a href="/survey-responses.php" class="btn btn-warning">DELETE</a>
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