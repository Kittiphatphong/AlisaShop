<div>
   <button class="btn btn-dark mb-1">Register</button>
    <div class="table-responsive-sm rounded">
    <table class="table table-bordered ">
       <thead class="bg-light">
       <tr>
       <th>Name</th>
       <th>Username</th>
       </tr>
       </thead>
       <tbody>
       @foreach($users as $user)
       <tr>
       <td>{{$user->name}}</td>
       <td>{{$user->email}}</td>
       </tr>
       @endforeach
       </tbody>
    </table>
    </div>
</div>
