@extends('layouts.admin.admin_app')
@section('home_active')
active
@endsection
@section('admin_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Starter Page</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                Choise Plugin
                <form action="">
                    <div class="choices">
                        <label class="form-label">Test 2</label>
                        <select class="form-control" data-trigger name="test2" placeholder="This is a search placeholder">
                            <option value="">This is a placeholder</option>
                            <option value="Choice 1">Choice 1</option>
                            <option value="Choice 2">Choice 2</option>
                            <option value="Choice 3">Choice 3</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                Dynamic Input Field
                <form action="">
                    <div class="row align-items-end">
                        <div class="col-lg-6" id="dynamic-text-input">
                            <input type="text" class="form-control mb-2" name="textInput">
                        </div>
                        <div class="col-lg-2">
                            <p onclick="addTextInput()" class="form-control mb-2 btn-secondary" style="cursor: pointer;">Add New Field</p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- end page title -->
    </div> <!-- container-fluid -->
</div>
@endsection
@section('admin_js')
<script>
    function addTextInput() {
    var x = document.createElement("INPUT");
    x.setAttribute("type", "text");
    x.setAttribute("name", "textInput");
    x.setAttribute("class", "form-control mb-2");
    document.getElementById("dynamic-text-input").appendChild(x)
    }
</script>
@endsection