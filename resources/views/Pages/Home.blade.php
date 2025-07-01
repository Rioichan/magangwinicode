@extends('Layouts.Template')
@Section('content')
<div class="row layout">
    <div class="col-2 sidebar d-flex flex-column p-3">
        @include('components.sidbarMenu')
    </div>
    <div class="col-8 content d-flex flex-column p-5 ">
        <div class="search-bar d-flex">
            <div class="input-group mb-3 search">
                <input type="text" class="form-control" placeholder="Cari artikel......" aria-label="Username" aria-describedby="basic-addon1">
                <span class="input-group-text bg-white" id="basic-addon1"><i class="bi bi-search"></i></span>
            </div>
        </div>
        @include('components.ArticelList')
    </div>
    <div class="col-2 sidebar d-flex flex-column p-3">
        @include('components.sidebarTags')
    </div>
</div>
@endSection