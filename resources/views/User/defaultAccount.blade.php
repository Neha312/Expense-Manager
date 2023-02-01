<div class="card" style="width: 50rem; text-align:center">
    <img class="rounded-circle mt-5 mr-3" width="150px"
        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
    <span class="font-weight-bold"></span><span class="text-black-50">
        <h4>User Account</h4>
    </span><span>
        <div class="card-body">

        </div>
        <div class="row mt-4">
            <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control"
                    placeholder="first name" value="{{ auth()->user()->name }}"></div>
            <div class="col-md-6"><label class="labels">Email</label><input type="text" class="form-control"
                    value="{{ auth()->user()->email }}" placeholder="surname"></div>
            <div class="col-md-6"><label class="labels">type</label><input type="text" class="form-control"
                    value="{{}}" placeholder="surname"></div>
        </div>
        <br>
        <div class="mt-5 text-center"><a href="{{ url('editProfile', auth()->user()->id) }}"
                class="btn btn-info btn-sm">Edit
                Profile</a>
            <a href="{{ url('destroyProfile', auth()->user()->id) }}" class="btn btn-danger btn-sm">Delete
                Profile</a>

            {{-- </button> --}}
        </div>
</div>
</div>
