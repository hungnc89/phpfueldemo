<?php if (!empty($create_customer_success)): ?>
<div class="toast-container position-fixed top-0 end-0 p-3">
	<div id="toast-create-user-success" class="toast text-bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-body">
			Create customer success!
		</div>
	</div>
</div>
<?php endif; ?>

<div class="card">
	<div class="card-header">
		Customer List
	</div>
	<div class="card-body">
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Email</th>
				<th scope="col">Phone</th>
				<th scope="col">Actions</th>
			</tr>
			</thead>
			<tbody>
			<?php
			/** @var array $list_customers */
			foreach ($list_customers as $customer): ?>
				<tr>
					<th scope="row"><?php echo $customer->id; ?></th>
					<td><?php echo $customer->name; ?></td>
					<td><?php echo $customer->email; ?></td>
					<td><?php echo $customer->phone; ?></td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-primary btn-customer-edit" data-url="<?php echo Uri::create('/customer/edit',[], ['id' => $customer->id]); ?>">
								<i class="icon icon-sm cil-zoom"></i>
							</button>
							<button type="button" class="btn btn-danger" data-url="<?php echo Uri::create('/customer/edit/'.$customer->id); ?>">
								<i class="icon icon-sm cil-trash"></i>
							</button>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">

	</div>
</div>