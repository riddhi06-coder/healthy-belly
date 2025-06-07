@extends('layouts.header-admin')
@section('content')
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
                    @if(Session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                    @endif
					<h4 class="box-title">List Sub Category</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="{{route('admin.add_sub_category')}}"><input type="submit" name="" value="Add Sub Category" class="btn btn-success btn-sm"></a>

						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="listProductSubCategory" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
                                <th>Sr No.</th>
								<th>Category Name</th>
								<th>Main Category</th>
                                <th>Slug</th>
                                <th>Status</th>
								<th>::</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($sub_cat as $sub_cats)
							<tr>
                                <td>{{$i++}}</td>
								<td>{{$sub_cats->name}}</td>
								<td>
								    <?php $m_cat=DB::table('parent_category')->where('id',$sub_cats->parent_cat_id)->first(); ?>
                                    {{$m_cat->category_name}}
								</td>
                                <td>{{$sub_cats->slug}}</td>
                                <td>
                                    <input data-id="{{$sub_cats->id}}" class="toggle-class subCategoryToggle" data-size="mini" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $sub_cats->status ? 'checked' : '' }}>
                                </td>
								<td>
                                    <a href="{{route('admin.edit_sub_category',$sub_cats->id)}}"><button class="btn btn-info btn-xs"><i class="fa fa-edit"></i></button></a>
                                    <a onclick="return confirm('Are you sure Want to Delete?')" href="{{route('admin.delete_sub_category',$sub_cats->id)}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
						</tbody>
					</table>
					{{$sub_cat->links()}}
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
		</div>
		<!-- /.row small-spacing -->
	</div>
	<!-- /.main-content -->
</div>

@endsection