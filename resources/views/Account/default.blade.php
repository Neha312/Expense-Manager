<h3 align="center">Account Details</h3>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="cols">Name</th>
            <th scope="cols">Type</th>
            <th scope="cols">Amount</th>
            <th scope="cols">Action</th>
    </thead>
    <tbody>
        <section>
            <tr>
                <td>{{ $accounts->account_name }}</td>
                <td>{{ $accounts->type }}</td>
                <td>{{ $accounts->balance }}</td>
                <td>
                    {{-- <a href="{{ url('edit_account', $account->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{ url('delete_account', $account->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        <a href="{{ url('show_transaction', $account->id) }}"
                            class="btn btn-success btn-sm">Transaction</a> --}}
                </td>
            </tr>



        </section>
    </tbody>
</table>
