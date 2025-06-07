@extends('layouts.admin-header')

@section('content')
<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Members</p>
										<?php

										$member=DB::table('users')
										->where('role','=',3)
										->count();
										?>
										<h4 class="my-1">{{$member}}</h4>
										<!-- <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>$34 Since last week</p> -->
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class='bx bx-user-circle'></i>
									</div>
								</div>
								<!-- <div id="chart1"></div> -->
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
									<?php

									$users=DB::table('users')
									->where('role','=',2)
									->count();
									?>
										<p class="mb-0 text-secondary">Total Users</p>
										<h4 class="my-1">{{$users}}</h4>
										<!-- <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>14% Since last week</p> -->
									</div>
									<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bxs-group'></i>
									</div>
								</div>
								<!-- <div id="chart2"></div> -->
							</div>
						</div>
					</div>
					<!-- <div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Store Visitors</p>
										<h4 class="my-1">59K</h4>
										<p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>12.4% Since last week</p>
									</div>
									<div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-binoculars'></i>
									</div>
								</div>
								<div id="chart3"></div>
							</div>
						</div>
					</div> -->
				</div>	
				
				<div class="row">
					<div class="col-xl-8 d-flex">
						<div class="card radius-10 w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h5 class="mb-1">Users List</h5>
										<!-- <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>in last 30 days revenue</p> -->
									</div>
								
								</div>
								<div class="table-responsive mt-4">
									<table class="table align-middle mb-0 table-hover" id="Transaction-History">
										<thead class="table-light">
											<tr>
												<th>Name</th>
												<th>Email</th>
												<th>Created Date</th>
												<!-- <th>Status</th> -->
											</tr>
										</thead>
										<tbody>
											<?php

											$user_list =DB::table('users')
											->where('role',2)
											->get();
											?>
											@foreach($user_list as $value)
											<tr>
												<td>
													{{$value->name}}
												</td>
												<td>
													{{$value->email}}
												</td>
												<td>{{date('Y-m-d',strtotime($value->created_at))}}</td>
												<!-- <td>
													<div class="badge rounded-pill bg-success w-100">Completed</div>
												</td> -->
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div> 

        @endsection



