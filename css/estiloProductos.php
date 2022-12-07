<?php
    header("Content-Type: text/css; charset:UTF-8");
?>

body{
    font-family: Helvetica;
    background-color: #c2c2c2;
    background-image: url("https://www.transparenttextures.com/patterns/binding-dark.png");
}

h1{
    padding-top: 60px;
    font-size: 50px;
}

.fl-table {
    font-size: 17px;
    width: 50%;
    background-color: white;
    border-radius: 10px;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
    font-size: 20px;
    border:1px #EAF2E3;
}

.fl-table td {
    font-size: 15px;
}

.fl-table thead th {
    color: #ffffff;
    background: #ff737d;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #ff737d;
}

#boton{
    background: #324960;
    width: 200px;
    height: 40px;
    border: none;
    color: #fff;
    border-radius: 4px;
    font-size: 16px;
    margin: 30px auto;
    cursor: pointer;
    border-radius: 25px;
    background: linear-gradient(to right, #32be8f, #38d39f, #32be8f);
    transition: .5s;
}

#boton:hover {
  background: #16a085;
}
