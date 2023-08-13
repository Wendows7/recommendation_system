

{{-- start edit modal --}}
@foreach ($products as $product => $value)
     
<div class="modal fade" tabindex="-1" role="dialog" id="editModal{{ $value->id }}">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title">Edit Product</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <form method="post" action="/dashboard/products/{{ $value->id }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
         @method('put')
         @csrf

         <input type="hidden" name="oldImage" value="{{ $value->image }}">
         <div class="card-body">
             <div class="form-group ">
                 <label>Name</label>
                 <input type="text" name="name" class="form-control"  value="{{ old('name', $value->name) }}" required="">
                 <div class="invalid-feedback">
                   Please fill this form
                 </div>
               </div>
               
               <div class="form-group">
                <label>Description</label>
                <textarea class="summernote-simple" name="description">{{ old('description', $value->description) }}</textarea>
                <div class="invalid-feedback">
                  Please fill this form
                </div>
              </div>
               <div class="form-group ">
                <label>Image</label>
                @if ($value->image === null)
                    
                <input type="file" name="image" class="form-control"  value="{{ old('image', $value->image) }}" ><br>
                <img src="{{ asset('user_assets/assets/img/blank-image.jpg') }}" width="100" alt="">
                @else
                <input type="file" name="image" class="form-control"  value="{{ old('image', $value->image) }}" ><br>
                <img src="{{ asset($value->image) }}" width="100" alt="">
                    
                @endif
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
