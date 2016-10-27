@extends('layouts.master')
@section('content')
<script src="{{url('/')}}/js/product/plastic.list.js?x=4"></script>
<div style="margin-top:10px;"></div>
<div class="col-md-8">
    <h2>塑膠產品資料表</h2>
    <form id="searchForm" action="{{url('/')}}/plastic" class="navbar-form" method="GET">
        <div class="form-group">
            <button type="button" class="btn btn-primary" onclick="doAdd('')">新增</button>
            <input type="text" class="form-control" id="searchContent" name="searchContent" placeholder="請輸入查詢內容" value="{{ $search }}" />
        </div>
        <button type="submit" class="btn btn-default">查詢</button>
    </form>
</div>
<div class="col-md-4">
    <img id="photoShow" data-src="holder.js/140x140" class="img-thumbnail" src="" data-holder-rendered="true" style="width: 140px; height: 140px;">
    <img id="printShow" data-src="holder.js/140x140" class="img-thumbnail" src="" data-holder-rendered="true" style="width: 140px; height: 140px;">
</div>
<div class="col-md-12" style="margin-top:10px;">
@if(isset($plastic))
<div style="weight:780px;height:600px;overflow:scroll;">
    <table class="table table-bordered table-condensed">
        <thead>
            <tr>
                <td>產品代號</td>
                <td>別號</td>
                <td>描述</td>
                <td>材質</td>
                <td>weight</td>
                <td>cavity</td>
                <td>cycleTime</td>
                <td>unitCost</td>
                <td width="40"></td>
                <td width="40"></td>
            </tr>
        </thead>
        <tbody id="aaa">
        @foreach($plastic as $p)
            @php
                $json = (string) $p;
            @endphp
            <tr>
                <td>
                    {{ $p->referenceNumber }}
                    <input type="hidden" id="photoLocation" value="{{{ $p->photoLocation }}}">
                    <input type="hidden" id="printLocation" value="{{{ $p->printLocation }}}">
                </td>
                <td>{{ $p->alias }}</td>
                <td>{{ $p->description }}</td>
                <td>{{ $p->material }}</td>
                <td>{{ $p->weight }}</td>
                <td>{{ $p->cavity }}</td>
                <td>{{ $p->cycleTime }}</td>
                <td>{{ $p->unitCost }}</td>
                <td><button type="button" class="btn btn-default btn-sm" onclick="doAdd('{{ $json }}')">編輯</button></td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="doDelete('{{ $p->ind }}')">刪除</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif
</div>
@include('plastic.add')
@endsection