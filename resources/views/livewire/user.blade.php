<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @role('Admin')
                    <div class="insert">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ $name }}">
                            </div>
                            <div class="col">
                                <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ $email }}">
                            </div>
                            <div class="col">
                                <input type="password" wire:model="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" autocomplete="new-password">
                            </div>
                            @if ($edit)
                            <button type="submit" wire:click="update({{ $id }})" class="btn btn-primary">Update</button>
                            @else
                            <button type="submit" wire:click="insert" class="btn btn-success">Add</button>
                            @endif
                        </div>
                    </div>
                    @else
                    <h5>Users</h5>
                    @endrole
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                @role('Admin')
                                <th>Admin</th>
                                <th>Writer</th>
                                <th>Editor</th>
                                <th>Publisher</th>
                                <th></th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="text-center">
                                <td scope="row">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @role('Admin')
                                <td>
                                    @forelse ($user->roles as $role)
                                        @if($role->name == 'Admin')
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" checked class="custom-control-input" id="Admin{{ $user->id }}" wire:click="RemoveRole('Admin', {{ $user->id }})">
                                                <label class="custom-control-label" for="Admin{{ $user->id }}"></label>
                                            </div>
                                        @else
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="Admin{{ $user->id }}"
                                                    wire:click="AssignRole('Admin', {{ $user->id }})">
                                                <label class="custom-control-label" for="Admin{{ $user->id }}"></label>
                                            </div>
                                        @endif
                                    @break
                                    @empty
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="Admin{{ $user->id }}"
                                                wire:click="AssignRole('Admin', {{ $user->id }})">
                                            <label class="custom-control-label" for="Admin{{ $user->id }}"></label>
                                        </div>
                                    @endforelse
                                </td>
                                <td>
                                    @forelse ($user->roles as $role)
                                        @if($role->name == 'Writer')
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" checked class="custom-control-input" id="Writer{{ $user->id }}"
                                                    wire:click="RemoveRole('Writer', {{ $user->id }})">
                                                <label class="custom-control-label" for="Writer{{ $user->id }}"></label>
                                            </div>
                                        @else
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="Writer{{ $user->id }}"
                                                    wire:click="AssignRole('Writer', {{ $user->id }})">
                                                <label class="custom-control-label" for="Writer{{ $user->id }}"></label>
                                            </div>
                                        @endif
                                    @break
                                    @empty
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="Writer{{ $user->id }}"
                                                wire:click="AssignRole('Writer', {{ $user->id }})">
                                            <label class="custom-control-label" for="Writer{{ $user->id }}"></label>
                                        </div>
                                    @endforelse
                                </td>
                                <td>
                                    @forelse ($user->roles as $role)
                                        @if($role->name == 'Editor')
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" checked class="custom-control-input" id="Editor{{ $user->id }}"  wire:click="RemoveRole('Editor', {{ $user->id }})">
                                                <label class="custom-control-label" for="Editor{{ $user->id }}"></label>
                                            </div>
                                        @else
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="Editor{{ $user->id }}"
                                                    wire:click="AssignRole('Editor', {{ $user->id }})">
                                                <label class="custom-control-label" for="Editor{{ $user->id }}"></label>
                                            </div>
                                        @endif
                                    @break
                                    @empty
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="Editor{{ $user->id }}"
                                                wire:click="AssignRole('Editor', {{ $user->id }})">
                                            <label class="custom-control-label" for="Editor{{ $user->id }}"></label>
                                        </div>
                                    @endforelse
                                </td>
                                <td>
                                    @forelse ($user->roles as $role)
                                        @if($role->name == 'Publisher')
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" checked class="custom-control-input" id="Publisher{{ $user->id }}" wire:click="RemoveRole('Publisher', {{ $user->id }})">
                                            <label class="custom-control-label" for="Publisher{{ $user->id }}"></label>
                                        </div>
                                        @else
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="Publisher{{ $user->id }}"
                                                    wire:click="AssignRole('Publisher', {{ $user->id }})">
                                                <label class="custom-control-label" for="Publisher{{ $user->id }}"></label>
                                            </div>
                                        @endif
                                    @break
                                    @empty
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="Publisher{{ $user->id }}"
                                                wire:click="AssignRole('Publisher', {{ $user->id }})">
                                            <label class="custom-control-label" for="Publisher{{ $user->id }}"></label>
                                        </div>
                                    @endforelse
                                </td>
                                <td>
                                    <a href="#" wire:click="edit({{ $user->id }})" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="#" wire:click="delete({{ $user->id }})" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                                @endrole
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>