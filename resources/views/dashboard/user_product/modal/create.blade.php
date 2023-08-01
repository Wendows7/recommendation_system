

{{-- start edit modal --}}
@foreach ($products as $product => $value )
     
<div class="modal fade" tabindex="-1" role="dialog" id="createModal{{ $value->id }}">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title">Add Rating</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <form method="post" action="/dashboard/ratings_user/" enctype="multipart/form-data" class="needs-validation" novalidate="">
         @csrf
         <div class="card-body">
          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> 
               <div class="form-group">
                <label>Product</label>
                <select class="form-control selectric" name="product_id" >
                  <option value="{{ $value->id }}" >{{ $value->name }}</option>
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
         <button type="submit" class="btn btn-primary">Add Rating</button>
       </div>
     </form>
   </div>
 </div>
</div>
</div>
{{-- @dd($value->nilai) --}}
@endforeach

