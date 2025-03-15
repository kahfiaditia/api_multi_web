<!-- Page-Title -->
@extends('welcome')
@section('isicontent')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">Product List</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dastyle</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Ecommerce</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div><!--end col-->
                <div class="col-auto align-self-center">
                    <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                        <span class="day-name" id="Day_Name">Today:</span>&nbsp;
                        <span class="" id="Select_date">Jan 11</span>
                        <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-outline-primary">
                        <i data-feather="download" class="align-self-center icon-xs"></i>
                    </a>
                </div><!--end col-->  
            </div><!--end row-->                                                              
        </div><!--end page-title-box-->
    </div><!--end col-->
</div><!--end row-->
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Pics</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Avai.Color</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <img src="assets/images/products/img-4.png" alt="" height="40">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">Apple Watch</a> 
                                <br>
                                <span class="text-muted font-13">Size-05 (Model 2019)</span> 
                            </p>
                        </td>
                        <td>Sports</td>
                        <td>32</td>
                        <td>$39</td>
                        <td><span class="badge badge-soft-warning">Stock</span></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                            </ul>
                        </td>
                        <td>                                                       
                            <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/products/1.jpg" alt="" height="40">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">Morden Chair</a> 
                                <br>
                                <span class="text-muted font-13">Size-Mediam (Model 2019)</span> 
                            </p>
                        </td>
                        <td>Interior</td>
                        <td>10</td>
                        <td>$99</td>
                        <td><span class="badge badge-soft-pink">Sold</span></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                            </ul>
                        </td>
                        <td>                                                       
                            <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/products/img-5.png" alt="" height="40">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">Reebok Shoes</a> 
                                <br>
                                <span class="text-muted font-13">size-08 (Model 2019)</span> 
                            </p>
                        </td>
                        <td>Footwear</td>
                        <td>24</td>
                        <td>$49</td>
                        <td><span class="badge badge-soft-secondary">Stock</span></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                            </ul>
                        </td>
                        <td>                                                       
                            <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/products/img-6.png" alt="" height="40">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">Cosco Vollyboll</a> 
                                <br>
                                <span class="text-muted font-13">size-04 (Model 2019)</span> 
                            </p>
                        </td>
                        <td>Sports</td>
                        <td>8</td>
                        <td>$49</td>
                        <td><span class="badge badge-soft-secondary">Stock</span></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                            </ul>
                        </td>
                        <td>                                                       
                            <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/products/img-4.png" alt="" height="40">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">Royal Purse</a> 
                                <br>
                                <span class="text-muted font-13">Pure Lether 100%</span> 
                            </p>
                        </td>
                        <td>Life Style</td>
                        <td>52</td>
                        <td>$89</td>
                        <td><span class="badge badge-soft-purple">Stock</span></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                            </ul>
                        </td>
                        <td>                                                       
                            <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/products/3.jpg" alt="" height="40">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">New Morden Chair</a> 
                                <br>
                                <span class="text-muted font-13">size-05 (Model 2019)</span> 
                            </p>
                        </td>
                        <td>Interior</td>
                        <td>6</td>
                        <td>$20</td>
                        <td><span class="badge badge-soft-warning">Stock</span></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                            </ul>
                        </td>
                        <td>                                                       
                            <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/products/2.jpg" alt="" height="40">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">Important Chair</a> 
                                <br>
                                <span class="text-muted font-13">size-05 (Model 2019)</span> 
                            </p>
                        </td>
                        <td>Interior</td>
                        <td>32</td>
                        <td>$39</td>
                        <td><span class="badge badge-soft-warning">Stock</span></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                            </ul>
                        </td>
                        <td>                                                       
                            <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <img src="assets/images/products/img-2.png" alt="" height="40">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">Nivya Footboll</a> 
                                <br>
                                <span class="text-muted font-13">Size-05 (Model 2019)</span> 
                            </p>
                        </td>
                        <td>Sports</td>
                        <td>32</td>
                        <td>$39</td>
                        <td><span class="badge badge-soft-warning">Stock</span></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                            </ul>
                        </td>
                        <td>                                                       
                            <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/products/1.jpg" alt="" height="40">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">Green Morden Chair</a> 
                                <br>
                                <span class="text-muted font-13">Size-Mediam (Model 2019)</span> 
                            </p>
                        </td>
                        <td>Interior</td>
                        <td>10</td>
                        <td>$99</td>
                        <td><span class="badge badge-soft-pink">Sold</span></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                            </ul>
                        </td>
                        <td>                                                       
                            <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/products/img-1.png" alt="" height="40">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">Bata Shoes</a> 
                                <br>
                                <span class="text-muted font-13">size-08 (Model 2019)</span> 
                            </p>
                        </td>
                        <td>Footwear</td>
                        <td>24</td>
                        <td>$49</td>
                        <td><span class="badge badge-soft-secondary">Stock</span></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                            </ul>
                        </td>
                        <td>                                                       
                            <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/products/img-6.png" alt="" height="40">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">Nike Vollyboll</a> 
                                <br>
                                <span class="text-muted font-13">size-04 (Model 2019)</span> 
                            </p>
                        </td>
                        <td>Sports</td>
                        <td>8</td>
                        <td>$49</td>
                        <td><span class="badge badge-soft-secondary">Stock</span></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                            </ul>
                        </td>
                        <td>                                                       
                            <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/products/img-4.png" alt="" height="40">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">Lava Purse</a> 
                                <br>
                                <span class="text-muted font-13">Pure Lether 100%</span> 
                            </p>
                        </td>
                        <td>Life Style</td>
                        <td>52</td>
                        <td>$89</td>
                        <td><span class="badge badge-soft-purple">Stock</span></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                            </ul>
                        </td>
                        <td>                                                       
                            <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/products/3.jpg" alt="" height="40">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">Brown Morden Chair</a> 
                                <br>
                                <span class="text-muted font-13">size-05 (Model 2019)</span> 
                            </p>
                        </td>
                        <td>Interior</td>
                        <td>6</td>
                        <td>$20</td>
                        <td><span class="badge badge-soft-warning">Stock</span></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                            </ul>
                        </td>
                        <td>                                                       
                            <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="assets/images/products/2.jpg" alt="" height="40">
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">Best Look Chair</a> 
                                <br>
                                <span class="text-muted font-13">size-05 (Model 2019)</span> 
                            </p>
                        </td>
                        <td>Interior</td>
                        <td>32</td>
                        <td>$39</td>
                        <td><span class="badge badge-soft-warning">Stock</span></td>
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-success"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-danger"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-info"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-dark"></i></li>
                                <li class="list-inline-item align-middle"><i class="fas fa-circle text-warning"></i></li>
                            </ul>
                        </td>
                        <td>                                                       
                            <a href="#" class="mr-2"><i class="las la-pen text-info font-18"></i></a>
                            <a href="#"><i class="las la-trash-alt text-danger font-18"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>        
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection