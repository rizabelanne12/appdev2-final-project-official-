<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Custom Auth Laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
      body{
        font-family:cursive;
      }

      a {
        text-decoration: none;
        color: chocolate;
        font-size: 20px;
      }

      a:hover{
        color:black;
      }

      img:hover{
         border-color:lightgrey;
         border-radius:20px;
         box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }

      input{
        border:none;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        padding:10px;
      }

      label{
        color:chocolate;
      }

      button{
        color:white;
        border: 1px;
        background-color:orangered;
      }
      
      button:hover{
        background-color:azure;
        opacity: 0.5;
        color:orangered;
      }

      .edit_story{
        display:flex; 
        flex-direction:column;
        max-width: fit-content; 
        margin-left: auto; 
        margin-right: auto;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }

      .edit_chapter{
        display:flex; 
        flex-direction:column;
        max-width: fit-content; 
        margin-left: auto; 
        margin-right: auto;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }

      .form_edit_stories{
        display:flex;
        flex-direction:column;
        gap:10px;
        
      }

      .parent_create_stories_forms{
        display:flex; 
        flex-direction:column;
        max-width: fit-content; 
        margin-left: auto; 
        margin-right: auto;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }

      .create_chapter{
        display:flex; 
        flex-direction:column;
        max-width: fit-content; 
        margin-left: auto; 
        margin-right: auto;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

      }

      
     
    </style>
  </head>
  <body>
    @include('include.header')
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>