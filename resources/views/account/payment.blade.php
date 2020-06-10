@extends('account.info')

@section('content-account')
<div class="warp-profile">
    <div class="title-profile">
        <h1>Số dư tài khoản</h1>
        <h4>Quản lý số dư hiện tại</h4>
    </div>
    <div class="form-profile">
        @if(Cookie::get('get_user'))
        <span>số tư hiện tại của bạn là:</span><b style="color: red;">{{json_decode(Cookie::get('get_user'))->balance}}</b>
        @endif
        <div class="">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-body p-4">
                        <p class="text-muted"></p>
                        <form action="" method="POST">

                            <input type="hidden" name="_token" value="GBIggagV63oepgw3VsomY2XOsNDHqbNDhkEBzMHC">
                            {{csrf_field()}}
                            <table>
                                <tr>
                                    <td><span><b>Mã đơn hàng</b></span></td>
                                    <td><input class="form-control" type="text" placeholder="Order id" name="mrc_order_id" value=""></td>
                                </tr>
                                <tr>
                                    <td> <span><b>Số tiền</b></span></td>
                                    <td><input class="form-control" type="text" placeholder="Total amount" name="total_amount" value=""></td>
                                </tr>
                                <tr>
                                    <td><span><b>Mô tả</b></span></td>
                                    <td><input class="form-control" type="text" placeholder="Description" name="description"  value=""></td>
                                </tr>
                                <tr>
                                    <td colspan="2"> <button class="btn btn-success" type="submit">Thanh toán</button></td>
                                </tr>
                            </table>
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
