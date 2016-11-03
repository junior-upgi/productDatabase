@extends('layouts.master')
@section('content')
<script src="{{url('/')}}/js/product/plastic.list.js?x=2"></script>
<h3>塑膠產品資料表</h3>
<div class="row">
    <div class="btn-group col-md-6 col-xs-6">
        <button type="button" class="btn btn-primary" onclick="doAdd('')">
            <span class="glyphicon glyphicon-plus"></span>
            新增
        </button>
        <a href="{{ url('/plastic/export') }}" class="btn btn-success">
            <span class="glyphicon glyphicon-export"></span>
            匯出
        </a>
    </div>
</div>
<p></p>
<div class="row">
    <form class="col-md-4 col-xs-12" id="searchForm" action="{{ url('/plastic/list') }}" method="GET">
        <div class="input-group">
            <input type="text" class="form-control" id="searchContent" name="searchContent" placeholder="請輸入查詢內容" value="{{ $search }}" />
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default">查詢</button>
            </span>
        </div>
    </form>
</div>
<p></p>
@if(isset($plastic))
<div class="table-responsive">
    <table class="table table-bordered table-condensed">
        <thead>
            <tr>
                <td></td>
                <td>產品代號</td>
                <td class="hidden-xs">別號</td>
                <td>描述</td>
                <td class="hidden-xs">材質</td>
                <td class="hidden-xs">重量(g)</td>
                <td class="hidden-xs">穴數</td>
                <td class="hidden-xs">循環時間(s)</td>
                <td class="hidden-xs">單價(NT$)</td>
                <td width="40"></td>
                <td width="40"></td>
            </tr>
        </thead>
        <tbody id="tbody">
        @foreach($plastic as $p)
            @php
                $json = (string) $p;
            @endphp
            <tr>
                <td class="text-center">
                    <span class="glyphicon glyphicon-info-sign" onclick="detail('{{ $json }}')"></span>
                </td>
                <td>
                    {{ $p->referenceNumber }}
                    <input type="hidden" id="photoLocation" value="{{{ $p->photoLocation }}}">
                    <input type="hidden" id="printLocation" value="{{{ $p->printLocation }}}">
                </td>
                <td class="hidden-xs">{{ $p->alias }}</td>
                <td>{{ $p->description }}</td>
                <td class="hidden-xs">{{ $p->material }}</td>
                <td class="hidden-xs">{{ $p->weight }}</td>
                <td class="hidden-xs">{{ $p->cavity }}</td>
                <td class="hidden-xs">{{ $p->cycleTime }}</td>
                <td class="hidden-xs">{{ $p->unitCost }}</td>
                <td><button type="button" class="btn btn-default btn-sm" onclick="doAdd('{{ $json }}')">編輯</button></td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="doDelete('{{ $p->ind }}')">刪除</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif
@include('plastic.add')
@include('plastic.detail')
@endsection