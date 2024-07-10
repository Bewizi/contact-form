<?php

function emptyInput($field)
{
  if (isset($_GET['error']) && $_GET['error'] === 'emptyfield' && !isset($_POST[$field])) {
    return '<span class="text-red-500">This field is required</span>';
  }
  return '';
}



// function emptyInput($message = 'Please fill in all fields.')
// {
//   if (isset($_GET['error']) && $_GET['error'] === 'emptyfield') {
//     return '<p style="color:red;">' . $message . '</p>';
//   }
//   return ''; // Return an empty string if no error condition is met
// }
