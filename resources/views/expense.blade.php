<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Makboss </title>
	@include('partials.header_files')
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        	@include('partials.header')
        	@include('partials.side_menu')
        </nav>
		<div id="page-wrapper">
			<div class="header"> 
				<ol class="breadcrumb">
					<li><a href="home">Home</a></li>
					<li class="active"> Expense</li>
				</ol> 
			</div>
			<div class="row">
				<div class="col-lg-10">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Expense
						</div>
					</div>
					<div class="panel panel-default" style="margin-top:-15px;">
						<div class="panel-body">
							<ul class="nav nav-pills">
								<li class="active"><a href="#create" data-toggle="tab" aria-expanded="true">Create Expense</a> </li>
								<li class=""><a href="#history" data-toggle="tab" aria-expanded="true">Expense History</a> </li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="create"><br>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Date: <span class="text-danger">*</span></label><br>
											<input type="text" class="datepicker" name="date" required>
										</div>
										<div class="form-group">
											<label> Amount: <span class="text-danger">*</span></label>
											<input type="text" class="form-control" name=" " placeholder="enter amount"  required>
										</div>
										<div class="form-group">
											<label>Photo</label>
											<input type="file">
										</div>
										<div class="form-group">
											<label>	Notes:</label> 
											<textarea class="form-control" style="height:100px;width:250px;"></textarea>
										</div>
										<div class="span3">
											<input class="btn btn-primary btn-sm" type="submit" value="create">
											<a class="btn btn-default btn-sm" href="home">cancel</a>
										</div>
									</div>  
								</div>
								<div class="tab-pane fade " id="history"><br>
									<div class="col-lg-12">
										<div class="col-lg-3">
											<div class="form-group">
												<label> Created by:</label>
												<select class="form-control">
            										<option selected>All</option>
            										<option>Only me</option>
            										<option>Usernames</option>
            									</select>
											</div>
										</div>
										<div class="col-lg-8">
											<div class="form-group" style="margin-top:25px;">
                                                <label>From:
                                                	<input type="text" class="datepicker" name="date" required="">
												</label>
                                                <label>To:
                                                	<input type="text" class="datepicker" name="date" required="">
												</label>
                                                <a class="btn btn-primary btn-sm">view</a>
                                            </div>
										</div>
									</div>
									<div class="row">  
										<div class="col-lg-12">
											<div class="table-responsive">
												<table class="table ">
													<thead>
														<tr>
															<th>Sl.no</th>
															<th>Created by</th>
															<th>Date</th> 
															<th>Amount</th>
															<th>Photo</th>
															<th>Notes</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td><a class="btn btn-default btn-xs">view</a></td>
															<td></td>
															<td><a href="edit_expense" class="btn btn-primary btn-xs">edit</a></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-lg-4">
    										<div class="panel panel-primary">
    											<div class="panel-heading">
    												Total Expense : 123455
    											</div>
    										</div>
										</div>
									</div>
									<button type="button" class="btn btn-default btn-xs" >Export excel</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	   </div>
    @include('partials.footer_scripts')
</body>
</html>	