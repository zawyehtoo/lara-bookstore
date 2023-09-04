<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Lara-bookstore</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" >
    <style>
    *{
    font-family: 'Montserrat', sans-serif;
}
body::-webkit-scrollbar {
  display: none;
}
.logo{
    font-size: 30px;
}
.carousel-inner{
    height:500px;
}
.filter li{
    padding:10px;
    border-bottom:1px solid lightgray;
    width:100%;
}
.filter li a{
    text-decoration:none;
    color:#000;
}
.admin_nav{
    position: fixed;
    padding-top:50px ;
    top: 0;
    bottom: 0;
    height: 100%;
    left: 0;
    background-color:#2F363E ;
    width: 250px;
    overflow: hidden;
    box-shadow: 0 20px 35px rgba(0,0,0,0.1);
}
.admin_nav ul li{
    list-style: none;
}
.admin_nav ul li a{
    text-decoration: none;
    outline: none;
}
.admin_nav ul li a{
    position: relative;
    font-size: 15px;
    display: table;
    width: 300px;
    padding: 20px;
}
.admin_nav .nav-item{
    position: relative;
    top: 12px;
    margin-left: 10px;
    outline: none;
}
.admin_nav ul li a:hover{
    background-color: #2C4448;
}
.view{
    margin-left: 250px;

}
.tbl-container{
    overflow-y: scroll;
    overflow-x: scroll;
    height: fit-content;
    max-height: 600px;
}
.tbl-container::-webkit-scrollbar{
    display: none;
}
.auth-tbl-container{
    margin-top:20px;
}
.edit-auth-view{
    margin-left:350px;
    margin-top:200px;
    margin-right:300px;
    padding:50px;
    background-color:#2F363E;
    border:1px solid lightgray;
    border-radius:10px;
}
.edit-btn{
    float: right;
}
.update-view{
    margin-left:260px;
    margin-right:10px;
    margin-top:10px;
    padding:30px;
    background-color:#2F363E;
    border:1px solid lightgray;
    border-radius:10px;
}
</style>
 