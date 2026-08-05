<div class="row">
  <div class="col-md-4">
    <form id="sliderForm">
      <div class="mb-2">
        <label style="color:pink">Enter Offer Title</label>
        <input class="form-control" id="title" placeholder="type here......"/>
      </div>
      <div class="mb-2">
        <label style="color:pink">Enter Offer Description</label>
        <input class="form-control" id="desc"  placeholder="type here......">
      </div>
      <div class="mb-2">
        <label style="color:pink">Select direction</label>
        <select class="form-control" id="captionDirection">
          <option>Choose Direction</option>
          <option value="vertical">Vertical</option>
          <option value="horizontal">horizontal</option>
        </select>
      </div>
      <div class="mb-3 d-flex">
        <div class="mx-1">
          <label style="color:pink">Handle vertical</label>
          <select class="form-control" id="handleVertical">
            <option>Select Vertical</option>
            <option value="flex-start">Top</option>
            <option value="flex-end">Buttom</option>
            <option value="center">Center</option>
          </select>
        </div>
        <div class="mx-1">
          <label style="color:pink">Handle Horizontal</label>
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
      <div class="row">
        <div class="col-md-6 mb-2" id="fontContainer">
          <label style="color:pink">Handle Text Size</label>
          <input type="range" id="fontInput"/>
        </div>
        <div class="col-md-6 mb-2" id="txtContainer">
          <label style="color:pink">Handle Text Color</label>
          <input type="color" id="txtInput" class="form-control"/>
        </div>
      </div>
      <div class="mb-2">
        <label style="color:pink">Upload Image</label>
        <input class="form-control" type="file" id="uploadSliderPic"/>
      </div>
      <div>
        <button class="btn my-2" style="background:pink">Create</button>
      </div>
    </form>
  </div>
  <div class="col-md-8">
    <div class="carousel-item active">
      <img src="https://www.w3schools.com/bootstrap/ny.jpg" class="d-block" style="width:100%;height:400px;" id="sliderPic"/>
      <div id="caption">
       <div class="carousel-caption" id="sliderCaption">
       <h3 id="captionTitle" class="caption_text">Describe title</h3>
       <p id="captionDesc" class="caption_text">Add description</p>
     </div>
     </div>
    </div>
  </div>
</div>
