@extends('layouts.main')

@section('content')
<div class="container py-3">
      <h2>New project</h2>
      <form>
        
        <div class="mb-3">
          <label class="form-label" for="name">Project name</label>
          <input type="text" class="form-control" id="name" placeholder="">
          <div class="invalid-feedback">
            Please choose a username.
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label" for="description">Description</label>
          <textarea class="form-control" id="description" rows="3"></textarea>
          <div class="invalid-feedback">
            Please choose a username.
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label" for="image_url">Background image URL</label>
          <input type="text" class="form-control" id="image_url" placeholder="">
          <div class="invalid-feedback">
            Please choose a username.
          </div>
        </div>

        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Add new project</button>
        </div>

      </form>
    </div>
      <p>
        <a href="new-project.html" class="btn btn-secondary">Create a new project</a>
      </p>
      <div class="row align-items-start">

        <div class="col-6 col-sm-6 col-md-4 col-lg-3 my-3">
          <div class="card h-100">
            <img src="https://cdn.dribbble.com/users/12015/screenshots/2131050/apple_music.png" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Project1</h5>
              <p class="card-text">Cool project description</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              <a href="#" class="btn btn-primary">Open</a>
            </div>
          </div>
        </div>
        
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 my-3">
          <div class="card h-100">
            <img src="https://cdn.dribbble.com/users/12015/screenshots/2131050/apple_music.png" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Project1</h5>
              <p class="card-text">Cool project description</p>
              <a href="#" class="btn btn-primary">Open</a>
            </div>
          </div>
        </div>
        
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 my-3">
          <div class="card h-100">
            <img src="https://cdn.dribbble.com/users/12015/screenshots/2131050/apple_music.png" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Project1</h5>
              <p class="card-text">Cool project description</p>
              <a href="#" class="btn btn-primary">Open</a>
            </div>
          </div>
        </div>
        
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 my-3">
          <div class="card h-100">
            <img src="https://cdn.dribbble.com/users/12015/screenshots/2131050/apple_music.png" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Project1</h5>
              <p class="card-text">Cool project description</p>
              <a href="#" class="btn btn-primary">Open</a>
            </div>
          </div>
        </div>
        
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 my-3">
          <div class="card h-100">
            <img src="https://cdn.dribbble.com/users/12015/screenshots/2131050/apple_music.png" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Project1</h5>
              <p class="card-text">Cool project description</p>
              <a href="#" class="btn btn-primary">Open</a>
            </div>
          </div>
        </div>
        
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 my-3">
          <div class="card h-100">
            <img src="https://cdn.dribbble.com/users/12015/screenshots/2131050/apple_music.png" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Project1</h5>
              <p class="card-text">Cool project description Cool project description Cool project description Cool project description Cool project description Cool project description </p>
              <a href="#" class="btn btn-primary">Open</a>
            </div>
          </div>
        </div>
        
      </div>
    </div>
@endsection