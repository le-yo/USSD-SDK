<?php require_once('header.php'); ?>
	    <div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<div class="filter-wrapper">
						<h2>Filter content</h2>
						<form class="form-horizontal" role="form" action="/search-results.php" method="post">
						  <div class="form-group">
						    <div class="col-xs-12 col-sm-12">
						      <input type="text" class="form-control" id="inputEmail3" placeholder="Enter keywords to search ">
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <div class="col-xs-12 col-sm-12">
						      <select class="form-control">
								  <option>(Select Category)</option>
								  <option>Topic [ ]</option>
								  <option>Topic [ ]</option>
								  <option>Topic [ ]</option>
								  <option>Topic [ ]</option>
								  <option>Topic [ ]</option>
								</select>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-xs-12 col-sm-12">
							     <select class="form-control">
									  <option>(Select Week)</option>
									  <option>Week [ ]</option>
									  <option>Week [ ]</option>
									  <option>Week [ ]</option>
									  <option>Week [ ]</option>
									  <option>Week [ ]</option>
									</select>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-xs-12 col-sm-12">
						     <p class="center nomargin"> <button type="submit" class="btn btn-default long-btn"><span class="glyphicon glyphicon-search"></span> Search</button></p>
						    </div>
						  </div>
						</form>
					</div>
				</div>
			</div>
	    </div> <!-- /container -->
  </div> <!-- /wrap -->
  <?php require_once('footer.php'); ?>
   