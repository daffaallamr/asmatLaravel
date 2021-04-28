@extends('layout.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Edit Cerita</h1>
        
        <!-- Form Tambah Data -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputName1">Judul Cerita</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="Apa Itu Asmat?">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Judul Paragraf - 1</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="Asmat adalah:">
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Paragraf - 1</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lacinia at quis risus sed vulputate odio. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Blandit aliquam etiam erat velit scelerisque in. Mattis molestie a iaculis at erat. Sapien faucibus et molestie ac feugiat sed lectus. Leo vel orci porta non pulvinar neque laoreet. Lacus laoreet non curabitur gravida arcu ac tortor. At tempor commodo ullamcorper a. Eu nisl nunc mi ipsum faucibus vitae aliquet nec. In aliquam sem fringilla ut morbi tincidunt. Vestibulum lectus mauris ultrices eros in cursus turpis massa. Accumsan tortor posuere ac ut consequat semper. Eget magna fermentum iaculis eu. Justo donec enim diam vulputate ut pharetra sit. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Donec ac odio tempor orci dapibus ultrices in iaculis nunc. Et malesuada fames ac turpis egestas integer eget. Malesuada fames ac turpis egestas. Nisl condimentum id venenatis a condimentum vitae.</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Judul Paragraf - 2</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="Apa Itu Asmat?">
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Paragraf - 2</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lacinia at quis risus sed vulputate odio. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Blandit aliquam etiam erat velit scelerisque in. Mattis molestie a iaculis at erat. Sapien faucibus et molestie ac feugiat sed lectus. Leo vel orci porta non pulvinar neque laoreet. Lacus laoreet non curabitur gravida arcu ac tortor. At tempor commodo ullamcorper a. Eu nisl nunc mi ipsum faucibus vitae aliquet nec. In aliquam sem fringilla ut morbi tincidunt. Vestibulum lectus mauris ultrices eros in cursus turpis massa. Accumsan tortor posuere ac ut consequat semper. Eget magna fermentum iaculis eu. Justo donec enim diam vulputate ut pharetra sit. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Donec ac odio tempor orci dapibus ultrices in iaculis nunc. Et malesuada fames ac turpis egestas integer eget. Malesuada fames ac turpis egestas. Nisl condimentum id venenatis a condimentum vitae.</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Judul Paragraf - 3</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="Apa Itu Asmat?">
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Paragraf - 3</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lacinia at quis risus sed vulputate odio. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Blandit aliquam etiam erat velit scelerisque in. Mattis molestie a iaculis at erat. Sapien faucibus et molestie ac feugiat sed lectus. Leo vel orci porta non pulvinar neque laoreet. Lacus laoreet non curabitur gravida arcu ac tortor. At tempor commodo ullamcorper a. Eu nisl nunc mi ipsum faucibus vitae aliquet nec. In aliquam sem fringilla ut morbi tincidunt. Vestibulum lectus mauris ultrices eros in cursus turpis massa. Accumsan tortor posuere ac ut consequat semper. Eget magna fermentum iaculis eu. Justo donec enim diam vulputate ut pharetra sit. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare. Donec ac odio tempor orci dapibus ultrices in iaculis nunc. Et malesuada fames ac turpis egestas integer eget. Malesuada fames ac turpis egestas. Nisl condimentum id venenatis a condimentum vitae.</textarea>
                  </div>
                  <div class="form-group">
                    <label>Gambar - 1 (Landscape)</label>
                    <input type="file" name="img[]" class="file-upload-default" style="opacity: 0;">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Gambar - 2 (Potrait dan Tidak wajib)</label>
                    <input type="file" name="img[]" class="file-upload-default" style="opacity: 0;">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Edit</button>
                </form>
              </div>
            </div>
          </div>

    </div>
    <!-- /.container-fluid -->

@endsection