@extends('base')
@section('title', 'Welcome Page')

<div>
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    
    <!-- Button trigger modal for adding new record -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewModal">
        Add New Student
    </button>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Address</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $std)
            <tr>
                <th scope="row">{{ $std->id }}</th>
                <td>{{ $std->name }}</td>
                <td>{{ $std->age }}</td>
                <td>{{ $std->gender }}</td>
                <td>{{ $std->address }}</td>
                <td>
                    <!-- Edit Button -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $std->id }}">Edit</button>
                    
                    <!-- Delete Button -->
                    <form action="{{ route('std.delete', $std->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $std->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('std.update', $std->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $std->name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Age</label>
                                    <input type="text" class="form-control" name="age" value="{{ $std->age }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <input type="text" class="form-control" name="gender" value="{{ $std->gender }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ $std->address }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>

    <!-- Modal for Adding New Student -->
    <div class="modal fade" id="addNewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('std.createNew') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Age</label>
                            <input type="text" class="form-control" name="age" placeholder="Enter your age">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <input type="text" class="form-control" name="gender" placeholder="Enter your gender">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter your address">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
