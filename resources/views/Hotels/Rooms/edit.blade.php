@extends('layouts.home')
@section('content')
    <div class="contact_form_section" style="margin-top: 200px;margin-bottom: 100px">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="card">
                        <div class="card-header">
                            <h2 class="font-weight-bold" style="color: #ff6238">Chỉnh sửa phòng khách sạn</h2>
                        </div>
                        <div class="card-body">
                            {{ Form::model($rooms,['route' => ['rooms.update',$rooms->id ],'method' => 'put','enctype '=>'multipart/form-data']) }}
                            <div class="col-6" style="float: left;">
                                <div class="form-group {{ $errors->has('rates') ?'has-error':'' }}">
                                    {{ Form::label('Giá Phòng:','',['class' => 'font-weight-bold']) }}
                                    {{ Form::number('rates',$rooms->rates,['class'=>'form-control']) }}
                                    <span class="text-danger">{{$errors->first('rates')}}</span>
                                </div>

                                <div class="form-group {{ $errors->has('surcharge') ?'has-error':'' }}">
                                    {{ Form::label('phụ thu :','',['class' => 'font-weight-bold']) }}
                                    {{ Form::number('surcharge',$rooms->surcharge,['class'=>'form-control']) }}
                                    <span class="text-danger">{{$errors->first('surcharge')}}</span>
                                </div>
                                <div class="form-group {{ $errors->has('acreage') ?'has-error':'' }}">
                                    {{ Form::label('Diện tích :','',['class' => 'font-weight-bold']) }}
                                    {{ Form::number('acreage',$rooms->acreage,['class'=>'form-control']) }}
                                    <span class="text-danger">{{$errors->first('acreage')}}</span>
                                </div>
                                <div class="form-group {{ $errors->has('kindrooms_id') ?'has-error':'' }}">
                                    {{Form::label('Hạng Phòng:','',['class' => 'font-weight-bold'])}}
                                    {{Form::select('kindrooms_id',$kindrooms,$rooms->kindrooms_id,['class' => " form-control",'placeholder'=>'Chọn Hạng Phòng'])}}
                                    <span class="text-danger">{{$errors->first('kindrooms_id')}}</span>
                                </div>
                                <div class="form-group {{ $errors->has('description') ?'has-error':'' }}">
                                    {{Form::label('Mô tả:','',['class' => 'font-weight-bold'])}}
                                    {{Form::text('description',$rooms->description,['class' => " form-control",])}}
                                    <span class="text-danger">{{$errors->first('description')}}</span>
                                </div>
                            </div>
                            <div class="col-6" style="float: left;">
                                <div class="form-group {{ $errors->has('roomcategorys_id') ?'has-error':'' }}">
                                    {{Form::label('Loại phòng:','',['class' => 'font-weight-bold'])}}
                                    {{Form::select('roomcategorys_id',$roomcategorys,$rooms->roomcategory_id,['class' => " form-control",'placeholder'=>'Chọn Loại Phòng'])}}
                                    <span class="text-danger">{{$errors->first('roomcategorys_id')}}</span>
                                </div>
                                <div class="form-group {{ $errors->has('AmountPeople') ?'has-error':'' }}">
                                    {{ Form::label('Số người:','',['class' => 'font-weight-bold']) }}
                                    {{ Form::number('AmountPeople',$rooms->AmountPeople,['class'=>'form-control']) }}
                                    <span class="text-danger">{{$errors->first('AmountPeople')}}</span>
                                </div>
                                <div class="form-group {{ $errors->has('images') ?'has-error':'' }}">
                                    {{ Form::label('Hình ảnh :' ,'Hình ảnh :',['class' => 'font-weight-bold']) }}
                                    <input multiple="multiple" name="images[]" type="file" class="form-control">
                                    <span class="text-danger">{{$errors->first('images')}}</span>
                                </div>
                                <input type="hidden" name="hotels_id" id="id" value="{{$rooms->id}}">
                                <div class="form-group {{ $errors->has('sevices_id') ? 'has-error':'' }}">
                                    {{Form::label('Tiện Ích:','',['class' => 'font-weight-bold'])}}
                                    {!!Form::select('sevices_id[]',$sevices,$rooms->sevices,['class'=>'form-control sevices','multiple'=>'multiple' ]) !!}
                                    <span class="text-danger"> {{ $errors->first('sevices_id')}} </span>
                                </div>

                            </div>
                            <div class="modal-footer" style="float: left;margin-top: 18px;margin-left: 300px">
                                <a style="margin: 10px" href="{{route('hotel.show',$rooms->hotels->id)}} "
                                   class="btn btn-success">Trở về</a>
                                {{form::submit('Cập nhập',['class'=>'btn btn-primary']) }}

                            </div>


                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

                            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css"
                                  rel="stylesheet"/>

                            <script
                                src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
                            <script type="text/javascript">
                                $('.sevices').select2({});
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
@section('footer')
    @include('shared.footer')
@endsection
