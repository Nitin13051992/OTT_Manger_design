@extends('layouts.main')
@section('content')
<div class="col-md-10 pt-4">
    <div class="d-flex align-items-center">
        <h1 class="font-30 font-w-700 text-blue mt-0 mb-0">My Profile</h1>
    </div>

    <div class="d-flex  flex_col res_d_block w-100">
        <div class="card col">
            <h2 class="font-20 mt-0 font-w-700 mb-4">Edit Profile</h2>
            <form class="form2" method="post">
                <div class="form-group">
                    <label class="title">Email</label>
                    <input class="form-control input" id="uemail" type="text" name="" readonly
                        value="amritatv@planetc.net">
                </div>
                <div class="form-group">
                    <label class="title">Name</label>
                    <input required placeholder="Name" class="form-control input" type="text" name="uname" id="uname"
                        maxlength="20" pattern="[a-zA-Z\s]+" value="AmritaTV">
                </div>
                <div class="form-group">
                    <button type="submit" name="saveProfile" class="btn btn-blue btn-lg" type="button">Submit</button>
                </div>
            </form>
        </div>

        <div class="card ml-3 col">
            <h2 class="font-20 mt-0 font-w-700 mb-4  ">Change Password</h2>
            <form class="form2" method="post" onsubmit="return Validation()">
                <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" class="form-control input" id="oldPass" name="oldPass"
                        placeholder="Enter Old password" required />
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" id="newPass" name="newPass" class="form-control input" required
                        placeholder="Enter New Password" />
                    <span class="help-block has-error" data-error="0" id="newPass-error" style="color:red;"></span>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" id="confirmPass" name="confirmPass" required class="form-control"
                        placeholder="Enter Confirm Password" />
                    <span class="help-block has-error" data-error="0" id="confirmPass-error" style="color:red;"></span>
                </div>
                <div class="form-group">
                    <button type="submit" name="savePassword" class="btn btn-blue btn-lg" type="button">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection