@extends('layouts.lab')

@section('content')
<body>
<div class ="py-12 mx-3 m-4">
  <div class ="card">
    <div class ="card-header">Specimen Receiving</div>
      <div class="card-body">
        <div class ="row">
          <div class ="col">
            <div class="mb-3">
                <label for="rfid1" class="form-label">UID 1</label>
                <input type="text" class="form-control" id="rfid1" placeholder="Specimen Tag" focus >
            </div>
          </div>
          <div class="col">
            <div class="mb-3">
                <label for="rfid1" class="form-label">UID 2</label>
                <input type="text" class="form-control" id="rfid1" placeholder="Laboratory Request Tag">
            </div>
          </div>
        </div>
          
          <div class="mb-3">
            <label for="LabNumber" class="form-label">Laboratory Number</label>
            <input type="text" class="form-control" id="labNumberId" placeholder="Laboratory Request Tag">
          </div>
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label for="LabNumber" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="labNumberId" placeholder="(Last Name, First Name, MI)">
              </div>
            </div>

            <div class="col">
              <label>Date of Birth</label>
              <input type="date" class="form-control" id="labNumberId" placeholder="Laboratory Request Tag">
            </div>
            
          </div>
          
          <div class ="form-group">
            <div class ="row">
              <div class="col">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" placeholder="Age">
              </div>
              <div class ="col">
                <label>Gender</label>
                <select class="form-select" aria-label="Default select example">
                <option selected>Choose gender</option></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select>
              </div>
              <div class ="col">
                <label>Date of Admission</label>
                <input type="date" class="form-control" id="labNumberId" placeholder="Laboratory Request Tag">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
            <select class="form-select" aria-label="Default select example">
              <option selected>Specimen Type</option></option>
              <option value="1">T</option>
              <option value="2">T</option>
              <option value="3">T</option>
            </select>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

          <div class ="row">
            <div class ="col">
              <button type="submit" class ="btn btn-info">Submit</button>
            </div>
          </div>
      </div>
  </div>
</div>







    <!-- Modal here
    <div class="modal fade" id="modal-receive" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Specimen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        {!! Form::open(['route' => 'samples.store', 'method' => 'POST']) !!}
            {{ csrf_field() }}
        <div class="modal-body">
            
                <div class="form-group">
                  <label>BP Number:</label>
                  <input id="rfidcard" type="text" name="bpnumberID" class="form-control" placeholder="BP Number is auto-generated skip this box" setfocus>
                </div>

                <div class="form-group">
                    <label>Facility Name:</label>
                    <input type="text" name="faclity_name" class="form-control" placeholder="Enter facility name">
                  </div>
<hr>
                  <div class="form-group">
                    <div class ="row">
                      <div class ="col">
                        <label>Specimen Type:</label> </br>
                        <select name="specimenType" class = 'box'>
                          <option value="">Select...</option>
                          <option value="Aliqouted Sample">Aliqouted Sample</option>
                          <option value="Whole Blood">Whole Blood</option>
                          <option value="FFP">FFP</option>
                          <option value="PC">PC</option>
                          <option value="PRBC">PRBC</option>
                          <option value="Cryosupernate">Cryosupernate</option>
                          <option value="Blood Smear">Blood Smear</option>
                          <option value="Dried Blood Spot">Dried Blood Spot</option>
                          <option value="Apheresis Unit">Apheresis Unit</option>
                        </select>
                    </div>
                   

                    <div class ="col">
                    <label>Type of Testing:</label> </br>
                    <select name="typeOfTesting" class = 'box'>
                      <option value="">Select...</option>
                      <option value="HIV">HIV</option>
                      <option value="HCV">HCV</option>
                      <option value="NAT">NAT</option>
                    </select>

                    </div>
                    </div>
                  </div>
<hr>
                  <div>

                  <div class="form-group">
                    
                    <label>Date Receive:</label>
                    <input type="date"  name="dateReceive" class="form-control" placeholder="Date">

                    <label>Time Receive:</label>
                    <input type="time" name="timeReceive" class="form-control" placeholder="Time">
                    </div>
                    
                  <div class="form-group">
                    <label>Specimen Status:</label>
                    <input type="text" name="specimenStatus" class="form-control" placeholder="Enter Status">
                  </div>

                  <div class="form-group">
                    <label>Remarks:</label>
                    <input type="text" name="remarks" class="form-control" placeholder="Remarks">
                  </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              
        </div>
    </form>
    </div>
    </div>
</div> -->
<!-- {{-- model end here  --}} -->


</div>
</body>

@endsection