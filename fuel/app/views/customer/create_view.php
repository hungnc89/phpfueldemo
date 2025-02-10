<form class="card" method="post">
	<div class="card-header">
		Customer Create
	</div>
	<div class="card-body">
		<div class="mb-3 row">
			<label class="col-sm-2 col-form-label">Customer name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control<?php if (!empty($errors['customer_name'])) echo" is-invalid" ?>" name="customer_name" value="<?php echo $customer_name; ?>" required>
				<?php if (!empty($errors['customer_name'])): ?>
					<div class="invalid-feedback"><?php  echo $errors['customer_name'] ?></div>
				<?php endif; ?>
			</div>
		</div>
		<div class="mb-3 row">
			<label class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
				<input type="text" class="form-control<?php if (!empty($errors['customer_email'])) echo" is-invalid" ?>" name="customer_email"  value="<?php echo $customer_email; ?>" required>
				<?php if (!empty($errors['customer_email'])): ?>
					<div class="invalid-feedback"><?php  echo $errors['customer_email'] ?></div>
				<?php endif; ?>
			</div>
		</div>
		<div class="mb-3 row">
			<label class="col-sm-2 col-form-label">Address</label>
			<div class="col-sm-10">
				<input type="text" class="form-control<?php if (!empty($errors['customer_address'])) echo" is-invalid" ?>" name="customer_address" value="<?php echo $customer_address; ?>" required>
				<?php if (!empty($errors['customer_address'])): ?>
					<div class="invalid-feedback"><?php  echo $errors['customer_address'] ?></div>
				<?php endif; ?>
			</div>
		</div>
		<div class="mb-3 row">
			<label class="col-sm-2 col-form-label">Phone</label>
			<div class="col-sm-10">
				<input type="text" class="form-control<?php if (!empty($errors['customer_phone'])) echo" is-invalid" ?>" name="customer_phone" value="<?php echo $customer_phone; ?>" required>
				<?php if (!empty($errors['customer_phone'])): ?>
					<div class="invalid-feedback"><?php  echo $errors['customer_phone'] ?></div>
				<?php endif; ?>
			</div>
		</div>
		<div class="mb-3 row">
			<label class="col-sm-2 col-form-label">Sex</label>
			<div class="col-sm-10">
				<select class="form-select" name="customer_sex">
					<option value="1"<?php if ($customer_sex == '1'): ?> selected<?php endif ?>>Male</option>
					<option value="0"<?php if ($customer_sex == '0'): ?> selected<?php endif ?>>Female</option>
				</select>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<button type="submit" class="btn btn-sm btn-primary float-end">Submit</button>
	</div>
</form>