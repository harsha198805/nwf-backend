<!-- Row start -->
<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="row gutters content-center">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
											<h4>Products</h4>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
											<div class="btn-alignment">
												<button class="btn btn-info add-btn float-right" data-toggle="modal" data-target=".product-add">
													<i class="icon-plus"></i> Add
												</button>
											</div>
											<div class="custom-search">
												<form method="GET" action="">
													<input type="text" name="search" class="search-query" placeholder="Search Here..." value="">
													<button type="submit" class="btn-light"><i class="icon-search1"></i></button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Row end -->

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="table-container">
								<div class="table-responsive">
									<table class="table custom-table m-0">
										<thead>
											<tr>
												<th>Image</th>
												<th>Name</th>
												<th>Created Date</th>
												<th>Created By</th>
												<th>Status</th>
												<th>Amount (Rs)</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><img src="img/product/1.jpg" class="pro-img"></td>
												<td>Chicken Pizza</td>
												<td>2025-01-01 08:00PM</td>
												<td>Admin</td>
												<td>
													<div class="custom-control custom-switch">
														<input type="checkbox" class="custom-control-input" checked id="customSwitch1">
														<label class="custom-control-label" for="customSwitch1"></label>
													</div>
												</td>
												<td>
													<b class="new-price">2000.00</b>
													<b class="old-price">1500.00</b>
												</td>
												<td>
													<div class="task-list">
														<div class="task-block">
															<li class="dropdown">
																<a href="#" id="task-actions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																	<i class="icon-dots-three-horizontal action-icon"></i>
																</a>
																<div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-actions" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(35px, 36px, 0px);">
																	<a href="#0"  data-toggle="modal" data-target=".product-add">
																		<i class="icon-edit1"></i> Edit
																	</a>
																	<a href="#0">
																		<i class="icon-delete"></i> Delete
																	</a>
																</div>
															</li>
														</div>
													</div>
													
												</td>
											</tr>
											<tr>
												<td><img src="img/product/1.jpg" class="pro-img"></td>
												<td>Chicken Pizza</td>
												<td>2025-01-01 08:00PM</td>
												<td>Admin</td>
												<td>
													<div class="custom-control custom-switch">
														<input type="checkbox" class="custom-control-input" checked id="customSwitch2">
														<label class="custom-control-label" for="customSwitch2"></label>
													</div>
												</td>
												<td>
													<b class="new-price">2000.00</b>
													<b class="old-price">1500.00</b>
												</td>
												<td>
													<div class="task-list">
														<div class="task-block">
															<li class="dropdown">
																<a href="#" id="task-actions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																	<i class="icon-dots-three-horizontal action-icon"></i>
																</a>
																<div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-actions" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(35px, 36px, 0px);">
																	<a href="#0"  data-toggle="modal" data-target=".product-add">
																		<i class="icon-edit1"></i> Edit
																	</a>
																	<a href="#0">
																		<i class="icon-delete"></i> Delete
																	</a>
																</div>
															</li>
														</div>
													</div>
													
												</td>
											</tr>
										</tbody>
									</table>									
								</div>
							</div>
						</div>
					</div>
					<!-- Row end -->


					$("#landowner_submit").on("click", function(event) {
            $("#user_details").valid();

            var password_value = $('#password').val();
            if (password_value) {
                $("#confirm_password").rules("add", {
                    required: true,
                    minlength: 6,
                    equalTo: "#password",
                    messages: {
                        required: "Please confirm your password",
                        minlength: jQuery.validator.format("Password should be atleast 6 characters in length"),
                        equalTo: jQuery.validator.format("Please retype password"),
                    }
                });
            } else {
                $("#confirm_password").rules("remove");
            }

            var validforms = $('#user_details').valid();
            if (validforms) {
                var user_details = $("#user_details").serialize();
                var form_id = "user_details";
                var cmp_name = $("#cmp_id option:selected").text();
                $.ajax({
                    type: "POST",
                    url: "/admin/cmp/landowner/create",
                    data: {
                        user_details: user_details,
                        form_id: form_id,
                        cmp_name:cmp_name
                    },
                    cache: false,
                    success: function(data, textStatus, jQxhr) {
                        if (data.success == 1) {
                            var url = "/admin/cmp/owner/" + data.land_owner_id + "/info";
                            window.location.href = url;
                        }
                        if (data.success == 0) {
                            $('#div-error-content').html("");
                            $.each(data.error_message, function(index, value) {
                                $('#div-error-content').append("<span>" + value + "</span>");
                            });
                            $('#div-error-content').show();
                            setTimeout(function() {
                                $('#div-error-content').hide();
                            }, 10000);
                        }
                        $(window).scrollTop(100);
                    },
                    error: function(jqXhr, textStatus, errorThrown) {
                        console.log(errorThrown);
                    }
                });
            } else {
                $("html, body").animate({
                    scrollTop: 200
                }, "slow");
            }
        });