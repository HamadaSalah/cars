@extends('master')
@section('section')
<div class="header">
    <div class="overlayy">
      <form action="{{route('serachByName')}}" method="get">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">اسم القطعة</legend>
            <div class="control-group">
                <div class="controls ">
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="اسم القطعة" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                      
                    <i class="icon-time"></i>
                </div>
            </div>
        </fieldset>
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">  رقم OEM </legend>
            <div class="control-group">
                <div class="controls ">
                    <div class="input-group mb-3">
                        <input type="text" name="oem" class="form-control" placeholder="1234445" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                    <i class="icon-time"></i>
                </div>
            </div>
        </fieldset>
        <button class="btn btn-success sebtn" type="submit">بحث</button>
      </form>
    </div>
  </div>
  <section class="selectcaa"> 
    <div class="container ">
      {{-- <div class="selectcar">
        <h1>اختر مواصفات السيارة التي تبحث عنها</h1>
        <div class="selectcarbody">
          <div class="tab-status">
            <span class="tab active"></span>
            <span class="tab"></span>
            <span class="tab"></span>
          </div>
          <form action="#">
            <div role="tab-list">
              <div role="tabpanel" id="color" class="tabpanel">
                <h3>السنة</h3>
                <div class="btn-group" data-toggle="buttons">
                  <input id="2023" type="checkbox" value="none" name="year[]" class="form-input"> 2023
                  <label for="2023" class="btn btn-primary YearClick" data-value="2023">
                  </label>
                </div>
                
                <textarea name="color"></textarea>
              </div>
              <div role="tabpanel" id="hobbies" class="tabpanel hidden">
                <h3>What are your hobbies?</h3>
                <textarea name="hobbies" class="form-input" placeholder="Mountain climbing, Guitar, Skateboarding"></textarea>
              </div>
                <div role="tabpanel" id="occupation" class="tabpanel hidden">
                <h3>What is your occupation?</h3>
                <textarea name="occupation" class="form-input" placeholder="Web Designer"></textarea>
              </div>
            </div>
              <div class="pagination">
                <a class="btn hidden" id="prev">Previous</a>
                <a class="btn" id="next">Continue</a>
                <button class="btn btn-submit hidden" id="submit">Submit</button>
              </div>
            </form>
        </div>

      </div> --}}

      <div class="container">
        <div class="carselectorss">
          <h2>اختر مواصفات السيارة التي تبحث عنها</h2>
          <form class="carform" action="{{route('SeaechSteps')}}" method="get">
            <div class="tab-content">
              <div class="tab-pane active" id="step1">
                <div class="list-group">
                  <?php
                    for($i=2023; $i>1988; $i--) {
                      echo '<a href="#step2" class="list-group-item list-group-item-action" data-toggle="tab" data-year="' .$i.  '">' .$i.  '</a>';
                    }
                    ?>
                   <!-- Add more car year options as needed -->
                </div>
              </div>
              <div class="tab-pane" id="step2">
                <div class="list-group">
                  @foreach ($cars as $car)
                  <a href="#step3" class="list-group-item list-group-item-action SelectCarName"  data-toggle="tab" data-make="{{$car->id}}" data-make2="{{$car->name}}">{{$car->name}}</a>
                  @endforeach
                  <!-- Add more car make options as needed -->
                </div>
              </div>
              <div class="tab-pane" id="step3">
                <div class="list-group" id="CarModelss">
                   <!-- Add more car model options as needed -->
                </div>
              </div>
              <div class="tab-pane" id="step4">
                <h3> الاختيارات التي تمت</h3>
                <ul>
                  <li>السنة: <input  id="selected-year" name="yearText"/> </li>
                  <li>النوع: <input   id="selected-make" name="carcatText"> </li>
                  <li>الموديل: <input  id="selected-model" name="carmodelText"></span></li>
                </ul>
                <input type="hidden" name="year" id="selected-year-1" value=""/>
                <input type="hidden" name="carcat" id="selected-make-1" value="">
                <input type="hidden" name="carmodel" id="selected-model-1" value="">
                <button type="submit" class="btn btn-primary">بحث</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      
    </div>
  </section>
<script>
//////
//////
//////
//////
// JavaScript code for retrieving car categories and populating a select box

// Get a reference to the car category select box

// Add a click event listener to the button
$(".SelectCarName").on('click', function() {
  // Get the value of the data-id attribute of the button
  const id = $(this).data('make');
  // Send an AJAX request to the server
  $.ajax({
    url: '{{route('getModels')}}',
    type: 'POST',
    contentType: 'application/json',
    data: JSON.stringify({ id }),
    success: function(response) {
      console.log( response);
      $.each(response, function(index,res){
                    $("#CarModelss").append( `<a href="#step4" class="list-group-item list-group-item-action" data-toggle="tab" id="Okay" data-modd="${res.id}"  data-modelss="${res.name}">${res.name}</a>`);
          });

    },
    error: function(xhr, status, error) {
      console.error('Request failed:', status, error);
    }
  });
});


$(document).ready(function() {
 
 
  var carYear, carMake, carModel;

  $('body').delegate('.list-group-item', 'click', function(e) {
    e.preventDefault();
    var $this = $(this);
    if ($this.data('year')) {
      carYear = $this.data('year');
      $('#selected-year').val(carYear);
      $('#selected-year-1').val(carYear);
      console.log(carYear);
    }
    if ($this.data('make2')) {
      carMake = $this.data('make2');
      carMake1 = $this.data('make');
      $('#selected-make').val(carMake);
      $('#selected-make-1').val(carMake1);
      console.log(carMake);

    }
    if ($this.data('modelss')) {
      carModel = $this.data('modelss');
      carModel1 = $this.data('modd');
      $('#selected-model').val(carModel);
      $('#selected-model-1').val(carModel1);
      console.log(carModel);

    }
    $this.tab('show');
  });

  $('.carform').on('submit', function(e) {
    // e.preventDefault();
    // TODO: Submit form data to server
    console.log('Selected Car Year: ' + carYear);
    console.log('Selected Car Make: ' + carMake);
    console.log('Selected Car Model: ' + carModel);
  });
});
</script>
@endsection