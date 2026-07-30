<div>
<form id="productForm">
<div class="row">
  <div class="col-md-6">
    <div class="mb-2">
      <label>Select Brand</label>
      <select class="form-control" id="brand_list">
      </select>
    </div>
  </div>
  <div class="col-md-6">
    <div class="mb-2">
      <label>Enter Product Name</label>
      <input class="form-control" id="name"/>
    </div>
  </div>
  <div class="col-md-6">
    <div class="mb-2">
      <label>Enter Price</label>
      <input class="form-control" id="price"/>
    </div>
  </div>
  <div class="col-md-6">
    <div class="mb-2">
      <label>Enter Quantity</label>
      <input class="form-control" id="qty"/>
    </div>
  </div>
  <div class="col-md-12">
    <div class="mb-2">
       <label>Enter Description</label>
       <div id="editor" >
       </div>
    </div>
  </div>
  <div class="col-md-3 p-3">
    <div id="picture">
      <div id="blur" class="product_pic" keyname="front_pic">
        <p>Front Pic</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 p-3">
    <div id="picture">
      <div id="blur" class="product_pic" keyname="back_pic">
        <p>Back Pic</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 p-3">
    <div id="picture">
      <div id="blur" class="product_pic" keyname='left_pic'>
        <p>Left Pic</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 p-3">
    <div id="picture">
      <div id="blur" class="product_pic" keyname="right_pic">
        <p>Right Pic</p>
      </div>
    </div>
  </div>
  <div class="col-md-12 mb-2">
    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated" id="product_progress"></div>
    </div>
  </div>
  <div>
    <button class="btn btn-primary rounded-0" id="productBtn">Create Product</button>
  </div>
</div>
</form>
</div>
