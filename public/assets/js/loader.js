/*
loader.js file loads all the neccessary and generic components like bootstrap cdn, google fonts cdn,etc for the website.
Icluding the loader.js in the pages will load the references or library    
*/    

"use strict";  
var head = document.querySelector('head');
var link;
var script;


//----------Google fonts----------//
link = document.createElement('link');
link.setAttribute('rel','preconnect');
link.setAttribute('href','https://fonts.googleapis.com');
head.appendChild(link);

link = document.createElement('link');
link.setAttribute('rel','preconnect');
link.setAttribute('href','https://fonts.gstatic.com');
link.setAttribute('crossorigin','');
head.appendChild(link);

link = document.createElement('link');
link.setAttribute('href','https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400;1,500;1,700&display=swap');
link.setAttribute('rel','stylesheet');
head.appendChild(link);
    

