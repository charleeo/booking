function _(x)
{
  return document.getElementById(x);
}
let loginError = _('login-error');
let loginModal = _("loginModal")
let closeLogin = _("close-login")
let category_one = _("category_one");
let category_two = _("category_two");
let category_three = _("category_three");
let category_four = _("category_four");
let text_content = _('text-content');
let special_table = _('special_table1');
let special_table2 = _('special_table2');
let special_table_price_row = _('special_table_price_row');
let special_table_price = _('special_table_price');
let special_table_price_row2 = _('special_table_price_row2');
let special_table_price2 = _('special_table_price2');
let event_name  = _('event_name');
let event_name_error = _('event_name_error');

// Keep the categories tab form dismising if there is an error
let display_error = _('display-error');
let display_error_two = _('display-error_2');
let display_error_three = _('display-error3');
let display_error_four = _('display-error4');
if(document.body.contains(display_error))
{
  category_one.style.display = 'block';
}
if(document.body.contains(display_error_two))
{
  category_two.style.display = 'block';
  selectPlenty();
}
if(document.body.contains(display_error_three))
{
  category_three.style.display = 'block';
  if(special_table.value.length > 4)
  {
    special_table_price_row.style.display = 'block';
  }
}
if(document.body.contains(display_error_four))
{
  category_four.style.display = 'block';
  if(special_table2.value.length > 4)
  {
    special_table_price_row2.style.display = 'block';
  }
}


// check if the body element contains this login error element and prevent the login modal from displaying none
if(document.body.contains(loginError))
{
  closeLogin.addEventListener('click', function(){
  
    loginModal.style.display = 'none';
    loginModal.classList.remove('show');
  });
  loginModal.style.display = 'block';
  loginModal.classList.add('show');
  loginModal.style.backgroundColor="#0a0202";
  loginModal.style.opacity="0.95";
}


$(document).ready(function(){
  let registerForm = $("#register-form");
  let response = $('.response');
  registerForm.on('submit', function(e){
    e.preventDefault();
    $.ajax({
      type : registerForm.attr('method'),
      url : registerForm.attr('action'),
      data :registerForm.serialize(),
      dataType : "json"})
      .done(function(data)
      {
        alert(data.content);
        response.text(data.content);
         if(data.response == 'success')
        {
          response.text(data.content)
        }

      })

      .fail(function()
      {
        response.text('An error occured');
      })
  })
});

// Check for the selected category from the reservation select drop down and display the appropraite tab
let reservation = _("reservation-category");
if(document.body.contains(reservation)){
  
  reservation.addEventListener('change', function(){
    if(this.value ==1)
    {
      category_one.style.display = 'block';
      category_two.style.display = 'none';
      category_three.style.display = 'none';
      category_four.style.display = 'none';
      text_content.innerHTML = 'Hotels and Lodges';
    }
    else if(this.value == 2)
    {
      category_one.style.display = 'none';
      category_two.style.display = 'block';
      category_three.style.display = 'none';
      category_four.style.display = 'none';
      text_content.innerHTML = 'Routes and Terminals';
      selectPlenty(); 
    }
    else if(this.value ==3)
    {
      category_one.style.display = 'none';
      category_two.style.display = 'none';
      category_three.style.display = 'block';
      category_four.style.display = 'none';
      text_content.innerHTML = 'Events and Special Packages';
    }
    else if(this.value == 4)
    {
    category_one.style.display = 'none';
    category_two.style.display = 'none';
    category_three.style.display = 'none';
    category_four.style.display = 'block';
    text_content.innerHTML = 'Cinema and Media centers';
    }
    else 
    {
    category_one.style.display = 'none';
    category_two.style.display = 'none';
    category_three.style.display = 'none';
    category_four.style.display = 'none';
    text_content.innerHTML = 'Create a Reservation';
    }
  });
}

// Check if special table is not empty
special_table.addEventListener('input', function()
{
  if(special_table.value.length > 4)
  {

    special_table_price_row.style.display = 'block';
  }
  else
  {

    special_table_price_row.style.display = 'none';
  }
});

special_table2.addEventListener('input', function()
{
  
  if(special_table2.value.length > 4)
  {

    special_table_price_row2.style.display = 'block';
  }
  else
  {

    special_table_price_row2.style.display = 'none';
  }
})

// check the submit button to validate the input fields
_('event_id').addEventListener('click', function(e)
{
  checkIfAnInputIsEmpty(event_name, event_name_error);
  if(special_table.value.length > 4 && special_table_price.value =='')
  {
      alert("Fill this field please");
      category_three.style.display = 'blcok';
      special_table_price.classList.add('alert alert-danger');
  }
  return false;
});

function checkIfAnInputIsEmpty(x,y)
{
  if(x.value == '')
  {
   console.log(y.innerHTML = "This field is required");
  }
}
function selectPlenty()
{
  return $("#departure_times").multiselect({
    column:1,
    placeholder:"select an option"
  }); 
}