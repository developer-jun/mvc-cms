<?php include_once 'includes/header.php'; ?>

    <div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="main-col">
					<div class="block">
						<h1 class="pull-left">Register</h1>
						<h4 class="pull-right">A Simple Forum</h4>
						<div class="clearfix"></div>
						<hr>
						<form role="form" enctype="multipart/form-data" method="post" action="register.php">
							<div class="form-group">
								<label>Name*</label> <input type="text" class="form-control"
							name="name" placeholder="Enter Your Name">
							</div>
							<div class="form-group">
							<label>Email Address*</label> <input type="email" class="form-control"
							name="email" placeholder="Enter Your Email Address">
							</div>
						<div class="form-group">
					        <label>Choose Username*</label> <input type="text"
							    class="form-control" name="username" placeholder="Create A Username">
						</div>
					<div class="form-group">
					    <label>Password*</label> <input type="password" class="form-control"
				            name="password" placeholder="Enter A Password">
				    </div>
				    <div class="form-group">
                        <label>Confirm Password*</label> <input type="password"
                            class="form-control" name="password2"
                            placeholder="Enter Password Again">
                            </div>
                                <div class="form-group">
                                    <label>Upload Avatar</label>
                                <input type="file" name="avatar">
                                <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                    <label>About Me</label>
                                    <textarea id="about" rows="6" cols="80" class="form-control"
                                    name="about" placeholder="Tell us about yourself (Optional)"></textarea>
                            </div>
                            <input name="register" type="submit" class="color btn btn-default" value="Register" />
                        </form>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div id="sidebar">
					<div class="block">
					
					
					<div class="block">
					<h3>Categories</h3>
					<div class="list-group">
						<a href="#" class="list-group-item active">All Topics <span class="color badge pull-right">14</span></a> 
						<a href="#" class="list-group-item">Design<span class="color badge pull-right">4</span></a>
						<a href="#" class="list-group-item">Development<span class="color badge pull-right">9</span></a>
						<a href="#" class="list-group-item">Business & Marketing <span class="color badge pull-right">12</span></a>
						<a href="#" class="list-group-item">Search Engines<span class="color badge pull-right">7</span></a>
						<a href="#" class="list-group-item">Cloud & Hosting <span class="color badge pull-right">3</span></a>
					</div>
				</div>	
				</div>
			</div>
		</div>
    </div><!-- /.container -->

<?php include_once 'includes/footer.php'; ?>
    