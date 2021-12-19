/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

document.addEventListener("DOMContentLoaded",function(){
    document.getElementById("loginButton").addEventListener("click",function(){
        let username = document.getElementById("username");
        let password = document.getElementById("password");
        let message = "";
        if(username == "") message+="Morate popuniti polje za korisničko ime\n";
        if(password == "") message+="Morate popuniti polje za lozinku\n";
        if(message != ""){
            document.getElementById("message").innerHTML = message;
        }
    })
})

