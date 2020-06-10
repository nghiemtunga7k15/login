@extends('account.info')

@section('content-account')
<div class="warp-profile">
    <div class="title-profile">
        <h1>Hồ Sơ Của Tôi</h1>
        <h4>Quản lý thông tin hồ sơ để bảo mật tài khoản</h4>
    </div>
    <div class="form-profile">
        <div class="">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-body p-4">
                        <p class="text-muted"></p>
                        <form action="" method="POST">

                            <input type="hidden" name="_token" value="GBIggagV63oepgw3VsomY2XOsNDHqbNDhkEBzMHC">
                            {{csrf_field()}}
                            @if(Cookie::get('get_user'))
                                <table>
                                    <tr>
                                        <td><span><b>Tên Tài khoản</b></span></td>
                                        <td><input class="form-control" type="text" placeholder="Tên" name="full_name" value="{{json_decode(Cookie::get('get_user'))->name}}"></td>
                                    </tr>
                                    <tr>
                                        <td> <span><b>Email</b></span></td>
                                        <td><input class="form-control" type="text" placeholder="Email" name="email" value="{{json_decode(Cookie::get('get_user'))->email}}"></td>
                                    </tr>
                                    <tr>
                                        <td><span><b>Số điện thoại</b></span></td>
                                        <td><input class="form-control" type="phone_number" placeholder="số điện thoại" name="phone_number"  value="{{json_decode(Cookie::get('get_user'))->phone}}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"> <button class="btn btn-primary" type="submit">Lưu thông tin</button></td>
                                    </tr>
                                </table>
                            @else
                                <table>
                                    <tr>
                                        <td><span><b>Tên Tài khoản</b></span></td>
                                        <td><input class="form-control" type="text" placeholder="Tên" name="full_name" value=""></td>
                                    </tr>
                                    <tr>
                                        <td> <span><b>Email</b></span></td>
                                        <td><input class="form-control" type="text" placeholder="Email" name="email" value=""></td>
                                    </tr>
                                    <tr>
                                        <td><span><b>Số điện thoại</b></span></td>
                                        <td><input class="form-control" type="phone_number" placeholder="số điện thoại" name="phone_number"  value=""></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"> <button class="btn btn-primary" type="submit">Lưu thông tin</button></td>
                                    </tr>
                                </table>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .warp-profile{
            padding: 20px 40px;
        }
        .title-profile{
            border-bottom: 1px solid #ccc;
        }
        .form-profile table{
            width: 100%;
        }
        .form-profile tr td{
            padding: 10px;
            text-align: center;
        }
        .form-control{
            /*width: 300px;*/
        }
        .form-profile .input-group span{
            width: 200px;
        }
        @media (max-width: 767px)  {
            .warp-profile{
                padding: 5px 10px;
            }

        }
    </style>
@endsection
