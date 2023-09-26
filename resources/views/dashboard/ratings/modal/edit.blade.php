

{{-- start edit modal --}}
@foreach ($ratings as $rating => $value )

<div class="modal fade" tabindex="-1" role="dialog" id="editModal{{ $value->id }}">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title">Edit Rating</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <form method="post" action="/dashboard/ratings/{{ $value->id }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
         @method('put')
         @csrf
         <div class="card-body">
             <div class="form-group ">
              <label>Member</label>
              <select class="form-control selectric" name="user_id" >
                @foreach ($members as $member)
                @if (old('user_id', $value->user_id) == $member->id)
                <option value="{{ $member->id }}" selected>{{ $member->name }}</option>
                @else
                <option value="{{ $member->id }}" >{{ $member->name }}</option>
                @endif
                @endforeach
              </select>
              </div>

               <div class="form-group">
                <label>Product</label>
                <select class="form-control selectric" name="product_id" >
                  @foreach ($products as $product)
                  @if (old('product_id', $value->product_id) == $product->id)
                  <option value="{{ $product->id }}" selected>{{ $product->name }}</option>
                  @else
                  <option value="{{ $product->id }}" >{{ $product->name }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
               <div class="form-group">
                <label>Parameter</label>
                <select class="form-control selectric" name="parameter_id" >
                  @foreach ($parameters as $parameter)
                  @if (old('parameter_id', $value->parameter_id) == $parameter->id)
                  <option value="{{ $parameter->id }}" selected>{{ $parameter->name }}</option>
                  @else
                  <option value="{{ $parameter->id }}" >{{ $parameter->name }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
               <div class="form-group">
                <label>Rating</label>
                <select class="form-control selectric" name="nilai" >
                  <option value="1" {{ $value->nilai == 1 ? 'selected' : '' }}>1</option>
                  <option value="2" {{ $value->nilai == 2 ? 'selected' : '' }}>2</option>
                  <option value="3" {{ $value->nilai == 3 ? 'selected' : '' }}>3</option>
                  <option value="4" {{ $value->nilai == 4 ? 'selected' : '' }}>4</option>
                  <option value="5" {{ $value->nilai == 5 ? 'selected' : '' }}>5</option>
                </select>
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
{{-- @dd($value->nilai) --}}
@endforeach

