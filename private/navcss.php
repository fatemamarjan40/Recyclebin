</<?php 
       header('Content-type:text/css; charser:UTF-8')
?>


/*header strt*/
.binfont{
    font-family: 'Ranchers', cursive;
    font-size: 120%;
    margin-left: -13%;
    font-weight: bold;
}
.navbar{
    
   padding: 1% 2%;
    background-color: #B0C4DE;
    color:white;
    
}

.navbar-icon{
    color:#28527a;
}
.nav-link{
    color: #28527a;
    margin: 2px;
    border-radius: 10px;
    padding: 5px;
    transition: .4s;
    font-weight: bold;
}
.nav-link:hover{
    color: #28527a;
    background: #b4aee8;
    transform: scale(1.1);
}
.slide{
    width: 100%;
    height: 800px;
}
/*header end*/

/*responsive*/
@media(max-width: 767px){
   .footer-col{
    width: 50%;
    margin-bottom: 30px;}
}
@media(max-width: 574px){
   .footer-col{
    width: 100%;}
}
