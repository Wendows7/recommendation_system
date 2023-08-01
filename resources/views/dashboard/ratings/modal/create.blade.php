 {{-- start create modal --}}
 <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Rating</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/dashboard/ratings" class="needs-validation" novalidate="">
          @csrf
          <div class="card-body">
              <div class="form-group ">
                  <label>Member</label>
                  <select class="form-control selectric" name="user_id" >
                    @foreach ($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Product</label>
                  <select class="form-control selectric" name="product_id" >
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                  </select>
                </div>
              <div class="form-group ">
                  <label>Parameter</label>
                  <select class="form-control selectric" name="parameter_id" >
                    @foreach ($parameters as $parameter)
                    <option value="{{ $parameter->id }}">{{ $parameter->name }}</option>
                    @endforeach
                  </select>
                </div>     
                <div class="form-group ">
                  <label>Value</label>
                  <select class="form-control selectric" name="nilai" >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </div>     
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
          </div>
        </div>
</div>
</div>