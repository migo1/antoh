<div class="row">
    <!-- left column -->
    <div class="col-md-12">

       
          <div class="card-body">
            <div class="form-group">
              <label>Book Category:</label>
              <select name="type_id" class="form-control">
                  @foreach ($types as $type)
              <option value="{{$type->id}}">{{$type->name}}</option>                                   
                  @endforeach
              </select>
            </div>

            <div class="form-group">
              <label >Book Title:</label>
              <input type="text" name="title" class="form-control"  placeholder="Enter book title.....">
            </div>

            <div class="form-group">
              <label>Book Edition:</label>
              <input type="text" class="form-control" name="edition" placeholder="Enter book edition...">
            </div>

            <div class="form-group">
                <label>Book Author:</label>
                <input type="text" class="form-control" name="author" placeholder="Enter book author...">
              </div>

              <div class="form-group">
                  <label>Total Books:</label>
                  <input type="text" class="form-control" name="total_books" placeholder="Enter totlal books available...">
                </div>
          </div>
     
    </div>
  </div>