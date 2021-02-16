@foreach ($carts as $row)
    <tr>
        <td class="product-remove"><a href="{{ url('remove-cart/'.$row->rowId) }}"><i class="pe-7s-close"></i></a></td>
        <td class="product-thumbnail">
            <a href="#"><img src="{{ $row->options->images }}" width="85" height="100" alt=""></a>
        </td>
        <td class="product-name"><a href="#">{{ $row->name }} </a></td>
        <td class="product-name"><a href="#">{{ $row->options->size }} </a></td>
        <td class="product-name"><a href="#">{{ $row->options->color }} </a></td>
        <td class="product-price-cart"><span id="amount" >{{ $row->price }}</span></td>
        <td class="product-quantity">
           
            
            <button class="btn btn-danger decrement" @if ($row->qty < 2) style="cursor: no-drop;" disabled @else  style="cursor: pointer;" @endif id="{{ $row->rowId }}">-</button>
                                                    
            <input type="text" value="{{ $row->qty }}" style="height: auto;padding:5px;" name="qty" readonly>
            <button class="btn btn-success increment" @if ($row->qty >=10) style="cursor: no-drop;"  disabled @else style="cursor: pointer;" @endif id="{{ $row->rowId }}">+</button>
        
            
        </td>
        <td>$ <span id="product-subtotal">{{$row->price*$row->qty}}</span></td>
    </tr>
@endforeach

