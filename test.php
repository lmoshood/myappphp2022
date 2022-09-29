<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>
    <form id="dataform">
        <p id="msg"> This is our form </p>
        <div>
            <input type="text" name="" id="firstname" placeholder="enter name">
        </div>
        <div>
            <input type="text" name="" id="lastname" placeholder="enter name">
        </div>

        <div>
            <input type="text" name="" id="email" placeholder="enter name">
        </div>
        <div>
            <input type="text" name="" id="password" placeholder="enter name">
        </div>
        <div>
            <input type="text" name="" id="dob" placeholder="enter name">
        </div>

        <button type="button" id="submit">Submit</button>
    </form>

    <div class="modal" tabindex="-1" id="success">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p id="formdata">Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
              <button type="button" id="closebtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    <script>
        $(document).ready(function(){
            // we display image on a paragraph with id msg
            $('#msg').html("<img src='images/airtel.jpg' >").attr('alt', 'Airtel');
            // we use this to show datepicker for date of birth i.e dob
            $('#dob').datepicker()

            // we you fill the form and you click submit button we get the form values
            $('#submit').on('click', function(){
               var firstname = $('#firstname').val()
               var lastname = $('#lastname').val()
               var password = $('#password').val()
               var email = $('#email').val()
               var dob = $('#dob').val()
                $('#dataform')[0].reset()
                data ={
                    firstname: firstname,
                    lastname: lastname,
                    password: password,
                    email: email,
                    dob: dob
                }
               // console.log(data);
              $.ajax({
                url: 'form.php',
                type: 'POST',
                data: data,
                success:function(result){
                   
                    Swal.fire(  'Success!', 'Registered successfully!', 'success')
                   
                },
                error: function(err){
                    Swal.fire(  'warning!', 'Not Registered successfully!', 'warning')
                }
              });
                // alternatively we use sweet alert instead of modal
               // Swal.fire(  'Good job!', 'You clicked the button!', 'success')
            });

            // if you use bootstrap modal, this close the modal when clicked close
            $('#closebtn').on('click', function(){ 
                $('#success').hide()
            });
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>









