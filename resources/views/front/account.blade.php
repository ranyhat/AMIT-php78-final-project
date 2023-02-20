@extends('front.layouts.index')
@section('content')

    <!-- inner page section -->
    <section class="inner_page_head">
        <div class="container_fuild">
           <div class="row">
              <div class="col-md-12">
                 <div class="full">
                    <h3>Account</h3>
                 </div>
              </div>
           </div>
        </div>
     </section>
     <!-- end inner page section -->
     <!-- why section -->
     <section class="why_section layout_padding">
        <div class="container">
           <div class="heading_container heading_center">
              <h2>
                 Your Cart
              </h2>
           </div>
           <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                @foreach ($cart as $item)
                <tr>
                    <td scope="col">{{$item->product->id}}</td>
                    <td scope="col">{{$item->product->name}}</td>
                    <td scope="col">{{$item->product->price}}$</td>
                    <td scope="col"><a class="btn btn-sm btn-danger" href="{{url('cart/delete/'.$item->id)}}">Delete</a></td>
                </tr>
                @endforeach
            </table>
        </div>
     </section>
     <!-- end why section -->


@endsection
