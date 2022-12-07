<?php
    header("Content-Type: text/css; charset:UTF-8");
?>

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}

body{
  overflow: hidden;
  background-color: #c2c2c2;
  background-image: url("https://www.transparenttextures.com/patterns/binding-dark.png");
}

.container{
  max-width: 380px;
  padding: 0 20px;
  margin: 170px auto;
}

.wrapper{
  background: #fff;
  box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
  border-radius: 25px;
}

.wrapper .title{
  height: 120px;
  background: #ff637D;
  color: #fff;
  font-size: 30px;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 25px;
}

.wrapper form{
  padding: 30px 25px 25px 25px;
}

.wrapper form .row{
  height: 40px;
}

.wrapper form .row input{
  height: 100%;
  width: 70%;
  padding-left: 40px;
  border: 1px solid lightgrey;
  border-radius: 25px;
}

form .row input:focus{
  border-color: #66D7D1;
  box-shadow: inset 0px 0px 2px 2px rgba(26,188,156,0.25);
}

#boton{
    background: #324960;
    width: 130px;
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
  background: #66D7D1;
  background-position: right;
}
