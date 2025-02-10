<div class="col-lg-4">
	<div class="card-group d-block d-md-flex row">
		<div class="card col-md-7 p-4 mb-0">
			<form class="card-body" method="post">
				<h1>Login</h1>
				<p class="text-body-secondary">Sign In to your account</p>
                <?php if (!empty($errors)): ?>
                <div class="alert alert-danger small" role="alert">
                    <ul class="m-0">
                    <?php foreach ($errors as $message): ?>
                        <li><?php echo $message ?></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
				<div class="input-group mb-3">
                    <span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg>
                    </span>
					<input class="form-control" type="text" name="username" placeholder="Username">
				</div>
				<div class="input-group mb-4">
                    <span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                         </svg>
                    </span>
					<input class="form-control" name="password" type="password" placeholder="Password">
				</div>
				<div class="row">
					<div class="col-6">
						<button class="btn btn-primary px-4" type="submit">Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>