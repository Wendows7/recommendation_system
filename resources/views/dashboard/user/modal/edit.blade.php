

{{-- start edit modal --}}
@foreach ($users as $user => $value)
     
<div class="modal fade" tabindex="-1" role="dialog" id="editModal{{ $value->id }}">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title">Edit User</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <form method="post" action="/user/{{ $value->id }}" class="needs-validation" novalidate="">
         @method('put')
         @csrf
         <div class="card-body">
             <div class="form-group ">
                 <label>Name</label>
                 <input type="text" name="name" class="form-control"  value="{{ old('name', $value->name) }}" required="">
                 <div class="invalid-feedback">
                   Please fill this form
                 </div>
               </div>
               <div class="form-group ">
                <label>Age</label>
                <input type="number" name="age" class="form-control"  value="{{ old('age', $value->age) }}" required="">
                <div class="invalid-feedback">
                  Please fill this form
                </div>
              </div>
              <div class="form-group">
               <label>Gender</label>
               <select class="form-control selectric" name="gender" >
                 <option value="pria" {{ $value->gender == "pria" ? 'selected' : '' }}>Pria</option>
                 <option value="wanita" {{ $value->gender == "wanita" ? 'selected' : '' }}>Wanita</option>
               </select>
             </div> 
              <div class="form-group">
               <label>Level</label>
               <select class="form-control selectric" name="level" >
                 <option value="admin" {{ $value->level == "admin" ? 'selected' : '' }}>Admin</option>
                 <option value="user" {{ $value->level == "user" ? 'selected' : '' }}>User</option>
               </select>
             </div> 
           
               
               <div class="form-group ">
                 <label>Email</label>
                 <input type="email"  name="email" class="form-control"  value="{{ old('email', $value->email) }}" required="">
                 <div class="invalid-feedback">
                   Please fill this form
                 </div>
               </div>
               <div class="form-group ">
                 <label>Password</label>
                 <input type="password" name="password" class="form-control"  >
               </div>
             </div>
       </div>
       <div class="modal-footer bg-whitesmoke br">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Update</button>
       </div>
     </form>
   </div>
 </div>
</div>
</div>
@endforeach
