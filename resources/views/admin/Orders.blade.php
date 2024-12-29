<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Orders </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    @if (session('Success'))
    <div class="alert alert-success">
       {{session('Success')}}</div>
       <script>setTimeout(function()  {
           document.querySelector('.alert').style.display='none';
       }, 3000);
           </script>
           @endif
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Cards</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                        Product Name
                      </th>
                      <th style="width: 30%">
                          Product Image
                        </th>
                        <th>
                            price
                        </th>
                        <th style="width: 8%" class="text-center">
                            category
                        </th>
                        <th style="width: 20%">
                          user Name
                        </th>
                        <th style="width: 20%">
                          Phone
                        </th>
                        <th style="width: 20%">
                          Address
                        </th>
                        <th style="width: 20%">
                          Order Status
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
              </thead>
              <tbody>
                @foreach($cards as $card)
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              {{$card->product->name}}
                          </a>
                          <br/>

                      </td>
                      <td>
                        {{-- @dd($card->product->image) --}}
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src='{{ asset("images/ProductImage/".$card->product->image)}}'>
                              </li>

                          </ul>
                      </td>
                      <td class="project_progress">
                          <p>{{$card->product->price}}</p>

                      </td>
                      <td class="project-state">
                          <span class="badge badge-success">{{$card->product->category->name}}</span>
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success">{{$card->user->name}}</span>
                      </td>
                      <td class="project-state">
                          <p>{{$card->user->phone}}</p>
                      </td>
                      <td class="project-state">
                          <p>{{$card->user->address}}</p>
                      </td>
                      <td class="project-state">
                          @if($card->orderStatus==1)
                          <p>Delivered</p>
                          @else
                           <p>Waiting for delivery</p>
                           @endif
                      </td>
                      <td class="project-actions text-right">
                           <a class="btn btn-info btn-sm" href="{{route('updateOrderStatus',$card->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Delivered
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{route('DeleteFromCard',$card->id)}}" >
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  @endforeach

                </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
