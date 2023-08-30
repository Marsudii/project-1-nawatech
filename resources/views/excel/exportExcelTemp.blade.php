<h5>TABEL ORDER SUCCESS</h5>
<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Product</th>
        <th>Qty</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
@foreach ($dataOrderSuccess as $key => $value)


        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $value->joinProducts['name_product'] }}</td>
            <td>{{ $value->qty }}</td>
            <td>{{ $value->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<br/>
<h5>TABEL ORDER DELETE</h5>
<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Product</th>
        <th>Qty</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
@foreach ($dataOrderDelete as $key => $value)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $value->joinProducts['name_product'] }}</td>
            <td>{{ $value->qty }}</td>
            <td>{{ $value->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<br/>
<h5>TABEL ORDER CANCEL</h5>
<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Product</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
@foreach ($dataOrderCancel as $key => $value)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $value->joinProducts['name_product'] }}</td>
            <td>{{ $value->qty }}</td>
            <td>{{ $value->price }}</td>
            <td>{{ $value->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
