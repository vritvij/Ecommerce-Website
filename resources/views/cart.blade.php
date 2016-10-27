@extends('master')

@section('title')
    Cart | Myst
@endsection

@section('body')
    <div id="cart" class="outer-container">
        <div class="container">
            @if(count($items)>0)
                <table class="striped centered">
                    <thead>
                    <tr>
                        <th></th>
                        <th data-field="id">Product Name</th>
                        <th data-field="id">Category</th>
                        <th data-field="name">Seller</th>
                        <th data-field="price">Item Price</th>
                        <th data-field="price">Quantity</th>
                        <th data-field="price">Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $total=0; ?>
                    @foreach($items as $item)
                        <tr>
                            <td>
                                <form method="post" action="/cart/remove/{{$item["id"]}}">
                                    {{ csrf_field() }}
                                    <button class="remove btn-floating waves-effect waves-light red lighten-1" type="submit" name="action"><i class="material-icons">close</i></button>
                                </form>
                            </td>
                            <td><a href="/product/{{$item["id"]}}">{{$item["name"]}}</a></td>
                            <td>{{$item["category"]}}</td>
                            <td>{{$item["seller"]}}</td>
                            <td>&#x20b9;{{$item["price"]}}</td>
                            <td>{{$item["quantity"]}}</td>
                            <td>&#x20b9;{{$item["price"] * $item["quantity"]}}</td>
                            <?php $total+= ($item["price"] * $item["quantity"]); ?>
                        </tr>
                    @endforeach
                        <tr id="total">
                            <td colspan="6"></td>
                            <td class="light-green white-text z-depth-1">&#x20b9;{{ $total }}</td>
                        </tr>
                    </tbody>
                </table>

            @else
                <div class="nothing center">
                    <img src="/img/empty-cart.jpg">
                </div>
            @endif
        </div>
    </div>
@endsection