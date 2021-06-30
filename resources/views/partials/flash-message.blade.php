@if (session('success'))
<div class="alert alert-success alert-block" style="margin-top: 20px;">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>Success</strong>
</div>
@endif

@if (session('status'))
<div class="alert alert-success alert-block" style="margin-top: 20px;">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>You have been successfully login.</strong>
</div>
@endif
  
@if (session('error'))
<div class="alert alert-danger alert-block" style="margin-top: 20px;">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>Your request could not be processed</strong>
</div>
@endif

@if (session('not_verified'))
<div class="alert alert-danger alert-block" style="margin-top: 20px;">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>You need to verify your email address</strong>
</div>
@endif
   
@if (session('warning'))
<div class="alert alert-warning alert-block" style="margin-top: 20px;">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
   
@if (session('info'))
<div class="alert alert-info alert-block" style="margin-top: 20px;">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
  
@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    Please check the form below for errors
</div>
@endif