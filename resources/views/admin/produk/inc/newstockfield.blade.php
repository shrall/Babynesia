<input type="text" name="stock_code[{{ $order }}]" readonly
    class="admin-input-full stock-input-{{ $order }} col-span-2">
<input type="text" name="stock_type[{{ $order }}]"
    class="admin-input-full stock-input-{{ $order }} col-span-2">
<input type="text" name="stock_size[{{ $order }}]"
    class="admin-input-full stock-input-{{ $order }} col-span-2">
<input type="text" name="stock_color[{{ $order }}]"
    class="admin-input-full stock-input-{{ $order }} col-span-2">
<input type="text" name="stock_left[{{ $order }}]"
    class="admin-input-full stock-input-{{ $order }} col-span-1">
<input type="text" name="stock_ordered[{{ $order }}]" readonly
    class="admin-input-full stock-input-{{ $order }} col-span-1">
<a onclick="deleteType({{ $order }});"
    class="admin-action-button-danger cursor-pointer col-span-2 stock-input-{{ $order }}">
    <span class="fa fa-fw fa-trash-alt"></span>
</a>
