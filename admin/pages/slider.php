<div class="row">
  <div class="col-md-4">
    <form id="sliderForm">
      <div class="mb-2">
        <label>Enter Offer Title</label>
        <input class="form-control" id="title"/>
      </div>
      <div class="mb-2">
        <label>Enter Offer Description</label>
        <input class="form-control" id="desc">
      </div>
      <div class="mb-2">
        <label>Select direction</label>
        <select class="form-control" id="captionDirection">
          <option>Chose Direction</option>
          <option value="vertical">Vertical</option>
          <option value="horizontal">horizontal</option>
        </select>
      </div>
      <div class="mb-2 d-flex">
        <div class="mx-2">
          <label>Handle vertical</label>
          <select class="form-control" id="handleVertical">
            <option>Select Vertical</option>
            <option value="flex-start">Top</option>
            <option value="flex-end">Buttom</option>
            <option value="center">Center</option>
          </select>
        </div>
        <div class="mx-2">
          <label>Handle Horizontal</label>
          <select class="form-control" id="handleHorizontal">
            <option>Select HoriZontal</option>
            <option value=" flex-start">Left</option>
            <option value="flex-end">Right</option>
            <option value="center">Center</option>
            <option value="space-around">Space Around</option>
            <option value="space-between">Space Between</option>
          </select>
        </div>
      </div>
      <div class="mb-2 d-flex">
        <div id="txtContainer">
          <label>Change Color</label>
          <input type="color" id="txtInput"/>
        </div>
        <div>
          <label>Font Size</label>
          <input type="range" id="fontInput"/>
        </div>
      </div>
      <div id="txtContainer">
        <input type="color" id="txtInput"/>
        <span>Bg Theme</span>
      </div>
      <div class="mb-2">
        <label>Upload Image</label>
        <input class="form-control" type="file" id="uploadSliderPic"/>
      </div>
      <div>
        <button class="btn btn-primary rounded-0">Create</button>
      </div>
    </form>
  </div>
  <div class="col-md-8">
    <div class="carousel-item active">
      <img src="https://www.w3schools.com/bootstrap/ny.jpg" class="d-block" style="width:100%" id="sliderPic"/>
      <div id="caption">
       <div class="carousel-caption" id="sliderCaption">
       <h3 id="captionTitle">Describe title</h3>
       <p id="captionDesc">Add description</p>
     </div>
     </div>
    </div>
  </div>
</div>
