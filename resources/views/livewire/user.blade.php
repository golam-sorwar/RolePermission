<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="insert">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ $name }}">
                            </div>
                            <div class="col">
                                <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ $email }}">
                            </div>
                            <div class="col">
                                <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" autocomplete="new-password">
                            </div>
                            @if ($edit)
                            <button type="submit" wire:click="update({{ $id }})" class="btn btn-primary">Update</button>
                            @else
                            <button type="submit" wire:click="insert" class="btn btn-success">Add</button>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Admin</th>
                                <th>Writer</th>
                                <th>Editor</th>
                                <th>Publisher</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="text-center">
                                <td scope="row">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="Admin{{ $user->id }}" wire:click="AssignRole('Admin')">
                                        <label class="custom-control-label" for="Admin{{ $user->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="Writer{{ $user->id }}"  wire:click="AssignRole('Writer')">
                                        <label class="custom-control-label" for="Writer{{ $user->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="Editor{{ $user->id }}"  wire:click="AssignRole('Editor')">
                                        <label class="custom-control-label" for="Editor{{ $user->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="Publisher{{ $user->id }}" wire:click="AssignRole('Publisher')">
                                        <label class="custom-control-label" for="Publisher{{ $user->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" wire:click="edit({{ $user->id }})" class="btn btn-sm btn-dark">Edit</a>
                                    <a href="#" wire:click="delete({{ $user->id }})" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>