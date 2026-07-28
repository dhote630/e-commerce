<div class="row">
  <div class="col-md-5">
    <form id="brandForm">
      <div class="mb-3">
        <label>Select category</label>
        <select class="form-control" id="catId" required>

        </select>
      </div>
      <div class="mb-3">
        <label>Enter brand name</label>
        <input class="form-control" id="brandName" required/>
      </div>
      <div>
        <button class="btn btn-primary rounded-0" id="createBtn">Create Brand</button>
      </div>
    </form>
  </div>
  <div class="col-md-7">
    <table class="table table-primary text-center p-2" id="brand_list">
      <tr>
        <td>S/No</td>
        <td>Category</td>
        <td>Brand</td>
        <td>Action</td>
      </tr>
    </table>
  </div>
</div>
