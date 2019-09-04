<div class="row">
    <div class="col-md-12">
      
          <div class="card-body">
              {{--
            <div class="form-group" id="book_id">
              <label>Book:</label>
              <select name="book_id" class="form-control">
                  @foreach ($books as $book)
              <option value="{{$book->id}}">{{$book->title}}</option>                                   
                  @endforeach
              </select>
            </div>
        
      
                    
        --}}
            <input type="hidden" name="book_id" id="book_id">


        <input type="hidden" name="member_id" id="member_id">
        <input type="hidden" name="borrow_date" id="borrow_date">
        <input type="hidden" name="return_date" id="return_date">


        


        <div class="form-group">
                <label>Return Day:</label>
                <input type="text" class="form-control" name="return_day" id="return_day" placeholder="yyyy-mm-dd">
              </div>


                 {{-- <div class="form-group">
                    <label>Status:</label>
                    <input type="text" class="form-control" name="status" placeholder="Enter totlal books available...">
                  </div>--}}

                <input type="hidden" class="form-control" name="total_days" id="total_days">

                <input type="hidden" class="form-control" name="amount" id="amount">




      <div class="form-group" id="status">
    <strong>Staus:</strong>
    <div class="form-check" >
      <label class="form-check-label">
        <input type="radio" value="returned" class="form-check-input" name="status">returned
      </label>
    </div>
    <div class="form-check">
          <label class="form-check-label">
            <input type="radio" value="Lost" class="form-check-input"  name="status" >Lost
          </label>
             </div>
             <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" value="payment pending" class="form-check-input"  name="status" >payment pending
                    </label>
                       </div>
             <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" value="Paid" class="form-check-input"  name="status" >Paid
                    </label>
                       </div>

</div>
   
          
            </div>
    </div>
  </div>