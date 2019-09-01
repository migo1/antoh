<div class="row">
    <div class="col-md-12">
    
          <div class="card-body">
            <div class="form-group" id="book_id">
              <label>Book:</label>
              <select name="book_id" class="form-control">
                  @foreach ($books as $book)
              <option value="{{$book->id}}">{{$book->title}}</option>                                   
                  @endforeach
              </select>
            </div>
        <input type="hidden" name="member_id" id="member_id">

            <div class="form-group">
              <label >Borrow Date:</label>
              <input type="text" name="borrow_date" id="borrow_date" class="form-control"  placeholder="yyyy-mm-dd">
            </div>

            <div class="form-group">
              <label>Return Date:</label>
              <input type="text" class="form-control" name="return_date" id="return_date" placeholder="yyyy-mm-dd">
            </div>
{{--
            <div class="form-group">
                <label>Return Day:</label>
                <input type="text" class="form-control" name="return_day" placeholder="yyyy-mm-dd">
              </div>

              <div class="form-group">
                  <label>Total Books:</label>
                  <input type="text" class="form-control" name="total_books" placeholder="Enter totlal books available...">
                </div>--}}


                <input type="hidden" class="form-control" name="return_day" id="return_day" >
                <input type="hidden" class="form-control" name="total_days" id="total_days">
                <input type="hidden" class="form-control" name="status" id="status">
                <input type="hidden" class="form-control" name="amount" id="amount">




          </div>
     
    </div>
  </div>