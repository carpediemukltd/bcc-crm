@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1><a href="{{ url()->previous() }}"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16"> <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/> </svg></a>  User Form</h1>
                     <p>Experience a simple yet powerful way to build Dashboards</p>
                  </div>
                  <!-- <div>
                     <a href="" class="btn btn-link btn-soft-light">
                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                           <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                        </svg>
                        Announcements
                     </a>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
      <div class="iq-header-img">
      <img src="{{asset('assets/images/dashboard/top-header.png')}}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header1.png')}}" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header2.png')}}" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header3.png')}}" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header4.png')}}" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         <img src="{{asset('assets/images/dashboard/top-header5.png')}}" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
      </div>
   </div>
</div>
<div class="content-inner container-fluid pb-0" id="page_layout">
   <div>
      <div class="row">
         <div class="col-sm-12 col-lg-6">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Basic Form</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form>
                     <div class="form-group">
                        <label class="form-label" for="email1101">Email address:</label>
                        <input type="email" class="form-control" id="email1101">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd">
                     </div>
                     <div class="checkbox mb-3">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                           <label class="form-check-label" for="flexCheckDefault3">
                           Remember me
                           </label>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary">Submit</button>
                     <button type="submit" class="btn btn-danger">cancel</button>
                  </form>
               </div>
            </div>
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Form Grid</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form>
                     <div class="row">
                        <div class="col">
                           <input type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                           <input type="text" class="form-control" placeholder="Last name">
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Input</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Input Text </label>
                        <input type="text" class="form-control" id="exampleInputText1" value="Mark Jhon" placeholder="Enter Name">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputEmail3">Email Input</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" value="markjhon@gmail.com" placeholder="Enter Email">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputurl">Url Input</label>
                        <input type="url" class="form-control" id="exampleInputurl" value="https://getbootstrap.com" placeholder="Enter Url">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputphone">Teliphone Input</label>
                        <input type="tel" class="form-control" id="exampleInputphone" value="1-(555)-555-5555">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputNumber1">Number Input</label>
                        <input type="number" class="form-control" id="exampleInputNumber1" value="2356">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputPassword3">Password Input</label>
                        <input type="password" class="form-control" id="exampleInputPassword3" value="markjhon123" placeholder="Enter Password">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputdate">Date Input</label>
                        <input type="date" class="form-control" id="exampleInputdate" value="2019-12-18">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputmonth">Month Input</label>
                        <input type="month" class="form-control" id="exampleInputmonth" value="2019-12">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputweek">Week Input</label>
                        <input type="week" class="form-control" id="exampleInputweek" value="2019-W46">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputtime">Time Input</label>
                        <input type="time" class="form-control" id="exampleInputtime" value="13:45">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputdatetime">Date and Time Input</label>
                        <input type="datetime-local" class="form-control" id="exampleInputdatetime" value="2019-12-19T13:45:00">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                     </div>
                     <button type="submit" class="btn btn-primary">Submit</button>
                     <button type="submit" class="btn btn-danger">cancel</button>
                  </form>
               </div>
            </div>
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Input Size</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form>
                     <div class="form-group">
                        <label class="form-label" for="colFormLabelSm">Small</label>
                        <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="form-control-sm">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="colFormLabel">Default</label>
                        <input type="email" class="form-control" id="colFormLabel" placeholder="form-control">
                     </div>
                     <div class="form-group mb-0">
                        <label class="form-label pb-0" for="colFormLabelLg">Large</label>
                        <input type="email" class="form-control form-control-lg" id="colFormLabelLg" placeholder="form-control-lg">
                     </div>
                  </form>
               </div>
            </div>
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Select Size</h4>
                  </div>
               </div>
               <div class="card-body">
                  <div class="form-group">
                     <label class="form-label">Small</label>
                     <select class="form-select form-select-sm mb-3 shadow-none">
                        <option selected="">Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label class="form-label">Default</label>
                     <select class="form-select mb-3 shadow-none">
                        <option selected="">Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label class="form-label">Large</label>
                     <select class="form-select form-select-lg shadow-none">
                        <option selected="">Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-lg-6">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Horizontal Form</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form class="form-horizontal">
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="email11">Email:</label>
                        <div class="col-sm-9">
                           <input type="email" class="form-control" id="email11" placeholder="Enter Your  email">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center mb-0" for="pwd2">Password:</label>
                        <div class="col-sm-9">
                           <input type="password" class="form-control" id="pwd2" placeholder="Enter Your password">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="remembercheck">
                           <label class="form-check-label" for="remembercheck">
                           Remember me
                           </label>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="submit" class="btn btn-danger">cancel</button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Form row</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form>
                     <div class="row">
                        <div class="col">
                           <input type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                           <input type="text" class="form-control" placeholder="Last name">
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Input</h4>
                  </div>
               </div>
               <div class="card-body">
                  <form>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputDisabled1">Disabled Input</label>
                        <input type="text" class="form-control" id="exampleInputDisabled1" disabled="" value="Mark Jhon">
                     </div>
                  </form>
                  <div class="card-body">
                     <form class="form-horizontal">
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center mb-0" for="email">Email:</label>
                           <div class="col-sm-9">
                              <input type="email" class="form-control" id="email" placeholder="Enter Your  email">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center mb-0" for="pwd1">Password:</label>
                           <div class="col-sm-9">
                              <input type="password" class="form-control" id="pwd1" placeholder="Enter Your password">
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="remebercheck2">
                              <label class="form-check-label" for="remebercheck2">
                              Remember me
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <button type="submit" class="btn btn-danger">cancel</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Form row</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="form-group">
                        <label class="form-label" for="exampleInputReadonly">Readonly</label>
                        <input type="text" class="form-control" id="exampleInputReadonly" readonly="" value="Mark Jhon">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleInputcolor">Input Color </label>
                        <input type="color" class="form-control" id="exampleInputcolor" value="#50b5ff">
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleFormControlSelect1">Select Input</label>
                        <select class="form-select" id="exampleFormControlSelect1">
                           <option selected="" disabled="">Select your age</option>
                           <option>0-18</option>
                           <option>18-26</option>
                           <option>26-46</option>
                           <option>46-60</option>
                           <option>Above 60</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="choices-single-default">Select Input New</label>
                        <select class="form-select" data-trigger name="choices-single-default" id="choices-single-default">
                           <option value="">This is a placeholder</option>
                           <option value="Choice 1">Choice 1</option>
                           <option value="Choice 2">Choice 2</option>
                           <option value="Choice 3">Choice 3</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="choices-multiple-default">Default</label>
                        <select class="form-select" data-trigger name="choices-multiple-default"  id="choices-multiple-default" multiple>
                           <option value="Choice 1" selected>Choice 1</option>
                           <option value="Choice 2">Choice 2</option>
                           <option value="Choice 3">Choice 3</option>
                           <option value="Choice 4" disabled>Choice 4</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="exampleFormControlSelect2">Example multiple select</label>
                        <select multiple="" class="form-select" id="exampleFormControlSelect2">
                           <option>select-1</option>
                           <option>select-2</option>
                           <option>select-3</option>
                           <option>select-4</option>
                           <option>select-5</option>
                           <option>select-6</option>
                           <option>select-7</option>
                           <option>select-8</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="form-label" for="customRange1">Range Input</label>
                        <input type="range" class="form-range" id="customRange1">
                     </div>
                     <div class="form-group">
                        <div class="form-check d-block">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                           <label class="form-check-label" for="flexCheckDefault11">
                           Default checkbox
                           </label>
                        </div>
                        <div class="form-check d-block">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked11" checked>
                           <label class="form-check-label" for="flexCheckChecked11">
                           Checked checkbox
                           </label>
                        </div>
                        <div class="form-check d-block">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" disabled>
                           <label class="form-check-label" for="flexCheckDisabled">
                           Disabled checkbox
                           </label>
                        </div>
                        <div class="form-check d-block">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                           <label class="form-check-label" for="flexCheckCheckedDisabled">
                           Disabled checked checkbox
                           </label>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="form-check d-block">
                           <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                           <label class="form-check-label" for="flexRadioDefault1">
                           Default radio
                           </label>
                        </div>
                        <div class="form-check d-block">
                           <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                           <label class="form-check-label" for="flexRadioDefault2">
                           Default checked radio
                           </label>
                        </div>
                        <div class="form-check d-block">
                           <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                           <label class="form-check-label" for="flexRadioDisabled">
                           Disabled radio
                           </label>
                        </div>
                        <div class="form-check d-block">
                           <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioCheckedDisabled" checked disabled>
                           <label class="form-check-label" for="flexRadioCheckedDisabled">
                           Disabled checked radio
                           </label>
                        </div>
                        <div class="form-check form-radio">
                           <input type="radio" id="customRadio5" name="customRadio5" class="form-check-input" disabled="" checked="">
                           <label class="form-check-label" for="customRadio5"> Selected and  disabled radio</label>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                           <input type="radio" id="customRadio6" name="customRadio1" class="custom-control-input">
                           <label class="custom-control-label" for="customRadio6"> Default radio</label>
                        </div>
                        <div class="form-group">
                           <div class="form-check d-block">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                              <label class="form-check-label" for="flexCheckDefault2">
                              Default checkbox
                              </label>
                           </div>
                           <div class="form-check d-block">
                              <input class="form-check-input" type="checkbox" value="" id="checkedcheck" checked>
                              <label class="form-check-label" for="checkedcheck">
                              Checked checkbox
                              </label>
                           </div>
                           <div class="form-check d-block">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled1" disabled>
                              <label class="form-check-label" for="flexCheckDisabled1">
                              Disabled checkbox
                              </label>
                           </div>
                           <div class="form-check d-block">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled11" checked disabled>
                              <label class="form-check-label" for="flexCheckCheckedDisabled11">
                              Disabled checked checkbox
                              </label>
                           </div>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                           <input type="radio" id="customRadio8" name="customRadio6" class="custom-control-input" checked="">
                           <label class="custom-control-label" for="customRadio8"> Selected radio</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                           <input type="radio" id="customRadio9" name="customRadio7" class="custom-control-input" disabled="">
                           <label class="custom-control-label" for="customRadio9"> disabled radio</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                           <input type="radio" id="customRadio10" name="customRadio8" class="custom-control-input" disabled="" checked="">
                           <label class="custom-control-label" for="customRadio10"> Selected and  disabled radio</label>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="form-check form-switch">
                           <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                           <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                        </div>
                        <div class="form-group">
                           <label for="customFile1" class="form-label custom-file-input">Choose file</label>
                           <input class="form-control" type="file" id="customFile1">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="customFile" class="form-label custom-file-input">Example file input</label>
                        <input class="form-control" type="file" id="customFile">
                     </div>
                     <div class="form-group">
                        <label for="customFile2" class="form-label custom-file-input">Choose file</label>
                        <input class="form-control" type="file" id="customFile2">
                     </div>
                     <button type="submit" class="btn btn-primary">Submit</button>
                     <button type="submit" class="btn btn-danger">cancel</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection