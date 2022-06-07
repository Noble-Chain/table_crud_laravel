@extends('master')
@section('title') Home @endsection

@section('content')

<div class="container">
    <div class="row my-5 justify-content-center">
        <div class="col-lg-7 box" >
            <div class="d-flex justify-content-between mb-4">
                <h1>Laravel CRUD</h1>
                <div class="d-flex align-items-center">
                    <a class="me-1 btn btn-lg" href="">User</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-lg text-black-50" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                       Create
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Create Worker Info</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('create') }}" method="post">
                                <div class="modal-body">
                                
                                    @csrf
                                       
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button  class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table ">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Password</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @if (count($workers)===0)
                        <tr>
                            <td colspan="6" class="text-center bg-danger text-white">No data</td>
                        </tr>
                    @else

                        @foreach ($workers as $worker)
                            <tr>
                                <td>{{ $worker->id }}</td>
                                <td>{{ $worker->name }}</td>
                                <td>{{ $worker->email }}</td>
                                <td>{{ $worker->phone }}</td>
                                <td>{{ $worker->passwrod }}</td>
                                <td>
                                    <a href="{{ route('edit',$worker->id) }}" type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Edit</a>
                                    
                                    
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Worker Info</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                         <form action="{{ route('update',$worker->id) }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                @method('put')
                                            
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" value="{{ $worker->name }}" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" value="{{ $worker->email }}" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" name="phone" value="{{ $worker->phone }}" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" name="password" value="{{ $worker->password }}" class="form-control">
                                                </div>
                                            
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button  class="btn btn-primary">Update</button>
                                            </div>
                                         </form>
                                        </div>
                                      </div>
                                    </div>
                                     
                                    <form action="{{ route('destroy',$worker->id) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button href="" class="btn btn-sm btn-outline-danger ">Del</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                   
                  
                   
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection